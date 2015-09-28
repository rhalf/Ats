<?php
include ('initialize.php');

use Core\Server;
use Core\Database;
use Core\Company;
use Core\CompanyAddress;
use Core\Result;

/*Objects included on Json*/
$array['result'] = array();
$array['companyaddress'] = array();
/*Variables*/


$connection = null;
try {
	//----------------------------------------------------------------------

	if ($server->Type == Server::MSSQL) {
		$connection = new PDO("mssql:host=$server->Ip;dbname=", $user, $pass);
		$connection = new PDO("sybase:host=$server->Ip;dbname=", $user, $pass);
	} else if ($server->Type == Server::MYSQL) {
		$connection = new PDO("mysql:host=$server->Ip;dbname=", $database->Username, $database->Password);
	}else{
		$connection = new PDO("sqlite:my/database/path/database.db");
	}
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);

	//-----------------------------------------------------------------------
	

	$query = $connection->prepare('
		CALL ats.company_address_select();');

	$query->execute();

	while($row = $query->fetch(PDO::FETCH_BOTH)) {
		$companyAddress = new CompanyAddress();
		$companyAddress->Id = $row['id']; 
		$companyAddress->Name = $row['company_address_name']; 
		$companyAddress->Latitude =	$row['company_address_latitude'];
		$companyAddress->Longitude = $row['company_address_longitude'];
		$companyAddress->Company = $row['company_address_company'];
		$companyAddress->Detail = $row['company_address_detail'];
		
		array_push($array['companyaddress'], $companyAddress);
	}

	//-------------------------------------------------------------------
	$result = new Result(Result::SUCCESS,"Success!");
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
