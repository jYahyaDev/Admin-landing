<?php

include_once("update.php");


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $affiche['meta']?>">
    <link rel="stylesheet" href="./css/style.css">
    <title><?= $affiche['title']?></title>
</head>

<style>

    body{
        background-color: <?= $affiche['bg-color']?>;
        color: <?= $affiche['font-color']?>;
    }

</style>
<body>
    
<div class="container">

<div class="content">
    <h1><?=$affiche['intro']?></h1>


    <p>Retrouvez-moi sur</p>

<?php

 foreach($resultats as $key=>$val): ?>
     <li> <a href="<?=$val['url']?>"><?=$val['link-name']?></a></li>
     <?php endforeach?>
     
</div>
</div>



</body>
</html>