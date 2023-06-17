<?php
require_once 'db.php';

// Récupération des données du formulaire

$date = htmlspecialchars($_POST['date']);

$nom_cjt = htmlspecialchars($_POST['nom_cjt']);
$prenom_cjt =htmlspecialchars( $_POST['prenom_cjt']);
$date_naissance_cjt =htmlspecialchars( $_POST['date_naissance_cjt']);
$profession_cjt =htmlspecialchars( $_POST['profession_cjt']);
$lieu_hab_cjt = htmlspecialchars($_POST['lieu_hab_cjt']);
$nom_pere_cjt = htmlspecialchars($_POST['nom_pere_cjt']);
$prenom_pere_cjt = htmlspecialchars($_POST['prenom_pere_cjt']);
$nom_mere_cjt = htmlspecialchars($_POST['nom_mere_cjt']);
$prenom_mere_cjt = htmlspecialchars($_POST['prenom_mere_cjt']);

$nom_cjte = htmlspecialchars($_POST['nom_cjte']);
$prenom_cjte =htmlspecialchars( $_POST['prenom_cjte']);
$date_naissance_cjte =htmlspecialchars( $_POST['date_naissance_cjte']);
$profession_cjte =htmlspecialchars( $_POST['profession_cjte']);
$lieu_hab_cjte = htmlspecialchars($_POST['lieu_hab_cjte']);
$nom_pere_cjte = htmlspecialchars($_POST['nom_pere_cjte']);
$prenom_pere_cjte = htmlspecialchars($_POST['prenom_pere_cjte']);
$nom_mere_cjte = htmlspecialchars($_POST['nom_mere_cjt']);
$prenom_mere_cjte = htmlspecialchars($_POST['prenom_mere_cjte']);

$bien = htmlspecialchars($_POST['bien']);







// Vérification des données (exemple)
if (empty($nom_cjte) || empty($nom_pere_cjt) ) {
    die('Veuillez remplir tous les champs du formulaire.');
}else{
        // Insertion des données dans la base de données
    $sql = "INSERT INTO acte_mariage (date, nom_cjt, prenom_cjt, date_naissance_cjt, profession_cjt, lieu_hab_cjt, nom_pere_cjt, prenom_pere_cjt,  nom_mere_cjt, prenom_mere_cjt, nom_cjte, prenom_cjte, date_naissance_cjte, profession_cjte, lieu_hab_cjte, nom_pere_cjte, prenom_pere_cjte,  nom_mere_cjte, prenom_mere_cjte, bien) 
    VALUES (:date, :nom_cjt, :prenom_cjt, :date_naissance_cjt, :profession_cjt, :lieu_hab_cjt, :nom_pere_cjt, :prenom_pere_cjt,  :nom_mere_cjt, :prenom_mere_cjt, :nom_cjte, :prenom_cjte, :date_naissance_cjte, :profession_cjte, :lieu_hab_cjte, :nom_pere_cjte, :prenom_pere_cjte, :nom_mere_cjte, :prenom_mere_cjte, :bien )";
    $query = $bdd->prepare($sql);
    $query->execute([

    'date' => $date,
    
    
    'nom_cjt' => $nom_cjt,
    'prenom_cjt' => $prenom_cjt,
    'date_naissance_cjt' => $date_naissance_cjt,
    'profession_cjt' => $profession_cjt,
    'lieu_hab_cjt' => $lieu_hab_cjt,
    'nom_pere_cjt' => $nom_pere_cjt,
    'prenom_pere_cjt' => $prenom_pere_cjt,
    'nom_mere_cjt' => $nom_mere_cjt,
    'prenom_mere_cjt'=> $prenom_mere_cjt,

    'nom_cjte' => $nom_cjte,
    'prenom_cjte' => $prenom_cjte,
    'date_naissance_cjte' => $date_naissance_cjte,
    'profession_cjte' => $profession_cjte,
    'lieu_hab_cjte' => $lieu_hab_cjte,
    'nom_pere_cjte' => $nom_pere_cjte,
    'prenom_pere_cjte' => $prenom_pere_cjte,
    'nom_mere_cjte' => $nom_mere_cjte,
    'prenom_mere_cjte'=> $prenom_mere_cjte,

    'bien'=> $bien

    ]);

   //recuperation du num de registre

   
    $check = $bdd->prepare('SELECT num_registre FROM acte_mariage WHERE nom_cjt = :nom_cjt AND prenom_cjt = :prenom_cjt AND date = :date');
    $check->execute(array('nom_cjt' => $nom_cjt, 'prenom_cjt' => $prenom_cjt, 'date' => $date));
    $data = $check->fetch();
    $row = $check->rowCount();




    //recuperation de l'id du demandeur ou de l'utilisateur et du num de registre

    $num_registre = $data['num_registre'];
   
    $type_acte = "acte de Mariage";

   
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
    

    header('Location: http://localhost/mairie/controller/demande_mariage.php');
    exit();
}




// Message de confirmation
echo 'Merci pour la demande , ' .$_SESSION['nom_utilisateur']. ' ' . $nom . ' !' .$_SESSION['id_user'].'' ;
?>
