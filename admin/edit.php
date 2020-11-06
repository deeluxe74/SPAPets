<?php  

    session_start();
        
    if(!isset($_SESSION['connect'])){
        header('location: ../admin/connection.php');
    }

    require('../database/connection.php');
    
    //TAKE ID AND NAME

    if(isset($_POST['animal'])){
        $string = htmlspecialchars($_POST['name']);

        $id = substr(strrchr($string, '='), 1);
        $name = substr($string, 0, strpos($string,"/"));
        $req = $db->prepare('SELECT * FROM animals WHERE name = ? AND id = ?');

        $req->execute(array($name, $id));

        $currAnimal = $req->fetch();
        
    }

    // UPDATE ANIMAL 
    if(isset($_POST['animalUpdate']) && !empty($_POST['types']) && !empty($_POST['name']) && !empty($_POST['sexe']) && !empty($_POST['description'])){

        $id =           htmlspecialchars($_POST['id']);
        $name =         htmlspecialchars($_POST['name']);
        $sexe =         htmlspecialchars($_POST['sexe']);
        $description =  htmlspecialchars($_POST['description']);
        $types =        htmlspecialchars($_POST['types']);
        $picture =      htmlspecialchars($_POST['picture']);
        $medaille =     htmlspecialchars($_POST['medaille']);
        $birthday =     empty($_POST['birthday']) ? "Inconnue" : $_POST['birthday'];


        if(!empty($_FILES['fichier']['name'])){
            define('TARGET', '../uploads/animals/');    // Repertoire cible
            include('uploaded.php');
            $picture = '../uploads/animals/'.htmlspecialchars($nomImage);
        }

        if(empty($message)){

            require('../database/connection.php');

            $req = $db->prepare('UPDATE animals SET types = ?, medaille = ?, sexe = ?, birthday = ?, description = ?, picture = ?, name = ? WHERE id= ? ');

            $req->execute(array($types, $medaille, $sexe, $birthday, $description, $picture, $name, $id));

            header('location: ../admin/gestion.php?success=1&message=La base de donnée est mis a jour !');
        }else {
            header('location: ../admin/edit.php?error=1&message='.$message.'');
        }
    }

    // ACTUALITE

    if(isset($_POST['actualite'])){
        $string = htmlspecialchars($_POST['name']);

        $id = substr(strrchr($string, '='), 1);
        $title = substr($string, 0, strpos($string,"/"));
        $req = $db->prepare('SELECT * FROM actualites WHERE title = ? AND id = ?');

        $req->execute(array($title, $id));

        $currActu = $req->fetch();
        
    }

    // UPDATE ANIMAL 
    if(isset($_POST['actualiteUpdate']) && !empty($_POST['title']) && !empty($_POST['description'])){

        $id =           htmlspecialchars($_POST['id']);
        $title =        htmlspecialchars($_POST['title']);
        $description =  htmlspecialchars($_POST['description']);
        
        $picture =      htmlspecialchars($_POST['picture']);

        if(!empty($_FILES['fichier']['name'])){
            define('TARGET', '../uploads/actualites/');    // Repertoire cible
            include('uploaded.php');
            $picture = '../uploads/actualites/'.htmlspecialchars($nomImage);
        }

        if(empty($message)){
            require('../database/connection.php');

            $req = $db->prepare('UPDATE actualites SET title = ?, description = ?, picture = ? WHERE id= ? ');

            $req->execute(array($title, $description, $picture, $id));

            header('location: ../admin/gestion.php?success=1&message=La base de donnée est mis a jour !');
        }else {
            header('location: ../admin/edit.php?error=1&message='.$message.'');
        }
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
        <div class="badge badge-success">Edition des données</div>
            <a class="btn btn-danger returnBtn" href="../admin/gestion.php">Retour</a>
        <?php 
        if(isset($_GET['error'])){
            if(isset($_GET['message'])){
                echo "<p class='alert alert-danger'>".htmlspecialchars($_GET['message'])."</p>";
            }
        }
        ?>
            
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link <?= isset($_POST['actualite']) ? "" : "active" ?>" id="pills-animal-tab" data-toggle="pill" href="#pills-animal" role="tab" aria-controls="pills-animal" aria-selected="true">Animals</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= isset($_POST['actualite']) ? "active" : "" ?>" id="pills-actualite-tab" data-toggle="pill" href="#pills-actualite" role="tab" aria-controls="pills-actualite" aria-selected="false">Actualités</a>
            </li>
        </ul>
        
        <div class="tab-content margin-animal" id="pills-tabContent">
            <div class="tab-pane fade <?= isset($_POST['actualite']) ? "" : "show active" ?>" id="pills-animal" role="tabpanel" aria-labelledby="pills-animal-tab">
           
            <div class="formulaire">

                <form enctype="multipart/form-data" method="post" action="edit.php">
                    <?php
                            $req = $db->prepare('SELECT * FROM animals');
                            $req->execute();
                                            
                            $animals = array();

                            while($animal = $req->fetch()){ 
                                array_push($animals, $animal);
                    } ?>

                    <?php if(!isset($_POST['animal'])) { ?>

                    <input name="animal" type="hidden" values="1">
                    <div class="form-group col-md-4">
                        <label for="inputState">Quels animals voulez vous editer ?</label>
                        <select name='name' id="inputState" class="form-control">
                            <?php
                                foreach($animals as $animal) { ?>
                                <option> <?= $animal['name']." / ID  = ".$animal['id']; ?> </option>
                                <?php } ?>
                        </select>
                    </div>  
                    <button class="btn btn-warning">Editer</button>
                </form>  

                <?php } if(isset($_POST['animal'])) { ?>

                <form enctype="multipart/form-data" method="post" action="edit.php">
                                    
                    <input name="animalUpdate" type="hidden" values="1">
                    <input name="id" type="hidden" value="<?= $currAnimal['id'] ?>">
                    <input name="picture" type="hidden" value="<?= $currAnimal['picture'] ?>">
                

                        <select name="types" class="form-control form-control-lg">
                        <?php   if($currAnimal['types'] == 'CHIEN') { 
                                    echo "  <option selected>CHIEN</option>
                                            <option>CHAT</option>
                                            <option>AUTRES</option>";
                                }else if ($currAnimal['types'] == 'CHAT'){
                                    echo "  <option selected>CHAT</option>
                                            <option>CHIEN</option>
                                            <option>AUTRES</option>";
                                }else {
                                    echo "  <option selected>AUTRES</option>
                                            <option>CHIEN</option>
                                            <option>CHAT</option>";
                                } ?>
                        </select>

                        <div class="form-row">
                            <div class="form-group mb-2">
                                <label for="nameAnimal">Nom de l'animal</label>
                                <input value="<?= $currAnimal['name'] ?>" type="text" name="name" required class="form-control" id="nameAnimal">
                            </div>
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="medal">Médaille N°</label>
                                <input value="<?= $currAnimal['medaille'] ?>" type="text" name="medaille" class="form-control" id="medal">
                                </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group mb-2">
                                <label for="sexe">Sexe</label>
                                <select name="sexe" class="form-control form-control-lg">
                                    <?php   if($currAnimal['sexe'] == 'MALES') { 
                                                echo "  <option selected>MALES</option>
                                                        <option>FEMELLES</option>
                                                        <option>?</option>";
                                            }else if ($currAnimal['sexe'] == 'FEMELLES'){
                                                echo "  <option selected>FEMELLES</option>
                                                        <option>MALES</option>
                                                        <option>?</option>";
                                            }else {
                                                echo "  <option selected>?</option>
                                                        <option>FEMELLES</option>
                                                        <option>MALES</option>";
                                            }
                                        
                                    ?>
                                </select>
                            </div>
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="birthday">Année de naissance</label>
                                <input value="<?= $currAnimal['birthday'] ?>" type="number" name="birthday" class="form-control form-control-lg" id="birthday" placeholder="2020">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="mb-2">
                                <label for="descriptionAnimal">Description</label>
                                <textarea name="description" rows="7" cols="60" class="form-control" id="descriptionAnimal" placeholder="Ecriver la description de l'animal..." required><?= $currAnimal['description'] ?></textarea>
                            </div>
                        </div>
                        <div class="custom-file">
                                <label for="fichier_a_uploader" title="Recherchez le fichier à uploader !">Envoyer le fichier :</label>
                                <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_SIZE; ?>" />
                                <input name="fichier" type="file" id="fichier_a_uploader" />
                        </div>
                        <div class="btnAlign">
                            <button class="btn btn-primary">Envoyer</button>
                        </div>
                    </form> 

                    <?php } ?>    
                </div>
 
            </div>
            <!-- SECTION ACTUALITES -->
            <div class="actualiteSection tab-pane fade <?= isset($_POST['actualite']) ? "show active" : "" ?>" id="pills-actualite" role="tabpanel" aria-labelledby="pills-actualite-tab">
                <form enctype="multipart/form-data" method="post" action="edit.php">
                    <?php
                            $req = $db->prepare('SELECT * FROM actualites');
                            $req->execute();
                                            
                            $actulites = array();

                            while($actu = $req->fetch()){ 
                                array_push($actulites, $actu);
                    } ?>

                    <?php if(!isset($_POST['actualite'])) { ?>

                    <input name="actualite" type="hidden" values="1">

                    <div class="form-group col-md-4">
                        <label for="inputState">Quels actualités voulez vous editer ?</label>
                        <select name='name' id="inputState" class="form-control">
                            <?php
                                foreach($actulites as $actu) { ?>
                                <option> <?= $actu['title']." / ID  = ".$actu['id']; ?> </option>
                                <?php } ?>
                        </select>
                    </div>      
                    <button class="btn btn-warning">Editer</button>
                </form>  

                 <?php } if(isset($_POST['actualite'])) { ?>

                <form enctype="multipart/form-data" method="post" action="edit.php">
                                    
                    <input name="actualiteUpdate" type="hidden" values="1">
                    <input name="id" type="hidden" value="<?= $currActu['id'] ?>">
                    <input name="picture" type="hidden" value="<?= $currActu['picture'] ?>">

                        <div class="form-row">
                            <div class="form-group mb-2">
                                <label for="nameAnimal">Titre de l'actualités</label>
                                <input value="<?= $currActu['title'] ?>" type="text" name="title" required class="form-control" id="nameAnimal">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="mb-2">
                                <label for="descriptionAnimal">Description</label>
                                <textarea name="description" rows="7" cols="60" class="form-control" id="descriptionAnimal" placeholder="Ecriver la description de l'animal..." required><?= $currActu['description'] ?></textarea>
                            </div>
                        </div>
                        <div class="custom-file">
                                <label for="fichier_a_uploader" title="Recherchez le fichier à uploader !">Envoyer le fichier :</label>
                                <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_SIZE; ?>" />
                                <input name="fichier" type="file" id="fichier_a_uploader" />
                        </div>
                        <div class="btnAlign">
                            <button class="btn btn-primary">Envoyer</button>
                        </div>
                    </form> 

                    <?php } ?>    
                </div>
 
            </div>     
            </div> 
        </div>    
    </div>
</body>
</html>

