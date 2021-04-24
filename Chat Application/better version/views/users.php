<?php

if (!isset($_SESSION['id'])) {
 header('Location:/login');
}
?>

<div class="bg-layer"></div>
<div class="wrappper">
 <section class="users">
  <header>
   <div class="content">
    <img src="<?php echo $mainUser['img']; ?>" alt="" />
    <div class="details">
     <span><?php echo $mainUser['fname'] . " " . $mainUser['lname']; ?></span>
     <p><?php echo $mainUser['status']; ?></p>
    </div>
   </div>
   <a href="/logout" class="logout">Logout</a>
  </header>
  <div class="search">
   <span class="text"> Select any user To start Chat </span>
   <input id="search" autocomplete="off" type="text" placeholder="Enter name to Search..." />
   <button id="searchbtn"><i class="fa fa-search"></i></button>
  </div>
  <div class="users-list">
   <?php if (isset($otherUsers)) { ?>
    <?php foreach ($otherUsers as $user) { ?>
     <a href="/chat?user_id=<?php echo $user['unique_id']; ?>">
      <div class="content">
       <img src="<?php echo $user['img']; ?>" alt="" />
       <div class="details">
        <span><?php echo $user['fname'] . " " . $user['lname']; ?> </span>
        <p> Try Message</p>
       </div>
      </div>
      <div class="status-dot <?php echo $user['status'] == "Offline" ? "offline" : ""; ?> "><i class="fa fa-circle"></i></div>
     </a>
    <?php } ?>
   <?php } ?>
  </div>
 </section>
</div>

<script src="/js/users.js"></script>