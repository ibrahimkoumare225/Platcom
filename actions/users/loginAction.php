<?php
session_start();
require('actions/database.php');
// validation du formulaire
if(isset($_POST['validate']))
{

 // on verifie que l'utilisateur a bien rempli toutes les informations du formulaire d'inscription
 
    if(!empty($_POST['pseudo'])  AND   !empty($_POST['password']))
    {
        //les données de l'utilisateur
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_password = htmlspecialchars($_POST['password']);  
           
        //verifie si l'utilisateursb existe
        $checkIfUserExists = $bdd->prepare('SELECT * FROM users WHERE pseudo = ?');
        $checkIfUserExists->execute(array($user_pseudo));

        if($checkIfUserExists->rowCount()>0){
               
            //Récuperer les donnée de l'utilisateur
                $usersInfos = $checkIfUserExists->fetch();

                //verifier si le mot de passe est correcte
            if(password_verify($user_password,$usersInfos['mdp'])){
                 //Authentifier l'utilisateur sur le site et récuperer c'est informations
                 $_SESSION['auth'] = true;
                 $_SESSION['id'] = $usersInfos['id'];
                 $_SESSION['lastname'] = $usersInfos['nom'];
                 $_SESSION['firstname'] = $usersInfos['prenom'];
                 $_SESSION['pseudo'] = $usersInfos['pseudo'];
                 $_SESSION['image_auteur'] = $usersInfos['image_auteur'];

                 //redirection sur la page d'accueil
                 header('Location:centre.php');
            }else{
                $errorMsg = "votre mot de passe est incorrect...";
            }
        }else{
            $errorMsg = "votre speudo est incorrect...";
        }
    }
    else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }
}
