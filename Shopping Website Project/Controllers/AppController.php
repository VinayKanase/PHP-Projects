<?php

namespace app\controllers;

use app\Router;
use app\models\Products;
use app\models\Signup;

class AppController
{

  static public function index(Router $router)
  {
    $recommendedProduts = [];
    $recommendedProduts = $router->db->GetRecommendations(3);
    if (count($_POST) !== 0) {
      $recommendedProduts = $router->db->GetRecommendations(20);
    }
    $router->RenderView('index', [
      'page' => "index",
      "products" => $recommendedProduts
    ]);
  }
  static public function categories(Router $router)
  {
    $search = "";
    $search = $_GET['search'] ?? "";
    $categories = $router->db->requestCategories($search);
    $router->RenderView('categories', [
      'page' => "categories",
      "categories" => $categories,
      "search" => $search
    ]);
  }
  static public function wishlist(Router $router)
  {
    $router->RenderView('wishlist', [
      'page' => "wishlist"
    ]);
  }
  static public function accountsettings(Router $router)
  {
    $router->RenderView('accountsettings', [
      'page' => "accountsettings"
    ]);
  }
  static public function aboutus(Router $router)
  {
    $router->RenderView('aboutus', [
      'page' => "aboutus"
    ]);
  }
  static public function cart(Router $router)
  {
    $router->RenderView('cart', [
      'page' => "cart"
    ]);
  }
  static public function signin(Router $router)
  {
    $router->RenderView('signin', [
      'page' => "none"
    ]);
  }
  static public function signup(Router $router)
  {
    $errors = [];
    $newUserDetails = [
      "firstname" => "",
      "lastname" => "",
      "username" => "",
      "email" => "",
      "password" => ""
    ];
    if (count($_POST) !== 0) {
      $newUserDetails['firstname'] = $_POST['firstname'];
      $newUserDetails['lastname'] = $_POST['lastname'];
      $newUserDetails['username'] = $_POST['username'];
      $newUserDetails['email'] = $_POST['email'];
      $newUserDetails['password'] = $_POST['password'];


      $signupcheck = new Signup($newUserDetails);
      $errors = $signupcheck->check();
      if (empty($errors)) {
        $router->db->AddnewUser($newUserDetails);
        header("Location:/");
        exit;
      }
    }
    $router->RenderView('signup', [
      'page' => "none",
      "errors" => $errors,
      "details" => $newUserDetails
    ]);
  }
  static public function addproduct(Router $router)
  {
    $errors = [];
    $productData = [
      'name' => '',
      'description' => '',
      'price' => '',
      'imageFile' => [],
      'imageFile2' => [],
      'imageFile3' => [],
      'company' => '',
      'category' => '',
      'specifications' => ''
    ];
    if (count($_POST) !== 0) {
      $productData['name'] = $_POST['name'];
      $productData['description'] = $_POST['description'];
      $productData['price'] = $_POST['price'];
      $productData['imageFile'] = $_FILES['image'];
      $productData['imageFile2'] = $_FILES['image2'];
      $productData['imageFile3'] = $_FILES['image3'];
      $productData['company'] = $_POST['company'];
      $productData['category'] = $_POST['category'];
      $productData['specifications'] = $_POST['specifications'];
      $product = new Products();
      $product->loadData($productData);
      $errors = $product->save($router);
      if (empty($errors))
        header('Location:/home');
    }
    $router->RenderView('addproduct', [
      'page' => "none",
      'errors' => $errors
    ]);
  }
  static public function viewproduct(Router $router)
  {
    $router->RenderView('viewproduct', [
      'page' => 'none'
    ]);
  }
  static public function addtocart(Router $router)
  {
    $productData = [
      'name' => '',
      'price' => '',
      'imagePath' => '',
      'company' => '',
      'category' => '',
      'specifications' => ''
    ];
    if (count($_POST) === 0) {
      header('Location:/');
    } else if ($_POST !== 0) {
    }
    $router->RenderView('addtocart', [
      'page' => 'cart'
    ]);
  }
}
