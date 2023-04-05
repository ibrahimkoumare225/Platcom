<?php
    require('actions/database.php');

    //Récupérer les articles 
    $getAllarticle = $bdd->query('SELECT contenu,image,id_auteur,pseudo_auteur,image_auteur,date_publication FROM article ORDER BY id DESC LIMIT 0,5');
    