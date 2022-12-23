<?php
require_once('actions/database.php');

//validez le formulaire
if(isset($_POST['validate'])){
    

     // testons si le fichier n'est pas trop gros
     
    //verifier si les champs ne sont pas vides
    if(!empty($_POST['content'])){
        
        //Insérer la question sur le questionnaire
        $article_content = nl2br(htmlspecialchars($_POST['content']));         
        $article_date = date('d/m/y');
        $article_id_author = $_SESSION['id'];
        $article_speudo_author = $_SESSION['pseudo'];
        $article_image_author = $_SESSION['image_auteur'];
        if(isset($_FILES['image']) AND $_FILES['image']['error']==0)
    {
            // testons si le fichier n'est pas trop gros
            if($_FILES['image']['size']<=1000000)  
            {
                //testons si l'extension est autoriser
                $infosfichier=pathinfo($_FILES['image']['name']);

                $extension_upload=$infosfichier['extension'];
                $extension_autorisees=array('jpg','JPG','jpeg','JPEG','gif','jfif','GIF','png','PNG','php','PHP','html','HTML','rar','RAR','xlsx','XLSX');
                if(in_array($extension_upload,$extension_autorisees))
                {
                    //on peut valider le fichier et le stocker definitivement
                    $article_image='uploads/'.md5(uniqid(rand(),true)).'.'.$extension_upload;
                    move_uploaded_file($_FILES['image']['tmp_name'],$article_image);
                    
                    //move_uploaded_file($_FILES['image'][tmp_name],'uploads/'.basename($_FILES['image'] ['name']));
                    //connexion a la base de donnee
                }
            } 
    } 
    
        $inserArticleWebsite = $bdd->prepare('INSERT INTO article(contenu,image,id_auteur,pseudo_auteur,image_auteur,date_publication) VALUES (?,?,?, ?,?,?)');
        $inserArticleWebsite->execute(array
                                        (
                                        $article_content, 
                                        $article_image,
                                        $article_id_author,
                                        $article_speudo_author,
                                        $article_image_author,
                                        $article_date));

                $successMsg="Votre article a bien été publié";

    }else{
        $errorMsg="Veuillez compléter tous les champs...";
    }
}

?>