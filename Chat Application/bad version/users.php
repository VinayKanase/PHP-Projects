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
$sql = mysqli_query($database, "SELECT * FROM users WHERE unquie_id = $id");
if (mysqli_num_rows($sql) > 0) {
  $userData = mysqli_fetch_assoc($sql);
}
?>
<div class="bg-layer"></div>
<div class="wrappper">
  <section class="users">
    <header>
      <div class="content">
        <img src="php/images/<?php echo $userData["img"]; ?>" alt="" />
        <div class="details">
          <span><?php echo $userData["fname"] . " " . $userData["lname"]; ?></span>
          <p><?php echo $userData["status"]; ?></p>
        </div>
      </div>
      <a href="php/logout.php?logout_id=<?php echo $id; ?>" class="logout">Logout</a>
    </header>
    <div class="search">
      <span class="text"> Select any user To start Chat </span>
      <input id="search" autocomplete="off" type="text" placeholder="Enter name to Search..." />
      <button id="searchbtn"><i class="fa fa-search"></i></button>
    </div>
    <div class="users-list">
    </div>
  </section>
</div>

<script src="./js/users.js"></script>
</body>

</html>