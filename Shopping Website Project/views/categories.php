<?php require_once "header.php"  ?>
<section>
  <!-- Search Product Bar -->
  <div class="search-product" id="search">
    <form class="form-search" action="">
      <div class="input-group mb-3">
        <input value="<?php echo $search; ?>" type="text" name="search" class="form-control" placeholder="Search for Products" />
        <div class="input-group-append">
          <button class="btn btn-outline-primary search-btn" type="submit">
            Search
          </button>
        </div>
      </div>
    </form>
  </div>
</section>
<section id="categories">
  <h1 style="margin: 30px 20px">All Categories</h1>
  <div class="container categories-cont">
    <?php
    foreach ($categories as $value) {
    ?>
      <div class="card catgeories-card">
        <div class="card-heading">
          <h4><?php echo $value['title']; ?>
          </h4>
        </div>
        <img src="./assets/<?php echo $value['imagesrc'] ?>" class="catgeories-img" alt="Image Not Found" />
        <div class="card-body link-to-shop">
          <a href="#" class="card-link">Shop now</a>
        </div>
      </div>
    <?php   } ?>
  </div>
</section>
<?php require_once "footer.php"  ?>

<!--   <div class="card catgeories-card">
   <div class="card-heading">
    <h4>Mobile Accessories</h4>
   </div>
   <img src="./assets/Categories/Mobile Accessories.jpg" class="catgeories-img" alt="Image Not Found" />
   <div class="card-body link-to-shop">
    <a href="#" class="card-link">Shop now</a>
   </div>
  </div>
  <div class="card catgeories-card">
   <div class="card-heading">
    <h4>Tablets</h4>
   </div>
   <img src="./assets/Categories/Tablets.jpg" class="catgeories-img" alt="Image Not Found" />
   <div class="card-body link-to-shop">
    <a href="#" class="card-link">Shop now</a>
   </div>
  </div>
  <div class="card catgeories-card">
   <div class="card-heading">
    <h4>Laptops & Accessories</h4>
   </div>
   <img src="./assets/Categories/Laptops.jpg" class="catgeories-img" alt="Image Not Found" />
   <div class="card-body link-to-shop">
    <a href="#" class="card-link">Shop now</a>
   </div>
  </div>
  <div class="card catgeories-card">
   <div class="card-heading">
    <h4>Computers & Accessories</h4>
   </div>
   <img src="./assets/Categories/Computers.jpg" class="catgeories-img" alt="Image Not Found" />
   <div class="card-body link-to-shop">
    <a href="#" class="card-link">Shop now</a>
   </div>
  </div>
  <div class="card catgeories-card">
   <div class="card-heading">
    <h4>Televisions</h4>
   </div>
   <img src="./assets/Categories/Televisons.jpg" class="catgeories-img" alt="Image Not Found" />
   <div class="card-body link-to-shop">
    <a href="#" class="card-link">Shop now</a>
   </div>
  </div>
  <div class="card catgeories-card">
   <div class="card-heading">
    <h4>Wearable Devices</h4>
   </div>
   <img src="./assets/Categories/Wearlable Devices.jpg" class="catgeories-img" alt="Image Not Found" />
   <div class="card-body link-to-shop">
    <a href="#" class="card-link">Shop now</a>
   </div>
  </div>
  <div class="card catgeories-card">
   <div class="card-heading">
    <h4>Men Clothing</h4>
   </div>
   <img src="./assets/Categories/Mens-clothing.jpg" class="catgeories-img" alt="Image Not Found" />
   <div class="card-body link-to-shop">
    <a href="#" class="card-link">Shop now</a>
   </div>
  </div>
  <div class="card catgeories-card">
   <div class="card-heading">
    <h4>Men Bags,Wallets,etc</h4>
   </div>
   <img src="./assets/Categories/Mens-Bags,Wallets,etc.jpg" class="catgeories-img" alt="Image Not Found" />
   <div class="card-body link-to-shop">
    <a href="#" class="card-link">Shop now</a>
   </div>
  </div>
  <div class="card catgeories-card">
   <div class="card-heading">
    <h4>Men Shoes</h4>
   </div>
   <img src="./assets/Categories/Mens-Shoes.jpg" class="catgeories-img" alt="Image Not Found" />
   <div class="card-body link-to-shop">
    <a href="#" class="card-link">Shop now</a>
   </div>
  </div>
  <div class="card catgeories-card">
   <div class="card-heading">
    <h4>Men Accessories</h4>
   </div>
   <img src="./assets/Categories/Mens-accessories.jpg" class="catgeories-img" alt="Image Not Found" />
   <div class="card-body link-to-shop">
    <a href="#" class="card-link">Shop now</a>
   </div>
  </div>
  <div class="card catgeories-card">
   <div class="card-heading">
    <h4>Women Clothing</h4>
   </div>
   <img src="./assets/Categories/Womens-clothing.jpg" class="catgeories-img" alt="Image Not Found" />
   <div class="card-body link-to-shop">
    <a href="#" class="card-link">Shop now</a>
   </div>
  </div>
  <div class="card catgeories-card">
   <div class="card-heading">
    <h4>Women Bags,Wallets,etc</h4>
   </div>
   <img src="./assets/Categories/Womens-Bags,Wallets.jpg" class="catgeories-img" alt="Image Not Found" />
   <div class="card-body link-to-shop">
    <a href="#" class="card-link">Shop now</a>
   </div>
  </div>
  <div class="card catgeories-card">
   <div class="card-heading">
    <h4>Women Shoes</h4>
   </div>
   <img src="./assets/Categories/Womens-Shoes.jpg" class="catgeories-img" alt="Image Not Found" />
   <div class="card-body link-to-shop">
    <a href="#" class="card-link">Shop now</a>
   </div>
  </div>
  <div class="card catgeories-card">
   <div class="card-heading">
    <h4>Women Accessories</h4>
   </div>
   <img src="./assets/Categories/Womens-accessories.jpg" class="catgeories-img" alt="Image Not Found" />
   <div class="card-body link-to-shop">
    <a href="#" class="card-link">Shop now</a>
   </div>
  </div>
 -->