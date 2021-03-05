<?php
class database {
    private $host;
    private $user;
    private $pass;
    private $db;
    private $port;
    private $charset;

    function __construct() {
        $this->host = 'localhost';
        $this->user = 'root';
        $this->pass = '';
        $this->db = 'testdb';
        $this->port = "3306";
        $this->charset = 'utf8mb4';
    }

    private function connect() 
    {
        $options = [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset;port=$this->port";
        
        try {
             $pdo = new \PDO($dsn, $this->user, $this->pass, $options);
             return $pdo;
        } catch (\PDOException $e) {
             throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }    
    
    public function add($f,$l,$e)
	{
	    $pdo=$this->connect(); 

        $sql = "INSERT INTO test (Firstname, Lastname, Email) VALUES(:fname,:lname,:email)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            "fname" => $f,
            "lname" => $l,
            "email" => $e
        ));
    }
} 
?>