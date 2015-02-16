<?php

// Database connection PDO

class Database {

    public $pdo;

    public function __construct() {
        // Connection information
        $host   = 'localhost';
        $dbname = 'school';
        $user   = 'root';
        $pass   = '';

        // Attempt DB connection
        try
        {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo 'Successfully connected to the database!';
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }

    }

    public function __destruct()
    {
        // Disconnect from DB
        $this->pdo = null;
        //echo 'Successfully disconnected from the database!';
    }


}

?>