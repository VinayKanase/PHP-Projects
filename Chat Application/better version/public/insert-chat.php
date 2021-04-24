<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';

use app\Database;

if ($_SERVER['REQUEST_METHOD'] === "GET" ||  !isset($_POST['outgoing_id']) || !isset($_POST['incoming_id']) || !isset($_POST['message'])) {
 //Redirect to login page
 header('../login');
 exit;
}
$message = $_POST['message'];
if (!empty($message)) {
 $db = new Database();
 $db->setChat($_POST['incoming_id'], $_POST['outgoing_id'], $_POST['message']);
}
