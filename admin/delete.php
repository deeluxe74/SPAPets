<?php  

    session_start();
        
    if(!isset($_SESSION['connect'])){
        header('location: ../admin/connection.php');
    }
    require('../database/connection.php');

   

    if(isset($_POST['animal'])){
        $string = htmlspecialchars($_POST['name']);

        $id = substr(strrchr($string, '='), 1);
        $name = substr($string, 0, strpos($string,"/"));
        
        $req = $db->prepare('DELETE FROM animals WHERE name = ? AND id = ?');

        $req->execute(array($name, $id));

        header('location: ../admin/gestion.php?success=1&message=Les données sont supprimer avec succès !');
    
    }else if(isset($_POST['actualite'])){
        $string = htmlspecialchars($_POST['name']);

        $id = substr(strrchr($string, '='), 1);
        $title = substr($string, 0, strpos($string,"/"));
        
        $req = $db->prepare('DELETE FROM actualites WHERE title = ? AND id = ?');

        $req->execute(array($title, $id));

        header('location: ../admin/gestion.php?success=1&message=Les données sont supprimer avec succès !');
    }

    

?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <? include('../composants/parameters.php'); ?>
    <link rel="stylesheet" href="../css/admin/contenu/contenu-all.css">
</head>
<body>
    <header>
        <? include('../composants/nav-bar.php'); ?>
    </header>

    <div class="container">
        <div class="badge badge-danger">Supression de données</div>
            <a class="btn btn-danger returnBtn" href="../admin/gestion.php">Retour</a>
            <?php 
            if(isset($_GET['error'])){
                if(isset($_GET['message'])){
                    echo "<p class='alert error'>".htmlspecialchars($_GET['message'])."</p>";
                }
            }
            ?>


        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-animal-tab" data-toggle="pill" href="#pills-animal" role="tab" aria-controls="pills-animal" aria-selected="true">Animals</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-actualite-tab" data-toggle="pill" href="#pills-actualite" role="tab" aria-controls="pills-actualite" aria-selected="false">Actualités</a>
                    </li>
                </ul>
            <div class="formulaire">
                <div class="tab-content margin-animal" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-animal" role="tabpanel" aria-labelledby="pills-animal-tab">
                            <form method="post" action="delete.php">
                            
                            <?php
                                $req = $db->prepare('SELECT * FROM animals');
                                $req->execute();
                                
                                $animals = array();

                                while($animal = $req->fetch()){ 
                                    array_push($animals, $animal);
                                }

                            ?>

                                <input name="animal" type="hidden" values="1">

                                <div class="form-group col-md-4">
                                <label for="inputState">Quels animals voulez vous supprimer ?</label>
                                <select name='name' id="inputState" class="form-control">
                                    <?php
                                        foreach($animals as $animal) { ?>
                                        <option> <?= $animal['name']." / ID  = ".$animal['id']; ?> </option>
                                    <?php }
                                    ?>

                                </select>

                                <button class="btn btn-danger">Suppression</button>

                                </div>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="pills-actualite" role="tabpanel" aria-labelledby="pills-actualite-tab">
                           
                            <form method="post" action="delete.php">

                            <?php
                                $req = $db->prepare('SELECT * FROM actualites');
                                $req->execute();
                                
                                $actualites = array();

                                while($actu = $req->fetch()){ 
                                    array_push($actualites, $actu);
                                }
                            ?>
                                <input name="actualite" type="hidden" values="1">

                                <div class="form-group col-md-4">
                                <label for="inputState">Quels actualités voulez vous supprimer ?</label>
                                <select name='name' id="inputState" class="form-control">
                                    <?php
                                        foreach($actualites as $actu) { ?>
                                        <option> <?= $actu['title']." / ID  = ".$actu['id']; ?> </option>
                                    <?php }
                                    ?>

                                </select>

                                <button class="btn btn-danger">Suppression</button>

                                </div>
                                
                            </form>
                        </div>
                    </div>    
            </div>
            
                
    </div>
</body>
</html>

