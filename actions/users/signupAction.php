<?php

require('actions/database.php');
// validation du formulaire
if(isset($_POST['validate']))
{

 // on verifie que l'utilisateur a bien rempli toutes les informations du formulaire d'inscription
 
    if(!empty($_POST['pseudo'])  AND !empty($_POST['lastname']) AND !empty($_POST['firstname'] AND !empty($_POST['password'])))
    {
        //les données de l'utilisateur
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_lastname = htmlspecialchars($_POST['lastname']);
        $user_firstname = htmlspecialchars($_POST['firstname']);
        $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        if(isset($_FILES['image_auteur']) AND $_FILES['image_auteur']['error']==0)
        {
                // testons si le fichier n'est pas trop gros
                if($_FILES['image_auteur']['size']<=1000000)  
                {
                    //testons si l'extension est autoriser
                    $infosfichier=pathinfo($_FILES['image_auteur']['name']);
    
                    $extension_upload=$infosfichier['extension'];
                    $extension_autorisees=array('jpg','JPG','jpeg','JPEG','gif','GIF','png','jfif','PNG','php','PHP','html','HTML','rar','RAR','xlsx','XLSX');
                    if(in_array($extension_upload,$extension_autorisees))
                    {
                        //on peut valider le fichier et le stocker definitivement
                        $user_image_auteur='upload/'.md5(uniqid(rand(),true)).'.'.$extension_upload;
                        move_uploaded_file($_FILES['image_auteur']['tmp_name'],$user_image_auteur);
                        
                        //move_uploaded_file($_FILES['image_auteur'][tmp_name],'uploads/'.basename($_FILES['image_auteur'] ['name']));
                        //connexion a la base de donnee
                    }
                } 
        } 
         
        //verifier si l'utilisateur existe déjé dans la base de donnee
        $checkIfUserAlreadyExists = $bdd->prepare('SELECT pseudo FROM users WHERE pseudo = ?');
        $checkIfUserAlreadyExists->execute(array($user_pseudo));
        
        if($checkIfUserAlreadyExists->rowCount()==0)
            {
                //inserer l'utilisateur dans la base de donnee
              
                $insertUserOnWebsite = $bdd->prepare('INSERT INTO users(pseudo, nom,prenom,mdp,image_auteur)VALUES(?,?,?,?,?)');
                $insertUserOnWebsite->execute(array($user_pseudo, $user_lastname, $user_firstname, $user_password, $user_image_auteur));
                
                //Récuperer les informations de l'utilisateur
                $getInfosOfThisUserReq = $bdd->prepare('SELECT id, pseudo, nom, prenom, image_auteur FROM users WHERE nom=? AND prenom= ? AND pseudo=? AND image_auteur=?');
                $getInfosOfThisUserReq->execute(array( $user_lastname, $user_firstname,$user_pseudo,$user_image_auteur));
                
                $usersInfos = $getInfosOfThisUserReq->fetch();
                //Authentifier l'utilisateur sur le site et récuperer c'est informations
                $_SESSION['auth'] = true;
                $_SESSION['id'] = $usersInfos['id'];
                $_SESSION['lastname'] = $usersInfos['nom'];
                $_SESSION['firstname'] = $usersInfos['prenom'];
                $_SESSION['pseudo'] = $usersInfos['pseudo'];
                $_SESSION['image_auteur'] = $usersInfos['image_auteur'];

                header('Location:centre.php');
                
            }
        else{
            $errorMsg = "L'utilisateur existe déja ";
        }
    }

    else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }
}
