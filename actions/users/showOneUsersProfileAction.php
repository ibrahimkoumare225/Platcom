<?php

    require('actions/database.php');
    //Récupérer l'identifiant de l'utilisateur
    if(isset($_GET['id']) AND !empty($_GET['id'])){

        //L'id de l'utilisateur
        $idOfUser = $_GET['id'];

        //Vérifier si l'utilisateur existe
        $checkIfUserExists = $bdd->prepare('SELECT * FROM users WHERE id = ?');
        $checkIfUserExists ->execute(array($idOfUser));
        
        if($checkIfUserExists->rowCount()>0){

             //Récupérer toutes les dpnnées de l'utilisateur
            $usersInfos = $checkIfUserExists->fetch();

            $user_pseudo = $usersInfos['pseudo'];
            $user_lastname = $usersInfos['nom'];
            $user_firstname = $usersInfos['prenom'];
            $user_image_auteur = $usersInfos['image_auteur'];

            $getHisQuestions = $bdd->prepare('SELECT * FROM questions WHERE id_auteur = ? ORDER BY id DESC');
            $getHisQuestions->execute(array($idOfUser));
        }else{
            $errorMsg = "Aucun utilisateur trouvée";
        }
    }else{
        $errorMsg = "Aucun utilisateur trouvée";
    }
?>