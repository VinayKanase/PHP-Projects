<?php
session_start();
require_once "./config.php";

$fname = mysqli_real_escape_string($database, $_POST["fname"]);
$lname = mysqli_real_escape_string($database, $_POST["lname"]);
$email = mysqli_real_escape_string($database, $_POST["email"]);
$password = mysqli_real_escape_string($database, $_POST["password"]);

if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
       //Validation of Email Address
       if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $emailcheck = mysqli_query($database, "SELECT email FROM users WHERE email = '{$email}'");
              if (mysqli_num_rows($emailcheck) > 0) {
                     //Email already exists
                     echo "$email - This email already exist";
              } else {
                     //check for user upload img file
                     if (isset($_FILES["image"])) {
                            // if file is uploaded
                            $img_name = $_FILES["image"]['name']; //user img name
                            $tmp_name = $_FILES["image"]['tmp_name']; //this is temporary name used to save/move file to our folder

                            //lets get extension of uploded file
                            $img_explod = explode(".", $img_name);
                            $img_ext = end($img_explod);

                            //Allowed extensions of images
                            $extensions = ["png", "jpg", "jpeg"];

                            if (in_array($img_ext, $extensions)) {
                                   $time = time(); //this is the current time

                                   $new_img_name = $time . $img_name;
                                   if (move_uploaded_file($tmp_name, "images/" . $new_img_name)) {
                                          $random_id = rand(time(), 10000000); //creating random id for user
                                          //!Let's insert all user data to table of database
                                          $status = 'Active'; //When user signed in then his status
                                          $sql = mysqli_query($database, "INSERT INTO `users`( `unquie_id`, `fname`, `lname`, `email`, `password`, `img`, `status`) VALUES ($random_id,'$fname','$lname','$email','$password','$new_img_name','$status')");

                                          if ($sql) {
                                                 $sql2 = mysqli_query($database, "SELECT * FROM `users` WHERE email = '$email'");
                                                 if (mysqli_num_rows($sql2) > 0) {
                                                        $row = mysqli_fetch_assoc($sql2);
                                                        $_SESSION['unquie_id'] = $row["unquie_id"];
                                                        echo "success";
                                                 }
                                          } else {
                                                 echo "Something Went Wrong";
                                          }
                                   }
                            } else {
                                   echo "Please select an image file - PNG,JPG,JPEG";
                            }
                     } else {
                            // file is not uploaded
                            echo "Please select an image file";
                     }
              }
       } else {
              echo "$email - This is not valid email address!";
       }
} else {
       echo "All Inputs are required";
}
