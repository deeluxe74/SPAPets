<?php

session_start();
session_unset();
session_destroy();
header('location: ../admin/connection.php?success=1&message=Votre compte "Administrateur" est maintenant déconnecter');

setcookie('auth','', time()-1 , '', null,false,true);

?>