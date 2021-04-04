<?php

namespace app\models;

use app\Database;
use app\Router;
use app\helpers\UtilHelpers;

class Products
{
 public ?int $id = null;
 public ?string $name = null;
 public ?string $description = null;
 public ?float $price = null;
 public ?string $imagePath = "";
 public ?array $imageFile = null;
 public ?string $imagePath2 = null;
 public ?array $imageFile2 = null;
 public ?string $imagePath3 = null;
 public ?array $imageFile3 = null;
 public ?string $company = null;
 public ?string $category = null;
 public ?string $specifications = null;



 public function loadData($productData)
 {
  $this->id = $productData['id'] ?? null;
  $this->name = $productData['name'] ?? null;
  $this->description = $productData['description'] ?? null;
  $this->price = $productData['price'] ?? null;
  $this->company = $productData['company'] ?? null;
  $this->category = $productData['category'] ?? null;
  $this->specifications = $productData['specifications'] ?? null;
  $this->imageFile = $productData["imageFile"];
  $this->imageFile2 = $productData["imageFile2"] ?? null;
  $this->imageFile3 = $productData["imageFile3"] ?? null;
 }
 public function save(Router $router)
 {
  $errors = [];
  if (!$this->name && !floatval($this->name) && !intval($this->name)) {
   $errors[] = "Product Name is required";
  }
  if (!$this->description) {
   $errors[] = "Product Description is required";
  }
  if (!$this->imageFile && !$this->imagePath) {
   $errors[] = "Product Image is required";
  }
  if (!is_dir(__DIR__ . '/../public/assets/products images')) {
   mkdir(__DIR__ . '/../public/assets/products images');
  }
  if (empty($errors)) {
   if ($this->imageFile && $this->imageFile['tmp_name']) {
    $randDirName = UtilHelpers::randomString(8);
    $this->imagePath = "assets/products images/$randDirName/" . $this->imageFile['name'];

    mkdir(dirname(__DIR__ . '/../public/' . $this->imagePath));

    move_uploaded_file($this->imageFile['tmp_name'], __DIR__ . '/../public/' . $this->imagePath);

    if ($this->imageFile2) {
     $this->imagePath2 = "assets/products images/$randDirName/" . $this->imageFile2['name'];
     echo $this->imagePath2;
     move_uploaded_file($this->imageFile2['tmp_name'], __DIR__ . '/../public/' . $this->imagePath2);
    }
    if ($this->imageFile3) {
     $this->imagePath3 = "assets/products images/$randDirName/" . $this->imageFile3['name'];
     echo $this->imagePath3;
     move_uploaded_file($this->imageFile3['tmp_name'], __DIR__ . '/../public/' . $this->imagePath3);
    }
   }
   $db = new Database();
   $db->AddProduct($this);
  }
  return $errors;
 }
}
