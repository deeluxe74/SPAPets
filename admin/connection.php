<?php 
    session_start();
    
    if(isset($_SESSION['connect'])){
        header('location: ../admin/gestion.php');
    }

    require('../database/connection.php');
    
    //Connexions
    if(!empty($_POST['pseudo']) && !empty($_POST['password'])){

        $pseudo      = htmlspecialchars($_POST['pseudo']);
        $password   = htmlspecialchars($_POST['password']);
        $password = "157".sha1($password."5t2e")."e84";
        $error = 1;
        
        $req = $db->prepare('SELECT * FROM users WHERE pseudo = ?');
        $req->execute(array($pseudo));
        
        while($user = $req->fetch()){ 
            if($password == $user['password']){
               
                $_SESSION['connect'] = 1;
                $_SESSION['pseudo'] = $user['pseudo'];
                $error = 0;
    
                setcookie('log', $user['secret'],time() + 3600, '/', null, false, true);
                
                header('location: ../admin/gestion.php?success=1&message=Vous êtes maintenant connecter en tant que "Administrateur"');
            }
        }
        if($error == 1){
            header('location: ../admin/connection.php?error=1');
        }
    };

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
    <div class="container">
        <form action="connection.php" method="post">
            <div class="form-row" action="connection.php" method="post">
                <div class="badge badge-danger">Administration</div>
                <div class="form-group col-md-6">


                <?php 
                    if(isset($_GET['success'])){ 
                        if(isset($_GET['message'])){ ?>
                            <div class="alert alert-danger"> <?= $_GET['message'] ?> </div>
               <?php }
               
            } 
        ?>

                <label for="inputEmail4">Pseudo</label>
                <input required name="pseudo" type="pseudo" class="form-control" id="inputEmail4">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="inputPassword4">Password</label>
                <input required name="password" type="password" class="form-control" id="inputPassword4">
                </div>
            </div>
        <button type="submit" class="btn btn-primary">Connection</button>
        </form>
    </div>
</body>
</html>