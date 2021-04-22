<?php
require_once "header.php";
?>
<div class="bg-layer"></div>
<div class="wrappper">
  <section class="form login">
    <header>RealTime Chat App</header>
    <form action="#">
      <div class="error-txt"></div>
      <div class="field input">
        <label>Email</label>
        <input type="email" name="email" placeholder="Enter Email" />
      </div>
      <div class="field input">
        <label>New Password</label>
        <input id="password" name="password" type="password" placeholder="Enter your Password" />
        <i id="eye" class="fa fa-eye"></i>
      </div>
      <div class="field button">
        <input type="submit" value="Continue to Chat" />
      </div>
    </form>
    <div class="link">Not yet signed up?<a href="index.php">SignUp now</a></div>
  </section>
</div>

<script src="./js/toggle-pass.js"></script>
<script src="./js/login.js"></script>
</body>

</html>