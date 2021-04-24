<?php

use app\Database;
// session_start();

if (isset($_SESSION['id'])) {
 echo $_SESSION['id'];
 $db = new Database();
 $pos = $db->setStatus("Offline", $_SESSION['id']);
 if ($pos === "success") {
  session_unset();
  session_destroy();
  header("Location:/login");
 } else {
  header("Location:/login");
 }
} else {
 header("Location:/login");
}
