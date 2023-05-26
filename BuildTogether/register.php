<?php

header('Content-Type: application/json');

require_once('config/conn.php');

$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
  //get json response
  $json = file_get_contents('php://input');
  //decode response
  $data = json_decode($json);

  //set it as object
  $fullname = $data->fullname;
  $email = $data->email;
  $experience = $data->experience;
  $techprofession = $data->techprofession;

    
      //validate users input
      if (empty($fullname) || empty($email) || empty($experience) || empty($techprofession)) {

        $response['error'] = true;
        $response['message'] = 'please fill all input fields';
  
      }else{
          
          //check if user already exist
          $sql = "SELECT * FROM users WHERE email=?";
          $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
                    mysqli_stmt_error($stmt);

              }else{
                mysqli_stmt_bind_param($stmt, "s", $email);
                mysqli_stmt_execute($stmt);
  
                mysqli_stmt_store_result($stmt);
                $resultCheck = mysqli_stmt_num_rows($stmt);
  
                if ($resultCheck > 0) {
                          //failure
                      $response['error'] = true;
                      $response['message'] = 'user already exist';
                }else{
      
                  $sql = "INSERT INTO users (fullname, email, techprofession, experience, signup_date, team_name) VALUES (?, ?, ?, ?, ?, ?)";
                  $stmt = mysqli_stmt_init($conn);
                  mysqli_stmt_prepare($stmt, $sql);

                  $date_signed_up = date("Y-m-d");
                  $team_name = 'NULL';
  
                  mysqli_stmt_bind_param($stmt, 'ssssss', $fullname, $email, $techprofession, $experience, $date_signed_up, $team_name);

                  if(mysqli_stmt_execute($stmt)) {

                    //success
                    $response['error'] = false;
                    $response['message'] = 'registered successfully';

                    mysqli_stmt_close($stmt);
                    // mysqli_close($conn)     
                    
                  }else {
                  $response['error'] = true;
                  $response['message'] = 'Error executing query, this could be server error';
                  }
          
                }
            }    
      }

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