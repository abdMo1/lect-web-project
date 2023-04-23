<?php
require_once __DIR__."/../Config.class.php";
class BaseDao{
    private $conn;
    private $table_name;
        /**
         * Class constructor used to make connection with DB
        **/
    public function __construct($table_name){
        try{

            $this -> table_name = $table_name;
            $servername = Config::DB_HOST();
            $username   = Config::DB_USERNAME();
            $password   = Config::DB_PASSWORD();
            $schema     = Config::DB_SCHEMA();
            $this ->conn = new PDO("mysql:host = $servername;dbname=$schema",$username,$password);
            $this ->conn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){ //this one for connections errors
                echo "Connection failed:". $e ->getMessage();
            }
    }
        /**
         * Method used to get all entites from database
        **/
    public function get_all()
    {            
    $stmt = $this -> conn -> prepare("SELECT * FROM ". $this->table_name);
    $stmt ->execute();
    return  $stmt -> fetchAll(PDO::FETCH_ASSOC); 
    //return all the SQL data and fetchAll(PDO::FETCH_ASSOC); means return each row 
    }
        /**
         * Method used to get all entites from database by id
        **/

    public function get_by_id($id)
    {            
    $stmt = $this -> conn -> prepare("SELECT * FROM ". $this->table_name." WHERE id =:id");
    $stmt ->execute(['id' => $id]);
    return  $stmt -> fetch(); // $stmt -> fetch() search what is the diff betweenthem
    }
        /**
         * Method used to delete an entites from database
        **/

    public function delete($id)
    {            
        $stmt = $this ->conn->prepare("DELETE FROM ". $this->table_name .  " WHERE id =:id");
        $stmt -> bindparam(':id',$id);
        $stmt ->execute();
    }
        /**
         * Method used to add  an entites from database
        **/


    public function add($entity){   
        //$stmt = $this -> conn -> prepare("INSERT INTO courses (code,name) VALUES (:code,:name)" );
        $query = "INSERT INTO " .$this->table_name . "(";
        foreach($entity as $column =>$value){
            $query.=$column . ', '; // this one is short for $query = $query.$column . ',';
        }
        $query = substr($query,0,-2); //this one removes the last , that will be added 
        $query.= ") VALUES (";
        foreach($entity as $column =>$value){
            $query.=":" .$column .', ';
        }
        $query = substr($query,0,-2);
        $query.= ")";

        $stmt = $this -> conn -> prepare($query);
        $stmt ->execute($entity);
        $entity['id'] = $this->conn->lastInsertId(); // this will return the last id inserted
        return $entity;
    }
        /**
         * Method used to update an entites from database
        **/


    public function update($entity,$id,$id_column = "id")
    {
        $query = "UPDATE ". $this->table_name . " SET ";
        foreach($entity as $column => $value){
            $query.=$column. "=:".$column . ", ";
        }
        $query = substr($query,0,-2);
        $query.=" WHERE ${id_column} = :id";
        
        $entity['id'] = $id;
        $stmt = $this -> conn -> prepare($query);
        $stmt ->execute($entity); //search
        return $entity;
    }
}


?>