<?php

require('database/connection.php');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <? include('composants/parameters.php'); ?>
    <link rel="stylesheet" href="css/actualite.css">
</head>
<body>
    <header>
        <? include('composants/nav-bar.php'); ?>
    </header>
    <div class="Global">
    <h1 class="title green">Actualités <span class="brown">SPA</span> Marlioz</h1>

    <?php   
                    
        $req = $db->prepare('SELECT * FROM actualites');
        $req->execute();
        $actualites = array();
        while($actu = $req->fetch()){

            array_push($actualites, $actu);   
        }
         
        $i = 0;
        foreach(array_reverse($actualites) as $actu){

            if($i % 2 == 0){?>
                <div class="actualite divBrown">
                <?php if(!empty($actu['picture'])) { ?>
                    <img class="imgActu" src="<?= $actu['picture'] ?>" alt="actu du moment">
                <?php } ?>
                    <div>
                        <h2 class="green"><?= $actu['title'] ?></h2>
                    
                        <p><?= $actu['description'] ?></p>
                        
                        <h4><?= $actu['date'] ?></h4>
                    </div>
                </div>

            <?php }
            else { 
            ?>
                <div class="actualite divGreen">
                <?php if(!empty($actu['picture'])) { ?>
                    <img class="imgActu" src="<?= $actu['picture'] ?>" alt="actu du moment">
                <?php } ?>
                    
                    <div>
                        <h2 class="brown"><?= $actu['title'] ?></h2>
                    
                        <p><?= $actu['description'] ?></p>
                        
                        <h4><?= $actu['date'] ?></h4>
                    </div>
                </div>
            <?php } $i++;
            } ?>
 
</body>
</html>