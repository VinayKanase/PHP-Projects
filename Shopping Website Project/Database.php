<?php

namespace app;

require_once __DIR__ . "/vendor/autoload.php";

use PDO;
use Dotenv\Dotenv;
use app\models\Products;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

class Database
{
 public \PDO $pdo;
 static public Database $db;
 public function __construct()
 {

  $host = $_ENV["HOST"];
  $port = $_ENV["PORT"];
  $db_name = $_ENV["DB_NAME"];
  $db_user = $_ENV["DB_USER"];
  $db_password = $_ENV["DB_PASSWORD"];
  $this->pdo = new PDO("mysql:host=$host;port=$port;dbname=$db_name", $db_user, $db_password);
  $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  self::$db = $this;
  // $statment = $this->pdo->prepare('DELETE FROM `categories` WHERE `categories`.`title` = :title');
  // $statment->bindValue(':title', 'test');
  // $statment->execute();
 }

 public function requestCategories($search = "")
 {
  if ($search === "") {
   $statment = $this->pdo->prepare("SELECT * FROM `categories` ORDER BY id ASC");
  } else {
   $statment = $this->pdo->prepare('SELECT * FROM categories WHERE title LIKE :title ORDER BY id ASC');
   //searching with value search
   $statment->bindValue(':title', "%$search%");
  }
  $statment->execute();
  return $statment->fetchAll(PDO::FETCH_ASSOC);
 }
 public function AddProduct(Products $product)
 {
  $statement = $this->pdo->prepare("INSERT INTO `products` (`id`, `name`, `Description`, `price`, `image1`, `image2`, `image3`, `company`, `category`, `specifications`) VALUES (NULL, :name, :desc, :price, :image1, :image2, :image3, :company, :category, :specifications)");
  $statement->bindValue(':name', $product->name);
  $statement->bindValue(':desc', $product->description);
  $statement->bindValue(':price', $product->price);
  $statement->bindValue(':image1', $product->imagePath);
  $statement->bindValue(':image2', $product->imagePath2);
  $statement->bindValue(':image3', $product->imagePath3);
  $statement->bindValue(':company', $product->company);
  $statement->bindValue(':category', $product->category);
  $statement->bindValue(':specifications', $product->specifications);
  $statement->execute();
 }

 public function GetRecommendations($noofRecom = 1)
 {
  $recommendations = array();
  $randomids = [];
  for ($i = 0; $i < $noofRecom; $i++) {
   array_push($randomids, random_int(1, 24));
   // random_int(0, 24)
  }
  for ($i = 0; $i < count($randomids); $i++) {
   $statment = $this->pdo->prepare('SELECT * FROM products WHERE id LIKE :id ORDER BY id ASC');
   $statment->bindValue(':id', $randomids[$i]);
   $statment->execute();
   $temp = $statment->fetchAll(PDO::FETCH_ASSOC);
   array_push($recommendations, $temp);
  }
  return $recommendations;
 }
 public function getProductById($id)
 {
  $statment = $this->pdo->prepare('SELECT * FROM products WHERE id LIKE :id ORDER BY id ASC');
  $statment->bindValue(':id', $id);
  $statment->execute();
  $returnProduct = $statment->fetchAll(PDO::FETCH_ASSOC);
  return $returnProduct;
 }
 public function AddtoCart($id, $name)
 {
  $statement = $this->pdo->prepare('INSERT INTO `cart`(`id`, `name`) VALUES (:id,:name)');
  $statement->bindValue(':id', $id);
  $statement->bindValue(':name', $name);
  $statement->execute();
 }
 public function checkforEmail($email)
 {
  $statment = $this->pdo->prepare('SELECT * FROM users WHERE email LIKE :email ORDER BY id ASC');
  $statment->bindValue(':email', $email);
  $statment->execute();
  $returnProduct = $statment->fetchAll(PDO::FETCH_ASSOC);
  return $returnProduct;
 }

 public function AddnewUser($userDetails)
 {
  $statement = $this->pdo->prepare('INSERT INTO `users`(`first name`, `last name`, `username`, `email`, `password`) VALUES (:firstname,:lastname,:username,:email,:password)');
  $statement->bindValue(':firstname', $userDetails["firstname"]);
  $statement->bindValue(':lastname', $userDetails["lastname"]);
  $statement->bindValue(':username', $userDetails["username"]);
  $statement->bindValue(':email', $userDetails["email"]);
  $statement->bindValue(':password', $userDetails["password"]);

  $statement->execute();
 }
}
