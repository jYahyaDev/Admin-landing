<?php

session_start();
include_once("update.php");


if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
{
    
  
  echo"
<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='./css/admin.css'>

    <title>LOGIN</title>
</head>
<body>
  
<header>

<h1>Bonjour " . $_SESSION['pseudo']."<h1>
<div>
<button><a href='index.php'>Voir le site </a></button>
<button><a href='logout.php'>Me deconnecter</a></button>

</div>
</header>
  

    <h2>Modifier le contenu</h2>

    <div class='container'>
        <div class='content'>
    <form action='update.php' method='post'>
        <h3>Titre</h3>
        <input type='text' name='title' placeholder='{$affiche['title']}'  required />
        <input type='submit' value='modifier'>
    </form>
    <form action='update.php' method='post'>
        <h3>Meta-description</h3>
        <textarea rows='5' cols='33' maxlength='255' name='meta'  placeholder='{$affiche['meta']}'required></textarea>
        <input type='submit' value='modifier'>
    </form>

    <form action='update.php' method='post'>
        <h3>Présentation</h3>
        <textarea rows='5' cols='33' maxlength='255' name='intro' placeholder='{$affiche['intro']}'required></textarea>
        <input type='submit' value='modifier'>
  
    </form>
    </div>

    <div class='color content'>
    <form action='update.php' method='post'>
        <h3>Couleur du texte</h3>
        <input type='text' name='font-color' placeholder='{$affiche['font-color']}'  required />
        <input type='submit' value='modifier'>
  </form>
 <form action='update.php' method='post'>
        <h3>Couleur de fond</h3>
        <input type='text' name='bg-color' placeholder='{$affiche['bg-color']}'  required />
        <input type='submit' value='modifier'>
  </form>

    </div>


    <div class='reseaux content'>
<h3>Mes réseaux</h3>";


foreach($resultats as $key=>$val): ?>
    <form action='update.php?id=<?=$val['id']?>' method='post'>
  
    <input type='text' name='url' placeholder='<?=$val['url']?>'  required />

    <input type='text' name='name' placeholder='<?=$val['link-name']?>'  required />
    <input type="submit" value="modifier">
     <button><a href="update.php?action=del&id=<?=$val['id']?>">Supprimer</a></button>
</form>
     <?php endforeach?>

<?php

echo "
<h3>Ajouter un réseau</h3>
<form action='add.php' method='post'>

<input type='text' name='url' placeholder='url'  required />

<input type='text' name='name' placeholder='name'  required />
<input type='submit' value='Ajouter'>
</form>
</div>
</div>";

echo "

</body>";

if(isset($_GET['message']) && !empty($_GET['message'])){
  $message = htmlspecialchars($_GET['message']);
  echo "<script> alert($message) </script>";
}



} else{
    header("location:login.php");
}
