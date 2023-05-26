<?php

header('Content-Type: application/json');

require_once('config/conn.php');

$response = array();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
 
    $json = file_get_contents('php://input');
    $data = json_decode($json);

    $fullname = $data->fullname;
    $email = $data->email;
    $experience = $data->experience;
    $techprofession = $data->techprofession;


  }else{

    //Request method
        $request_method = $_SERVER['REQUEST_METHOD'];
        if ($request_method !== 'POST') {

        $response['error'] = true;
        $response['message'] = $request_method . ' Request method is not allowed';   
        $response['team_generating_status'] = 'Could not generate team';
    }


  }  
  

echo json_encode($response);


?>