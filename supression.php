<?php
    require('database/connection.php');

    if(!empty($_GET['age'])){
        if($_GET['age'] == 1){
            $date = date("Y");
            $birthday = $date - 1;
            $max = $date;
            $unknow = "none";
        }else if($_GET['age'] == 5){
            $date = date("Y");
            $max = $date - 1;
            $birthday = $date - 5;
            $unknow = "none";
        }else if($_GET['age'] == "Tous"){
            $date = date("Y");
            $birthday = 1950;
            $max = 2020;
            $unknow = "Inconnue";
        }else if($_GET['age'] == 6){
            $date = date("Y");
            $birthday = 1950;
            $max = $date - 6;
            $unknow = "none";
        }else {
            $date = date("Y");
            $birthday = 1950;
            $max = 2020;
            $unknow = "Inconnue";
        }
        
    }else {
        $date = date("Y");
        $birthday = 1950;
        $max = 2020;
        $unknow = "Inconnue";
    }
    
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <? include('composants/parameters.php'); ?>
    <link rel="stylesheet" href="css/adoption.css">
</head>
<body>
    <header>
        <? include('composants/nav-bar.php'); ?>
    </header>

    <!-- POP UP -->

    <?php if(isset($_GET['name']) && isset($_GET['id'])) { 

        $name = htmlspecialchars($_GET['name']);
        $id = htmlspecialchars($_GET['id']);

        $req = $db->prepare('SELECT * FROM animals WHERE name = ? AND id = ?');
        $req->execute(array($name, $id));
        $currents = array();

        $currAnimal = $req->fetch(); ?>

        <div class="popUp bg-white">
            <div class="row2 align">
                <a href="../adoption.php">Fermer</a>
                <h4><?= $currAnimal['date'] ?></h4>
            </div>
            <div class="row1">
                <div class="medal">
                    <h3>Médaille N°<span> <?= $currAnimal['medaille'] ?></span></h3>
                    <h3>Naissance : <span><?= $currAnimal['birthday'] ?></span></h3>
                </div>
                <div class="animal-sexe">
                    <h3>Animal : <span><?= $currAnimal['types'] ?></span></h3>
                    <h3>Sexe : <span><?= $currAnimal['sexe'] ?></span></h3>
                </div>
            </div>

            <div class="row3">
                <img id="defaultImage" src="<?= $currAnimal['picture'] ?>" alt="Photo de l'animal">
                <div class="column">
                    <h2> <?= $currAnimal['name'] ?> </h2>
                    <p><?= $currAnimal['description'] ?></p>
                </div>
            </div>
        </div>


    <?php } ?>

    <h1 class="title"><span class="green">Adoption</span> ils n’attendent que vous !</h1>
    <div class="divBrown">
        <div class="categories">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Tous</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-chien-tab" data-toggle="pill" href="#pills-chien" role="tab" aria-controls="pills-chien" aria-selected="false">Chien</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-chat-tab" data-toggle="pill" href="#pills-chat" role="tab" aria-controls="pills-chat" aria-selected="false">Chat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-autres-tab" data-toggle="pill" href="#pills-autres" role="tab" aria-controls="pills-autres" aria-selected="false">Autres</a>
                </li>
            </ul>

            <ul class="nav nav-pills mb-3" id="pills-tab2" role="tablist">
            <li class="nav-item">
                    <a class="nav-link <?= $_GET['age'] == "Tous" ? "active" : "" ?> <?= $_GET['age'] == "" ? "active" : "" ?>" href="../adoption.php?age=Tous">Tous</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $_GET['age'] == "1" ? "active" : "" ?>" href="../adoption.php?age=1">< 1 ans</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $_GET['age'] == "5" ? "active" : "" ?>" href="../adoption.php?age=5">1 à 5 ans</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $_GET['age'] == "6" ? "active" : "" ?>" href="../adoption.php?age=6">6 ans +</a>
                </li>
            </ul>
        </div>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="pets">
                <?php   
                    
                    $req = $db->prepare('SELECT * FROM animals WHERE birthday >= ? AND birthday <= ? OR birthday = ?');
                    $req->execute(array($birthday, $max, $unknow));
                    $animals = array();
                    include('composants/foreach-animal.php');
                ?>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-chien" role="tabpanel" aria-labelledby="pills-chien-tab">
                <div class="pets">
                    <?php   
                        $req = $db->prepare('SELECT * FROM animals WHERE types = ? AND birthday >= ? AND birthday <= ?');
                        $req->execute(array('CHIEN',$birthday, $max));
                        $animals = array();
                        include('composants/foreach-animal.php');
                    ?>
                </div>
            </div>

            <div class="tab-pane fade" id="pills-chat" role="tabpanel" aria-labelledby="pills-chat-tab">
                <div class="pets">
                    <?php   
                        $req = $db->prepare('SELECT * FROM animals WHERE types = ?');
                        $req->execute(array('CHAT'));
                        $animals = array();
                        include('composants/foreach-animal.php');
                    ?>  
                </div>            
            </div>

            <div class="tab-pane fade" id="pills-autres" role="tabpanel" aria-labelledby="pills-autres-tab">
                <div class="pets">
                    <?php   
                        $req = $db->prepare('SELECT * FROM animals WHERE types = ?');
                        $req->execute(array('AUTRES'));
                        $animals = array();
                        include('composants/foreach-animal.php');
                    ?>  
                </div>            
            </div>

        </div>
        
    </div>    
    
</body>
</html>
