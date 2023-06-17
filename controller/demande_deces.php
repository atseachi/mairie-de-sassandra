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
    <title>demande d'acte de décès</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="form.css">
</head>
<body>
<?php
        include '../header.php';
    ?>
    
<form method="post" action="action_demande_deces.php">

        <input type="text" name="nom" id="nom" placeholder="Nom">  

        <input type="text" name="prenom" id="prenom" placeholder="Prenom">

        <input type="date" name="date_deces" id="date_deces" placeholder="Date de Décès">

        <input type="text" name="lieu_deces" id="lieu_deces" placeholder="Lieu de Décès">

        <input type="text" name="age" id="age" placeholder="Age du défunt">

        <input type="text" name="profession" id="profession" placeholder="Profession">

        <input type="text" name="nationalite" id="nationalite" placeholder="nationalité">

        <input type="text" name="lieu_residence" id="lieu_residence" placeholder="lieu de résidence">

        <input type="text" name="matrimoniale" id="matrimoniale" placeholder="Situaton Matrimoniale">

        <input type="text" name="nom_conjoint" id="nom_conjoint" placeholder="Nom du( de la) conjoint(e)" required="false">

        <input type="text" name="prenom_conjoint" id="prenom_conjoint" placeholder="Prenom du( de la) conjoint(e)" required="false">

        <input type="text" name="nom_pere" id="nom_pere" placeholder="Nom du Père">

        <input type="text" name="prenom_pere" id="prenom_pere" placeholder="Prénom du Père">
        
        <input type="text" name="nom_mere" id="nom_mere" placeholder="Nom de la Mère">

        <input type="text" name="prenom_mere" id="prenom_mere" placeholder="Prénom de la Mère">

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