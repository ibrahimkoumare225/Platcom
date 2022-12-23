<?php
    require('actions/database.php');

    //Récupérer la question par défaut sans la recherche
    $getAllQuestions = $bdd->query('SELECT id, id_auteur, titre, description, pseudo_auteur, date_publication FROM questions ORDER BY id DESC LIMIT 0,5');
    
    //Vérifier si une recherche a été rentré par l'utilisateur
    if(isset($_GET['search']) AND !empty($_GET['search'])){

        //La recherche
        $userSearch = $_GET['search'];

        //Récupérer toutes les questions qui correspondent a la recherche (en fontion de la recherche)
        $getAllQuestions = $bdd->query('SELECT id, id_auteur, titre, description, pseudo_auteur, date_publication FROM questions WHERE titre LIKE "%'.$userSearch.'%" ORDER BY id DESC');
    }
?>