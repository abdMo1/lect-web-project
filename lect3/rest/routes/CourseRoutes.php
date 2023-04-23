<?php


Flight :: route("/",function(){
    echo "Hello from / route";
});
//here it just prints all the  students from the DB
Flight :: route("GET /courses ",function(){
    Flight :: json(Flight :: course_service() -> get_all());//search for it
    //echo "Hello from /students route";
    //$results = $course_dao -> get_all();
    //$results = Flight :: course_dao() -> get_all();
    //print_r($results);

});



Flight :: route("GET /courses/@id ",function($id){
    Flight :: json(Flight :: course_service() -> get_by_id($id));//search for it
    //echo "Hello from /students route";
    //$results = $course_dao -> get_by_id($id);
    //print_r($results);
});


Flight :: route("DELETE /courses/@id ",function($id){
    Flight :: course_service() -> delete($id);
    Flight :: json(['message' => "DELETED"]);//search for it
    //echo "Hello from /students route";
    //$course_dao = new StudentsDao();

});



Flight :: route("POST /courses/ ",function(){
    $request = Flight :: request() -> data ->getData();
    Flight :: json(['message' => "ADDED",'data' => Flight :: course_service() ->add($request)]);
    //echo "Hello from /students route";
    //$course_dao = new StudentsDao();
    //this one helps me get the data from postman
    //print_r($request);
    //die; search for it 
    //$first_name =$request['first_name'];  we remove this part because its in add() down
    //$last_name = $request['last_name'];
    //$course_dao -> add($request['last_name'],$request['first_name']);the old version the new one DOWN 
    //$output = $course_dao -> add($request);
    //search for it
});

Flight :: route("PUT /courses/@id ",function($id){
    $student = Flight :: request() -> data ->getData();
    Flight :: json(['message' => "EDITED",'data' => Flight :: course_service() ->update($student,$id)])
    //echo "Hello from /students route";
    //$course_dao = new StudentsDao();
    //this one helps me get the data from postman

    //print_r($request);
    //die; search for it 
    //$first_name =$request['first_name'];  we remove this part because its in add() down
    //$last_name = $request['last_name'];
    //$course_dao -> add($request['last_name'],$request['first_name']);the old version the new one DOWN 
    //$output = $course_dao -> update($student,$id);
    ;//search for it
});

//here we send the paramenter name and we echoed it
Flight :: route("GET /courses/@name/@code ",function($name,$code){
    echo "Hello from /students route with name =".$name ." and code = ".$code ;
});



?>