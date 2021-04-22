<?php
session_start();

require_once "config.php";
$outgoing_id = $_SESSION['unquie_id'];

$searchText = mysqli_real_escape_string($database, $_POST["searchText"]);
$output = "";

$sql = mysqli_query($database, "SELECT * FROM users WHERE NOT unquie_id = $outgoing_id AND (fname LIKE '%$searchText%' OR lname LIKE '%$searchText%')");
if (mysqli_num_rows($sql) > 0) {
 require "data.php";
} else {
 $output .= "No user found related to your search";
}

echo $output;
