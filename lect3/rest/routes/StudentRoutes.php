<?php


Flight :: route("/",function(){
    echo "Hello from / route";
});
//here it just prints all the  students from the DB
Flight :: route("GET /students ",function(){
    Flight :: json(Flight :: student_service() -> get_all());
    //echo "Hello from /students route";
    //$student_service = new test();
    //$results = $student_service -> get_all();
    //$results = Flight :: student_service() -> get_all();
    //print_r($results);
//search for it
});



Flight :: route("GET /students/@id ",function($id){
    Flight :: json(Flight :: student_service() -> get_by_id($id));//search for it
    //echo "Hello from /students route";
    //$student_service = new test();
    //$results = $student_service -> get_by_id($id);
    //print_r($results);
});


Flight :: route("DELETE /students/@id ",function($id){
    Flight :: student_service() -> delete($id);
    Flight :: json(['message' => "DELETED"]);//search for it
    //echo "Hello from /students route";
    //$student_service = new test();
});



Flight :: route("POST /students/ ",function(){
    $request = Flight :: request() -> data ->getData();
    Flight :: json(['message' => "ADDED",'data' => Flight :: student_service() ->add($request)]);
    //echo "Hello from /students route";
    //$student_service = new test();
    //this one helps me get the data from postman

    //print_r($request);
    //die; search for it 
    //$first_name =$request['first_name'];  we remove this part because its in add() down
    //$last_name = $request['last_name'];
    //$student_service -> add($request['last_name'],$request['first_name']);the old version the new one DOWN 
    //$output = $student_service -> add($request);
    //search for it
});

Flight :: route("PUT /students/@id ",function($id){
    $student = Flight :: request() -> data ->getData();
    Flight :: json(['message' => "EDITED",'data' => Flight :: student_service() ->update($student,$id)]);
    //echo "Hello from /students route";
    //$student_service = new test();
    //this one helps me get the data from postman
    //print_r($request);
    //die; search for it 
    //$first_name =$request['first_name'];  we remove this part because its in add() down
    //$last_name = $request['last_name'];
    //$student_service -> add($request['last_name'],$request['first_name']);the old version the new one DOWN 
    //$output = $student_service -> update($student,$id);
    //search for it
});

//here we send the paramenter name and we echoed it
Flight :: route("GET /students/@name/@sex ",function($name,$sex){
    echo "Hello from /students route with name =".$name ." and gender = ".$sex ;
});



?>