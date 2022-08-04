<?php 


class UserManager extends Manager {


    public function __construct()
    {
        $this->table = 'users';
    }
//***********************************************METHOD CRUD********************************************************//

    //------------------------------------recordNewUser---------------------------------------------//
    public function recordNewUser()
    {

        //if (!empty($_POST["lastname"]) && !empty($_POST["firstname"]) && !empty($_POST["birthday"]) && !empty($_POST["email"]) && !empty($_POST["pseudo"]) && !empty($_POST["passwrd"]) && !empty($_POST["passwrdBis"]) )
        if(Form::validate($_POST, ['lastname', 'firstname', 'birthday', 'email', 'pseudo', 'passwrd', 'passwrdBis']))
        {   
            $lastname = htmlentities($_POST["lastname"]);
            $firstname = htmlentities($_POST["firstname"]);
            $birthday = htmlentities($_POST["birthday"]);
            $email = htmlentities($_POST["email"]);
            $pseudo = htmlentities($_POST["pseudo"]);
            $passwrd = htmlentities($_POST["passwrd"]);
            $passwrdBis = htmlentities($_POST["passwrdBis"]);

            /*$this->getPdoInstance();
            $reqPseudo = $this->pdoInstance->prepare('SELECT pseudo FROM users WHERE pseudo = :pseudo');
            $reqPseudo-> execute(array(
                "pseudo" => $pseudo
            ));
            $reqMail = $this->pdoInstance->prepare('SELECT email FROM users WHERE email = :email');
            $reqMail-> execute(array(
                "email" => $email
            ));*/
            
            $reqPseudo = $this->executeQuery('SELECT pseudo FROM users WHERE pseudo = :pseudo', ["pseudo" => $pseudo] );
            $reqMail = $this->executeQuery('SELECT email FROM users WHERE email = :email', ["email" => $email] );
            
            if ($userpseudo = $reqPseudo->fetch())
            {
                echo "le pseudo n'est pas disponible";
            }
            if ($userMail = $reqMail->fetch())
            {
                echo "un compte existe déjà ";
            }
            else
            {
                if ($passwrd === $passwrdBis)
                {
                    $passwrd = password_hash($passwrd,PASSWORD_DEFAULT);
                    $this->recordInDb($lastname,$firstname,$birthday,$email,$pseudo,$passwrd);

                    /*$this->getPdoInstance();
                    $req = $this->pdoInstance->prepare('SELECT * FROM users WHERE email = :email');
                    $req-> execute(array(
                        "email" => $email
                    ));*/
                    $req = $this->executeQuery('SELECT * FROM users WHERE email = :email', ["email" => $email] );
                    $dataUser = $req->fetch();

                    $user = new User($dataUser);
                    $_SESSION['user'] = $user;
                    header('Location: /blog');
                    //echo "Vous êtes inscrit";
                }
                else
                {
                    echo "Les passwords ne correspondent pas";
                }
            }
        }
    }
    //---------------------------------------------------------------------------------------------//
    private function recordInDb($lastname,$firstname,$birthday,$email,$pseudo,$passwrd)
    {
        /*$this->getPdoInstance();

        $req = $this->pdoInstance->prepare('INSERT INTO users (lastname, firstname, birthday, email, pseudo, passwrd) VALUE(:lastname, :firstname, :birthday, :email, :pseudo, :passwrd)');
        $req-> execute(array(
            "lastname" => $lastname,
            "firstname" => $firstname,
            "birthday" => $birthday,
            "email" => $email, 
            "pseudo" => $pseudo,
            "passwrd" => $passwrd
        ));*/
        $req = $this->executeQuery('INSERT INTO users (lastname, firstname, birthday, email, pseudo, passwrd) VALUE(:lastname, :firstname, :birthday, :email, :pseudo, :passwrd)', [
            "lastname" => $lastname,
            "firstname" => $firstname,
            "birthday" => $birthday,
            "email" => $email, 
            "pseudo" => $pseudo,
            "passwrd" => $passwrd
        ]);
    }

    //--------------------------------------------Connect User-------------------------------------------------//
    public function connectUser () 
    {

        if (!empty($_POST['emailLog']) && !empty($_POST['passwrdLog']) )
        //if(Form::validate($_POST, ['emailLog', 'passwrdLog']))
        {
            $emailLog = htmlentities($_POST["emailLog"]);
            $passwrdLog = htmlentities($_POST["passwrdLog"]);

            /*$this->getPdoInstance();
            $req = $this->pdoInstance->prepare('SELECT email, passwrd FROM users WHERE email = :email');
            $req-> execute(array(
                "email" => $emailLog
            ));*/

            $req = $this->executeQuery('SELECT email, passwrd FROM users WHERE email = :email', ["email" => $emailLog ] );

            if ($userData = $req->fetch())
            {
                if (password_verify($passwrdLog, $userData['passwrd']))
                {
                   /* $this->getPdoInstance();
                    $req = $this->pdoInstance->prepare('SELECT * FROM users WHERE email = :email');
                    $req-> execute(array(
                        "email" => $emailLog
                    ));*/
                    
                    $req = $this->executeQuery('SELECT * FROM users WHERE email = :email', ["email" => $emailLog] );
                    $dataUser = $req->fetch();

                    $user = new User($dataUser);
                    $_SESSION['user'] = $user;

                    //return $user;     
                    //echo  "password checked \n";
                }
                else
                {
                
                    //echo  "password error";
                }

                //echo  "user ok";
            }
            else
            {
                //echo   "Email error";
            }
        }        
    }

