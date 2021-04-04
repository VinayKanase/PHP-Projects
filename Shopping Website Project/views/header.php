<!DOCTYPE html>
<html lang="en">

<head>
       <meta charset="UTF-8" />
       <meta http-equiv="X-UA-Compatible" content="IE=edge" />
       <meta name="viewport" content="width=device-width, initial-scale=1.0" />
       <!-- <link rel="stylesheet" href="css/fontawesome.css" /> -->
       <link rel="stylesheet" href="css/style.css" type="text/css" />
       <?php $light = $light ?? false;
       if ($light) {
              echo "<link type='text/css' rel='stylesheet' href='css/lightslider.css' />";
       }
       ?>
       <title>Shopping Website</title>
</head>

<body>
       <marquee>This is my Learning Project not real website</marquee>
       <header class="bg-dark bg-custom">
              <nav class="navbar side-navs">
                     <a class="btn btn-primary btn-hoverout" href="/signin">Sign in</a>
                     <a class="btn btn-primary btn-hoverout" href="/signup">Sign up</a>
              </nav>
              <nav class="main navbar">
                     <a class="navbar-brand text-white" href="/">Shopping Website</a>
                     <ul class="nav">
                            <li>
                                   <a href="/" class="nav-link <?php if ($page === 'index') echo 'active';
                                                               ?>">Home</a>
                            </li>
                            <li>
                                   <a href="/categories" class="nav-link <?php if ($page === 'categories') echo 'active';
                                                                             ?>">Shop by Categories</a>
                            </li>
                            <li class="disabled" style="opacity: 0.2; cursor: not-allowed">
                                   <a href="" class="nav-link" style="cursor: not-allowed">Your Orders</a>
                            </li>
                            <li>
                                   <a href="/wishlist" class="nav-link <?php if ($page === 'wishlist') echo 'active';
                                                                             ?>
                                 ">Your Wish List</a>
                            </li>
                            <li>
                                   <a href="/accountsettings" class="nav-link <?php if ($page === 'accountsettings') echo 'active'; ?>">Your Account Settings</a>
                            </li>
                            <li>
                                   <a href="aboutus" class="nav-link <?php if ($page === 'aboutus') echo 'active'; ?>">About US</a>
                            </li>
                            <li>
                                   <a href="/cart" class="nav-link">
                                          <small>0</small>
                                          <img class="cart" src="assets/web images/cart.png" alt="Cart" />
                                   </a>
                            </li>
                     </ul>
              </nav>
       </header>