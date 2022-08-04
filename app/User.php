<?php


/**
 * User
 */
class User {

    private $_userId;
    private $_lastname;
    private $_firstname;
    private $_birthday;
    private $_email;
    private $_pseudo;
    private $_passwrd;
    private $_avatar;
    private $_dateCreated;
    private $_role;

    //***********************************************CONSTRUCTOR******************************************************/
    
    /**
     * __construct
     *
     * @param  mixed $data
     * @return void
     */
    public function __construct (array $data)
    {
        $userManager = new UserManager;
        $userManager->hydrate($data, $this);
    }


  
    /********************************************GUETTERS & SETTERS**************************************************/
        
    /**
     * getUserId
     *
     * @return void
     */
    public function getUserId()
    {
        return $this->_userId ;
    }    
    /**
     * setUserId
     *
     * @param  mixed $userId
     * @return void
     */
    public function setUserId($userId)
    {
        $this->_userId = $userId ;
    }
        
    /**
     * getLastname
     *
     * @return void
     */
    public function getLastname()
    {
        return $this->_lastname ;
    }    
    /**
     * setLastname
     *
     * @param  mixed $lastname
     * @return void
     */
    public function setLastname($lastname)
    {
        $this->_lastname = $lastname ;
    }
        
    /**
     * getFirstname
     *
     * @return void
     */
    public function getFirstname()
    {
        return $this->_firstname ;
    }    
    /**
     * setFirstname
     *
     * @param  mixed $firstname
     * @return void
     */
    public function setFirstname($firstname)
    {
        $this->_firstname = $firstname ;
    }
        
    /**
     * getBirthday
     *
     * @return void
     */
    public function getBirthday()
    {
        return $this->_birthday ;
    }    
    /**
     * setBirthday
     *
     * @param  mixed $birthday
     * @return void
     */
    public function setBirthday($birthday)
    {
        $birthday = date("d.m.Y", strtotime($birthday));
        $this->_birthday = $birthday;
    }
        
    /**
     * getEmail
     *
     * @return void
     */
    public function getEmail()
    {
        return $this->_email ;
    }    
    /**
     * setEmail
     *
     * @param  mixed $email
     * @return void
     */
    public function setEmail($email)
    {
        $this->_email = $email ;
    }
        
    /**
     * getPseudo
     *
     * @return void
     */
    public function getPseudo()
    {
        return $this->_pseudo ;
    }    
    /**
     * setPseudo
     *
     * @param  mixed $pseudo
     * @return void
     */
    public function setPseudo($pseudo)
    {
        $this->_pseudo = $pseudo;
    }
    
    /**
     * getPasswrd
     *
     * @return void
     */
    public function getPasswrd()
    {
        return $this->_passwrd ;
    }    
    /**
     * setPasswrd
     *
     * @param  mixed $passwrd
     * @return void
     */
    public function setPasswrd($passwrd)
    {
        $this->_passwrd = $passwrd ;
    }
    
    /**
     * getAvatar
     *
     * @return void
     */
    public function getAvatar()
    {
        return $this->_avatar ;
    }    
    /**
     * setAvatar
     *
     * @param  mixed $avatar
     * @return void
     */
    public function setAvatar($avatar)
    {
        $this->_avatar = $avatar ;
    }
    
    /**
     * getDateCreated
     *
     * @return void
     */
    public function getDateCreated()
    {
        return $this->_dateCreated ;
    }    
    /**
     * setDateCreated
     *
     * @param  mixed $dateCreated
     * @return void
     */
    public function setDateCreated($dateCreated)
    {
        $dateCreated = date("d.m.Y", strtotime($dateCreated));
        $this->_dateCreated = $dateCreated ;
    }

    public function getRole()
    {
        return $this->_role ;
    }    
  
    public function setRole($role)
    {
        $this->_role = $role ;
    }













}