    //--------------------------------------------disconnect User-------------------------------------------------//
    public function disconnectUser()
    { 
        if (isset($_POST['disconnect']))
        //if(Form::validate($_POST, ['disconnect']))
        {
            unset($_SESSION['user']);
            header('Location: /home');
        }
    }
    //------------------------------------------upDateUser---------------------------------------------//
    public function upDateUser()
    {
        $this->changeAvatar();

        if (!empty($_POST['emailUp']) && !empty($_POST['passwrdUp']) && !empty($_POST['passwrdUpBis']))
        //if(Form::validate($_POST, ['emailUp', 'passwrdUp', 'passwrdUpBis']))
        {
            $emailUp = htmlentities($_POST["emailUp"]);
            $passwrdUp = htmlentities($_POST["passwrdUp"]);
            $passwrdUpBis = htmlentities($_POST["passwrdUpBis"]);
            $userId = $_SESSION['user']->getUserId();

            /*$this->getPdoInstance();
            $reqMail = $this->pdoInstance->prepare('SELECT email FROM users WHERE email = :email');
            $reqMail-> execute(array(
                "email" => $emailUp
            ));*/
            $reqMail = $this->executeQuery('SELECT email FROM users WHERE email = :email', ["email" => $emailUp] );
            if ($userMail = $reqMail->fetch())
            {
                echo "un compte existe déjà";
            }
            else
            {
                if ($passwrdUp === $passwrdUpBis)
                {
                    $passwrdUp = password_hash($passwrdUp,PASSWORD_DEFAULT);
                    
                    /*$this->getPdoInstance();
                    $req = $this->pdoInstance->prepare('UPDATE users SET email=:email, passwrd=:passwrd WHERE userId = :userId');
                    $req-> execute(array(
                        "email" => $emailUp,
                        "passwrd" => $passwrdUp,
                        "userId" => $userId
                    ));*/

                    $req = $this->executeQuery('UPDATE users SET email=:email, passwrd=:passwrd WHERE userId = :userId', [
                        "email" => $emailUp,
                        "passwrd" => $passwrdUp,
                        "userId" => $userId
                    ]);
                }
                else
                {
                    echo "Les passwords ne correspondent pas";
                }
            }
        }
    }

    //-----------------------------------------update img---------------------------------------//
    
    private function changeAvatar()
    {
        if(isset($_FILES['file']) && !empty($_FILES['file']))
        //if(Form::validate($_POST, ['file']))
        {
            $tmpName = $_FILES['file']['tmp_name'];
            $name = $_FILES['file']['name'];
            $size = $_FILES['file']['size'];
            $error = $_FILES['file']['error'];

            $imgExtension = explode('.', $name);
            $extension = strtolower(end($imgExtension));

            $extensions = ['jpg', 'png', 'jpeg', 'gif'];
            $maxSize = 500000;

            if(in_array($extension, $extensions))
            {
                if($size <= $maxSize)
                {
                    if($error == 0)
                    {
                        $generateName = uniqid('',true);
                        $imgFile = $generateName.".".$extension;

                        move_uploaded_file($tmpName, "assets/avatars/$imgFile");

                        
                        //$avatar = $_SESSION['user']->getAvatar();
                        $userId = $_SESSION['user']->getUserId();
                        $newAvatar = $imgFile;
                        
                        /*$this->getPdoInstance();
                        $req = $this->pdoInstance->prepare('UPDATE users SET avatar=:avatar WHERE userId = :userId');
                        $req->execute(array(
                            "avatar" => $newAvatar,
                            "userId" => $userId
                        ));*/

                        $req = $this->executeQuery('UPDATE users SET avatar=:avatar WHERE userId = :userId', [
                            "avatar" => $newAvatar,
                            "userId" => $userId
                    ]);

                        
                        $_SESSION['user']->setAvatar($newAvatar);
                    }
                    else
                    {
                        echo "Une erreur est survenue lors de l'upload";
                    }
                }
                else
                {
                    echo "Votre image est trop grande";
                }
            }
            else
            {
                echo "Mauvaise extension";
            }

        }
    }

    //------------------------------------------deleteUser---------------------------------------------//
    public function deleteUser()
    {
        //if (isset($_POST['delete']))
        if(Form::validate($_POST, ['delete']))
        {
            $userId = $_SESSION['user']->getUserId();
            /*$this->getPdoInstance();
            $req = $this->pdoInstance->prepare('DELETE FROM users WHERE userId = :userId');
            $req-> execute(array(
                "userId" => $userId
            )); */

            $req = $this->executeQuery('DELETE FROM users WHERE userId = :userId', [
                "userId" => $userId
            ]);
                   
            session_destroy();
            header('Location: /blog/home');
            
        }
    }


}