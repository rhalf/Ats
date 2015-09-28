<?php
include ('initialize.php');

use Core\Server;
use Core\Database;
use Core\BusinessField;
use Core\Company;
use Core\CompanyAddress;
use Core\Result;
use Core\User;


$array['result'] = array();

$connection = null;

try {
	$company = new Company();
	$companyAddress = new CompanyAddress();


	if (!isset($_POST['Name']))
		throw new Exception("Name is not set.", 1);
	if (!isset($_POST['Description']))
		throw new Exception("Description is not set.", 1);
	if (!isset($_POST['BusinessField']))
		throw new Exception("BusinessField is not set.", 1);

	if (!isset($_POST['AddressName']))
		throw new Exception("AddressName is not set.", 1);
	if (!isset($_POST['AddressDetail']))
		throw new Exception("AddressDetail is not set.", 1);
	if (!isset($_POST['AddressLatitude']))
		throw new Exception("AddressLatitude is not set.", 1);
	if (!isset($_POST['AddressLongitude']))
		throw new Exception("AddressLongitude is not set.", 1);
	
	if (!isset($_POST['ContactMobile']))
		throw new Exception("ContactMobile is not set.", 1);
	if (!isset($_POST['ContactLandline']))
		throw new Exception("ContactLandline is not set.", 1);
	if (!isset($_POST['ContactEmail']))
		throw new Exception("ContactEmail is not set.", 1);
	if (!isset($_POST['ContactFax']))
		throw new Exception("ContactFax is not set.", 1);

	$userId =  $_SESSION['user']->Id;

	$company->Name = $_POST['Name'];
	$company->Description = $_POST['Description'];
	$company->AddedBy =
	$company->BusinessField = $_POST['BusinessField'];
	$company->Status = 3;
	
	$companyAddress->Name = $_POST['AddressName'];
	$companyAddress->Latitude = $_POST['AddressLatitude'];
	$companyAddress->Longitude = $_POST['AddressLongitude'];
	$companyAddress->Detail = $_POST['AddressDetail'];
			

	if ($server->Type == Server::MSSQL) {
		$connection = new PDO("mssql:host=$server->Ip;dbname=", $user, $pass);
		$connection = new PDO("sybase:host=$server->Ip;dbname=", $user, $pass);
	} else if ($server->Type == Server::MYSQL) {
		$connection = new PDO("mysql:host=$server->Ip;dbname=", $database->Username, $database->Password);
	}else{
		$connection = new PDO("sqlite:my/database/path/database.db");
	}
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	//-------------------------------------------------------------------

	$sql = "
		CALL ats.company_insert_all('" . 
		$company->Name . "','". 
		$company->Description . "'," . 
		$company->Status .",". 
		$company->BusinessField .",'". 

		$companyAddress->Name . "',". 
		$companyAddress->Latitude . "," . 
		$companyAddress->Longitude .",'".
		$companyAddress->Detail . "'," .

		$userId .");";

	$query = $connection->prepare($sql);

	//throw new Exception($sql, 1);

	if (!$query->execute()) {
		throw new Exception($company->Name . " not added!", 1);
	}

// ContactMobile:contactMobile,
// ContactLandline:contactLandLine,
// ContactEmail:contactEmail,
// ContactFax:contactFax
	//-------------------------------------------------------------------

$result = new Result(Result::SUCCESS,"Added new Company!");
array_push($array['result'], $result);
} catch(PDOException $pdoException) {
	$result = new Result(Result::FAILED, $pdoException->getMessage());
	array_push($array['result'], $result);
} catch(Exception $exception) {
	$result = new Result(Result::FAILED, $exception->getMessage());
	array_push($array['result'], $result);
}

$connection = null;
echo json_encode($array);
?>
