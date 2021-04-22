<?php
while ($row = mysqli_fetch_assoc($sql)) {
 $id = $row['unquie_id'];
 $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = $id
 OR outgoing_msg_id = $id ) AND (incoming_msg_id = $outgoing_id OR outgoing_msg_id = $outgoing_id) ORDER BY msg_id DESC LIMIT 1";
 $query2 = mysqli_query($database, $sql2);
 $row2 = mysqli_fetch_assoc($query2);
 if (mysqli_num_rows($query2) > 0) {
  $result = $row2['msg'];
 } else {
  $result = "No msg avilable";
 }

 // Trimming message if it is more than 28 words
 (strlen($result) > 28) ? $msg = substr($result, 0, 28) . "..." : $msg = $result;
 // adding you: text before msg if login id send msg
 ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";

 //user status check (online or offline)
 ($row['status'] == 'Offline') ? $offline = "offline" : $offline = "";
 $output .= '<a href="chat.php?user_id=' . $row['unquie_id'] . '">
              <div class="content">
               <img src="php/images/' . $row['img'] . '" alt="" />
               <div class="details">
                <span>' . $row['fname'] . " " . $row['lname'] . '</span>
                <p>' . $you . $msg . '</p>
               </div>
              </div>
              <div class="status-dot ' . $offline . '"><i class="fa fa-circle"></i></div>
             </a>';
}
