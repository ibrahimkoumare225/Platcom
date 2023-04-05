<?php
     require('actions/users/securityAction.php');
    require('actions/article/publisharticle.php');
  
?>
<!DOCTYPE html>
<html lang="en">
<?php include('includes/head.php')?>

<body>
    <?php include('includes/navabarAnnonce.php')?>
    
    <form class="container" method="POST" enctype="multipart/form-data">
        <?php
            if(isset($errorMsg))
                {  echo '</p>'. $errorMsg. '</p>'; }
            elseif(isset($successMsg)){echo '</p>'. $successMsg. '</p>'; }
        ?> 
    
           
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Contenu de l'article</label>
                <textarea class="form-control" name="content"></textarea>
            </div>
        
            <div class="mb-3">
                <input type="file" name="image">
            </div>
            <button type="submit" class="btn btn-primary" name="validate">Publier l'article</button>
            <br><br>
            
        </form>
</body>
</html>
