<?php
include 'config.php'; // Include your database connection file

// Initialize response message
$response = "";

// Check if tableData is received
if(isset($_POST['tableData'])) {
    // Retrieve the tableData from the AJAX request
    $tableData = $_POST['tableData'];
    $subject = $_POST['course'];

    $query = "SELECT course_code FROM courses WHERE course_name = '$subject'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $courseCode = $row['course_code'];
    // Iterate over each row in the tableData array
    foreach ($tableData as $data) {
        $rollNo = $data['rollNo'];
        $marks = $data['marks'];
        $convertedMarks = $data['convertedMarks'];

        try {
            // Insert data into the unit_test_marks table
            $sql = "INSERT INTO unit_test_marks (course_code,roll_no, marks, converted_marks) 
                    VALUES ('$courseCode','$rollNo', '$marks', '$convertedMarks')";
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