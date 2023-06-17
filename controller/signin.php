<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inscription</title>
    
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="form.css">
</head>
<body>
<?php   
        require_once 'db.php';
        include '../header.php';
    ?>
    
    <div class="container">

        <form method="post" action="action_signin.php">
            <input type="text" name="pseudo" id="pseudo" placeholder="pseudo">  

            <input type="text" name="last_name" id="last_name" placeholder="Nom">

            <input type="text" name="first_name" id="first_name" placeholder="Prenoms">

            <input type="email" name="email" id="email" placeholder="email">
            
            <input type="password" name="password" id="password" placeholder="Mot de passe">

            <input type="submit" value="Envoyer">

            <a href="connexion.php">Se connecter.....</a>

            <?php  

                if(!empty($_SESSION['msg_sign'])){
                    ?> <h3> <?php echo $_SESSION['msg_sign']; ?></h3><?php
                }

            ?>
        </form>

    </div>

    <p>
       
    </p>

</body>
</html>