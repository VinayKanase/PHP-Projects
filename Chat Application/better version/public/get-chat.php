<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === "GET" ||  !isset($_POST['outgoing_id']) || !isset($_POST['incoming_id'])) {
 //Redirect to login page
 header('../login');
 exit;
}

use app\Database;

$output = "";
$outgoing_id = $_POST['outgoing_id'];
$db = new Database();
$data = $db->getChat($_POST['incoming_id'], $_POST['outgoing_id']);
// var_dump();
foreach ($data['data'] as $key) {
 if ($key["outgoing_msg_id"] === $outgoing_id) {
  //if user is sender
  $output .= '<div class="chat outgoing">
                <div class="details">
                  <p>' . $key['msg'] . '</p>
                </div>
              </div>';
 } else {
  //user is reciver
  $output .= '<div class="chat incoming">
                <img src="' . $data['indata'][0]['img'] . '" alt="" />
                <div class="details">
                  <p>' . $key['msg'] . '</p>
                </div>
              </div>';
 }
}
echo $output;
