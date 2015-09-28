<?php
include ('initialize.php');

use Core\Server;
use Core\Database;
use Core\ProductOffered;
use Core\ClientResponse;
use Core\Product;
use Core\Result;
use Core\User;


$array['result'] = array();
$array['product'] = array();

$connection = null;

try {
	$product = new Product();
	
	if (!isset($_POST['Product']))
		throw new Exception("Product is not set.", 1);
	if (!isset($_POST['Company']))
		throw new Exception("Company offered  is not set.", 1);
	if (!isset($_POST['Contact']))
		throw new Exception("Contact is not set.", 1);
	if (!isset($_POST['ClientResponse']))
		throw new Exception("Client response is not set.", 1);
	if (!isset($_POST['User']))
		throw new Exception("User is not set.", 1);


	$product->Product = $_POST['Product'];
	$product->Company = $_POST['Company'];
	$product->Contact = $_POST['Contact'];
	$product->ClientResponse = $_POST['ClientResponse'];
	$product->User = $_POST['User'];


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
		INSERT INTO ats.product_offered
		(
    	ats.product_offered.product_offered_datetime,
    	ats.product_offered.product_offered_product,
    	ats.product_offered.product_offered_company,
    	ats.product_offered.product_offered_contact,
    	ats.product_offered.product_offered_client_response,
    	ats.product_offered.product_offered_user
    	)
    	VALUES 
    	(
		NOW(),
		productOfferedProduct,
		productOfferedCompany,
		productOfferedContact,
		productOfferedClientResponse,
		productOfferedUser
		);";

	$query = $connection->prepare($sql);

	if (!$query->execute()) {
		throw new Exception($product->Product . " not added!", 1);
	}
	//-------------------------------------------------------------------

$result = new Result(Result::SUCCESS,"Added new product!");
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
