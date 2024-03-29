<?php
class core_db extends PDO{
    private $engine;
    private $host;
    private $database;
    private $user;
    private $pass;

    private $result;    

    public function __construct()
        {
        $this->engine   = 'mysql';
        $this->host     = 'localhost';
        $this->database = 'user_login';
        $this->user     = 'root';
        $this->pass     = 'root';

        $dns = $this->engine.':dbname='.$this->database.";host=".$this->host;
        parent::__construct( $dns, $this->user, $this->pass );
        }
}
