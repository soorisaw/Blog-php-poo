    
<div class= "modalProfil">

    <?= $updateProfil[0] ;?>
        <?= $updateProfil[1] ;?>
        <?= $updateProfil[2] ;?>
        <?= $updateProfil[3] ;?>
    <?= $updateProfil[4] ;?>

    <?="<h1 class='d-inline mr-5 mb-5'>".$_SESSION['user']->getPseudo()."</h1>"."<img src=". AVATARS .$_SESSION['user']->getAvatar().">"."<br>". $_SESSION['user']->getLastname()." ".$_SESSION['user']->getFirstname(). "<br>".$_SESSION['user']->getBirthday(); ?>
   
    <?= $updateProfil[5] ;?>
        <div class="input-group mb-2">
            <?= $updateProfil[6] ;?>
        </div>
        <div class="input-group mb-2">
           <?= $updateProfil[7] ;?>
        </div>

        <div class="input-group mb-2">
           <?= $updateProfil[8] ;?>
        </div>

        <div class="text-center">
           <?= $updateProfil[9] ;?>
        </div>
        <p>création profil :  <?= $_SESSION['user']->getDateCreated();?></p>
   <?= $updateProfil[10] ;?>

    <?= $updateProfil[11] ;?>
        <div>
            <?= $updateProfil[12] ;?>
            <?= $updateProfil[13] ;?>
        </div>
    <?= $updateProfil[14] ;?>

</div>