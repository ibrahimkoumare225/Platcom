<?php
    require('actions/database.php');
    //Validation du formulaire
    if(isset($_POST['validate'])){

        //vérifier si les champs sont remplis
        if(!empty($_POST['title']) AND !empty($_POST['description']) AND !empty($_POST['content'])){

            //les données a faire passer dans la requette
            $new_question_title = htmlspecialchars($_POST['title']);
            $nex_question_description = nl2br(htmlspecialchars($_POST['description']));
            $new_question_content = nl2br(htmlspecialchars($_POST['contenu']));

            //Modifier les informations de la question qui possède l'id rentré en paramettre
            $editQuestionOnWebsite = $bdd->prepare('UPDATE questions SET titre = ? ,description = ? , contenu = ? WHERE id = ?');
            $editQuestionOnWebsite ->execute(array($new_question_title,$nex_question_description,$new_question_content,$idOfQuestion)); 

           // Redirection vers la page mes questions
            header('Location :my-questions.php');
        }
    }














?>