<?php
    require('actions/database.php');

    // vérifier sil'id de la question est bien passé dans l'url de la question
    if(isset($_GET['id']) AND !empty($_GET['id'])){
           
        $idOfQuestion = $_GET['id'];

        //verifier si la question existe
            $checkIfQuestionsExists = $bdd->prepare('SELECT * FROM questions WHERE id = ?');
            $checkIfQuestionsExists->execute(array($idOfQuestion));

            if($checkIfQuestionsExists->rowCount() > 0){

                //Récupérer les données de la question
                    $questionsInfos = $checkIfQuestionsExists->fetch();
                    if($questionsInfos['id_auteur'] == $_SESSION['id']){
                        $questions_title = $questionsInfos['titre'];
                        $questions_description = $questionsInfos['description'];
                        $questions_content = $questionsInfos['contenu'];
                        $questions_date = $questionsInfos['date_publication'];

                        $questions_description = str_replace( '<br>','',$questions_description);
                        $questions_content  = str_replace( '<br>','',$questions_content);
                    }
                    else{
                        $errorMsg ="vous n'etes pas l'auteur de cette questions";
                    }
            }else{

                $errorMsg ="Aucune question na été trouvée";
            }
    }else{
        $errorMsg = "Aucune question n'a été trouvée";
    }
?>