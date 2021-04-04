<?php
require_once "header.php";
?>

<section class="signup">
 <form method="post" class="form" enctype="multipart/form-data">
  <h2 class="text-white font-weight-bold text-uppercase head">
   Add Product
  </h2>

  <label>Product Name</label>
  <input type="text" class="form-control" name="name" placeholder="Product Name" required autofocus />
  <label>Description</label>
  <textarea style="padding: 10px 20px" cols="100" name="description"></textarea>
  <br />
  <label>Price</label>
  <div class="input-group flex-nowrap">
   <div class="input-group-prepend">
    <span class="input-group-text" id="addon-wrapping">₹</span>
   </div>
   <input type="number" name="price" step="0.01" class="form-control" placeholder="Price" required autofocus />
  </div>
  <label for="Image1">Image</label>
  <input type="file" class="form-control-file" name="image" required autofocus />
  <label>More Images</label>
  <input type="file" class="form-control-file" name="image2" autofocus /><input type="file" class="form-control-file" name="image3" autofocus />
  <label for="">Company</label>
  <input type="text" class="form-control" name="company" placeholder="Company" required autofocus />


  <div class="form-row">
   <!-- <div class="form-group"> -->
   <label for="inputState">Category</label>
   <select name="category" id="inputState" class="form-control">
    <option selected>Choose...</option>
    <option>Moblies</option>
    <option>Mobile & Accesories</option>
    <option>Tablets</option>
    <option>Laptops & Accesories</option>
    <option>Computers & Accesories</option>
    <option>Televisons</option>
    <option>Wearable Devices</option>
    <option>Men Clothing</option>
    <option>Men Bags,Wallets,etc</option>
    <option>Men Shoes</option>
    <option>Men Accessories</option>
    <option>Women Clothing</option>
    <option>Women Bags,Wallets,etc</option>
    <option>Women Shoes</option>
    <option>Women Accessories</option>

   </select>
   <!-- </div> -->
  </div>

  <label for="">Specifications</label>
  <input type="text" class="form-control" name="specifications" placeholder="Specification" required autofocus />
  <button style="margin-top: 20px" type="submit" class="btn btn-success btn-signin btn-block">
   Add Product
  </button>
 </form>
</section>
<?php
require_once "footer.php";
