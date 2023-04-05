<?php
require_once('actions/database.php');

//validez le formulaire
if(isset($_POST['validate'])){
    
    //verifier si les champs ne sont pas vides
    if(!empty($_POST['title']) AND !empty($_POST['description']) AND !empty($_POST['content'])){
        
        //Insérer la question sur le questionnaire
        $question_title = htmlspecialchars($_POST['title']);
        $question_description = nl2br(htmlspecialchars($_POST['description'])); 
        $question_content = nl2br(htmlspecialchars($_POST['content'])); 
        $question_date = date('d/m/y');
        $question_id_author = $_SESSION['id'];
        $question_speudo_author = $_SESSION['pseudo'];

        $inserQuestionWebsite = $bdd->prepare('INSERT INTO questions(titre, description,contenu, id_auteur,pseudo_auteur,date_publication) VALUES (?,?, ?,?,?,?)');
        $inserQuestionWebsite->execute(array
                                        ($question_title,
                                        $question_description, 
                                        $question_content,
                                        $question_id_author,
                                        $question_speudo_author,
                                         $question_date));

                $successMsg="Votre mesage a bien été publié";

    }else{
        $errorMsg="Veuillez compléter tous les champs...";
    }
}

?>