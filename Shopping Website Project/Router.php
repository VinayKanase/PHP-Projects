<?php

namespace app;

use app\controllers\AppController;

class Router
{
 public $getRoutes = [];
 public $postRoutes = [];
 public Database $db;
 public function __construct()
 {
  $this->db = new Database();
 }
 public function get($url, $fn)
 {
  $this->getRoutes[$url] = $fn;
 }
 public function post($url, $fn)
 {
  $this->postRoutes[$url] = $fn;
 }
 public function resolve()
 {
  //requested url
  $currentUrl = $_SERVER['REQUEST_URI'] ?? '/';
  if (strpos($currentUrl, '?') !== false) {
   $currentUrl = substr($currentUrl, 0, strpos($currentUrl, '?'));
  }
  //method of request
  $method = $_SERVER['REQUEST_METHOD'];
  if ($method === "GET") {
   // FOR GET METHOD
   //check for currentUrl in present getRoutes
   $funt = $this->getRoutes[$currentUrl] ?? null;
  } else {
   $funt = $this->postRoutes[$currentUrl] ?? null;
  }
  if ($funt) {
   //Page exist call function for it
   call_user_func($funt, $this);
  } else {
   //Else Show that this page was not found
   echo "<h1>PAGE NOT FOUND</h1>";
  }
 }
 public function RenderView($view, $params = [])
 {
  $page = $params['page'];
  if (isset($params['categories']))
   $categories = $params['categories'];
  if (isset($params['search'])) {
   $search = $params['search'] ?? "";
  }
  if (isset($params['products'])) {
   $productsRecom = $params['products'];
  }
  if (isset($params['errors'])) {
   $errors = $params['errors'];
  }
  if (isset($params['details'])) {
   $details = $params['details'];
  }
  require_once __DIR__ . "/views/$view.php";
 }
}
