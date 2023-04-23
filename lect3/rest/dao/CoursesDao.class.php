<?php
require_once "BaseDao.class.php";

class CoursesDao extends BaseDao {

    public function __construct(){
        parent :: __construct("courses");
    }
}
?>