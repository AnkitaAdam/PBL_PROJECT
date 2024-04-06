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
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $courseCode = $row['course_code'];

        // Iterate over each row in the tableData array
        foreach ($tableData as $data) {
            $rollNo = $data['rollNo'];
            $marks = $data['marks'];
            $convertedMarks = $data['convertedMarks'];

            try {
                // Insert data into the assignment_marks table
                $sql = "INSERT INTO assignment_marks (course_code,roll_no, total, converted_marks) 
                        VALUES ('$courseCode','$rollNo', '$marks', '$convertedMarks')";
                if ($conn->query($sql)) {
                    $response = "Data inserted successfully";
                } else {
                    throw new Exception($conn->error);
                }
            } catch (Exception $e) {
                // Handle any errors
                $response = "Error occurred while inserting marks: " . $e->getMessage();
                break; // Exit the loop as further insertions are unnecessary
            }
        }
    } else {
        $response = "Error: " . mysqli_error($conn); // Debugging statement
    }
} else {
    $response = "No data received";
}

// Send response back to the JavaScript function
echo $response;
?>
