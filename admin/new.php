<?php  

    session_start();
        
    if(!isset($_SESSION['connect'])){
        header('location: ../admin/connection.php');
    }

    if(isset($_POST['animal']) && !empty($_POST['types']) && !empty($_POST['name']) && !empty($_POST['sexe']) && !empty($_POST['description'])){
        
        define('TARGET', '../uploads/animals/');    // Repertoire cible
        include('uploaded.php');

        $name =         htmlspecialchars($_POST['name']);
        $sexe =         htmlspecialchars($_POST['sexe']);
        $description =  htmlspecialchars($_POST['description']);
        $types =        htmlspecialchars($_POST['types']);

        $medaille = htmlspecialchars($_POST['medaille']);
        $birthday = empty($_POST['birthday']) ? "Inconnue" : $_POST['birthday'];
        $picture = '../uploads/animals/'.htmlspecialchars($nomImage);

        if(empty($nomImage)){
            $picture = '../uploads/animals/defaultPicture.jpg';
        }
        
        if(empty($message)){
            require('../database/connection.php');
            $req = $db->prepare('INSERT INTO animals(types, medaille, sexe, birthday, description, picture, name) VALUES(?, ?, ?, ?, ?, ?, ?)');

            $req->execute(array($types, $medaille, $sexe, $birthday, $description, $picture, $name));

            header('location: ../admin/gestion.php?success=1&message=La base de donnée est mis a jour !');
        }else {
            header('location: ../admin/new.php?error=1&message='.$message.'');
        }
        
    }

    if(isset($_POST['actualite']) && !empty($_POST['title']) && !empty($_POST['description'])){
        define('TARGET', '../uploads/actualites/');    // Repertoire cible
        include('uploaded.php');

        $title = htmlspecialchars($_POST['title']);
        $description = htmlspecialchars($_POST['description']);
        $picture = '../uploads/actualites/'.htmlspecialchars($nomImage);

        require('../database/connection.php');
        $req = $db->prepare('INSERT INTO actualites(title, description, picture) VALUES(?, ?, ?)');
        $req->execute(array($title, $description, $picture));

        header('location: ../admin/gestion.php?success=1&message=La base de donnée est mis a jour !');
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
        <div class="badge badge-success">Nouvelle données</div>

            <a class="btn btn-danger returnBtn" href="../admin/gestion.php">Retour</a>
            <?php 
            if(isset($_GET['error'])){
                if(isset($_GET['message'])){
                    echo "<div class='alert alert-danger'>".htmlspecialchars($_GET['message'])."</div>";
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
                            <form enctype="multipart/form-data" method="post" action="new.php">
                                
                            <input name="animal" type="hidden" values="1">

                                <select name="types" class="form-control form-control-lg">
                                    <option>CHIEN</option>
                                    <option>CHAT</option>
                                    <option>AUTRES</option>
                                </select>

                                <div class="form-row">
                                    <div class="form-group mb-2">
                                        <label for="nameAnimal">Nom de l'animal</label>
                                        <input type="text" name="name" required class="form-control" id="nameAnimal">
                                    </div>
                                    <div class="form-group mx-sm-3 mb-2">
                                        <label for="medal">Médaille N°</label>
                                        <input type="text" name="medaille" class="form-control" id="medal">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group mb-2">
                                        <label for="sexe">Sexe</label>
                                        <select name="sexe" class="form-control form-control-lg">
                                            <option>MALES</option>
                                            <option>FEMELLES</option>
                                            <option>?</option>
                                        </select>
                                    </div>
                                    <div class="form-group mx-sm-3 mb-2">
                                        <label for="birthday">Année de naissance</label>
                                        <input type="number" name="birthday" class="form-control form-control-lg" id="birthday" placeholder="2020">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="mb-2">
                                        <label for="descriptionAnimal">Description</label>
                                        <textarea name="description" rows="7" cols="60" class="form-control" id="descriptionAnimal">Pas de description disponible, contacter nous pour plus d'informations !</textarea>
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

                        </div>

                        <div class="tab-pane fade" id="pills-actualite" role="tabpanel" aria-labelledby="pills-actualite-tab">
                           
                            <form enctype="multipart/form-data" method="post" action="new.php">

                                <div class="form-row">
                                    <input name="actualite" type="hidden" values="1">
                                    <div class="form-group mb-2">
                                        <label for="titleActu">Titre de l'actualité</label>
                                        <input type="text" name="title" required class="form-control" id="titleActu">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="mb-2">
                                        <label for="descriptionActu">Description</label>
                                        <textarea name="description" rows="7" cols="60" class="form-control" id="descriptionActu" placeholder="Ecriver la description de l'actualité.." required></textarea>
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
                        </div>
                    </div>    
            </div>
    </div>
</body>
</html>

