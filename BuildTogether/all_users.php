<?php

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");

require_once('config/conn.php');

$response = array();

$stmt = $conn->prepare("SELECT  * FROM users");

if ($stmt) {
    $stmt->execute();
    $result = $stmt->get_result();

    $users = array();

    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $users[] = $row;
    }

    $response['error'] = false;
    $response['users'] = $users;
    $response['message'] = 'users returned successfully';
    $stmt->close();
} else {
    $response['error'] = true;
    $response['message'] = 'error';
}

echo json_encode($response);
// var_dump($response);
?>