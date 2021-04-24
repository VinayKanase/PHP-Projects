<?php

if (!isset($_SESSION['id'])) {
 header('Location:/login');
} ?>

<div class="bg-layer"></div>
<div class="wrappper">
 <section class="chat-area">
  <header>
   <a href="/users" class="back-icon"><i class="fa fa-arrow-left"></i></a>
   <img src="<?php echo $chatUser['img']; ?>" alt="" />
   <div class="details">
    <span><?php echo $chatUser['fname'] . " " . $chatUser['lname']; ?></span>
    <p><?php echo $chatUser['status']; ?></p>
   </div>
  </header>
  <div class="chat-box">

  </div>
  <form class="typing-area" autocomplete="off">
   <input name="outgoing_id" type="text" value="<?php echo $outgoing_id; ?>" readonly hidden>
   <input name="incoming_id" type="text" value="<?php echo $incoming_id; ?>" readonly hidden>
   <input id="message" name="message" type="text" placeholder="Type a message..." />
   <button><i class="fa fa-send"></i></button>
  </form>
 </section>
</div>

<script src="/js/chats.js"></script>