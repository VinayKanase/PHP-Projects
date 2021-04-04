<?php $light = true;
require_once "header.php";

use app\Database;

if (count($_GET) === 0) {
 header('Location:/');
 exit;
}
if ($_GET !== 0) {
 $queryname = $_GET["viewproduct"] ?? null;
 $queryid = $_GET["id"] ?? null;
 if (!$queryname || !$queryid) {
  header('Location:/');
  exit;
 }
}
$db = new Database();
$product = $db->getProductById($queryid);
?>

<div class="images-cont">
 <ul id="lightSlider">
  <li>
   <img class="slid" src="/<?php echo $product[0]["image1"] ?>" alt="">
  </li>
  <li>
   <img class="slid" src="/<?php echo $product[0]["image2"] ?>" alt="">
  </li>

  <li>
   <img class="slid" src="/<?php echo $product[0]["image3"] ?>" alt="">
  </li>
 </ul>
</div>
<div class="heading">
 <h1><?php echo $product[0]['name']; ?></h1>
</div>
<div class="heading">
 <h4><?php echo $product[0]['specifications']; ?></h4>
</div>
<div class="heading">
 <h4><?php echo $product[0]['Description']; ?></h4>
</div>
<div class="heading">
 <h1> &#8377; <?php echo $product[0]['price']; ?></h1>
</div>
<button style="cursor:not-allowed;opacity:0.9;" class="btn btn-primary btn-block buynow">
 Buy Now
</button>
<form action="/addtocard" method="post">
 <input type="text" name="viewproduct" value="<?php echo $product[0]['name'] ?>">
 <input type="number" name="id" value="<?php echo $product[0]['id']; ?>">
</form>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/lightslider.js"></script>
<script>
 $(document).ready(function() {
  $('#lightSlider').lightSlider({
   autoWidth: true,
   loop: true,
   onSliderLoad: function() {
    $('#autoWidth').removeClass('cS-hidden');
   }
  });
 });
</script>

<?php require_once "footer.php" ?>