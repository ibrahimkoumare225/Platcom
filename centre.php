<?php
   session_start();
    require('actions/article/showAllArticle.php');
   
   

?>
    <!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Platcom</title>
                <link  href="https://fonts.googleapis.com/css?family=Roboto:400,700"rel="stylesheet">
                <link rel="stylesheet" href="assets/app.css">
            </head>
        <body>
    <header class="topbar">
        <a href="#"class="topbar-logo">Platcom</a>
        <nav class="topbar-nav">
            <a href="centre.php">Accueil</a>
            <a href="index.php" class="active">Forum</a>
            <a href="#">Autres outils de communication</a>
            <a href="actions/users/logoutAction.php">Déconnexion</a>
        </nav>
    </header>
    <div class="container site">
        <nav class="sidebar">
            <a href="centre.php" class="sidebar-home active">Fil d'actualité</a>
            <a href="index.php" class="sidebar-messages">Forum</a>
            <a href="#" class="sidebar-events">Visioconférence</a>
            <a href="articleAnnonce.php" class="sidebar-group">Editer</a>
        </nav>
      
            <main class="main">
            <?php
             while($article = $getAllarticle->fetch()){
                ?>
            <article class="card">
                <header class="card-header card-header-avatar">
                            <img src="<?= $article['image_auteur']; ?>" width="45" height="45" class="card-avatar">
                            <div class="card-auteur"><?= $article['pseudo_auteur']; ?></div>
                            <div class="card-date"><?= $article['date_publication']; ?></div>
                </header>
                <div class="card-body">
                        <p>
                            <img src="<?= $article['image']; ?>" class="fullwidth">
                        </p>
                        <p>
                            <?=  $article['contenu']; ?>
                        </p>
                </div>
                </article>
                <?php
            }
        ?>
       
            </main> 
            <br>
          
    </div>
    </body>
    </html> 