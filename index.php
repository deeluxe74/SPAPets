<?php   
    include('database/connection.php');
   
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php include('composants/parameters.php'); ?>
        <link rel="stylesheet" href="css/home.css">
    </head>
<body>
    <header>
        <?php include('composants/nav-bar.php'); ?>
    </header>

    <div class="Global">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-interval="4000" data-ride="carousel" data-pause="false">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="pictures/slider1.jpg" class="d-block w-100" alt="Chien & chat">
                </div>
                <div class="carousel-item">
                    <img src="pictures/slider.jpg" class="d-block w-100" alt="cat">
                </div>
            </div>
        </div>

        <div class="divBrown">
            <h1 class="title">Nos derniers arrivants</h1>
        </div>

        <div class="divdeen">
            <div class="pets">
                <?php 
                    $req = $db->prepare('SELECT * FROM animals');
                    $req->execute();
                    $animals = array();
                    
                    while($animal = $req->fetch()){

                        array_push($animals, $animal);   
                        }
                        $animals = array_reverse($animals);
                        $animals = array_slice($animals, 0, 7);
                        foreach($animals as $animal){?>
                            <div class="card">
                                <img class="card-img-top" src="<?= $animal['picture'] ?>" alt="animal image">
                                <a href="../adoption.php?types=Tous&age=Tous&name=<?= $animal['name']?>&id=<?= $animal['id']?>">    
                                    <div class="card-img-overlay">
                                        <div class="filterOpacity">
                                            <h4 class="card-title"><?= $animal['name'] ?></h4> 
                                        </div>    
                                    </div>
                                </a> 
                            </div>         
                    <?php } ?>
            </div>  
        </div>

        <h1 style="color:#55371E;" class="title">Vous souhaitez nous aider ?</h1>

        <div class="divBrown">
            <div class="container-card">
                <div class="card text-center">
                    <div class="card-header">Les dons (€)</div>
                    <div class="card-body">
                        <p class="card-text">Du plus minime au plus important, vos dons sont une aide  vitale pour notre Refuge. C’est d’ailleurs la meilleur aide que vous pouvez nous apporter, pourquoi ? Car cela nous permet d’acheter des croquettes en grandes quantité afin d’obtenir les meilleurs prix avec une qualité élever, de payer des frais de vétérinaire, entretien d’un lieu sain....</p>
                        <a href="aides/dons.php" class="btn btn-danger">En savoir plus...</a>
                    </div>
                </div>
                <div class="card text-center">
                    <div class="card-header">Le parainage</div>
                    <div class="card-body">
                        <p class="card-text">Vous n’avez pas la possibilité d’adopter un animal ? Parrainez un animal, c’est un geste simple, concret et solidaire. Vous aiderez directement notre association et vous participez ainsi aux frais vétérinaires, de pension et de nourriture d’un chat ou d’un chien qui n’a pas eu beaucoup de chance. Votre geste permettra d’améliorer le quotidien d’un animal.</p>
                        <a href="aides/parrainage.php" class="btn btn-danger">En savoir plus...</a>
                    </div>
                </div>
                
                <div class="card text-center">
                    <div class="card-header">Le bénévolat</div>
                    <div class="card-body">
                        <p class="card-text">Donner un peu de son temps pour aider notre refuge et ses pensionnaires, selon vos aptitudes", Promeneurs" ou "Bricoleurs" "Enquêteurs" ou "Autres",  vous serez toujours les bienvenus. Tout cela est réservée aux personnes majeures, sérieuses et motivées. Venez lire les détailles afin de vous renseignez le mieux possibles sur ce que vous souhaitez faire avec nous !</p>
                        <a href="aides/fourniture-benevolat.php" class="btn btn-danger">En savoir plus...</a>
                    </div>
                </div>
                <div class="card text-center">
                    <div class="card-header">Les dons en fournitures</div>
                    <div class="card-body">
                        <p class="card-text">Vous pouvez nous apporter différentes choses afin d’améliorer les conditions et la qualités de vie de nos animaux. Cela peut s’averer très bénéfique et nous aider a la survie de tout ce petit monde.  Toute fois nous devons avoir des rếgles de sécurité ainsi que d’hygiène, nous vous informons de tous les possibilités ainsi que la meilleur facon de pouvoir nous aider.</p>
                        <a href="aides/fourniture-benevolat.php" class="btn btn-danger">En savoir plus...</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


<!-- 

<div class="divGreen">
            <a href="adoption.php?name=<?= $animals[0]['name'] ?>">
                <img src="<?= $animals[0]['picture'] ?>" alt="photo animal">
            </a>
            <a href="adoption.php?name=<?= $animals[1]['name'] ?>">
                <img src="<?= $animals[1]['picture'] ?>" alt="photo animal">
            </a>
            <a href="adoption.php?name=<?= $animals[2]['name'] ?>">
                <img src="<?= $animals[2]['picture'] ?>" alt="photo animal">
            </a>
        </div>

-->