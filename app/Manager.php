<?php

abstract class Manager
{
    private CONST DB_HOST = 'localhost';
    private CONST DB_NAME = 'dbName';
    private CONST DB_USERNAME = 'db_userName';
    private CONST DB_PWD = 'PASSWORD';

    protected ?PDO $pdoInstance = null;
    protected string $table;

	//*********************************************SET PDO INSTANCE**************************************************/
    /**
     * setPdoInstance
     *
     * @return void
     */
    protected function setPdoInstance()
    {
        if ($this->pdoInstance === null)
        {
            try
            {
                $this->pdoInstance = new PDO(
                    'mysql:host='.self::DB_HOST.';dbname='.self::DB_NAME,
                    self::DB_USERNAME,
                    self::DB_PWD
                );
            }
            catch (Error $e)
            {
                die('Erreur : '. $e->getMessage());
            }
        }
    }
    
    //***********************************************GET PDO**************************************************/
    /**
     * getPdoInstance
     *
     * @return PDO
     */
    protected function getPdoInstance()
    {   
        $this->setPdoInstance(); 
        return $this->pdoInstance;
    }

    //***********************************************HYDRATE**************************************************/         
    /**
     * hydrate
     *
     * @param  mixed $data
     * @param  mixed $object
     * @return void
     */
    public function hydrate(array $data, Object $object)
    {
        foreach ($data as $key => $value)
        {
            // On récupère le nom du setter correspondant à l'attribut.
            $method = 'set'.ucfirst($key);
                
            // Si le setter correspondant existe.
            if (method_exists($object, $method))
            {
            // On appelle le setter.
            $object->$method($value);
            }
        }
    }    
     
    
    //***********************************************EXECUTE QUERY**************************************************/   
    /**
     * executeQuery
     *
     * @param  mixed $sql
     * @param  mixed $params
     * @return object
     */
    protected function executeQuery(string $sql, array $params = NULL)
    {
    
        if(empty($params))
        {
            $query = $this->getPdoInstance()->prepare($sql);
            $query->execute();
        }
        else
        {
            $query = $this->getPdoInstance()->prepare($sql);
            $query->execute($params);
        }
        return $query;
    }
    
    //***********************************************GET ALL**************************************************/    
    /**
     * getAll
     *
     * @return void
     */
    public function getAll()
    {
        $query = $this->executeQuery('SELECT * FROM ' . $this->table);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    //***********************************************GET BY ID**************************************************/         
    /**
     * getById
     *
     * @param  mixed $id
     * @return void
     */
    public function getById(int $id)
    {
        $query = $this->executeQuery("SELECT * FROM $this->table WHERE id = :id", ["id" => $id]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

}