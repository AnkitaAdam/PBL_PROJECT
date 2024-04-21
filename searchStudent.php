<?php
include 'config.php'; // Include your database connection file

// Initialize response message
$response = array();

// Check if rollNo and subject are received
if(isset($_POST['rollNo']) && isset($_POST['subject'])) {
    // Retrieve rollNo and subject from the AJAX request
    $rollNo = $_POST['rollNo'];
    $subject = $_POST['subject'];

    // Query to fetch student details
    $query = "SELECT roll_no, name, batch FROM students WHERE roll_no = '$rollNo'";
    $result = mysqli_query($conn, $query);

    // Check if data is found
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $roll = $row['roll_no'];

        $query3="SELECT course_code from courses where course_name='$subject'";
        $result3=mysqli_query($conn,$query3);
        $row3=mysqli_fetch_assoc($result3);
        $courseCode=$row3['course_code'];
        // echo $courseCode;
        // Query to fetch unit test marks
        $query2 = "SELECT marks, converted_marks FROM unit_test_marks WHERE Roll_no='$roll' AND course_code='$courseCode'";
        $result2 = mysqli_query($conn, $query2);

        $query4="SELECT total, converted_marks FROM assignment_marks WHERE Roll_no='$roll' AND course_code='$courseCode'";
        $result4 = mysqli_query($conn, $query4);

        $query5="SELECT attendence, converted_marks FROM attendence_marks WHERE Roll_no='$roll'";
        $result5 = mysqli_query($conn, $query5);

        $query6="SELECT termwork_marks, converted_marks FROM termwork_marks WHERE Roll_no='$roll' AND course_code='$courseCode'";
        $result6 = mysqli_query($conn, $query6);

        if(mysqli_num_rows($result2) > 0 && mysqli_num_rows($result4) > 0 && mysqli_num_rows($result5) > 0 && mysqli_num_rows($result6) > 0){  
            $row2 = mysqli_fetch_assoc($result2);
            $row4 = mysqli_fetch_assoc($result4);
            $row5 = mysqli_fetch_assoc($result5);
            $row6 = mysqli_fetch_assoc($result6);

            $studentData = array(
                'name' => $row['name'],
                'rollNo' => $row['roll_no'],
                'batch' => $row['batch'],
                'subject' => $subject,
                'ut_marks' => $row2['marks'],
                'ut_converted_marks' => $row2['converted_marks'],
                'ass_marks'=>$row4['total'],
                'ass_converted_marks'=>$row4['converted_marks'],
                'att'=>$row5['attendence'],
                'att_marks'=>$row5['converted_marks'],
                'tw_marks'=>$row6['termwork_marks'],
                'tw_converted_marks'=>$row6['converted_marks']
            );
    
            // Encode studentData array as JSON
            $response = $studentData;

        }else{
            $response['error'] = "Marks are not entered yet";
        }
    } else {
        // If no data found, set error message
        $response['error'] = "No data found for roll number: $rollNo";
    }
} else {
    // If rollNo or subject not received, set error message
    $response['error'] = "No roll number or subject received";
}

// Send response as JSON
echo json_encode($response);
?>
