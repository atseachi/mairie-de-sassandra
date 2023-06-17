<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tourisme à Sassandra</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        include 'header.php';
    ?>
   
    <!-- acceuil section -->
    <section id="home">
        
        <h4>Visiter Sassandra</h4>
        
        <!--     -->
       
    </section>

    <!-- A propos section -->
    <section id="presentation">
        <h1 class="title">Présentation</h1>
        <div class="img-desc">
           <!-- <div class="left"> -->
                <!-- <video src="images/video.mp4" autoplay loop></video> -->
                <iframe class="left" width="560" height="315" src="https://www.youtube.com/embed/WoaLsPljc60" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
           <!-- </div> -->
            <div class="right">
                <h3>Découvrez notre culture, notre hospitalité et nos vestiges .</h3>
                <p>présentation des attraits touristiques, des activités culturelles et des événements locaux.</p>
                <a href="#">Lire Plus</a>
            </div>
        </div>
        
    </section>
    <section class="emplacement">
        <h2 class="title">Emplacement de Sassandra</h2>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31799.51292434548!2d-6.106124147008997!3d4.9497810758913525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xf95f49e208129e1%3A0x3bde718929d43d32!2sSassandra!5e0!3m2!1sfr!2sci!4v1680866494499!5m2!1sfr!2sci" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>

    <!-- section tout savoir -->
    <section id="savoir">
        <h1 class="title">Tous savoir sur Sassandra</h1>
        <div class="content">
            <!-- box -->
            <div class="box">
                <img src="http://localhost/mairie/images/car_voyage.jpg" alt="">
                <div class="content">
                    <div>
                        <h4>Informations pratiques</h4>
                        <p> pour les visiteurs :</p>
                        <p> comment se rendre à Sassandra, où se loger, où manger, où acheter des souvenirs.</p>
                        <a href="http://localhost/mairie/information_sassandra.php">Lire Plus</a>
                    </div>
                </div>
            </div>
            <!-- box -->
            <!-- box -->
            <div class="box">
                <img src="images/histoire.jpg" alt="">
                <div class="content">
                    <div>
                        <h4>Histoire et patrimoine de Sassandra</h4>
                        <p>avec des descriptions de bâtiments historiques, </p>
                        <p>de monuments et de sites naturels importants.</p>
                        <a href="http://localhost/mairie/histoire.php#histoire">Lire Plus</a>
                    </div>
                </div>
            </div>
            <!-- box -->
            <!-- box -->
            <div class="box">
                <img src="images/culture.jpg" alt="">
                <div class="content">
                    <div>
                        <h4>Manifestations culturelles et artistiques organisées à Sassandra</h4>
                        <p>notamment des festivals de musique, </p>
                        <p>de danse, de théâtre, etc.</p>
                        <a href="http://localhost/mairie/histoire.php#histoire">Lire Plus</a>
                    </div>
                </div>
            </div>
            <!-- box -->
             <!-- box -->
             <div class="box">
                <img src="images/losirs1.jpg" alt="">
                <div class="content">
                    <div>
                        <h4>Activités et loisirs que vous pouvez pratiquer</h4>
                        <p>comme la baignade, la pêche, </p>
                        <p>la randonnée, etc.</p>
                        <a href="http://localhost/mairie/histoire.php#loisir">Lire Plus</a>
                    </div>
                </div>
            </div>
             <!-- box -->
             <!-- box -->
            <div class="box">
                <img src="images/cuisine.jpg" alt="">
                <div class="content">
                    <div>
                        <h4>Gastronomie</h4>
                        <p>Descriptions des produits locaux, de la gastronomie </p>
                        <p>et des spécialités culinaires de Sassandra et des environs.</p>
                        <a href="http://localhost/mairie/histoire.php">Lire Plus</a>
                    </div>
                </div>
            </div>
            <!-- box -->
             <!-- box -->
             <div class="box">
                <img src="images/developpement.jpg" alt="">
                <div class="content">
                    <div>
                        <h4>projets de développement et les initiatives locales</h4>
                        <p>notamment en matière d'environnement, d'agriculture, </p>
                        <p>de commerce, etc.</p>
                        <a href="http://localhost/mairie/dev_sassandra.php#dev">Lire Plus</a>
                    </div>
                </div>
            </div>
            <!-- box -->
        </div>
    </section>

    <!--  contact section -->
    <!-- <section id="contact">
        <h1 class="title">Contact</h1>
        <form action="">
            <div class="left-right">
                <div class="left">
                    <label>Nom Complet</label>
                    <input type="text">
                    <label>Objet</label>
                    <input type="text">
                    <label>Email</label>
                    <input type="text">
                    <label>Message</label>
                    <textarea name="" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="right">
                    <label>Numéro</label>
                    <input type="text">
                    <label>Date</label>
                    <input type="text">
                    <label>Autres Details</label>
                    <input type="text">
                    
                </div>
            </div>
            <button>Envoyer</button>
        </form>
    </section> -->

   


    <!--                            footer                                -->
    
    <?php include 'footer.php'; ?>

</body>
</html>   