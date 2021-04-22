<?php

session_start();
if (!isset($_SESSION['unquie_id'])) {
  header('Location:login.php');
} else {
  $id = $_SESSION['unquie_id'];
}
require_once "header.php";


//require database connection
require_once "php/config.php";
$id = mysqli_real_escape_string($database, $_GET['user_id']);
$sql = mysqli_query($database, "SELECT * FROM users WHERE unquie_id = $id");

if (mysqli_num_rows($sql) > 0) {
  $userData = mysqli_fetch_assoc($sql);
}
?>

<div class="bg-layer"></div>
<div class="wrappper">
  <section class="chat-area">
    <header>
      <a href="users.php" class="back-icon"><i class="fa fa-arrow-left"></i></a>
      <img src="php/images/<?php echo $userData["img"]; ?>" alt="" />
      <div class="details">
        <span><?php echo $userData["fname"] . " " . $userData["lname"]; ?></span>
        <p><?php echo $userData["status"]; ?></p>
      </div>
    </header>
    <div class="chat-box">

    </div>
    <form class="typing-area" autocomplete="off">
      <input name="outgoing_id" type="text" value="<?php echo $_SESSION['unquie_id']; ?>" readonly hidden>
      <input name="incoming_id" type="text" value="<?php echo $id; ?>" readonly hidden>
      <input id="message" name="message" type="text" placeholder="Type a message..." />
      <button><i class="fa fa-send"></i></button>
    </form>
  </section>
</div>

<script src="./js/chats.js"></script>
</body>

</html>