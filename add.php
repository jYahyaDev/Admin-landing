<?php

include("pdo.php");


try{

       $pdo = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);


       if(isset($_POST['name']) && isset($_POST['url'])&& !empty($_POST['name']) && !empty($_POST['url'])){ 
        $name = htmlspecialchars($_POST['name']) ; 
        $url = htmlspecialchars($_POST['url']) ;  


       $requete = "INSERT INTO `link`(`link-name`,`url`) VALUES (:link, :url)";
       $stmt = $pdo->prepare($requete);
       $stmt->execute(array(
           ":link"=> $name,
           ":url"=>$url
       ));
           header("location:admin.php?message='Modification enregistrée!'");

    }else{
        header("location:admin.php");
    }

}catch (PDOException $e) {

    // en cas d'erreur, on récup et on affiche, grâce à notre try/catch
    exit("❌🙀💀 OOPS :\n" . $e->getMessage());

}      