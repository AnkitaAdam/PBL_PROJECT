<?php
require('fpdf/fpdf.php');
include 'config.php'; // Include your database connection file

// Initialize response message
$response = "";
static $start_roll=0;
static $end_roll=0;
// Check if tableData is received
if(isset($_POST['grp_name'])) {
    // Retrieve the tableData from the AJAX request
    $subject = $_POST['subject'];
    $grp_name = $_POST['grp_name'];
    $query = "SELECT course_code FROM courses WHERE course_name = '$subject'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $courseCode = $row['course_code'];
    // Iterate over each row in the tableData array

    if($grp_name=="SE9" || $grp_name=="SE10" || $grp_name=="SE11"){
        if($grp_name=="SE9"){
            $start_roll=23101;
            $end_roll=23180;
            $studentQuery = "SELECT * FROM students WHERE roll_no>=23101 and roll_no<=23180";
            $studentResult = mysqli_query($conn, $studentQuery);
        }else if($grp_name=="SE10"){
            $start_roll=23201;
            $end_roll=23280;
            $studentQuery = "SELECT * FROM students WHERE roll_no>=23201 and roll_no<=23280";
            $studentResult = mysqli_query($conn, $studentQuery);
        }else if($grp_name=="SE11"){
            $start_roll=23361;
            $end_roll=23363;
            $studentQuery = "SELECT * FROM students WHERE roll_no>=23361 and roll_no<=23363";
            $studentResult = mysqli_query($conn, $studentQuery);
        }

        $ut = "SELECT * FROM unit_test_marks WHERE course_code = '$courseCode' and roll_no>='$start_roll' and roll_no<='$end_roll'";
        $utResult = mysqli_query($conn, $ut);
        $ass = "SELECT * FROM assignment_marks WHERE course_code = '$courseCode' and roll_no>='$start_roll' and roll_no<='$end_roll'";
        $assResult = mysqli_query($conn, $ass);
        $att = "SELECT * FROM attendence_marks WHERE roll_no>='$start_roll' and roll_no<='$end_roll'";
        $attResult = mysqli_query($conn, $att);
        // echo "att - $attResult";
        try{
            $countQuery = "SELECT COUNT(*) AS student_count FROM students WHERE roll_no BETWEEN $start_roll AND $end_roll";
            $countResult = mysqli_query($conn, $countQuery);
            $countRow = mysqli_fetch_assoc($countResult);
            $studentCount = $countRow['student_count'];

            $countQuery1 = "SELECT COUNT(*) AS student_cnt FROM termwork_marks WHERE roll_no BETWEEN $start_roll AND $end_roll";
            $countResult1 = mysqli_query($conn, $countQuery1);
            $countRow1 = mysqli_fetch_assoc($countResult1);
            $studentCount1 = $countRow1['student_cnt'];
            
            // echo $studentCount." - ".mysqli_num_rows($utResult);
            if($studentCount==mysqli_num_rows($utResult) && $studentCount==mysqli_num_rows($assResult)  && $studentCount==mysqli_num_rows($attResult)&& $studentCount==$studentCount1) {
                while ($studentRow = mysqli_fetch_assoc($studentResult)) {
                    $rollNo = $studentRow['roll_no'];
                    
                    // Fetch unit test marks for the student
                    $unitTestQuery = "SELECT converted_marks FROM unit_test_marks WHERE roll_no = '$rollNo'";
                    $unitTestResult = mysqli_query($conn, $unitTestQuery);
                    $unitTestMarks = mysqli_fetch_assoc($unitTestResult)['converted_marks'];
            
                    // Fetch assignment marks for the student
                    $assignmentQuery = "SELECT converted_marks FROM assignment_marks WHERE roll_no = '$rollNo'";
                    $assignmentResult = mysqli_query($conn, $assignmentQuery);
                    $assignmentMarks = mysqli_fetch_assoc($assignmentResult)['converted_marks'];
            
                    // Fetch attendance marks for the student
                    $attendanceQuery = "SELECT converted_marks FROM attendence_marks WHERE roll_no = '$rollNo'";
                    $attendanceResult = mysqli_query($conn, $attendanceQuery);
                    $attendanceMarks = mysqli_fetch_assoc($attendanceResult)['converted_marks'];
            
                    // Calculate term work marks
                    $termWorkMarks = ceil($unitTestMarks + $assignmentMarks + $attendanceMarks);
                    $termWork_convertedMarks=ceil((($termWorkMarks/100)*25));
                    // Insert the calculated term work marks into the termwork table
                        $termworkInsertQuery = "INSERT INTO termwork_marks (roll_no, course_code, termwork_marks,converted_marks) VALUES ('$rollNo', '$courseCode', '$termWorkMarks','$termWork_convertedMarks')";
                        mysqli_query($conn, $termworkInsertQuery);
                    
                }
            echo "Termwork marks are calculated";
            


        }else{
            echo "Please enter unit test marks, assignment marks, and attendance marks for the selected course first.";
        }
    }catch(Exception $e){
            // echo $e;
            echo "Termwork is already calculated";
    }
        
    }else if($grp_name=="E9" ||$grp_name=="F9" || $grp_name=="G9" ||$grp_name=="H9" ||$grp_name=="E10" ||$grp_name=="F10" ||$grp_name=="G10" ||$grp_name=="H10" ||$grp_name=="E11" ||$grp_name=="F11" ||$grp_name=="G11" ||$grp_name=="H11"){
        if($grp_name=="E9"){
            $start_roll=23101;
            $end_roll=23120;
        }else if($grp_name=="F9"){
            $start_roll=23121;
            $end_roll=23140;
        }else if($grp_name=="G9"){
            $start_roll=23141;
            $end_roll=23160;
        }else if($grp_name=="H9"){
            $start_roll=23161;
            $end_roll=23180;
        }else if($grp_name=="E10"){
            $start_roll=23201;
            $end_roll=23220;
        }else if($grp_name=="F10"){
            $start_roll=23221;
            $end_roll=23240;
        }else if($grp_name=="G10"){
            $start_roll=23241;
            $end_roll=23260;
        }else if($grp_name=="H10"){
            $start_roll=23261;
            $end_roll=23280;
        }else if($grp_name=="E11"){
            $start_roll=23301;
            $end_roll=23320;
        }else if($grp_name=="F11"){
            $start_roll=23321;
            $end_roll=23340;
        }else if($grp_name=="G11"){
            $start_roll=23341;
            $end_roll=23360;
        }else if($grp_name=="H11"){
            $start_roll=23361;
            $end_roll=23363;
        }
        $studentQuery = "SELECT * FROM students WHERE roll_no>='$start_roll' and roll_no<='$end_roll'";
        $studentResult = mysqli_query($conn, $studentQuery);

        $ut = "SELECT * FROM unit_test_marks WHERE course_code = '$courseCode' and roll_no>='$start_roll' and roll_no<='$end_roll'";
        $utResult = mysqli_query($conn, $ut);
        $ass = "SELECT * FROM assignment_marks WHERE course_code = '$courseCode' and roll_no>='$start_roll' and roll_no<='$end_roll'";
        $assResult = mysqli_query($conn, $ass);
        $att = "SELECT * FROM attendence_marks WHERE roll_no>='$start_roll' and roll_no<='$end_roll'";
        $attResult = mysqli_query($conn, $att);
        try{
            $countQuery = "SELECT COUNT(*) AS student_count FROM students WHERE roll_no BETWEEN $start_roll AND $end_roll";
            $countResult = mysqli_query($conn, $countQuery);
            $countRow = mysqli_fetch_assoc($countResult);
            $studentCount = $countRow['student_count'];
            
            if ($studentCount == mysqli_num_rows($utResult) && $studentCount==mysqli_num_rows($assResult) && $studentCount== mysqli_num_rows($attResult)) {
                while ($studentRow = mysqli_fetch_assoc($studentResult)) {
                    $rollNo = $studentRow['roll_no'];
                    
                    // Fetch unit test marks for the student
                    $unitTestQuery = "SELECT converted_marks FROM unit_test_marks WHERE roll_no = '$rollNo'";
                    $unitTestResult = mysqli_query($conn, $unitTestQuery);
                    $unitTestMarks = mysqli_fetch_assoc($unitTestResult)['converted_marks'];
            
                    // Fetch assignment marks for the student
                    $assignmentQuery = "SELECT converted_marks FROM assignment_marks WHERE roll_no = '$rollNo'";
                    $assignmentResult = mysqli_query($conn, $assignmentQuery);
                    $assignmentMarks = mysqli_fetch_assoc($assignmentResult)['converted_marks'];
            
                    // Fetch attendance marks for the student
                    $attendanceQuery = "SELECT converted_marks FROM attendence_marks WHERE roll_no = '$rollNo'";
                    $attendanceResult = mysqli_query($conn, $attendanceQuery);
                    $attendanceMarks = mysqli_fetch_assoc($attendanceResult)['converted_marks'];
            
                    // Calculate term work marks
                    $termWorkMarks = $unitTestMarks + $assignmentMarks + $attendanceMarks;
                    $termWork_convertedMarks=ceil((($termWorkMarks/100)*25));
                    // Insert the calculated term work marks into the termwork table
                        $termworkInsertQuery = "INSERT INTO termwork_marks (roll_no, course_code, termwork_marks,converted_marks) VALUES ('$rollNo', '$courseCode', '$termWorkMarks','$termWork_convertedMarks')";
                     mysqli_query($conn, $termworkInsertQuery);
                }
            
    echo "Termwork marks are calculated";
    }else{
            echo "Please enter unit test marks, assignment marks, and attendance marks for the selected course first.";
        }
    }catch(Exception $e){
            echo "Termwork is already calculated";
    }
    
    }
}
// else if(isset($_POST['grp_name1'])){
//     echo "hi".$start_roll;
    // $sql = "SELECT roll_no, name FROM students where roll_no>=23361 and roll_no<=23363 ";

    // $sql2 = "SELECT converted_marks FROM termwork_marks where roll_no>=23361 and roll_no<=23363 ";
    // $result = mysqli_query($conn, $sql);

    // $result2= mysqli_query($conn, $sql2);

    
    // $pdf = new FPDF();
    // $pdf->AddPage();

    // // College logo
    // $pdf->Image('img/pictlogo.png', 15, 5, 20);

    // // College name
    // $pdf->SetFont('Arial', 'B', 16);
    // $pdf->Cell(0, 10,'Pune Institute of Computer Technology, pune', 0, 1, 'C');
    // $pdf->Cell(0, 10,'TERMWORK SHEET', 0, 1, 'C');
    // // Separator line
    // $pdf->SetLineWidth(0.5);
    // $pdf->Line(10, 35, 200, 35);
    // $pdf->Ln(7); // Line break

    // // Fetch course details
    // // $courseDetails = fetchCourseDetails($_POST['subject']);
    // $courseDetails ="DMSL";
    // // Class name, course code, and course name
    // $pdf->SetFont('Arial', '', 12);

    // // Course Code
    // $pdf->Cell(27, 10, 'Course Code:', 0, 0); // No line break
    // $pdf->Cell(50, 10, '23357', 0, 0); // No line break

    // // Course Name
    // $pdf->Cell(28, 10, 'Course Name:', 0, 0); // No line break
    // $pdf->Cell(50, 10, 'bng', 0, 0); // With line break

    // // Class
    // $pdf->Cell(15, 10, 'Class:', 0, 0); // No line break
    // $pdf->Cell(0, 10, $selectedClass, 0, 2); // With line break

    // $pdf->Ln(10); // Line break

    // // Table header
    // $tableX = ($pdf->GetPageWidth() - 160) / 2;
    // $pdf->SetFont('Arial', 'B', 12);
    // $pdf->SetX($tableX); 
    // $pdf->Cell(30, 10, 'Roll No', 1, 0, 'C');
    // $pdf->Cell(100, 10, 'Name', 1, 0, 'C');
    // $pdf->Cell(30, 10, 'Marks', 1, 1, 'C');


    // if ($result->num_rows > 0) {
    //     // Output data of each row
    //     while($row = $result->fetch_assoc()) {
    //         $tableX = ($pdf->GetPageWidth() - 160) / 2;
    //         $pdf->SetFont('Arial', 'B', 12);
    //         $pdf->SetX($tableX); 
    //         $pdf->Cell(30, 10,$row['roll_no'], 1, 0, 'C');
    //         $pdf->Cell(100, 10, $row['name'], 1, 0);

    //         if ($row2 = $result2->fetch_assoc()) {
    //             $pdf->Cell(30, 10, $row2['converted_marks'], 1, 1, 'C');
    //         } else {
    //             $pdf->Cell(30, 10, 'N/A', 1, 1, 'C'); // If no marks are available
    //         }
        
    //     }
    // }

    // else {
    //     $pdf->Cell(30, 10,"No rows", 1, 1, 'C');
    // }
    // $conn->close();
    // $pdf->Cell(50, 10,$selectedClass, 0, 0); // With line break

    // ob_clean(); // Clear the output buffer
    // header('Content-Type: application/pdf');
    // header('Content-Disposition: inline; filename="termwork_sheet.pdf"');
    // $pdf_content = $pdf->Output('S'); // Get the PDF content as a string
    // echo base64_encode($pdf_content); // Send the PDF content as base64 in the AJAX response

    // // Exit the script to prevent any additional output
    // exit;
// }

?>