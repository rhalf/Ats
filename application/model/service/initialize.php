<?php
$root = $_SERVER['DOCUMENT_ROOT'] . 'Ats';

include($root . '/application/model/class/server.php');
include($root . '/application/model/class/database.php');
include($root . '/application/model/class/business_field.php');
include($root . '/application/model/class/user.php');
include($root . '/application/model/class/company.php');
include($root . '/application/model/class/status.php');
include($root . '/application/model/class/result.php');

include($root . '/application/model/class/client_response.php');
include($root . '/application/model/class/company_address.php');
include($root . '/application/model/class/contact.php');
include($root . '/application/model/class/contact_type.php');
include($root . '/application/model/class/privilege.php');
include($root . '/application/model/class/product_description.php');

include($root . '/application/model/class/user_log.php');
include($root . '/application/model/class/user_log_type.php');

use Core\Server;
use Core\Database;

$server = new Server("184.107.179.178","rhalfs server",Server::MYSQL);
$database = new Database("ats","atstest", "ats");
//$server = new Server("127.0.0.1","localhost",Server::MYSQL);
//$database = new Database("root","", "ats");

session_start();

$_SESSION['server'] = $server;
$_SESSION['database'] = $database;
?>