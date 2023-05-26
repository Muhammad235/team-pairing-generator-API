<?php

header('Content-Type: application/json');

require_once('config/conn.php');

$response = array();

// count the number of available product designers
$pd_count = "SELECT COUNT(*) FROM users  WHERE techprofession = 'product designer' AND team_name = 'NULL' ";
$pd_count_result = mysqli_query($conn, $pd_count);

if ($pd_count_result) {
    $pd_count = mysqli_fetch_array($pd_count_result)[0];
 
 }else {
    echo "Error executing query: " . mysqli_error($conn);
 }


 // count the number of available product managers
$pm_count = "SELECT COUNT(*) FROM users  WHERE techprofession = 'product manager' AND team_name = 'NULL' ";
$pm_count_result = mysqli_query($conn, $pm_count);

if ($pm_count_result) {
    $pm_count = mysqli_fetch_array($pm_count_result)[0];
 
 
 }else {
    echo "Error executing query: " . mysqli_error($conn);
 }


// count the number of available frontend developer
$fe_count = "SELECT COUNT(*) FROM users  WHERE techprofession = 'frontend' AND team_name = 'NULL' ";
$fe_count_result = mysqli_query($conn, $fe_count);

if ($fe_count_result) {
    $fe_count = mysqli_fetch_array($fe_count_result)[0];

 }else {
    echo "Error executing query: " . mysqli_error($conn);
 }


// count the number of available backend developer
$be_count = "SELECT COUNT(*) FROM users WHERE techprofession = 'backend' AND team_name = 'NULL' ";
$be_count_result = mysqli_query($conn, $be_count);

if ($be_count_result) {
    $be_count = mysqli_fetch_array($be_count_result)[0];

 }else {
    echo "Error executing query: " . mysqli_error($conn);
 }


