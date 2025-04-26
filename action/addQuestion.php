<?php
require_once("../connection.php");


    $quizID = $_POST['quizID'];
    $questionText = $_POST['questionText'];
    $options = $_POST['options']; 
    $correct_answer_index = $_POST['correct_answer_index'];

 
    $optionsJson = json_encode($options);

    $sql = "INSERT INTO questions (quizID, questionText, options, correct_answer_index)
            VALUES (:quizID, :questionText, :options, :correct_answer_index)";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':quizID' => $quizID,
        ':questionText' => $questionText,
        ':options' => $optionsJson,
        ':correct_answer_index' => $correct_answer_index,
    ]);
    //2eme method
// $stmt->bindParam(':quizID', $quizID);
// $stmt->bindParam(':questionText', $questionText);
// $stmt->bindParam(':options', $optionsJson);
// $stmt->bindParam(':correct_answer_index', $correct_answer_index);
// $stmt->execute();
      header("Location: ../question/questions.php");
?>
