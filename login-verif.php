<?php

include('pdo.php');


 try{

       $pdo = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);

        $pseudo = htmlspecialchars($_POST['pseudo']);
        $pass = htmlspecialchars($_POST['password']);


//  Récupération de l'utilisateur et de son pass hashé
$req = $pdo->prepare('SELECT id, password FROM login WHERE pseudo = :pseudo');
$req->execute(array(
    'pseudo' => $pseudo));
$resultat = $req->fetch();
var_dump($resultat);
// Comparaison du pass envoyé via le formulaire avec la base
$isPasswordCorrect = password_verify($pass, $resultat['password']);

if (!$resultat)
{

    header("location:login.php?msg=Mauvais identifiant ou mot de passe");
}
else
{
    if ($isPasswordCorrect) {
        session_start();
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['pseudo'] = $pseudo;
        echo 'Vous êtes connecté !';
        header("location:admin.php");
    }
    else {
        echo 'Mauvais identifiant ou mot de passe !';
        header("location:login.php");
    }
}}catch(PDOException $e) {

    // en cas d'erreur, on récup et on affiche, grâce à notre try/catch
    exit("❌🙀💀 OOPS :\n" . $e->getMessage());

  }