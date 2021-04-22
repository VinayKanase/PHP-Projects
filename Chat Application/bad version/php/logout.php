<?php
session_start();

if (isset($_SESSION['unquie_id'])) {
 //if user is logged in then allowed to this page
 require_once "config.php";
 $logout_id = mysqli_real_escape_string($database, $_GET["logout_id"]);
 if (isset($logout_id)) {
  $status = "Offline";
  $sql = mysqli_query($database, "UPDATE users SET status = '$status' WHERE unquie_id = $logout_id");
  if ($sql) {
   session_unset();
   session_destroy();
   header('Location:../login.php');
  }
 } else {
  header('Location:../login.php');
 }
} else {
 header('Location:../login.php');
}
