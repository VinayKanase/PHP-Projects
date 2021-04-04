<?php require_once "header.php";
?>

<section class="signup">
 <div class="form">
  <h2 class="text-white font-weight-bold text-uppercase head">Sign Up</h2>
  <div class="container bg-light">
   <ul style="list-style-type: circle;">
    <?php
    foreach ($errors as $error) { ?>
     <li>
      <?php echo $error ?>
     </li>

    <?php }
    ?>
   </ul>
  </div>
  <form method="post" action="">
   <div class="form-row spacing">
    <div class="col">
     <input type="text" value="<?php echo $details["firstname"]; ?>" name="firstname" class="form-control" placeholder="First name" required autofocus />
    </div>
    <div class="col">
     <input type="text" value="<?php echo $details["lastname"]; ?>" name="lastname" class="form-control" placeholder="Last name" required autofocus />
    </div>
   </div>
   <div class="input-group flex-nowrap">
    <div class="input-group-prepend">
     <span class="input-group-text" id="addon-wrapping">@</span>
    </div>
    <input type="text" value="<?php echo $details["username"]; ?>" name="username" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping" required autofocus />
   </div>
   <div class="form-row">
    <div class="form-group col-md-6">
     <label for="inputEmail4">Email</label>
     <input value="<?php echo $details["email"]; ?>" type="email" class="form-control" placeholder="Email" name="email" required autofocus />
    </div>
    <div class="form-group col-md-6">
     <label for="inputPassword4">Password</label>
     <input value="<?php echo $details["password"]; ?>" name="password" type="password" class="form-control" required autofocus />
    </div>
   </div>
   <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="Address" />
   </div>
   <div class="form-group">
    <label for="inputAddress2">Address 2</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Address 2" />
   </div>
   <div class="form-row">
    <div class="form-group col-md-6">
     <label for="inputCity">City</label>
     <input type="text" class="form-control" id="inputCity" />
    </div>
    <div class="form-group col-md-4">
     <label for="inputState">State</label>
     <select id="inputState" class="form-control">
      <option selected>Choose...</option>
      <option>Maharastra</option>
      <option>Delhi</option>
      <option>Kerla</option>
      <option>Karnataka</option>
      <option>Tamil Nadu</option>
      <option>Gujarat</option>
      <option></option>
     </select>
    </div>
    <div class="form-group col-md-2">
     <label for="inputZip">Zip</label>
     <input type="text" class="form-control" id="inputZip" />
    </div>
   </div>
   <button type="submit" class="btn btn-success btn-signin">
    Sign in
   </button>
  </form>
 </div>
</section>
<?php require_once "footer.php"; ?>