<?php 
    require_once 'db.php';

    if(!isset($_SESSION['nom_utilisateur'])){
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
    <title>page d'administration</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="form.css">
    <style>
        /* Styles spécifiques à cette page */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            font-size: 1.5em;
        }

        h1 {
            text-align: center;
            color: #333;
            padding: 20px 0;
        }

        .utilisateurs, .demandes, .acte {
            margin: 20px auto;
            width: 80%;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);

            overflow-x: scroll;
        white-space: nowrap;
        }

        .utilisateurs{
            margin-top: 10em;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 6px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        th {
            background-color: #f7f7f7;   
        }
        caption{
            font-size:2em;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .message {
            margin: 20px auto;
            width: 80%;
            background-color: white;
            border: 1px solid #ccc;
            border-radius:1em;
            padding: 10px;
            color: red;;
            text-align: center;
        }
        
    </style>
</head>
<body>

<?php
        include '../header.php';
    ?>
   <?php//-----------------------------------------------------utilisateurs----------------------------------------------  ?>
    <div class="utilisateurs">

        <?php 

        // Récupération des données de la table
        $resultats = $bdd->query("SELECT * FROM utilisateurs WHERE isadmin =0");

        ?>

        <table>
        <caption>liste des utilisateurs</caption>
        <thead>
        <tr>
        <th>id_user</th>
        <th>pseudo</th>
        <th>nom</th>
        <th>prenom</th>
        <th>email</th>
        <!-- <th>edition</th>
        <th>suppression</th> -->
        </tr>
        </thead>
        <tbody>
        <?php while($row = $resultats->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
            <td><?= $row['id_user'] ?></td>
            <td><?= $row['pseudo'] ?></td>
            <td><?= $row['nom'] ?></td>
            <td><?= $row['prenom'] ?></td>
            <td><?= $row['email'] ?></td>
            
            <!-- <td><a href="">Editer</a></td>
            <td><a href="">supprimer</a></td> -->
        </tr>
        <?php endwhile; ?>
        </tbody>
        </table>


    </div>

    <?php//------------------------------------------demande---------------------------------------------------------  ?>
    <div class="demandes">

        <?php 

        // Récupération des données de la table
        $resultats = $bdd->query("SELECT * FROM demande ");

        ?>

        <table>
            <caption>liste des demandes d'actes</caption>
        <thead>
        <tr>
            <th>num_demande</th>
            <th>id_user</th>
            <th>num_registre</th>
            <th>type_acte</th>
            <th>status</th>
            <th>date_demande</th>
            <th>validation</th> 
            <th>refus</th>
        </tr>
        </thead>
        <tbody>
        <?php while($row = $resultats->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
            <td><?= $row['num_demande'] ?></td>
            <td><?= $row['id_user'] ?></td>
            <td><?= $row['num_registre'] ?></td>
            <td><?= $row['type_acte'] ?></td>
            <td><?= $row['status'] ?></td>
            <td><?= $row['date_demande'] ?></td>
            
            <td><a href="valider.php?num_demande=<?= $row['num_demande'] ?>&id_user=<?= $row['id_user'] ?>&num_registre=<?= $row['num_registre'] ?>&type_acte=<?= $row['type_acte'] ?>&status=<?= $row['status'] ?>&date_demande=<?= $row['date_demande'] ?>">valider</a></td>
            <td><a href="refuser.php?num_demande=<?= $row['num_demande'] ?>">refuser</a></td>
            
            

        </tr>
        <?php endwhile; ?>
        </tbody>
        </table>
        
    </div>
    <div>
    <?php     
   
   if(!empty($_SESSION['message'])){
      ?>    <p class="message"> <?php  echo ($_SESSION['message']); ?></p>
     
     <?php
   }
   ?>
    </div>


    <?php//---------------------------------------------------acte de naissance------------------------------------------------  ?>

<div class="acte">

        <?php 

        // Récupération des données de la table
        $resultats = $bdd->query("SELECT * FROM acte_naissance ");

        ?>

        <table>
            <caption>liste des actes de naissance</caption>
        <thead>
        <tr>
            <th>num du registre</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Date de naissance</th>
            <th>Lieu de naissance</th>
            <th>Nom du père</th>
            <th>Prénom du père</th>
            <th>Nationalité du père</th>
            <th>Nom de la mère</th>
            <th>Prénom de la mère</th>
            <th>Nationalité de la mère</th>
        </tr>
        </thead>
        <tbody>
        <?php while($row = $resultats->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
            <td><?= $row['num_registre'] ?></td>
            <td><?= $row['nom'] ?></td>
            <td><?= $row['prenom'] ?></td>
            <td><?= $row['date_naissance'] ?></td>
            <td><?= $row['lieu_naissance'] ?></td>
            <td><?= $row['nom_pere'] ?></td>
            <td><?= $row['prenom_pere'] ?></td>
            <td><?= $row['nationalite_pere'] ?></td>
           
            <td><?= $row['nom_mere'] ?></td>
            <td><?= $row['prenom_mere'] ?></td>
            <td><?= $row['nationalite_mere'] ?></td>
            
            <!-- <td><a href="valider.php?num_demande=<?= $row['num_demande'] ?>&id_user=<?= $row['id_user'] ?>&num_registre=<?= $row['num_registre'] ?>&type_acte=<?= $row['type_acte'] ?>&status=<?= $row['status'] ?>&date_demande=<?= $row['date_demande'] ?>">valider</a></td>
            <td><a href="">refuser</a></td>
             -->
            

        </tr>
        <?php endwhile; ?>
        </tbody>
        </table>
        
    </div>

    <?php//---------------------------------------------------acte de mariage------------------------------------------------  ?>

<div class="acte">

        <?php 

        // Récupération des données de la table
        $resultats = $bdd->query("SELECT * FROM acte_mariage ");

        ?>

        <table>
            <caption>liste des actes de mariage</caption>
        <thead>
        <tr>
            <th>num du registre</th>
            <th>Date</th>
            <th>nom conjoint</th>
            <th>Prénom conjoint</th>
            <th>Date de naissance conjoint</th>
            <th>profession conjoint</th>
            <th>lieu habitation conjoint</th>
            <th>Nom du père conjoint</th>
            <th>Prénom du père conjoint</th>
            <th>Nom de la mère conjoint</th>
            <th>Prénom de la mère conjoint</th>
            
            <th>nom conjointe</th>
            <th>Prénom conjointe</th>
            <th>Date de naissance conjointe</th>
            <th>profession conjointe</th>
            <th>lieu habitation conjointe</th>
            <th>Nom du père conjointe</th>
            <th>Prénom du père conjointe</th>
            <th>Nom de la mère conjointe</th>
            <th>Prénom de la mère conjointe</th>

            <th>bien</th>

        </tr>
        </thead>
        <tbody>
        <?php while($row = $resultats->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
            <td><?= $row['num_registre'] ?></td>
            <td><?= $row['date'] ?></td>
            <td><?= $row['nom_cjt'] ?></td>
            <td><?= $row['prenom_cjt'] ?></td>
            <td><?= $row['date_naissance_cjt'] ?></td>
            <td><?= $row['profession_cjt'] ?></td>
            <td><?= $row['lieu_hab_cjt'] ?></td>
            <td><?= $row['nom_pere_cjt'] ?></td>
            <td><?= $row['prenom_pere_cjt'] ?></td>
            <td><?= $row['nom_mere_cjt'] ?></td>
            <td><?= $row['prenom_mere_cjt'] ?></td>

            <td><?= $row['nom_cjte'] ?></td>
            <td><?= $row['prenom_cjte'] ?></td>
            <td><?= $row['date_naissance_cjte'] ?></td>
            <td><?= $row['profession_cjte'] ?></td>
            <td><?= $row['lieu_hab_cjte'] ?></td>
            <td><?= $row['nom_pere_cjte'] ?></td>
            <td><?= $row['prenom_pere_cjte'] ?></td>
            <td><?= $row['nom_mere_cjte'] ?></td>
            <td><?= $row['prenom_mere_cjte'] ?></td>
            <td><?= $row['bien'] ?></td>
           
            

        </tr>
        <?php endwhile; ?>
        </tbody>
        </table>
        
    </div>
    <?php//---------------------------------------------------acte de deces------------------------------------------------  ?>

<div class="acte">

        <?php 

        // Récupération des données de la table
        $resultats = $bdd->query("SELECT * FROM acte_deces ");

        ?>

        <table>
            <caption>liste des actes de Décès</caption>
        <thead>
        <tr>
            <th>num du registre</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Date de décès</th>
            <th>Lieu de décès</th>
            <th>âge</th>
            <th>profession</th>
            <th>nationalité</th>
            <th>lieu de residence</th>
            <th>situation matrimoniale</th>
            <th>nom du(e) conjoint(e)</th>
            <th>prenom du(e) conjoint(e)</th>
            <th>Nom du père</th>
            <th>Prénom du père</th>
            <th>Nom de la mère</th>
            <th>Prénom de la mère</th>
            
        </tr>
        </thead>
        <tbody>
        <?php while($row = $resultats->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
            <td><?= $row['num_registre'] ?></td>
            <td><?= $row['nom'] ?></td>
            <td><?= $row['prenom'] ?></td>
            <td><?= $row['date_deces'] ?></td>
            <td><?= $row['lieu_deces'] ?></td>
            <td><?= $row['age'] ?></td>
            <td><?= $row['profession'] ?></td>
            <td><?= $row['nationalite'] ?></td>
           
            <td><?= $row['lieu_residence'] ?></td>
            <td><?= $row['matrimoniale'] ?></td>
            <td><?= $row['nom_conjoint'] ?></td>
            <td><?= $row['prenom_conjoint'] ?></td>
            <td><?= $row['nom_pere'] ?></td>
            <td><?= $row['prenom_pere'] ?></td>
            <td><?= $row['nom_mere'] ?></td>
            <td><?= $row['prenom_mere'] ?></td>
           
            

        </tr>
        <?php endwhile; ?>
        </tbody>
        </table>
        
    </div>
    
</body>
</html>

