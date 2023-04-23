<?php
require_once 'BaseService.php';
require __DIR__."/../dao/StudentsDao.class.php";
class studentService extends BaseService{
    public function __construct(){
        parent :: __construct(new StudentsDao);
    }

    public function add($entity){
        parent :: add($entity);
        //sending an email called logic prosessing
        //if(!validateField($entity['first_name']))
        //{
        //    someerrors
        //}
    }
}
?>