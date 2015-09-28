<?php
include ('initialize.php');

use Core\Server;
use Core\Database;
use Core\Company;
use Core\Result;
use Core\User;
use Core\Contact;


$array['result'] = array();
$array['contact'] = array();

$connection = null;

try {
	$contact = new Contact();
	
	if (!isset($_POST['Data']))
		throw new Exception("Contact Data is not set.", 1);
	if (!isset($_POST['Company']))
		throw new Exception("Company is not set.", 1);
	if (!isset($_POST['Type']))
		throw new Exception("Type is not set.", 1);
	if (!isset($_POST['User']))
		throw new Exception("User is not set.", 1);

	$contact->Data = $_POST['Data'];
	$contact->Company = $_POST['Company'];
	$contact->Type = $_Post['Type'];
	$contact->User = $_POST['User'];
	$contact->Status = 3;


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
	INSERT INTO ats.contact 
	(
    ats.contact.contact_data,
	ats.contact.contact_company,
	ats.contact.contact_type)
	VALUES (
		contactData, 
		contactCompany, 
		contactType
    );
		 CALL ats.user_log_insert
		 (
		 	user,
		 	2,
		 	'ats.contact',
		 	contactData
		 );";

	$query = $connection->prepare($sql);

	if (!$query->execute()) {
		throw new Exception($contact->Data . " not added!", 1);
	}
	//-------------------------------------------------------------------

$result = new Result(Result::SUCCESS,"Added new contact!");
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
