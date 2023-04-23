<?php

require_once("rest/dao/StudentsDao.class.php");
$student_dao = new StudentsDao();
$first_name = $_REQUEST['first_name'];
$last_name  = $_REQUEST['last_name'];

$results = $student_dao -> add($first_name,$last_name);
print_r($results);
/*
    $servername = "localhost";
    $username   = "root";
    $password   = "Assxzczxaswas12@";
    $schema     = "lab3_db";

    try{

        //establishing the connection
        $conn = new PDO("mysql:host = $servername;dbname=$schema",$username,$password);
        $conn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully \n";

        // for selecting all in the DB 
        /* 
        $stmt = $conn -> prepare("SELECT * FROM students");
        $stmt ->execute();
        $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        print_r($result);
        
        

        print_r($_REQUEST);
        $first_name = $_REQUEST['first_name'];
        $last_name = $_REQUEST['last_name'];
        $stmt = $conn -> prepare("INSERT INTO students (first_name,last_name) VALUES ('$first_name','$last_name')" );
        $result = $stmt ->execute();
        print_r($result);

        // if the connection faild 

    }catch(PDOException $e){
        echo "Connection failed:". $e ->getMessage();

    }
*/
?>