<div class="bg-layer"></div>
<div class="wrappper">
 <section class="form signup">
  <header>RealTime Chat App</header>
  <form action="/" method="post" enctype="multipart/form-data" autocomplete="off">
   <div class="error-txt <?php echo ($errors == "success" || $errors == "") ?  "" : "present"; ?>"><?php echo $errors; ?>
   </div>
   <div class="name-details">
    <div class="field input">
     <label>First Name</label>
     <input name="fname" type="text" value="<?php echo $userData['fname']; ?>" placeholder="First Name" />
    </div>
    <div class="field input">
     <label>Last Name</label>
     <input name="lname" type="text" value="<?php echo $userData['lname']; ?>" placeholder="Last Name" />
    </div>
   </div>
   <div class="field input">
    <label>Email</label>
    <input name="email" type="email" placeholder="Enter Email" value="<?php echo $userData['email']; ?>" />
   </div>
   <div class="field input">
    <label>New Password</label>
    <input name="password" type="password" id="password" placeholder="Enter new Password" value="<?php echo $userData['password']; ?>" />
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
  <div class="link">Already signed Up?<a href="/login">Login now</a></div>
 </section>
</div>

<script src="js/toggle-pass.js"></script>