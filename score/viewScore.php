<?php
require_once("../connection.php");

// استعلام لجلب نتائج المستخدمين
$sql = "
    SELECT users.fname, users.lname, quiz.title AS quizTitle, scores.score 
    FROM scores
    JOIN users ON scores.userID = users.id
    JOIN quiz ON scores.quizID = quiz.id
    ORDER BY users.fname, quiz.title
";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$scores = $stmt->fetchAll(PDO::FETCH_ASSOC);
  var_dump($scores); // لعرض المحتوى الذي تم جلبه من قاعدة البيانات
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>User Scores</title>
</head>
<body>
    <h2>User Scores</h2>

    <?php if (count($scores) > 0):
      
 ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">User Name</th>
                    <th scope="col">Quiz Title</th>
                    <th scope="col">Score</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($scores as $score): ?>
                    <tr>
                        <td><?php echo "{$score['fname']} {$score['lname']}"; ?></td>
                        <td><?php echo $score['quizTitle']; ?></td>
                        <td><?php echo $score['score']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No scores available yet.</p>
    <?php endif; ?>

</body>
</html>
