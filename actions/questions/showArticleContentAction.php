<?php

    require('actions/database.php');
    
    //Vérifier  si l'id de la question est rentré dans l'url
    if(isset($_GET['id']) AND !empty($_GET['id'])){
        
        //Récupérer l'identifiant de la question
        $idOfTheQuestion = $_GET['id'];

        //Vérifier si la question existe
        $checkIfQuestionExists = $bdd->prepare('SELECT * FROM questions WHERE id = ?');
        $checkIfQuestionExists ->execute(array($idOfTheQuestion));

        if($checkIfQuestionExists->rowCount()>0){
           
           //Récupérer toutes les dates de la question
            $questionInfos = $checkIfQuestionExists->fetch();

            //stocker les dates de la questions dans des variables propres
            $question_title = $questionInfos['titre'];
            $question_content = $questionInfos['contenu'];
            $question_id_author = $questionInfos['id_auteur'];
            $question_pseudo_author = $questionInfos['pseudo_auteur'];
            $question_publication_date = $questionInfos['date_publication'];
        
        }else{
            echo "Aucune question n'a été trouvée";
        }

    }else{
        $errorMsg = "Aucune question n'a été trouvée";
    }


?>