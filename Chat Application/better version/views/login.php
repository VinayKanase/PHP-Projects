<div class="bg-layer"></div>
<div class="wrappper">
 <section class="form login">
  <header>RealTime Chat App</header>
  <form action="/login" method="post" autocomplete="off">
   <div class="error-txt <?php echo ($error == "") ? "" : "present"; ?>">
    <?php
    echo $error;
    ?>
   </div>
   <div class="field input">
    <label>Email</label>
    <input value="<?php echo $email; ?>" type="email" name="email" placeholder="Enter Email" />
   </div>
   <div class="field input">
    <label>New Password</label>
    <input value="<?php echo $password; ?>" id="password" name="password" type="password" placeholder="Enter your Password" />
    <i id="eye" class="fa fa-eye"></i>
   </div>
   <div class="field button">
    <input type="submit" value="Continue to Chat" />
   </div>
  </form>
  <div class="link">Not yet signed up?<a href="/">SignUp now</a></div>
 </section>
</div>

<script src="./js/toggle-pass.js"></script>