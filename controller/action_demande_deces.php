<?php
require_once 'db.php';

// Récupération des données du formulaire

$nom = htmlspecialchars($_POST['nom']);
$prenom =htmlspecialchars( $_POST['prenom']);
$date_deces =htmlspecialchars( $_POST['date_deces']);
$lieu_deces =htmlspecialchars( $_POST['lieu_deces']);
$age = htmlspecialchars($_POST['age']);
$profession = htmlspecialchars($_POST['profession']);
$nationalite = htmlspecialchars($_POST['nationalite']);
$lieu_residence = htmlspecialchars($_POST['lieu_residence']);
$matrimoniale = htmlspecialchars($_POST['matrimoniale']);
$nom_conjoint = htmlspecialchars($_POST['nom_conjoint']);
$prenom_conjoint = htmlspecialchars($_POST['prenom_conjoint']);
$nom_pere =htmlspecialchars( $_POST['nom_pere']);
$prenom_pere =htmlspecialchars( $_POST['prenom_pere']);
$nom_mere =htmlspecialchars( $_POST['nom_mere']);
$prenom_mere =htmlspecialchars( $_POST['prenom_mere']);



// Vérification des données (exemple)
if (empty($nom) || empty($prenom) ) {
    die('Veuillez remplir tous les champs du formulaire.');
}else{
        // Insertion des données dans la base de données
    $sql = "INSERT INTO acte_deces (nom, prenom, date_deces, lieu_deces, age, profession, nationalite, lieu_residence,  matrimoniale, nom_conjoint, prenom_conjoint, nom_pere, prenom_pere, nom_mere, prenom_mere) 
    VALUES (:nom, :prenom, :date_deces, :lieu_deces, :age, :profession,:nationalite, :lieu_residence,  :matrimoniale, :nom_conjoint, :prenom_conjoint, :nom_pere, :prenom_pere, :nom_mere, :prenom_mere )";
    $query = $bdd->prepare($sql);
    $query->execute([

    'nom' => $nom,
    'prenom' => $prenom,
    'date_deces' => $date_deces,
    'lieu_deces' => $lieu_deces,
    'age' => $age,
    'profession' => $profession,
    'nationalite' => $nationalite,
    'lieu_residence' => $lieu_residence,
    'matrimoniale' => $matrimoniale,
    'nom_conjoint' => $nom_conjoint,
    'prenom_conjoint' => $prenom_conjoint,
    'nom_pere'=> $nom_pere,
    'prenom_pere'=> $prenom_pere,
    'nom_mere'=> $nom_mere,
    'prenom_mere'=> $prenom_mere
    
    ]);

   //recuperation du num de registre

   
    $check = $bdd->prepare('SELECT num_registre FROM acte_deces WHERE nom = :nom AND prenom = :prenom AND date_deces = :date_deces');
    $check->execute(array('nom' => $nom, 'prenom' => $prenom, 'date_deces' => $date_deces));
    $data = $check->fetch();
    $row = $check->rowCount();




    //recuperation de l'id du demandeur ou de l'utilisateur et du num de registre

    $num_registre = $data['num_registre'];
   
    $type_acte = "acte de Décès";

   
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

    header('Location: http://localhost/mairie/controller/demande_deces.php');
    exit();
}




// Message de confirmation
echo 'Merci pour la demande , ' .$_SESSION['nom_utilisateur']. ' ' . $nom . ' !' .$_SESSION['id_user'].'' ;
?>
