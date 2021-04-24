<?php

namespace app\models;

use app\helpers\UtilHelpers;
use app\Database;

class verifyinfo
{
 public $fname = "";
 public $lname = "";
 public $email = "";
 public $password = "";
 public $img_name = "";
 public $img_temp_name = "";
 public $errors = "";
 public function __construct($userData)
 {
  $this->fname = $userData['fname'];
  $this->lname = $userData['lname'];
  $this->email = $userData['email'];
  $this->password = $userData['password'];
  $this->img_name = $userData['img_name'];
  $this->img_temp_name = $userData['img_tmp_name'];
 }
 public function checknewData()
 {
  if (strlen($this->fname) <= 0 || strlen($this->lname) <= 0 || strlen($this->email) <= 0 || ($this->img_name) <= 0) {
   $errors = "All input fields required";
   return $errors;
  } elseif (strlen($this->password) < 8) {
   $errors = "Password Should be at least 8 characters";
   return $errors;
  } else {
   //check for img extension
   $ext = explode(".", $this->img_name);
   $allowdedExt = ["png", "jpg", "jpeg"];
   if (array_search($ext[1], $allowdedExt) === false) {
    $errors = "File Formats allowed - png, jpg, jpeg";
    return $errors;
   }
   $currentTime = time();
   //Adding Image File to img folder
   $folderName = "img/rsaosjklsalksajksk/" . UtilHelpers::RandomString(8) . "/" . $currentTime . $this->img_name;
   mkdir(dirname(__DIR__ . "/../public/" . $folderName));
   move_uploaded_file($this->img_temp_name, __DIR__ . "/../public/" . $folderName);

   $db = new Database();
   $mailcheck = $db->checkEmail($this->email); //checks for new user email
   if ($mailcheck === "succees") {
    //new user login
    $db->sendnewUser([
     'fname' => $this->fname,
     'lname' => $this->lname,
     'email' => $this->email,
     'password' => $this->password,
     'img' => $folderName,
     'currentTime' => $currentTime
    ]);
   } else {
    //email already exists
    $errors = $mailcheck;
    return $errors;
   }

   $errors = "success";
   return $errors;
  }
 }
}
