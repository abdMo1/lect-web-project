<?php
    
    class CoursesDao{

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
         * Method used to get all courses from database
        **/

        public function get_all()
        {            
        $stmt = $this -> conn -> prepare("SELECT * FROM courses");
        $stmt ->execute();
        return  $stmt -> fetchAll(PDO::FETCH_ASSOC);

        }
        /**
         * Method used to get all courses from database by the id 
        **/

        public function get_by_id($id)
        {            
        $stmt = $this -> conn -> prepare("SELECT * FROM courses WHERE id =:id");
        $stmt ->execute(['id' => $id]);
        return  $stmt -> fetch(); // $stmt -> fetch() search what is the diff betweenthem
        
        }

        /**
         * Method used to add courses to database
        **/
        // THIS THE OLD FUNCNTION FROM ADD THE NEW ONE IS DOWN 
        //public function add($first_name,$last_name)
        //{            
        //    $stmt = $this -> conn -> prepare("INSERT INTO courses (first_name,last_name) VALUES ('$first_name','$last_name')" );
        //    $stmt ->execute();
        //}
        public function add($course)
        {            
            $stmt = $this -> conn -> prepare("INSERT INTO courses (code,name) VALUES (:code,:name)" );
            $stmt ->execute($course);
            $course['id'] = $this->conn->lastInsertId(); // this will return the last id inserted
            return $course;
        }

        /**
         * Method used to update course to database
        **/
        //this is the old function of the update the new one down
        //public function update($first_name,$last_name,$id)
        //{            
        //    $stmt = $this -> conn -> prepare("UPDATE courses SET first_name = '$first_name',last_name ='$last_name' WHERE id=$id")  ;
        //    $stmt ->execute();
        //}

        //there is an erro there !!!!!!!!!!!!!!!!!!
        public function update($course,$id)
        {
            $course['id'] = $id;
            $stmt = $this -> conn -> prepare("UPDATE courses SET code = :code,name =:name WHERE id=$id")  ;
            $stmt ->execute($course); //search
        }

        /**
         * Method used to delete course to database
        **/

        public function delete($id)
        {            
            $stmt = $this ->conn->prepare("DELETE FROM courses WHERE id =:id");
            $stmt -> bindparam(':id',$id);
            $stmt ->execute();
        }

    }

?>