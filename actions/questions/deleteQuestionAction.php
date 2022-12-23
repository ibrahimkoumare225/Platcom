<?php
    session_start();
    if(isset($_SESSION['auth'])){
        header('Location:../../login.php');
    }
    require('../database.php');

    //Vérifier si la question existe
    if(isset($_GET['id']) AND !empty($_GET['id'])){
        $idOfTheQuestion = $_GET['id'];

        $checkIfQuestionExists = $bdd->prepare('SELECT * FROM questions WHERE id = ?');
        $checkIfQuestionExists->execute(array($idOfTheQuestion));

            if($checkIfQuestionExists->rowCount()>0){

                //Récupérer les infos de la questions
                    $usersInfos = $checkIfQuestionExists->fetch();
                    if($questionsInfos['id_auteur']==$_SESSION['id']){

                        //supprimer la question en fontion de son id rentré en paramètre
                        $deleThisQuestion = $bdd->prepare('DELETE FROM questions WHERE id = ?');
                        $deleThisQuestion->execute(array($idOfTheQuestion));
                        
                        //Rediriger l'utilisateur vers ses questions
                        header('Location:../../my-questions.php');
                    }else{
                        echo "Vous n'avez pas le droit de supprimer une question qui ne vous appartient pas";
                    }
            }else{
                echo "Aucune question ,'a été trouvée";
            }
    }else{
        echo "Aucune question n' été trouvée";
    }



?>