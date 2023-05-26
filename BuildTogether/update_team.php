<?php

// // Select the users
// $sql = "SELECT * FROM users WHERE techprofession = 'developer'"; // Replace with your own query
// $result = mysqli_query($conn, $sql);

// // Check if any users were selected
// if (mysqli_num_rows($result) > 0) {
    // Update the selected users
    
    $updateSql = "UPDATE users SET team_name = '$team_name' WHERE techprofession = '$techprofession' AND fullname= '$fullname' ";
     // Replace with your update statement

    if (mysqli_query($conn, $updateSql)) {
        // Success
        $response['error'] = false;
        $response['message'] = 'Team members team updated successfully';
    } else {
        // Error
        $response['error'] = true;
        $response['message'] = 'Failed to update selected users: ' . mysqli_error($conn);
    }
