<?php 
session_start();
    require_once("../connection.php");


if(isset($_POST["quiz"]) && !empty(trim($_POST["quiz"]))){

    $quiz = trim($_POST["quiz"]);

    $sql = "INSERT INTO `quiz` ( `title`) VALUES (:quiz);";
    $stmt = $pdo -> prepare($sql);
    $stmt -> bindParam(":quiz" , $quiz );
    $stmt -> execute();
    $_SESSION["addQuiz"] = true ;
     header("Location: ../quiz/quiz.php");
}else{
  $_SESSION["addQuiz"] = false ;
    header("Location: ../quiz/quiz.php");
}
