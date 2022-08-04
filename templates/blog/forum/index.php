<?php 
    $headTitle = 'WebSmartSolution | forum';
    $descriptionMeta = 'Créer son site web, créer son site e-commerce, un blog wordpress, amélioré son référencement sur les moteurs de recherche. L\'agence web smart solution, vous accompagne dans la réalisation de votre projet numérique.';
    $scriptJs = "/js/newpost.js";

?>

<main class="body-forum">
    
    <button id="myBtnBis" type="submit">Nouveau sujet</button>

    <div id="myModalBis" class="modal">
        <button class="closeBis modalForm__close">Retour</button>
        <div class="modalForm">
            <?php include MODALS . 'modalNewTopic.php' ?>
        </div>
    </div>

    <div class="card">
        <div class="card-header text-center display-4">
            Forum
        </div>
        <ul class="text-center list-group ">

        <?php foreach($posts as $topic) { ?>

        <li class='list-group-item'>
            <?= "<a href=/forum/fulltopic/".$topic->getTopicId().">".$topic->getTitleTopic()."</a>"." ".$topic->getDateCreation()."<br>";?>
        </li>

        <?php } ?>

        </ul>
    </div>

</main>