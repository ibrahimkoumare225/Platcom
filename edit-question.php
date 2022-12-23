<?php
    include('actions/users/securityAction.php');
    include('actions/questions/getInfosOfEditedQuestionAction.php');
    include('actions/questions/editQuestionAction.php');
    
?>
<!DOCTYPE html>
<html lang="en">
    <?php include('includes/head.php')?>
<body>

    <?php include('includes/navbar.php')?>
    
    <br><br>
    <div class="container">
        <?php if(isset($errorMsg))
         { echo '<p>'.$errorMsg.'</p>';}
        ?>
        <?php
            if(isset($questions_content)){
                ?>
                <form  method="POST">

    
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Titre de la question</label>
                    <input type="text" class="form-control" name="title" value="<?= $questions_title; ?>">
            
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Description</label>
                    <textarea class="form-control" name="description"><?= $questions_description; ?></textarea>
                </div>
            
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Contenu de la question</label>
                    <textarea class="form-control" name="content"><?= $questions_content; ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="validate">Modifier la question</button>
                <br><br>
                
            </form>
            <?php
            }
        ?>
       
    </div>
    
</body>
</html>