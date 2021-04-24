<?php

namespace app;

class Router
{
 public array $getRoutes = [];
 public array $postRoutes = [];

 public function __construct()
 {
 }
 public function get($url, $function)
 {
  //set all get requests in array getRoutes
  $this->getRoutes[$url] = $function;
 }
 public function post($url, $function)
 {
  $this->postRoutes[$url] = $function;
 }
 public function resolve()
 {
  //Brower requested url is saved currentUrl
  $currentUrl = $_SERVER["REQUEST_URI"] ?? "/";
  if (explode('?', $currentUrl)) {
   //Removing get Method
   $exp = explode("?", $currentUrl);
   $currentUrl = $exp[0];
  }
  //Method for current url request is took
  $requestMethod = $_SERVER["REQUEST_METHOD"];

  if ($requestMethod === "GET") { //If user asked for get method

   //checking for current url in getRoutes
   $function = $this->getRoutes[$currentUrl] ?? null;
  } else if ($requestMethod === "POST") { //If user asked for post method

   //checking for current url in postRoutes
   $function = $this->postRoutes[$currentUrl] ?? null;
  }
  if ($function) {
   //if view page exists call for it
   call_user_func($function, $this);
  } else {
   //!404 page was not found
   echo "<h1 style='font-family:sans-serif;height:100vh;display:flex;justify-content: center;align-items: center;'>Page Not found</h1>";
  }
 }
 public function renderView($view, $params = [])
 {
  foreach ($params as $key => $value) {
   $$key = $value;
  }
  ob_start();
  include_once __DIR__ . "/views/$view.php";
  $content = ob_get_clean();
  include_once __DIR__ . "/views/_layout.php";
 }
}
