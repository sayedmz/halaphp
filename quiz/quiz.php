<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 
    <title>quiz</title>
</head>
<body>
    <h2 class="display-1" style="text-align: center;">quiz</h2>
    <table class="table table-dark table-striped">
     <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">TITLE</th>
      <th scope="col">Delete</th>
    </tr>
    <?php 
    require_once("../connection.php");
    $sql = "SELECT * FROM `quiz`";
    $stmt = $pdo -> prepare($sql);
    $stmt -> execute();
    $quiz = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    if(!$quiz){
        ?>
        <tr>NOT quiz</tr>
        <?php
    }else{
        foreach($quiz as $q){
              ?>
        <tr meta-cat="<?php echo $q['id'];?>">
            <th><?php echo $q["id"] ?></th>
            <th><?php echo $q["title"] ?></th>
        <th><button type="button" class="btn btn-danger" onclick="deletee(<?php echo $q['id']; ?>)">Delete</button></th>
        </tr>
        <?php
        }
    }
    ?>
  </thead>
</table>
<form action="../action/addQuiz.php" method="POST">
  <div class="input-group flex-nowrap">
  <span class="input-group-text" id="addon-wrapping">Name quiz</span>
  <input name="quiz" type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
  <button style="width:30%" type="submit" class="btn btn-primary">create Quiz</button>
  <div>
     <?php
    if(isset($_SESSION["addQuiz"])){
        if($_SESSION["addQuiz"] = true){
            ?>
            <p style="color : green ; width:400px ; padding:10px">Added SuccessFully</p>
            <?php 
        }else{
                ?>
            <h6 style=" color : red ;width:200px ; padding:10px">failed</h6>
            <?php 
        }
    }
    unset($_SESSION["addQuiz"])
    ?>
  </div>
    
</div>

</form>

</body>
<script>
 
    function deletee(id){
        console.log(id);

        const urlencoded = new URLSearchParams();
        urlencoded.append("id", id);
        const requestOptions = {
        method: "POST",
        body: urlencoded,
        };
        fetch("http://localhost/twophp/proHala/action/quizDelete.php", requestOptions)
        .then((response) => response.json())
        .then((result) => getDataDelete(result,id))
        .catch((error) => console.error(error));
    function getDataDelete(result,id){
        if(result.success){
            let cat = document.querySelector(`tr[meta-cat='${id}']`);
            cat.remove();
       
        }
    }}
</script>
</html>