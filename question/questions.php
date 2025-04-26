<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Questions</title>
</head>
<body>
    <h2>QUESTIONS</h2>
    <a href="createQuestion.php">  
        <button type="button" class="btn btn-info">Create question</button>
    </a>

    <?php
    require_once("../connection.php");

    $sql = "SELECT questions.*, quiz.title AS quizTitle, quiz.id AS quizID
            FROM questions
            JOIN quiz ON questions.quizID = quiz.id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $questions = $stmt->fetchAll(PDO::FETCH_ASSOC); 

   
    $quizzes = [];
    foreach($questions as $question) {
        $quizzes[$question['quizTitle']][] = $question; 
    }

   
    foreach ($quizzes as $quizTitle => $quizQuestions) {
        $quizID = $quizQuestions[0]['quizID']; 

        echo "<h3>Quiz: $quizTitle</h3>";

       
        echo "<form action='../score/scores.php' method='post'>";
        echo "<input type='hidden' name='quizID' value='$quizID' />";

        // عرض الأسئلة مع خيارات الإجابة
        echo "<table class='table table-striped'>";
        echo "<thead><tr><th scope='col'>ID</th><th scope='col'>Question</th><th scope='col'>Options</th></tr></thead>";
        echo "<tbody>";

        // عرض كل سؤال مع الخيارات الخاصة به
        foreach ($quizQuestions as $question) {
            $options = json_decode($question['options'], true); 

            echo "<tr>";
            echo "<td>{$question['id']}</td>";
            echo "<td>{$question['questionText']}</td>";
            echo "<td>";

            // عرض الخيارات على شكل راديو بوتون
            foreach ($options as $index => $option) {
                echo "<label><input type='radio' name='question_{$question['id']}' value='{$index}' /> {$option}</label><br />";
            }

            echo "</td>";
            echo "</tr>";
        }

        echo "</tbody></table>"; 

        echo "<button type='submit' class='btn btn-primary'>Submit Quiz</button>";
        echo "</form><hr />";
    }
    ?>

</body>
</html>
