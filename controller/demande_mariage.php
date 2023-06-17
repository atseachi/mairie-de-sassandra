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
    <title>demande d'acte de Mariage</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="form.css">
</head>
<body>
<?php
        include '../header.php';
    ?>
<form method="post" action="action_demande_mariage.php">


        <label for="date">Date de Mariage :</label>
        <input type="date" name="date" id="date" placeholder="Date de Mariage"> 

        <input type="text" name="nom_cjt" id="nom_cjt" placeholder="Nom du Marié">  

        <input type="text" name="prenom_cjt" id="prenom_cjt" placeholder="Prenom du Marié">

        <label for="date_naissance_cjt">Date de naissance du Marié :</label>
        <input type="date" name="date_naissance_cjt" id="date_naissance_cjt" placeholder="Date de naissance du Marié">

        <input type="text" name="profession_cjt" id="profession_cjt" placeholder="Profession du marié">

        <input type="text" name="lieu_hab_cjt" id="lieu_hab_cjt" placeholder="Lieu d'habitation du marié">

        <input type="text" name="nom_pere_cjt" id="nom_pere_cjt" placeholder="Nom du père du marié">

        <input type="text" name="prenom_pere_cjt" id="prenom_pere_cjt" placeholder="Prenom du père du marié">

        <input type="text" name="nom_mere_cjt" id="nom_mere_cjt" placeholder="Nom de la mère du marié">

        <input type="text" name="prenom_mere_cjt" id="prenom_mere_cjt" placeholder="Prenom de la mère du marié">



        <input type="text" name="nom_cjte" id="nom_cjte" placeholder="Nom de la Mariée">  

        <input type="text" name="prenom_cjte" id="prenom_cjte" placeholder="Prenom de la Mariée">

        <label for="date_naissance_cjte">Date de naissance de la Mariée :</label>
        <input type="date" name="date_naissance_cjte" id="date_naissance_cjte" placeholder="Date de naissance de la Mariée">

        <input type="text" name="profession_cjte" id="profession_cjte" placeholder="Profession de la Mariée">

        <input type="text" name="lieu_hab_cjte" id="lieu_hab_cjte" placeholder="Lieu d'habitation de la Mariée">

        <input type="text" name="nom_pere_cjte" id="nom_pere_cjte" placeholder="Nom du père de la Mariée">

        <input type="text" name="prenom_pere_cjte" id="prenom_pere_cjte" placeholder="Prenom du père de la Mariée">

        <input type="text" name="nom_mere_cjte" id="nom_mere_cjte" placeholder="Nom de la mère de la Mariée">

        <input type="text" name="prenom_mere_cjte" id="prenom_mere_cjte" placeholder="Prenom de la mère de la Mariée">

        <input type="text" name="bien" id="bien" placeholder="Séparation de bien ou communauté de bien">


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