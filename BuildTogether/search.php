<?php

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");

require_once 'config/conn.php';

$response = array();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      //get json response
    $json = file_get_contents('php://input');
    //decode response
    $data = json_decode($json);

    //set it as object
    $search_keyword = $data->search_keyword;

    $purify_search_keyword = mysqli_real_escape_string($conn, $search_keyword);

        //search blog post table for the keyword
        $sql = "SELECT * FROM users WHERE fullname LIKE '%$purify_search_keyword%' OR email LIKE '%$purify_search_keyword%' OR team_name LIKE '%$purify_search_keyword%'";

        $result = mysqli_query($conn, $sql);

        $num_of_row = mysqli_num_rows($result);

        if ($num_of_row >0) {

        while ($row = mysqli_fetch_assoc($result)) {
                    $search_result[] = $row;
            }

                $response['error'] = false;
                $response['result_match'] = $search_result;
                $response['message'] = 'Matching results returned successfuly!';
                
            }else {
                $response['error'] = true;
                $response['message'] = 'There are no results matching your search!';
        }
                    
}else{

    //Request method
    $request_method = $_SERVER['REQUEST_METHOD'];
    if ($request_method !== 'POST') {

    $response['error'] = true;
    $response['message'] = $request_method . ' Request method is not allowed';   

    }
}

echo json_encode($response);
?>