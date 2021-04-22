<?php

session_start();
if (isset($_SESSION['unquie_id'])) {
 require_once "config.php";
 $outgoing_id = mysqli_real_escape_string($database, $_POST["outgoing_id"]);
 $incoming_id = mysqli_real_escape_string($database, $_POST["incoming_id"]);
 $output = "";

 $sql = "SELECT * FROM messages
 LEFT JOIN users ON users.unquie_id = messages.incoming_msg_id
  WHERE (incoming_msg_id = $incoming_id AND outgoing_msg_id = $outgoing_id)
 OR (incoming_msg_id = $outgoing_id AND outgoing_msg_id = $incoming_id) ORDER BY msg_id ASC";
 $query = mysqli_query($database, $sql);
 if (mysqli_num_rows($query) > 0) {
  while ($row = mysqli_fetch_array($query)) {
   if ($row["outgoing_msg_id"] === $outgoing_id) {
    //if user is sender
    $output .= '<div class="chat outgoing">
                  <div class="details">
                    <p>' . $row['msg'] . '</p>
                  </div>
                </div>';
   } else {
    //user is reciver
    $output .= '<div class="chat incoming">
                  <img src="php/images/' . $row['img'] . '" alt="" />
                  <div class="details">
                    <p>' . $row['msg'] . '</p>
                  </div>
                </div>';
   }
  }
  echo $output;
 }
} else {
 header('../login.php');
}
