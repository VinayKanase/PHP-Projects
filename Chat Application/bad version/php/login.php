<?php
session_start();
session_start();
if (isset($_SESSION['unquie_id'])) {
 header('Location:users.php');
}

require_once "./config.php";

$email = mysqli_real_escape_string($database, $_POST["email"]);
$password = mysqli_real_escape_string($database, $_POST["password"]);

if (!empty($email) && !empty($password)) {
 //Check for user entered email and password to matches to database
 $sql = mysqli_query($database, "SELECT * FROM users WHERE email = '$email' AND password = '$password'");
 if (mysqli_num_rows($sql) > 0) {
  //users details matched
  $row = mysqli_fetch_assoc($sql);
  $uqid = $row['unquie_id'];
  $status = "Active";
  //updating user status to active if user has successfully logined
  $sql2 = mysqli_query($database, "UPDATE users SET status = '$status' WHERE unquie_id = $uqid");
  if ($sql2) {
   $_SESSION['unquie_id'] = $row["unquie_id"];
   echo "success";
  }
 } else {
  echo "Email or password is incorrect";
 }
} else {
 echo "All Input fields   are required";
}
