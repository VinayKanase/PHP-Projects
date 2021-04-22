<?php
$database = mysqli_connect("localhost", "root", "", "chat app");
if (!$database) {
 echo "Error" . mysqli_connect_error();
}
