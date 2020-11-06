<?php
    require('database/connection.php');

    if(!isset($_GET['types']) || !isset($_GET['age'])){
        $restartHtml = 1;
    }
    if(isset($_GET['name']) || isset($_GET['age'])){
        $restartHtml = 0;
    }

    if($restartHtml == 1){
        header('location: ../adoption.php?types=Tous&age=Tous');
    }

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
                <a href="../adoption.php?types=<?= $_GET['types'] ?>&age=<?= $_GET['age'] ?>">Fermer</a>
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
                    <p><?= preg_replace("~[\r\n]+~", '</p><p>', $currAnimal['description'])  ?></p>

                </div>
            </div>
        </div>


    <?php } ?>

    <h1 class="title"><span class="green">Adoption</span> ils n’attendent que vous !</h1>
    <div class="divBrown">
        <div class="categories">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link <?= $_GET['types'] == "Tous" ? "active" : "" ?> <?= $_GET['age'] == "" ? "active" : "" ?>" href="../adoption.php?types=Tous&age=<?= $_GET['age'] ?>">Tous</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $_GET['types'] == "Chien" ? "active" : "" ?>"  href="../adoption.php?types=Chien&age=<?= $_GET['age'] ?>">Chien</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $_GET['types'] == "Chat" ? "active" : "" ?>"  href="../adoption.php?types=Chat&age=<?= $_GET['age'] ?>">Chat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $_GET['types'] == "Autres" ? "active" : "" ?>"  href="../adoption.php?types=Autres&age=<?= $_GET['age'] ?>">Autres</a>
                </li>
            </ul>

            <ul class="nav nav-pills mb-3" id="pills-tab2" role="tablist">
            <li class="nav-item">
                    <a class="nav-link <?= $_GET['age'] == "Tous" ? "active" : "" ?> <?= $_GET['age'] == "" ? "active" : "" ?>" href="../adoption.php?types=<?= $_GET['types'] ?>&age=Tous">Tous</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $_GET['age'] == "1" ? "active" : "" ?>" href="../adoption.php?types=<?= $_GET['types'] ?>&age=1">< 1 ans</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $_GET['age'] == "5" ? "active" : "" ?>" href="../adoption.php?types=<?= $_GET['types'] ?>&age=5">1 à 5 ans</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $_GET['age'] == "6" ? "active" : "" ?>" href="../adoption.php?types=<?= $_GET['types'] ?>&age=6">6 ans +</a>
                </li>
            </ul>
        </div>

        <div class="pets">
            <?php
            if(!empty($_GET['types'])){
                if($_GET['types'] == "Chien"){
                    $types = 'CHIEN';
                    $isTypes = 1;
                }else if($_GET['types'] == "Chat"){
                    $types = 'CHAT' ;
                    $isTypes = 1;
                }else if($_GET['types'] == "Autres"){
                    $types = 'AUTRES' ;
                    $isTypes = 1;
                }else if($_GET['types'] == "Tous"){
                    $isTypes = 0;
                    $req = $db->prepare('SELECT * FROM animals WHERE birthday >= ? AND birthday <= ? OR birthday = ?');
                    $req->execute(array($birthday, $max, $unknow));
                    $animals = array();
                    include('composants/foreach-animal.php');
                }    
            }else {
                $isTypes = 0;
                $req = $db->prepare('SELECT * FROM animals WHERE birthday >= ? AND birthday <= ? OR birthday = ?');
                $req->execute(array($birthday, $max, $unknow));
                $animals = array();
                include('composants/foreach-animal.php');
            }

            if($isTypes == 1){
                $req = $db->prepare('SELECT * FROM animals WHERE types = ? AND birthday >= ? AND birthday <= ? OR types = ? AND birthday = ?');
                $req->execute(array($types ,$birthday, $max, $types, $unknow));
                $animals = array();
                include('composants/foreach-animal.php');
            }
           
            ?>
        </div>
        
    </div>    
    
</body>
</html>
