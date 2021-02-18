<?php

include("pdo.php");


try{

       $pdo = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);


        /*SELECTION CONTENT*/
    $requete = "SELECT * FROM `content`";
    $stmt = $pdo->prepare($requete);
    $stmt->execute();
    $resultats = $stmt->fetchAll();
    $affiche = $resultats[0];

     /*SELECTION LINK*/
    $requete = "SELECT * FROM `link`";
    $stmt = $pdo->prepare($requete);
    $stmt->execute();
    $resultats = $stmt->fetchAll();


    /*UPDATE TITLE*/
    if(isset($_POST['title']) && !empty($_POST['title'])){

    $title = htmlspecialchars($_POST['title']) ;   

    $requete = "UPDATE `content`
                SET `title` = :title";
    $prepare = $pdo->prepare($requete);
    $prepare->execute(array(
      ":title" => $title
    
    ));
  
    header("location:admin.php?message='Modification enregistrée!'");
   
    }else{
    
    }

      /*UPDATE META*/
    if(isset($_POST['meta']) && !empty($_POST['meta'])){

    $meta = htmlspecialchars($_POST['meta']) ;   

    $requete = "UPDATE `content`
                SET `meta` = :meta";
    $prepare = $pdo->prepare($requete);
    $prepare->execute(array(
      ":meta" => $meta
    
    ));
  
    header("location:admin.php?message='Modification enregistrée!'");
   
    }else{
     
    }

      /*UPDATE INTRO*/
    if(isset($_POST['intro']) && !empty($_POST['intro'])){

    $intro = htmlspecialchars($_POST['intro']) ;   

    $requete = "UPDATE `content`
                SET `intro` = :intro";
    $prepare = $pdo->prepare($requete);
    $prepare->execute(array(
      ":intro" => $intro
    
    ));
  
    header("location:admin.php?message='Modification enregistrée!'");
   
    }else{
      
    }



    /*******COLOR ****/
    
    if(isset($_POST['font-color']) && !empty($_POST['font-color'])){

    $font = htmlspecialchars($_POST['font-color']) ;   

    $requete = "UPDATE `content`
                SET `font-color` = :fontcolor";
    $prepare = $pdo->prepare($requete);
    $prepare->execute(array(
      ":fontcolor" => $font
    
    ));
  
    header("location:admin.php?message='Modification enregistrée!'");
   
    }else{
        
    }

    if(isset($_POST['bg-color']) && !empty($_POST['bg-color'])){

    $bgColor = htmlspecialchars($_POST['bg-color']) ;   

    $requete = "UPDATE `content`
                SET `bg-color` = :bgcolor";
    $prepare = $pdo->prepare($requete);
    $prepare->execute(array(
      ":bgcolor" => $bgColor
    ));
    
    header("location:admin.php?message='Modification enregistrée!'");
    
  }else{
    
  }

    /****RESEAUX ****/
if(isset($_POST['name']) && isset($_POST['url'])){ 

    $name = htmlspecialchars($_POST['name']) ; 
    $url = htmlspecialchars($_POST['url']) ;   
 
    $id = htmlspecialchars($_GET['id']);
  
    $requete = "UPDATE `link`
                SET `link-name` = :name,
                    `url` = :url
                WHERE `id` =  :id";
    $prepare = $pdo->prepare($requete);
    $prepare->execute(array(
      ":name" => $name,
      ":url" => $url,
      ":id" => $id
    
    ));
  
       header("location:admin.php?message='Modification enregistrée!'");

 } 
    else{
       
    } 


/****DELETE ***/
if(isset($_GET['action'])){ 
    $id = htmlspecialchars($_GET['id']);
echo $id;
echo "bonjour";
 $requete = "DELETE FROM `link`
                WHERE ((`id` = :id));";
    $stmt = $pdo->prepare($requete);
    $stmt->execute(array($id)); // 
    header("location:admin.php?message='Modification enregistrée!'");

}

}catch(PDOException $e) {

    // en cas d'erreur, on récup et on affiche, grâce à notre try/catch
    exit("❌🙀💀 OOPS :\n" . $e->getMessage());

  }