<?php 
  require_once 'db.php';

  if(!isset($_SESSION['id_user'])){
    header('Location: connexion.php');
    die();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <p> <?php echo ' bienvenue, ' .$_SESSION['nom_utilisateur'].'!'  ?></p>
    <p><a href="logout.php">deconnexion</a></p>
    
</body>
</html>