<?php

class Autoloader
{
    public static array $list = array();
   
    //***********************************************LOAD**************************************************/
    /**
     * load
     *
     * @param  mixed $className
     * @return void
     */
    public static function load($className)
    {
        self::$list[] = $className;      
          
        if(file_exists(PATH_APP. $className . '.php'))
        {
            require PATH_APP . $className . '.php';
        }
        else if(file_exists(PATH_CONTROLLERS . $className . '.php'))
        {
            require PATH_CONTROLLERS . $className . '.php';
        }
        else if(file_exists(PATH_MODELS . $className . '.php'))
        {
            require PATH_MODELS . $className . '.php';
        }
    }
    
    //***********************************************REGISTER**************************************************/
    /**
     * register
     *
     * @return void
     */
    public static function register()
    {
        spl_autoload_register([__CLASS__,'load']);
    }
    
}

Autoloader::register();
