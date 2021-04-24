<?php

namespace app\controllers;


use app\Database;
use app\Router;
use app\models\verifyinfo;

class ViewController
{
 static public function index(Router $router)
 {
  if (isset($_SESSION['id'])) {
   header("Location:/users");
  }
  $error = "";
  $newUserData = [
   "fname" => "",
   "lname" => "",
   "email" => "",
   "password" => "",
   "img_name" => "",
   "img_tmp_name" => ""
  ];
  if ($_SERVER['REQUEST_METHOD'] === "POST") {
   $newUserData['fname'] = $_POST['fname'];
   $newUserData['lname'] = $_POST['lname'];
   $newUserData['email'] = $_POST['email'];
   $newUserData['password'] = $_POST['password'];
   $newUserData['img_name'] = $_FILES['image']['name'];
   $newUserData['img_tmp_name'] = $_FILES['image']['tmp_name'];
   $verifydata = new verifyinfo($newUserData);
   $error = $verifydata->checknewData();
   if ($error === "success") {
    //When data is verified and files are been successfully updated on database
    header('Location:/users');
    $newUserData = [
     "fname" => "",
     "lname" => "",
     "email" => "",
     "password" => "",
     "img_name" => "",
     "img_tmp_name" => ""
    ];
   }
  }
  //Render view page
  $router->renderView('index', [
   "errors" => $error,
   "userData" => $newUserData
  ]);
 }

 static public function login(Router $router)
 {

  if (isset($_SESSION['id'])) {
   header("Location:/users");
  }
  // var_dump($_SERVER);
  // echo '<h1>' . $_SERVER['REQUEST_METHOD'] . '</h1>';
  $loginData = [
   "email" => "",
   "password" => ""
  ];
  $errors = "";
  if ($_SERVER['REQUEST_METHOD'] === "POST") {
   $loginData['email'] = $_POST['email'];
   $loginData['password'] = $_POST['password'];

   $db = new Database();
   $data = $db->checkloginData($loginData);
   if ($data === "0") {
    $errors = "Email or Password is invalid";
   } else {
    //Login was successful
    header("Location:/users");
    $loginData = [
     "email" => "",
     "password" => ""
    ];
   }
  }
  $router->renderView('login', [
   "email" => $loginData['email'],
   "password" => $loginData['password'],
   "error" => $errors
  ]);
 }
 static public function chat(Router $router)
 {
  $reqId = $_GET['user_id'];
  $exp = explode("XXX", $reqId);
  $chat_id = $exp[1];
  $db = new Database();
  //get chat user info
  $chatUserData = $db->getUserByID($chat_id);
  $router->renderView('chat', [
   "chatUser" => $chatUserData[0],
   "incoming_id" => $chat_id,
   "outgoing_id" => $_SESSION['id']
  ]);
 }
 static public function users(Router $router)
 {
  $userData = "";
  $db = new Database();
  //get Main user info
  $userData = $db->getUserByID($_SESSION['id']);
  $router->renderView('users', [
   "mainUser" => $userData[0]
  ]);
 }
 static public function logout(Router $router)
 {
  $router->renderView('logout', []);
 }
}
