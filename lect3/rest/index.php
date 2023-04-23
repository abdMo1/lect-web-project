<?php
require "../vendor/autoload.php";

//require "dao/StudentsDao.class.php";
//require "dao/CoursesDao.class.php";
//Flight :: register('student_dao',"StudentsDao");
//Flight :: register('courses_dao',"CoursesDao");



require "services/StudentService.php";
require "services/CourseService.php";

Flight :: register('student_service',"StudentService");
Flight :: register('course_service',"CourseService");


require_once 'routes/StudentRoutes.php';
require_once 'routes/CourseRoutes.php';


Flight :: start();


?>