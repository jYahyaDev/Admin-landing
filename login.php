
<?php
if(isset($_GET['msg'])){

    $message = $_GET['msg'];
}

?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <script src="https://kit.fontawesome.com/b3bd20c615.js" crossorigin="anonymous"></script>
    <title>LOGIN</title>
</head>
<body>

  
    <div class="container">
    
        <div class="content">
          <?php
    
    if(isset($_GET['msg'])){

    $message = $_GET['msg'];
    echo "<p>$message</p>";    
    }?>
            <h1>Login</h1>
            <form action="login-verif.php" method="post">
            <p><i class="fas fa-user"></i><input type="text" name="pseudo" placeholder="Pseudo"></p>
            <p><i class="fas fa-unlock-alt"></i><input type="password" name="password"placeholder="Password"></p>
            <button type="submit" class="btn">Me connecter</button>
            </form>
        </div>
    
    </div>


</body>
</html>