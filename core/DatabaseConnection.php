<?php

namespace Core;

use Core\Traits\Singleton;
use PDO;
use PDOException;

class DatabaseConnection
{
    use Singleton;
    private string $host;
    private $port;
    private string $user;
    private string $pass;
    private string $dbname;
    private string $dbchar;

    private $conn;

    private function __construct()
    {
        $this->host = config('db_host');
        $this->port = config('db_port');
        $this->user = config('db_user');
        $this->pass = config('db_pass');
        $this->dbname = config('db_name');
        $this->dbchar = config('db_char');

        $this->loadConnection();
    }
    public function loadConnection()
    {
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        try {
            $this->conn = new PDO($this->getDsn(), $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            $this->err = $e->getMessage();
            echo $this->err;
        }
    }


    public function getDsn() {
        return 'mysql:host=' . $this->host . '; port= '. $this->port .';dbname=' . $this->dbname . ';charset=' . $this->dbchar;
    }

    public function getConnection()
    {
        return $this->conn;
    }
}