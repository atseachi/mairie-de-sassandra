
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost/mairie/style.css">
    <link rel="stylesheet" href="http://localhost/mairie/controller/form.css">
</head>
<body>
<?php
        require_once 'db.php';
        include '../header.php';
    ?>
    
    <div class="container">
        <form method="post" action="action_connexion.php">

            <!-- <input type="text" name="last_name" id="last_name" placeholder="Nom">
            <input type="text" name="first_name" id="first_name" placeholder="Prenoms"> -->
            <input type="email" name="email" id="email" placeholder="email">
            <input type="password" name="password" id="password" placeholder="Mot de passe">

            <input type="submit" value="Envoyer">

            <a href="signin.php">S'inscrire.....</a>

            <?php  

                if(!empty($_SESSION['msg_conn'])){
                    ?> <h3> <?php echo $_SESSION['msg_conn'] ?></h3><?php
                }

            ?>
            
        </form>

        <p>
           
        </p>
    </div>

</body>
</html>