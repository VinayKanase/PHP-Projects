<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';

use app\Database;
use app\helpers\UtilHelpers;
// require __DIR__ . '/../ViewMiddleware.php';
$db = new Database();
$output = "";
$randstr1 = UtilHelpers::RandomString(9);
$randstr2 = UtilHelpers::RandomString(9);
$id = $_SESSION['id'];

if ($_SERVER['REQUEST_METHOD'] === "GET") {
 $data = $db->searchUsers("");
 foreach ($data as $user) {
  $lastMsg = $db->lastMessageData($id, $user['unique_id']);
  $userStatus = ($user['status'] == "Offline") ? "offline" : "";
  $output .= '<a href="chat?user_id=' . $randstr1 . "XXX" . $user['unique_id'] . "XXX" . $randstr2 . '">
               <div class="content">
                <img src="' . $user['img'] . '" alt="" />
                <div class="details">
                 <span>' . $user['fname'] . " " . $user['lname'] . '</span>
                 <p> ' . $lastMsg . '</p>
                </div>
               </div>
               <div class="status-dot ' . $userStatus . ' "><i class="fa fa-circle "></i></div>
               </a>';
 }
 echo $output;
} else {
 $searchText = $_POST['searchText'];
 $data = $db->searchUsers($searchText);
 foreach ($data as $user) {
  $lastMsg = $db->lastMessageData($id, $user['unique_id']);
  $userStatus = ($user['status'] == "Offline") ? "offline" : "";
  $output .= '<a href="chat?user_id=' . UtilHelpers::RandomString(9) . "XXX" . $user['unique_id'] . "XXX" . UtilHelpers::RandomString(9) . '">
               <div class="content">
                <img src="' . $user['img'] . '" alt="" />
                <div class="details">
                 <span>' . $user['fname'] . " " . $user['lname'] . '</span>
                 <p>' . $lastMsg . ' </p>
                </div>
               </div>
               <div class="status-dot ' . $userStatus . ' "><i class="fa fa-circle"></i></div>
               </a>';
 }
 echo $output;
}
