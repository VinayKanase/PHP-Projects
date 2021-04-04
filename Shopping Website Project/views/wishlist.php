<?php require_once "header.php" ?>

<section>
 <!-- Search Product Bar -->
 <div class="search-product" id="search">
  <form class="form-search" action="">
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
 <div class="wishlist_header">
  <h1>Wish Lists</h1>
  <a href="#" class="btn btn-outline-primary">
   <span>+</span>
   Create a New List
  </a>
 </div>
 <div class="all_lists_show">
  <!-- !This List is for designing list don't add it -->
  <div class="list">
   <div class="listicon_cont">
    <img src="assets/web images/Lists.png" alt="List Icon" />
   </div>
   <div class="heading">
    <div class="list-name">
     <h3>List 1</h3>
    </div>
    <div class="moreinfo">
     <span>No. of Products:0 </span>
     <span>Recipient Name: </span>
    </div>
   </div>
   <div class="options">
    <a href="#" class="btn btn-success"> Manage List </a>
    <a href="#" class="btn btn-danger"> Delete List </a>
   </div>
  </div>
 </div>
</section>
<?php require_once "footer.php" ?>