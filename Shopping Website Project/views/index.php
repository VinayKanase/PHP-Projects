<?php require_once "header.php"; ?>
<section>
 <!-- Search Product Bar -->
 <div class="search-product" id="search">
  <form class="form-search" action="" method="get">
   <div class="input-group mb-3">
    <input value="" type="text" name="search" class="form-control" placeholder="Search for Products" />
    <div class="input-group-append">
     <button class="btn btn-outline-primary search-btn" type="submit">
      Search
     </button>
    </div>
   </div>
  </form>
 </div>
</section>
<section>
 <div class="heads">
  <h1 class="attr-header">Recomendations For You</h1>
  <h5>
   <!-- <a class="see_more" href="#"></a> -->
   <form action="" method="post">
    <input class="hidden" style="opacity: 0;" type="text" name="seemore" value="seemore" hidden readonly>
    <button style="background:transparent; border:none;" type="submit" class="see_more">See More</button>
   </form>
  </h5>
 </div>
 <div class="todays_sp">
  <?php foreach ($productsRecom as $productR) : ?>

   <div class="card" style="width: 19rem">
    <img src="./<?php echo $productR[0]["image1"]; ?>" class="card-img-top" alt="..." />
    <div class="card-body">
     <h5 class="card-title"><?php echo $productR[0]['name'] ?></h5>
     <p class="card-text">
      <?php echo $productR[0]['specifications']; ?>
     </p>
    </div>
    <ul class="list-group list-group-flush">
     <li class="list-group-item">Today's special Deal &#8377; <?php echo $productR[0]["price"]; ?></li>
    </ul>
    <div class="card-body">
     <a href="#" class="card-link">
      <form style="display:inline;" action="/viewproduct" method="get">
       <input type="text" class="hidden" name="id" value="<?php echo  $productR[0]["id"] ?>" hidden readonly>
       <input type="text" class="hidden" name="viewproduct" value="<?php echo $productR[0]["name"] ?>" hidden readonly>
       <button class="card-link" type="submit" style="background: none;border:none;">Visit Product</button>
      </form>
     </a>
     <a href="#" class="card-link">
      <form style="display:inline;" action="/addtocart" method="post">
       <input type="text" class="hidden" name="id" value="<?php echo  $productR[0]["id"] ?>" hidden readonly>
       <input type="text" class="hidden" name="viewproduct" value="<?php echo $productR[0]["name"] ?>" hidden readonly>
       <button class="card-link" type="submit" style="background: none;border:none;">Add to Cart</button>
      </form>
     </a>
    </div>
   </div>
  <?php endforeach; ?>
 </div>
</section>


<?php require_once "footer.php"; ?>