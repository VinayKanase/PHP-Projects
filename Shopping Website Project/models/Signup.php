<?php

namespace app\models;

use app\Database;

class Signup
{
 public $first_name;
 public $last_name;
 public $username;
 public $email;
 public $password;
 public function __construct($newUser)
 {
  $this->first_name = $newUser["firstname"];
  $this->last_name = $newUser["lastname"];
  $this->username = $newUser["username"];
  $this->email = $newUser["email"];
  $this->password = $newUser["password"];
 }
 public function check()
 {
  $errors = [];
  if (strlen($this->first_name) <= 0) {
   $errors[] = "First name can't be empty";
  }
  if (strlen($this->last_name) <= 0) {
   $errors[] = "Last name can't be empty";
  }
  if (strlen($this->username) <= 0) {
   $errors[] = "Username can't be empty";
  } else {
   $sym = "!@#$%^&*(){}<>?/[]|\/.,'\":;";
   $sympresent = false;
   for ($i = 0; $i < strlen($sym); $i++) {
    for ($j = 0; $j < strlen($this->username); $j++) {
     if ($this->username[$j] == $sym[$i]) {
      $sympresent = true;
     }
    }
   }
   if ($sympresent) {
    $errors[] = "User Name cannot contain symbols";
   }
  }
  $db = new Database();
  $out = $db->checkforEmail($this->email);
  if (!empty($out)) {
   $errors[] = "Email already Exits Try Sign in or Sign Up with another email";
  }
  if (strlen($this->password) < 8) {
   $errors[] = "Password is too short";
  }

  return $errors;
 }
}
