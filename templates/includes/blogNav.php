<?php 
/*$formRegister = new Form();
$formRegister->registerForm();
$registerForm = $formRegister->create();
$registration = explode("*",$registerForm);

$formLogin = new Form();
$formLogin->loginForm();
$loginForm = $formLogin->create();
$connexion = explode("*",$loginForm);

$formLogout = new Form();
$formLogout->logoutForm();
$logoutForm = $formLogout->create();
$deconnexion = explode("*",$logoutForm);

$formUpdateProfil = new Form();
$formUpdateProfil->updateProfilForm();
$profilForm = $formUpdateProfil->create();
$updateProfil = explode("*",$profilForm);*/



if(isset($_SESSION['user']))
{?>
			<!---------------------------CONNECTED NAV----------------------------------->
        <header>
            <div class="container-fluid">
                <div class="row">
                    <nav class="col navbar navbar-expand-sm navbar-light">

                        <a href="/home" class="navbar-brand">LOGO</a>

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target='#navbarContent'>
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div id="navbarContent" class="collapse navbar-collapse">
                            <ul class="navbar-nav flex-column flex-sm-row ml-auto ">

                                <li class="nav-item">
                                    <a href="/blog" class="nav-link">Accueil</a>
                                </li>

                                <li class="nav-item">
                                    <a href="/article" class="nav-link">Articles</a>
                                </li>

                                <li class="nav-item">
                                    <a href="/forum" class="nav-link">Forum</a>
                                </li>
                            </ul>
 
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item my-auto">
                                    <a class="nav-link waves-effect waves-light">  </a>
                                </li>
                                
                                <li class="nav-item avatar dropdown ">
                                    <a class="nav-link dropdown-toggle d-inline" id="navbarDropdownMenuLink-saju" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src=" <?= AVATARS . $_SESSION['user']->getAvatar() ;?> " class="rounded-circle z-depth-0" alt="avatar image" >
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-lg-right dropdown" aria-labelledby="navbarDropdownMenuLink-saju">
                                        <a id="myBtn" class="dropdown-item" href="#myModal">Profil</a>

                                        <div id="myModal" class="modal">
                                            <button class="close modalForm__close">Retour</button>
                                            <div class="modalForm">
                                               <?php include MODALS . 'modalProfil.php' ?>
                                            </div>
                                        </div>

                                        <a class="dropdown-item" href="index.php?action=chat">Messagerie</a>
        
                                        <?= $deconnexion[0] ;?>
                                            <div>
                                                <?= $deconnexion[1] ;?>
                                                <?= $deconnexion[2] ;?>
                                            </div>
                                        <?= $deconnexion[3] ;?>
                                    </div>
                                </li>
                            </ul>

                        </div>
                    </nav>
                </div>
            </div>
        </header>

<?php
 if( isset($_SESSION['user']) && !empty($_SESSION['user']))
        {
            $userRole = $_SESSION['user']->getRole();

            if( $userRole === 'ADMIN')
            {
                include (INCLUDES . 'adminZone.php');
            }
        }
}
else
{?>

<!---------------------------DEFAULT NAV----------------------------------->

        <header>
            <div class="container-fluid">
                <div class="row">
                    <nav class="col navbar navbar-expand-md navbar-light px-4 py-2">

                        <a href="/home" class="navbar-brand">LOGO</a>

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target='#navbarContent'>
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div id="navbarContent" class="collapse navbar-collapse">
                            <ul class="navbar-nav flex-column flex-md-row ml-auto ">

                                <li class="nav-item">
                                    <a href="/blog" class="nav-link">Accueil</a>
                                </li>

                                <li class="nav-item">
                                    <a href="/article" class="nav-link">Articles</a>
                                </li>

                                <li class="nav-item">
                                    <a href="/forum" class="nav-link">Forum</a>
                                </li>

                                <li class="nav-item js-list">
                                    <button type="button" id="dropdownLogin" data-toggle="dropdown" class="btn btn-outline-secondary dropdown-toggle">Login</button>
                                    <div class="dropdown-menu dropdown-menu-right pl-2">
                                        <?= $connexion[0] ;?>
                                            <div class="form-group">
                                                <?= $connexion[1] ;?>
                                                <?= $connexion[2] ;?>
                                            </div>
                                            <div class="form-group">
                                                <?= $connexion[3] ;?>
                                                <?= $connexion[4] ;?>
                                            </div>
                                            <div class="form-group">
                                               <?= $connexion[5] ;?>
                                            </div>
                                       <?= $connexion[6] ;?>

                                        <div class="dropdown-divider"></div>

                                        <a class="dropdown-item" href="#">Mot de passe oublié ?</a>
                                        <a id="myBtn" class="dropdown-item modal-open" href="#myModal">S'inscrire</a>
                                        
                                        <div id="myModal" class="modal">
                                            <button class="close modalForm__close" data-dismiss="modal">Retour</button>
                                            <div class="modalBox">
                                                <?= include MODALS . 'modalRegister.php' ?>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
<?php } ?>