<?php 
    require_once 'db.php'; // On inclut la connexion à la base de données

    if(!empty($_POST['email']) && !empty($_POST['password'])) // Si il existe les champs email, password et qu'il sont pas vident
    {
        // Patch XSS
        $email = htmlspecialchars($_POST['email']); 
        $password = htmlspecialchars($_POST['password']);
        
        $email = strtolower($email); // email transformé en minuscule
        
        // On regarde si l'utilisateur est inscrit dans la table utilisateurs
        $check = $bdd->prepare('SELECT *  FROM utilisateurs WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();
        
        

        // Si > à 0 alors l'utilisateur existe
        if($row > 0)
        {
            // Si le mail est bon niveau format
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                // Si le mot de passe est le bon
                if(password_verify($password, $data['password']))
                {
                    // On créer la session et on redirige sur landing.php

                    $_SESSION['id_user'] = $data['id_user'];
                    $_SESSION['nom_utilisateur'] = $data['nom'];
                    $_SESSION['prenom_utilisateur'] = $data['prenom'];
                    $_SESSION['pseudo'] = $data['pseudo'];
                    $_SESSION['email'] = $data['email'];
                   if($data['isadmin']==1){
                    header('Location: admin.php');
                    die();
                   }else{
                    
                    $_SESSION['msg_conn']='connection effectuer';
                    header('Location: http://localhost/mairie/index.php');
                    die();

                   }
                }else{  $_SESSION['msg_conn']='mot de passe incorrecte';header('Location:  http://localhost/mairie/controller/connexion.php');  die(); }
            }else{ $_SESSION['msg_conn']='email incorrecte ou n\'existe pas';header('Location:  http://localhost/mairie/controller/connexion.php');  die(); }
        }else{ $_SESSION['msg_conn']='email incorrecte ou n\'existe pas';header('Location:  http://localhost/mairie/controller/connexion.php');  die(); }
    }else{
         $_SESSION['msg_conn']='remplisser tous les champs'; 
         header('Location:  http://localhost/mairie/controller/connexion.php'); 
         die();} // si le formulaire est envoyé sans aucune données

