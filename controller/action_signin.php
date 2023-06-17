<?php
require_once 'db.php';

// Récupération des données du formulaire
$pseudo = htmlspecialchars( $_POST['pseudo']);
$nom = htmlspecialchars($_POST['last_name']);
$prenom =htmlspecialchars( $_POST['first_name']);
$email = htmlspecialchars($_POST['email']);
$email = strtolower($email); 
$password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);


// Vérification des données (exemple)
if (empty($pseudo) ||empty($nom) || empty($prenom) || empty($email)|| empty($password)) {

    $_SESSION['msg_sign']='remplisser tous les champs';
    header('Location: http://localhost/mairie/controller/signin.php');
    die();
}else{
        // Insertion de l'utilisateur dans la base de données
    $sql = "INSERT INTO utilisateurs (pseudo, nom, prenom, email, password) 
    VALUES (:pseudo, :nom, :prenom, :email, :password)";
    $query = $bdd->prepare($sql);
    $query->execute([
    'pseudo' => $pseudo,
    'nom' => $nom,
    'prenom' => $prenom,
    'email' => $email,
    'password' => $password
    ]);

    //declaration des variable de session
    
    $_SESSION['pseudo']= $pseudo;
    $_SESSION['nom_utilisateur']= $nom;
    $_SESSION['prenom_utilisateur']=$prenom ;
    $_SESSION['email']=$email;  
    
     // On regarde si l'utilisateur est inscrit dans la table utilisateurs
     $check = $bdd->prepare('SELECT *  FROM utilisateurs WHERE email = ?');
     $check->execute(array($email));
     $data = $check->fetch();
     $row = $check->rowCount();
     $_SESSION['id_user'] = $data['id_user'];
     
    header('Location: http://localhost/mairie/index.php');
    exit();
}




// Message de confirmation
echo 'Merci pour votre inscription, ' . $prenom . ' ' . $nom . ' !';
?>
