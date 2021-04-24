<?php

namespace app;

/* Database Connection */

// session_start();


use PDO;
use app\models\verifyinfo;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

class Database
{
 // \PDO type variable declaration as pdo 
 public \PDO $pdo;
 public static Database $db;
 public function __construct()
 {
  $host = $_ENV['HOST'];
  $PORT = $_ENV['PORT'];
  $DB_NAME = $_ENV['DB_NAME'];
  $DB_USER = $_ENV['DB_USER'];
  $DB_PASSWORD = $_ENV['DB_PASSWORD'];
  $this->pdo = new PDO("mysql:host=$host;port=$PORT;dbname=$DB_NAME", "$DB_USER", "$DB_PASSWORD");
  $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  self::$db = $this;
 }
 public function checkEmail($email)
 {
  $statement = $this->pdo->prepare("SELECT * FROM `users` WHERE email LIKE :email");
  $statement->bindValue(':email', $email);
  $statement->execute();
  $data = $statement->fetchAll(PDO::FETCH_ASSOC);
  if (count($data) > 0) {
   return "Email already exists";
  } else {
   return "succees";
  }
 }
 public function sendnewUser($userData)
 {
  $unique_id = rand($userData['currentTime'], 1000000);
  $status = "Active";
  $statement = $this->pdo->prepare("INSERT INTO users(user_id,unique_id,fname,lname,email,password,img,status) VALUES(:user_id,:unique_id,:fname,:lname,:email,:password,:img,:status)");
  $statement->bindValue(":user_id", "");
  $statement->bindValue(":unique_id", $unique_id);
  $statement->bindValue(":fname", $userData['fname']);
  $statement->bindValue(":lname", $userData['lname']);
  $statement->bindValue(":email", $userData['email']);
  $statement->bindValue(":password", $userData['password']);
  $statement->bindValue(":img", $userData['img']);
  $statement->bindValue(":status", $status);
  $statement->execute();
  //setting session for user id
  $_SESSION['id'] = $unique_id;
 }

 public function checkloginData($loginData)
 {
  $email = $loginData['email'];
  $password = $loginData['password'];
  $statement = $this->pdo->prepare("SELECT * FROM users WHERE email LIKE :email AND password LIKE :password");
  $statement->bindValue(":email", $email);
  $statement->bindValue(":password", $password);
  $statement->execute();
  $data = $statement->fetchAll(PDO::FETCH_ASSOC);
  // echo count($data);
  if (count($data) > 0) {
   $_SESSION['id'] = $data[0]['unique_id'];
   $this->setStatus("Active", $data[0]['unique_id']);
   return $data;
  } else {
   return "0";
  }
 }
 public function getUserById($id)
 {
  $statement = $this->pdo->prepare("SELECT * FROM users WHERE unique_id LIKE :id");
  $statement->bindValue(':id', $id);
  $statement->execute();
  $mainUserData = $statement->fetchAll(PDO::FETCH_ASSOC);
  return $mainUserData;
 }
 public function searchUsers($searchText)
 {
  //Ajax Search Request
  $outgoing_id = $_SESSION['id'];
  $statement = $this->pdo->prepare("SELECT * FROM users WHERE NOT unique_id LIKE :id AND (fname LIKE '%$searchText%' OR lname LIKE '%$searchText%')");
  $statement->bindValue(":id", $outgoing_id);
  $statement->execute();
  $data = $statement->fetchAll(PDO::FETCH_ASSOC);
  return $data;
 }
 public function getChat($incoming_id, $outgoing_id)
 {
  $statement = $this->pdo->prepare("SELECT * FROM messages
  WHERE (incoming_msg_id = :incoming_msg_id AND outgoing_msg_id = :outgoing_msg_id)
  OR (incoming_msg_id = :outgoing_msg_id AND outgoing_msg_id = :incoming_msg_id) ORDER BY msg_id ASC");
  $statement2 = $this->pdo->prepare("SELECT * FROM users
  WHERE unique_id LIKE :incoming_msg_id");

  $statement->bindValue(":incoming_msg_id", $incoming_id);
  $statement2->bindValue(":incoming_msg_id", $incoming_id);
  $statement->bindValue(":outgoing_msg_id", $outgoing_id);
  $statement->execute();
  $statement2->execute();
  $data = $statement->fetchAll(PDO::FETCH_ASSOC);
  $indata = $statement2->fetchAll(PDO::FETCH_ASSOC);
  return [
   "data" => $data,
   "indata" => $indata
  ];
 }
 public function setChat($incoming_id, $outgoing_id, $msg)
 {
  $statement = $this->pdo->prepare("INSERT INTO `messages`(`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES ('',:in_id,:ot_id,:msg)");
  $statement->bindValue(':in_id', $incoming_id);
  $statement->bindValue(':ot_id', $outgoing_id);
  $statement->bindValue(':msg', "$msg");
  $data = $statement->execute();
  // var_dump($data);
 }
 public function setStatus($status, $id)
 {
  $statement = $this->pdo->prepare("UPDATE users SET status = :status WHERE unique_id = :id");
  $statement->bindValue(':status', $status);
  $statement->bindValue(':id', $id);
  $statement->execute();
  return "success";
 }
 public function lastMessageData($id, $outid)
 {
  $statement = $this->pdo->prepare("SELECT * FROM messages WHERE (incoming_msg_id = :id OR outgoing_msg_id = :id ) AND (incoming_msg_id = :outgoing_id OR outgoing_msg_id = :outgoing_id) ORDER BY msg_id DESC LIMIT 1");
  $statement->bindValue(':id', $id);
  $statement->bindValue(':outgoing_id', $outid);
  $statement->execute();
  $msg = $statement->fetchAll(PDO::FETCH_ASSOC);
  if (count($msg) > 0) {
   // var_dump();
   if ($msg[0]['outgoing_msg_id'] == $id) {
    $message = "You: " . $msg[0]['msg'];
   } else {
    $message = $msg[0]['msg'];
   }
   $message = (strlen($message) > 28) ? substr($message, 0, 28) : $message;
   return $message;
  }
 }
}
