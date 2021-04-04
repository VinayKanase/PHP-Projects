<?php require_once "header.php"; ?>
<section class="signup">
 <div class="form signin">
  <form class="form-signin idsignin" method="post">
   <h2 class="text-white font-weight-bold text-uppercase head">
    Sign In
   </h2>
   <label class="sr-only">Username</label>
   <input type="text" class="form-control" name="Username" placeholder="Username" required autofocus />
   <label for="inputEmail" class="sr-only">Email address</label>
   <input type="email" name="Email" class="form-control" placeholder="Email address" required autofocus />
   <label for="inputPassword" class="sr-only">Password</label>
   <input type="password" name="Password" class="form-control" placeholder="Password" required />
   <button class="btn btn-lg btn-success btn-block btn-signin" type="submit">
    Sign in
   </button>
  </form>
 </div>
</section>
<?php require_once "footer.php"; ?>