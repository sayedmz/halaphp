<?php 
session_start();
// fname
// lname
// address
// email
// password
// gender 
// country


if( 
    isset($_POST["fname"]) && !empty(trim($_POST["fname"]))  &&
    isset($_POST["lname"]) && !empty(trim($_POST["lname"])) &&
    isset($_POST["address"]) && !empty(trim($_POST["address"])) &&
    isset($_POST["email"]) && !empty(trim($_POST["email"])) &&
    isset($_POST["password"]) && !empty(trim($_POST["password"])) &&
    isset($_POST["gender"]) && !empty(trim($_POST["gender"]))  && 
    isset($_POST["country"]) && !empty(trim($_POST["country"]))  
   ){
    require_once("../connection.php");
    $fname = trim($_POST["fname"]);
    $lname = trim($_POST["lname"]);
    $address = trim($_POST["address"]);
    $email = trim($_POST["email"]);
    $pass = trim($_POST["password"]);
    $gender = trim($_POST["gender"]);
    $country = trim($_POST["country"]);
   $sql = "INSERT INTO
     `users` ( `fname`, `lname`, `address`,  `email`, `password`, `genderID`, `countryID`)
     VALUES
      (:fname, :lname, :address, :email, :password , :gender,   :country   ); ";
    $stmt = $pdo -> prepare($sql);
   $stmt -> bindParam(":fname", $fname );
   $stmt -> bindParam(":lname", $lname );
   $stmt -> bindParam(":address", $address);
   $stmt -> bindParam(":email",  $email );
   $stmt -> bindParam(":password",$pass);   
   $stmt -> bindParam(":gender", $gender );
   $stmt -> bindParam(":country", $country );
   $stmt ->execute();
   $_SESSION["login"] = true;
     header("location:../index.php");
   }else{
      $_SESSION["login"] = false;
   header("location:../Auth/register.php");
   }