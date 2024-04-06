<?php
include 'config.php'; // Include your database connection file

// Initialize response message
$response = "";

// Check if tableData is received
if(isset($_POST['tableData'])) {
    // Retrieve the tableData from the AJAX request
    $tableData = $_POST['tableData'];

    // Iterate over each row in the tableData array
    foreach ($tableData as $data) {
        $rollNo = $data['rollNo'];
        $attendence = $data['attendence'];
        $convertedMarks = $data['convertedMarks'];

        try {
            // Insert data into the unit_test_marks table
            $sql = "INSERT INTO attendence_marks (roll_no, attendence,converted_marks) 
                    VALUES ('$rollNo', '$attendence', '$convertedMarks')";
            $conn->query($sql);
        } catch (Exception $e) {
            // Handle any errors
            $response = "Error occurred while inserting marks" . $e->getMessage();
            break; // Exit the loop as further insertions are unnecessary
        }
    }

    // If response is still empty, data was inserted successfully
    if (!$response) {
        $response = "Data inserted successfully";
    }
} else {
    $response = "No data received";
}

// Send response back to the JavaScript function
echo $response;
?>