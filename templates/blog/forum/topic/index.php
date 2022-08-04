 <?php 
    $headTitle = 'WebSmartSolution|Topic';
    $descriptionMeta = 'description du site';
    $scriptJs = "/js/newpost.js";
?>
 
 
 
 <main class="body-topic">

        <button id="myBtnBis" type="submit">Nouveau message</button>

        <div id="myModalBis" class="modal">
            <button class="closeBis modalForm__close">Retour</button>
            <div class="modalForm">
                <?php include MODALS . 'modalNewComment.php' ?>
            </div>
        </div>

       <div class="card">
            <div class="card-header text-center display-4">
                <?= $topic->getTitleTopic(); ?>
            </div>
            <ul class="text-center list-group ">

                <?php foreach($posts as $comment) { ?>
                <ul class="">
                
                    <li class='d-flex justify-content-between list-group-item'>

                        <blockquote class="col-2 blockquote">
                            <img src="<?= AVATARS . $comment->getAvatar(); ?>" alt="">
                            <p class=""><?= $comment->getPseudo(); ?></p>
                            <p class="mb-0"><?= $comment->getCommentDate(); ?></p>
                            <footer class="blockquote-footer"><?= $comment->getCommentHour(); ?></footer>
                        </blockquote>
    
                        <p class="col-8"><?= $comment->getCommentTopic(); ?></p>

                    </li>
                </ul>

                <?php } ?>

            </ul>
        </div> 
     



    </main>