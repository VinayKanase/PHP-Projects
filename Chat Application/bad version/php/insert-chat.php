<?php

session_start();
if (isset($_SESSION['unquie_id'])) {
 require_once "config.php";
 $outgoing_id = mysqli_real_escape_string($database, $_POST["outgoing_id"]);
 $incoming_id = mysqli_real_escape_string($database, $_POST["incoming_id"]);
 $message = mysqli_real_escape_string($database, $_POST["message"]);

 if (!empty($message)) {
  $sql = mysqli_query($database, "INSERT into messages (incoming_msg_id,outgoing_msg_id,msg) VALUES ($incoming_id, $outgoing_id, '$message')") or die();
 }
} else {
 header('../login.php');
}
