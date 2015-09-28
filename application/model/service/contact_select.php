<?php
include ('initialize.php');

use Core\Server;
use Core\Database;
use Core\Contact;
use Core\ContactType;
use Core\Company;
use Core\Result;

$array['result'] = array();
$array['contact'] = array();
$connection = null;

try {
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
		SELECT
		    ats.contact.id,
			ats.contact.contact_data,
			ats.contact.contact_company,
			ats.contact.contact_type
            
		FROM ats.contact
		');

	$query->execute();

	

	while ($row = $query->fetch(PDO::FETCH_BOTH)) {
		$contact = new Contact();
		$contact->Id = $row["id"];
		$contact->Data = $row["contact_data"];
		$contact->Company = $row["contact_company"];
		$contact->Type = $row["contact_type"];
		array_push($array['contact'], $businessField);
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
