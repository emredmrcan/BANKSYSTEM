<?php

/**
 * Created by PhpStorm.
 * User: Emre
 * Date: 6.5.2017
 * Time: 11:18
 */
/*$con = mysqli_connect("localhost","root","12345678","bank_system");
// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}*/
class connectiondb
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "12345678";
    private $dbname = "bank_system";
    public $connection;

    /**
     * @return mysqli
     */
    public function getConnection()
    {
        return $this->connection;
    }


        public function __construct()
        {
            $this->connection = new mysqli(
            $this->servername,
            $this->username,
            $this->password,
            $this->dbname
            );

            if ($this->connection->connect_error) {
                die("Conection Error: " . $this->connection->connect_error);
            }

			$this->connection->set_charset("utf8");
        }
    /*Buranın tam olarak ne işe yaradığını anla!*/
    //*************************************************
        function __destruct() {
            $this->connection->close();
        }

        public function getDataTable($query) {
            $result = $this->connection->query($query);
            return $result;
        }

        public function executeQuery($query) {
            return ($this->connection->query($query) === TRUE);
        }

}