<?php
require_once 'db.php';

// Récupération des données du formulaire

$nom = htmlspecialchars($_POST['nom']);
$prenom =htmlspecialchars( $_POST['prenom']);
$date_naissance =htmlspecialchars( $_POST['date_naissance']);
$lieu_naissance =htmlspecialchars( $_POST['lieu_naissance']);
$nom_pere =htmlspecialchars( $_POST['nom_pere']);
$prenom_pere =htmlspecialchars( $_POST['prenom_pere']);
$nationalite_pere =htmlspecialchars( $_POST['nationalite_pere']);
$nom_mere =htmlspecialchars( $_POST['nom_mere']);
$prenom_mere =htmlspecialchars( $_POST['prenom_mere']);
$nationalite_mere =htmlspecialchars( $_POST['nationalite_mere']);


// Vérification des données (exemple)
if (empty($nom) || empty($prenom) ) {
    die('Veuillez remplir tous les champs du formulaire.');
}else{
        // Insertion des données dans la base de données
    $sql = "INSERT INTO acte_naissance (nom, prenom, date_naissance, lieu_naissance, nom_pere, prenom_pere, nationalite_pere, nom_mere, prenom_mere, nationalite_mere) 
    VALUES (:nom, :prenom, :date_naissance, :lieu_naissance, :nom_pere, :prenom_pere, :nationalite_pere, :nom_mere, :prenom_mere, :nationalite_mere )";
    $query = $bdd->prepare($sql);
    $query->execute([

    'nom' => $nom,
    'prenom' => $prenom,
    'date_naissance'=> $date_naissance,
    'lieu_naissance'=> $lieu_naissance,
    'nom_pere'=> $nom_pere,
    'prenom_pere'=> $prenom_pere,
    'nationalite_pere'=> $nationalite_pere,
    'nom_mere'=> $nom_mere,
    'prenom_mere'=> $prenom_mere,
    'nationalite_mere'=> $nationalite_mere
    ]);

   //recuperation du num de registre

    // $check = $bdd->prepare('SELECT num_registre FROM acte_naissance WHERE nom = ?,prenom = ?,date_naissance = ?');
    // $check->execute(array($nom, $prenom, $date_naissance));
    // $data = $check->fetch();
    // $row = $check->rowCount();

    $check = $bdd->prepare('SELECT num_registre FROM acte_naissance WHERE nom = :nom AND prenom = :prenom AND date_naissance = :date_naissance');
    $check->execute(array('nom' => $nom, 'prenom' => $prenom, 'date_naissance' => $date_naissance));
    $data = $check->fetch();
    $row = $check->rowCount();


    //recuperation de l'id du demandeur ou de l'utilisateur et du num de registre

    $num_registre = $data['num_registre'];
   
    $type_acte = "acte de naissance";

   
    //insertion des données dans la table demande
    
    $req = "INSERT INTO demande(id_user, num_registre, type_acte)  VALUES ( :id_user, :num_registre,:type_acte)";
   
    $query1 = $bdd->prepare($req);
    $query1->execute([

    'num_registre' => $num_registre,
    'id_user' => $_SESSION['id_user'],
    'type_acte'=> $type_acte
   
    ]);



    //declaration des variable de session
    $_SESSION['message'] = "Demande effectuée !";
    

    header('Location: http://localhost/mairie/controller/demande_naissance.php');
    exit();
}




// Message de confirmation
echo 'Merci pour la demande , ' .$_SESSION['nom_utilisateur']. ' ' . $nom . ' !' .$_SESSION['id_user'].'' ;
?>
