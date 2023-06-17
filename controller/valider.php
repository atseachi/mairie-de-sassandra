<?php

require_once 'db.php';

if(isset($_GET['num_demande'])){
    $num_demande = $_GET['num_demande'];
    $id_user = $_GET['id_user'];
    $num_registre = $_GET['num_registre'];
    $type_acte = $_GET['type_acte'];
    $status = $_GET['status'];
    $date_demande = $_GET['date_demande'];

    $_SESSION['num_registre']= $num_registre;
    $_SESSION['id_demandeur']= $id_user;

    if($type_acte=='acte de naissance' ){

        // $query = "SELECT * FROM acte_naissance WHERE num_registre=$num_registre";
        // $stmt = $bdd->query($query);
        // $row = $stmt->fetch(PDO::FETCH_ASSOC);

        header('Location: http://localhost/mairie/doc_pdf/acte_naissance.php');


    }elseif($type_acte=='acte de Décès'){

        header('Location: http://localhost/mairie/doc_pdf/acte_deces.php');

    }else{

        header('Location: http://localhost/mairie/doc_pdf/acte_mariage.php');
    }

   
    
    // Effectuer les opérations nécessaires avec $num_demande
    
    // Redirection vers la page d'administration ou toute autre page appropriée
    // header('Location: admin.php');
    exit();
}
?>
