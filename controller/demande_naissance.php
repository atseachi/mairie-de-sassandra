<?php
require_once 'db.php';

if(!isset($_SESSION['id_user'])|| !isset($_SESSION['email'])){
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
    <title>demande d'acte de naissance</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="form.css">
</head>
<body>
<?php
        include '../header.php';
    ?>
<form method="post" action="action_demande_naissance.php">

        <input type="text" name="nom" id="nom" placeholder="Nom">  

        <input type="text" name="prenom" id="prenom" placeholder="Prenom">

        <input type="date" name="date_naissance" id="date" placeholder="Date de Naissance">

        <input type="text" name="lieu_naissance" id="lieu_naissance" placeholder="Lieu de naissance">
        
        <input type="text" name="nom_pere" id="nom_pere" placeholder="Nom du Père">

        <input type="text" name="prenom_pere" id="prenom_pere" placeholder="Prénom du Père">

        <input type="text" name="nationalite_pere" id="nationalite_pere" placeholder="nationalité du père">
        
        <input type="text" name="nom_mere" id="nom_mere" placeholder="Nom de la Mère">

        <input type="text" name="prenom_mere" id="prenom_mere" placeholder="Prénom de la Mère">

        <input type="text" name="nationalite_mere" id="nationalite_mere" placeholder="nationalité de la mère">

        <p>
            <?php     
            
            if(!empty($_SESSION['message'])){
                ?>    <p class="message"> <?php  echo ($_SESSION['message']); ?></p>
                
                <?php
            }
            ?>
      </p>

        <input type="submit" value="Envoyer">

        
    </form>

</body>
</html>