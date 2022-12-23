<?php 
    require('actions/questions/showArticleContentAction.php');
    require('actions/questions/publishAnswersAction.php');
    require('actions/questions/showAllAnswersOfQuestionAction.php');
 ?>

<!DOCTYPE html>
    <html lang="en">
            <?php include('includes/head.php');?>
        <body>
            <?php include('includes/navbar.php');?>
            <br><br>

            <div class="container">

                <?php
                    if(isset($errorMsg)){echo $errorMsg;}
                    if(isset($question_publication_date)){
                        ?>
                            <section class="show-content">
                            <h3><?= $question_title ;?></h3> 
                                <hr>
                                <p><?= $question_content; ?></p>
                                <hr>
                                <small><?= '<a href="profile.php?id='.$question_id_author.'">'.$question_pseudo_author.'</a> '. $question_publication_date ;?></small>
                            </section>
                            <br>
                            <section class="show-answers">
                                <form class="form-group" method="POST">
                                    <div class="nb-3">
                                        <label>Réponse</label>
                                        <textarea name="answer" class="form-control"></textarea>
                                        <br>
                                        <button class="btn btn-primary"name="valider" typpe="subimt">Répondre</button>
                                    </div>
                                    <br>
                                </form>
                                <?php
                                    while($answer = $getAllAnswersQuestion->fetch()){
                                        ?>
                                            <div class="card">
                                                <div class="card-header">
                                                 <a href="profile.php?id=<?= $answer['id_auteur']; ?>"><?= $answer['pseudo_auteur']; ?></a> 
                                                </div>
                                                <div class="card-body">
                                                    <?= $answer['contenu']; ?>
                                                </div>
                                            </div>
                                        <?php
                                    }
                                ?>
                            </section>
                       <?php
                    }
                ?>
               
            </div>
        </body>
    </html>