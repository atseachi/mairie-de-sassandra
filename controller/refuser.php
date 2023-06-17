<?php

require_once 'db.php';

if(isset($_GET['num_demande'])){
    $num_demande = $_GET['num_demande'];
   

    // Exécution de la requête de suppression
    $query = "DELETE FROM demande WHERE num_demande = :num_demande";
    $stmt = $bdd->prepare($query);
    $stmt->bindParam(':num_demande', $num_demande); 

    if ($stmt->execute()) {
        // La demande a été supprimée avec succès
       
        $_SESSION['message']='La demande a été supprimée avec succès !';
    } else {
        // Une erreur s'est produite lors de la suppression de la demande
        
        $_SESSION['message']='Une erreur s\'est produite lors de la suppression de la demande !';
    }
    
   
}

header('Location: http://localhost/mairie/controller/admin.php');
?>