// convert the result of the count, to integer and check if it less than 4 

 if (intval($pd_count) < 4 || intval($pm_count) < 4) {
    $response['team_generating_status'] = 'Insufficeint members to pair up a team';
    $response['error'] = 'false'; 
 }else {

    // $general = array();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

       
        $json = file_get_contents('php://input');
        $data = json_decode($json);
    
        $team_name = $data->team_name;

        //echo $team_name;
        $team_generated = array();
        
        // pairing product managers
        $senior_pms = array();

        $techprofession = 'product manager';

        $sql = "SELECT * FROM users WHERE techprofession = '$techprofession' AND experience = 3 AND team_name = 'NULL' ORDER BY signup_date ASC LIMIT 2";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {

                $fullname = $row['fullname'];
                $row['team_name'] = $team_name;

                //reqesting the file to update the selected users
                require 'update_team.php';

                $senior_pms[] = $row;

            }
        }else {
            // echo "Error executing query: " . mysqli_error($conn);
            $response['error'] = true;             
            $response['message'] = 'Error executing query: this could be server error';             
        }

        $techprofession = 'product manager';

        $sql = "SELECT * FROM users WHERE techprofession = '$techprofession' AND experience = 2 AND team_name = 'NULL' ORDER BY signup_date ASC LIMIT 1";

        $result = mysqli_query($conn, $sql);

        $junior_pms = array();

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {

                $fullname = $row['fullname'];
                $row['team_name'] = $team_name;
        
                //reqesting the file to update the selected users
                require 'update_team.php';

                $junior_pms[] = $row;

            
            }
        }else {
            // echo "Error executing query: " . mysqli_error($conn);
            $response['error'] = true;             
            $response['message'] = 'Error executing query: this could be server error';             
        }

        $techprofession = 'product manager';

        $sql = "SELECT * FROM users WHERE techprofession = 'product manager' AND experience = 1 AND team_name = 'NULL' ORDER BY signup_date ASC LIMIT 1";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
    
                $fullname = $row['fullname'];
                $row['team_name'] = $team_name;

                 //reqesting the file to update the selected users
                 require 'update_team.php';

                 $junior_pms[] = $row;
            
            }
        }else {
            // echo "Error executing query: " . mysqli_error($conn);
            $response['error'] = true;             
            $response['message'] = 'Error executing query: this could be server error';             
        }


         // pairing product designers
         $senior_pds = array();

        $techprofession = 'product designer';

         $sql = "SELECT * FROM users WHERE techprofession = 'product designer' AND experience = 3 AND team_name = 'NULL' ORDER BY signup_date ASC LIMIT 2";
 
         $result = mysqli_query($conn, $sql);
 
         if ($result) {
             while ($row = mysqli_fetch_assoc($result)) {
 
                 $fullname = $row['fullname'];
                 $row['team_name'] = $team_name;

                 //reqesting the file to update the selected users
                 require 'update_team.php';

                 $senior_pds[] = $row;
                 
             }
         }else {
             // echo "Error executing query: " . mysqli_error($conn);
             $response['error'] = true;             
             $response['message'] = 'Error executing query: this could be server error';             
         }
 
        $techprofession = 'product designer';

         $sql = "SELECT * FROM users WHERE techprofession = '$techprofession' AND experience = 2 AND team_name = 'NULL' ORDER BY signup_date ASC LIMIT 1";
 
         $result = mysqli_query($conn, $sql);
 
         $junior_pds = array();
 
         if ($result) {
             while ($row = mysqli_fetch_assoc($result)) {
         
                 $fullname = $row['fullname'];
                 $row['team_name'] = $team_name;

                 //reqesting the file to update the selected users
                 require 'update_team.php';

                 $junior_pds[] = $row;

             }
         }else {
             // echo "Error executing query: " . mysqli_error($conn);
             $response['error'] = true;             
             $response['message'] = 'Error executing query: this could be server error';             
         }

        $techprofession = 'product designer';
 
         $sql = "SELECT * FROM users WHERE techprofession = '$techprofession' AND experience = 1 AND team_name = 'NULL' ORDER BY signup_date ASC LIMIT 1";
 
         $result = mysqli_query($conn, $sql);
 
         if ($result) {
             while ($row = mysqli_fetch_assoc($result)) {
     
                 $fullname = $row['fullname'];
                 $row['team_name'] = $team_name;
                 
                 //reqesting the file to update the selected users
                 require 'update_team.php';

                 $junior_pds[] = $row;
             }
         }else {
             // echo "Error executing query: " . mysqli_error($conn);
             $response['error'] = true;             
             $response['message'] = 'Error executing query: this could be server error';   
                       
         }


        $backend = array();

        if (intval($be_count) < 1) {
            $backend[] = NULL;
        }else {

            $techprofession = 'backend';

            $sql = "SELECT * FROM users WHERE techprofession = '$techprofession' AND team_name = 'NULL' ORDER BY signup_date ASC LIMIT 1";
 
            $result = mysqli_query($conn, $sql);
    
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
        
                 $fullname = $row['fullname'];
                 $row['team_name'] = $team_name;

                 //reqesting the file to update the selected users
                 require 'update_team.php';

                 $backend[] = $row;

                }
            }else {
                // echo "Error executing query: " . mysqli_error($conn);
                $response['error'] = true;             
                $response['message'] = 'Error executing query: this could be server error';   
                          
         
            }
        }

        $frontend = array();

        if (intval($fe_count) < 1) {
            $frontend[] = NULL;
        }else {

            $techprofession = 'frontend';

            $sql = "SELECT * FROM users WHERE techprofession = '$techprofession' AND team_name = 'NULL' ORDER BY signup_date ASC LIMIT 1";
 
            $result = mysqli_query($conn, $sql);
    
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
        
                 $fullname = $row['fullname'];
                 $row['team_name'] = $team_name;

                 //reqesting the file to update the selected users
                 require 'update_team.php';

                 $frontend[] = $row;

                }
            }else {
                // echo "Error executing query: " . mysqli_error($conn);
                $response['error'] = true;             
                $response['message'] = 'Error executing query: this could be server error';   
         
            }
        }

         
        //team name 
        $team_generated['team name'] = $team_name;

        //product managers
        $team_generated['senior product managers'] = $senior_pms;
        $team_generated['junior product managers'] = $junior_pms;

        //product designers
        $team_generated['senior product designers'] = $senior_pds;
        $team_generated['junior product designers'] = $junior_pds;

        //backend
        $team_generated['backend developer'] = $backend;
        //frontend
        $team_generated['frontend developer'] = $frontend;

        //json response for the teams
        $response['team_generated'] = $team_generated;
        
        //success message
        $response['team_generating_status'] = 'Generated successfully';
        $response['error'] = false;

    }else {

        //Request method
        $request_method = $_SERVER['REQUEST_METHOD'];
        if ($request_method == 'GET') {

        $response['error'] = true;
        $response['message'] = $request_method . ' Request method is not allowed';   
        $response['team_generating_status'] = 'Could not generate team';
        
      }
        
    }



 }

 
 echo json_encode($response);
 //var_dump($response);

?>