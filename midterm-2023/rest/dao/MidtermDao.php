<?php
class MidtermDao {

    private $conn;
    
    /**
    * constructor of dao class
    */
    public function __construct(){
        try {
            $servername = 'db-mysql-nyc1-51552-do-user-3246313-0.b.db.ondigitalocean.com';
            $username   = 'doadmin';
            $password   = 'AVNS_sQwKZryHF62wtg6XNoi';
            $schema     = 'midterm-2023';
            
            $options = array(
                PDO::MYSQL_ATTR_SSL_CA => '/path/to/ssl_certificate.pem',
                PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false,
            );
            
            $this ->conn = new PDO("mysql:host=$servername;dbname=$schema", $username, $password, $options);
            $this ->conn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            
            echo "Connected successfully";
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    /**
    * DAO method used to get cap table
    */
    public function cap_table(){
        $stmt = $this -> conn -> prepare("SELECT * FROM cap_table");
        $stmt ->execute();
        return  $stmt -> fetchAll(PDO::FETCH_ASSOC);
        
    }

    /**
    * DAO method used to get summary
    */
    public function summary(){
        // TODO: Implement summary() method
    }

    /**
    * DAO method to return list of investors with their total shares amount
    */
    public function investors(){
        // TODO: Implement investors() method
    }
}
?>
