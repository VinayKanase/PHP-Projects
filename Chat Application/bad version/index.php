<?php
session_start();
if (isset($_SESSION['unquie_id'])) {
  header('Location:users.php');
}

require_once "header.php";
?>

<div class="bg-layer"></div>
<div class="wrappper">
  <section class="form signup">
    <header>RealTime Chat App</header>
    <form action="#" enctype="multipart/form-data" autocomplete="off">
      <div class="error-txt"></div>
      <div class="name-details">
        <div class="field input">
          <label>First Name</label>
          <input name="fname" type="text" placeholder="First Name" />
        </div>
        <div class="field input">
          <label>Last Name</label>
          <input name="lname" type="text" placeholder="Last Name" />
        </div>
      </div>
      <div class="field input">
        <label>Email</label>
        <input name="email" type="email" placeholder="Enter Email" />
      </div>
      <div class="field input">
        <label>New Password</label>
        <input name="password" type="password" id="password" placeholder="Enter new Password" />
        <i id="eye" class="fa fa-eye"></i>
      </div>
      <div class="field image">
        <label>Selet Profile Picture</label>
        <input name="image" type="file" />
      </div>
      <div class="field button">
        <input type="submit" value="Continue to Chat" />
      </div>
    </form>
    <div class="link">Already signed Up?<a href="login.php">Login now</a></div>
  </section>
</div>
<script src="./js/toggle-pass.js"></script>
<script src="./js/signup.js"></script>
</body>

</html>