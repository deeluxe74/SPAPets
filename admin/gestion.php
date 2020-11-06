<?php
    session_start();
    
    if(!isset($_SESSION['connect'])){
        header('location: ../admin/connection.php');
    }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <? include('../composants/parameters.php'); ?>
    <link rel="stylesheet" href="../css/admin/connection.css">
</head>
<body>
    <header>
        <? include('../composants/nav-bar.php'); ?>
    </header>

    <div class="Gestion container">
        <div class="badge badge-warning">Gestion Données</div>
        <?php 
            if(isset($_GET['success'])){ 
                if(isset($_GET['message'])){ ?>
                     <div class="alert alert-success"> <?= $_GET['message'] ?> </div>
               <?php }
               
            } 
        ?>
        <br>
  <a class="btn btn-danger" href='../admin/logout.php';>Déconnexion</a>
        <div class="list-group">
            <a href="../admin/new.php" class="list-group-item list-group-item-action active">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Ajouter un contenu</h5>
                </div>
                <p class="mb-2">Permet d'ajouter un animal ou une nouvelle actualité et de l'inserer dans la base de données du site SPA Annecy Marlioz.</p>
            </a>
            <a href="../admin/edit.php" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Editer une actualité ou un animal</h5>
                </div>
                <p class="mb-2">Permet d'éditer un contenue afin de le maintenir a jour ou le corriger.</p>
            </a>
            <a href="../admin/delete.php" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Supprimer une actualité ou un animal</h5>
                </div>
                <p class="mb-2">Permet de supprimer un contenue afin de le retirer du site Spa Marlioz.</p>
            </a>
        </div>

    </div>
</body>
</html>