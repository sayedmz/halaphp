<?php
require_once("../connection.php");
session_start();



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $quizID = $_POST['quizID'];
    $userID = $_SESSION['userID'];
    $score = 0;

    foreach ($_POST as $key => $selectedOption) {
 
        if (strpos($key, 'question_') === 0) {
            $questionID = substr($key, 9); // إزالة "question_" من الـ ID
            $sql = "SELECT correct_answer_index FROM questions WHERE id = :questionID";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['questionID' => $questionID]);
            $question = $stmt->fetch(PDO::FETCH_ASSOC);
                
            // التحقق من الإجابة الصحيحة
            if ($question && $question['correct_answer_index'] == $selectedOption) {
                $score++;
            }
        }
    }

    // إدخال النتيجة في قاعدة البيانات
    $sql = "INSERT INTO scores (userID, quizID, score) VALUES (:userID, :quizID, :score)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['userID' => $userID, 'quizID' => $quizID, 'score' => $score]);

  
    header("Location: viewScore.php");
    exit();
}
?>
