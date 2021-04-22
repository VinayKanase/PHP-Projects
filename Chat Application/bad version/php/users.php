<?php
session_start();
require_once "config.php";

$outgoing_id = $_SESSION['unquie_id'];
$sql = mysqli_query($database, "SELECT * FROM users WHERE NOT unquie_id = $outgoing_id");
$output = "";
if (mysqli_num_rows($sql) == 1) {
 $output .= "No users are available to chat";
} elseif (mysqli_num_rows($sql) > 0) {
 require "data.php";
}
echo $output;
