<!DOCTYPE html>
<?php session_start();
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <link rel="stylesheet" href="./index.css">
    <title>school</title>
  </head>
  <body>
    <nav>
      <div class="nav-links">
        <a href="Auth/register.php" class="signin-btn">REGISTER </a>
        <a href="Auth/login.php" class="signin-btn">SIGN IN</a>
      </div>
      <div><h4 class="logo">HalaQuiz</h4></div>
    </nav>

    <div class="container">
      <div class="content">
        <img src="E967213732B572908743D0C15CF8BF34.jpg" alt="" />
        <div class="parag">
          <h2>Hello in halaQuiz ONLINE lamira wel hlwi ahla whdi b l3alam klu </h2>

               <?php

if (isset($_SESSION["login"])) {
  echo '<button class="btn1"><a href="./question/questions.php">quiz</a></button>';
} else {
  echo '<p style="color:white;">You must register or login to take the quiz.</p>';
}
?>


        </div>
      </div>
    </div>
    <a href="logout.php"  class="logout-btn">Logout</a>
  </body>
</html>
