<!DOCTYPE html>
<?php session_start(); ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/login.css">
    <title>Login</title>

</head>
<body>

  
    <div class="container">
          <h3 class="login">Login</h3>
        <form action="../DataAuth/login.php" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input name="email" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

          

            <button type="submit" class="btn btn-primary mb-3 mt-3">Submit</button>

            <?php 
            if(isset($_SESSION["msg"])) {
                echo "<h3 class='error-message'>" . $_SESSION["msg"] . "</h3>";
            }
            unset($_SESSION["msg"]);
            ?>
        </form>
    </div>

</body>
</html>
