<?php
/* 
    IMPLEMENTATION DU MVC EN PHP
*/
// Définitions de constantes
define('BASE_DIR','../');
define('PATH_APP','../app/');
define('PATH_CONTROLLERS','../src/Controllers/');
define('PATH_MODELS','../src/Models/');
define('PATH_WSS','../templates/wss/');
define('PATH_BLOG','../templates/blog/');
define('PATH_ADMIN','../templates/admin/');
define('INCLUDES','../templates/includes/');
define('IMG','/assets/img/');
define('MODALS','../templates/includes/modals/');
define('AVATARS','/assets/avatars/');
define('ILLUSTRATIONS','assets/illustrations/');

// Appel de l'autoloader
require PATH_APP . 'Autoloader.php';
session_start();

// On lance notre Routeur
$router = new Router($_SERVER['REQUEST_URI']);
$router->execute();


