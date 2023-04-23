<?php
    
    class studentsDao{

        private $conn;
        /**
         *  * class constructor used to establish connection to database
        **/

        public function __construct(){
            try{
            $servername = "localhost";
            $username   = "root";
            $password   = "Assxzczxaswas12@";
            $schema     = "lab3_db";
            $this ->conn = new PDO("mysql:host = $servername;dbname=$schema",$username,$password);
            $this ->conn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                echo "Connection failed:". $e ->getMessage();
        
            }
        }

        /**
         * Method used to get all students from database
        **/

        public function get_all()
        {            
        $stmt = $this -> conn -> prepare("SELECT * FROM students");
        $stmt ->execute();
        return  $stmt -> fetchAll(PDO::FETCH_ASSOC);

        }
        /**
         * Method used to get all students from database by the id 
        **/

        public function get_by_id($id)
        {            
        $stmt = $this -> conn -> prepare("SELECT * FROM students WHERE id =:id");
        $stmt ->execute(['id' => $id]);
        return  $stmt -> fetch(); // $stmt -> fetch() search what is the diff betweenthem
        
        }

        /**
         * Method used to add students to database
        **/
        // THIS THE OLD FUNCNTION FROM ADD THE NEW ONE IS DOWN 
        //public function add($first_name,$last_name)
        //{            
        //    $stmt = $this -> conn -> prepare("INSERT INTO students (first_name,last_name) VALUES ('$first_name','$last_name')" );
        //    $stmt ->execute();
        //}
        public function add($student)
        {            
            $stmt = $this -> conn -> prepare("INSERT INTO students (first_name,last_name) VALUES (:first_name,:last_name)" );
            $stmt ->execute($student);
            $student['id'] = $this->conn->lastInsertId(); // this will return the last id inserted
            return $student;
        }

        /**
         * Method used to update student to database
        **/
        //this is the old function of the update the new one down
        //public function update($first_name,$last_name,$id)
        //{            
        //    $stmt = $this -> conn -> prepare("UPDATE students SET first_name = '$first_name',last_name ='$last_name' WHERE id=$id")  ;
        //    $stmt ->execute();
        //}

        //there is an erro there !!!!!!!!!!!!!!!!!!
        public function update($student,$id)
        {
            $student['id'] = $id;
            $stmt = $this -> conn -> prepare("UPDATE students SET first_name = :first_name,last_name =:last_name WHERE id=$id")  ;
            $stmt ->execute($student); //search
        }

        /**
         * Method used to delete student to database
        **/

        public function delete($id)
        {            
            $stmt = $this ->conn->prepare("DELETE FROM students WHERE id =:id");
            $stmt -> bindparam(':id',$id);
            $stmt ->execute();
        }

    }

?>