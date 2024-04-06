<?php
include 'config.php';

require ('fpdf/fpdf.php');

$subject = "ABC";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['down'])) {
        $subject = $_POST['hiddenSubject'];
        $batch = $_POST['hiddenBatch'];
        $class = $_POST['hiddenClass'];
        $type=$_POST['hiddenGenerate'];
        if($type=="classwise"){
            if($class=="SE9"){
                $sql = "SELECT roll_no, name FROM students where roll_no>=23101 and roll_no<=23180";
            }else if($class=="SE10"){
                $sql = "SELECT roll_no, name FROM students where roll_no>=23201 and roll_no<=23280";
            }else if($class=="SE11"){
                $sql = "SELECT roll_no, name FROM students where roll_no>=23361 and roll_no<=23363";
            }
           
        }else if($type=="batchwise"){
            $sql = "SELECT roll_no, name FROM students where batch='$batch'";
        }
        
        $s = "SELECT course_code FROM courses WHERE course_name='$subject'";

        $result = $conn->query($sql);
        $result3 = $conn->query($s);
        $row2 = $result3->fetch_assoc(); // Fetch course code

        $pdf = new FPDF();
        $pdf->AddPage();

        // College logo
        $pdf->Image('img/pictlogo.png', 15, 5, 20);

        // College name
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, 'Pune Institute of Computer Technology, pune', 0, 1, 'C');
        $pdf->Cell(0, 10, 'TERMWORK SHEET', 0, 1, 'C');
        // Separator line
        $pdf->SetLineWidth(0.5);
        $pdf->Line(10, 35, 200, 35);
        $pdf->Ln(7); // Line break

        // Fetch course details
        $courseDetails = $subject; // No need to fetch course details here

        // Class name, course code, and course name
        $pdf->SetFont('Arial', 'B', 12);

        // Course Code
        $pdf->Cell(30, 10, 'Course Code:', 0, 0); // No line break
        $pdf->Cell(50, 10, $row2['course_code'], 0, 0); // No line break

        // Course Name
        $pdf->Cell(30, 10, 'Course Name:', 0, 0); // No line break
        $pdf->Cell(50, 10, $subject, 0, 0); // With line break

        // Class
        if ($batch != "Choose Batch") {
            $pdf->Cell(15, 10, 'Batch:', 0, 0); // No line break
            $pdf->Cell(0, 10, $batch, 0, 2); // With line break
        } elseif (isset($class)) {
            $pdf->Cell(15, 10, 'Class:', 0, 0); // No line break
            $pdf->Cell(0, 10, $class, 0, 2); // With line break
        }

        $pdf->Ln(10); // Line break

        // Table header
        $tableX = ($pdf->GetPageWidth() - 160) / 2;
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetX($tableX);
        $pdf->Cell(30, 10, 'Roll No', 1, 0, 'C');
        $pdf->Cell(100, 10, 'Name', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Marks', 1, 1, 'C');

        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                $tableX = ($pdf->GetPageWidth() - 160) / 2;
                $pdf->SetFont('Arial', '', 12);
                $pdf->SetX($tableX);
                $pdf->Cell(30, 10, $row['roll_no'], 1, 0, 'C');
                $pdf->Cell(100, 10, $row['name'], 1, 0);

                // Fetch marks for the current student and course
                $roll = $row['roll_no'];

                $code = $row2['course_code'];
                $sql2 = "SELECT converted_marks FROM termwork_marks WHERE course_code='$code' AND roll_no='$roll'";
                $result2 = $conn->query($sql2);

                if ($result2->num_rows > 0) {
                    $row2_marks = $result2->fetch_assoc(); // Rename the variable to avoid overwriting
                    $pdf->Cell(30, 10, $row2_marks['converted_marks'], 1, 1, 'C');
                } else {
                    $pdf->Cell(30, 10, '-', 1, 1, 'C'); // If no marks are available
                }
            }
        } else {
            $pdf->Cell(30, 10, "No rows", 1, 1, 'C');
        }

        ob_clean();

        // Output the PDF
        $pdf->Output();
    }
}
?>


<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css/termWork.css">
    <link rel="shortcut icon" type="x-icon" href="img/logo.png">
    <!-- <link rel="stylesheet" type="text/css" href="/bootstrap.css"/> -->

    <!-- font style -->
    <link href="https://fonts.googleapis.com/css?family=Dosis:400,500|Poppins:400,700&amp;display=swap" rel="stylesheet"/>

    <!-- fontawsome css -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">

     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>PICT | Termwork Calculation</title> 
</head>
<body>
    <header class="header_section">
        <a class="navbar-brand" href="ballot">
        </a>
      </header>
      <!-- end header section -->

    <div class="download">
       <form method="post">
        <input type="submit" class="down" id="down" value="Download Here" name="down">
        <input type="hidden" id="hiddenSubject" name="hiddenSubject" value="">
        <input type="hidden" id="hiddenBatch" name="hiddenBatch" value="">
        <input type="hidden" id="hiddenClass" name="hiddenClass" value="">
        
        <input type="hidden" id="hiddenGenerate" name="hiddenGenerate" value="">

</form>
    </div>

    <div class="button">

     <button id="generateClassWise" onclick="show1()">Generate ClassWise</button>
     <button id="generateBatchWise" onclick="show2()">Generate BatchWise</button>

    </div>


<form class="form" onsubmit="return validate()">

    <div class="choice" id="choice">
         <select name="subject" class="subject">
            <option selected disabled>Choose Subject</option>
            
            <option value="EM3">EM3</option>
            <option value="DMS">DMS</option>
            <option value="CG">CG</option>
            <option value="PA">PA</option>
            <option value="PBL">PBL</option>
          </select>

          <select name="batch" class="batch" id="batch" >
          <option selected disabled>Choose Batch</option>
            <option value="E9">E9</option>
            <option value="F9">F9</option>
            <option value="G9">G9</option>
            <option value="H9">H9</option>
            <option value="E10">E10</option>
            <option value="F10">F10</option>
            <option value="G10">G10</option>
            <option value="G10">H10</option>
            <option value="E11">E11</option>
            <option value="F11">F11</option>
            <option value="G11">G11</option>
            <option value="H11">H11</option>
        </select>

        
        <select name="class" class="class" id="class">
            <option selected disabled>Choose Class</option>
            <option value="SE9">SE9</option>
            <option value="SE10">SE10</option>
            <option value="SE11">SE11</option>
           
          </select>


</div>   

            <div class="submit">
                    <input type="submit"  value="calculate TermWork" class="calc" id="calc" name="calc">
             </div>

</form>


</body>

<script>

    

    function show1()
    {

        document.querySelector(".subject").style.display="block";
        document.querySelector(".class").style.display="block";
        document.querySelector(".batch").style.display="none";
        document.getElementById("calc").style.display="block";
    
    }

    
    function show2()
    {

        document.querySelector(".subject").style.display="block";
        document.querySelector(".batch").style.display="block";
        document.querySelector(".class").style.display="none";
        document.getElementById("calc").style.display="block";
    
    }

    function validate() {
    var flag = true;
    var subject = document.querySelector('.subject');

  
    var batch = document.querySelector('.batch');
    var selectedClass = document.querySelector('.class');

    if (subject.value === 'Choose Subject' || (batch.value === 'Choose Batch' && selectedClass.value === 'Choose Class')) {
        alert("Please select both Subject and either Batch or Class.");
        flag = false;
    }

    return flag; // Return true if validation passes, false otherwise
}
var jsonData;
$(document).ready(function(){
    $("#generateClassWise").click(function() {
        document.getElementById("hiddenGenerate").value = "classwise";
    });

    $("#generateBatchWise").click(function() {
        document.getElementById("hiddenGenerate").value = "batchwise";
    });
        // Click event handler for submit marks button
        $("#calc").click(function(event){
            // Get the selected subject
            event.preventDefault();

            if(validate()){
                console.log("hi");
                var batch = document.querySelector('.batch').value;
                var selectedClass = document.querySelector('.class').value;
                var subject = document.querySelector('.subject').value;

                if(batch==='Choose Batch'){
                    var grp_name=document.querySelector('.class').value;
                }else if(selectedClass==="Choose Class"){
                    var grp_name=document.querySelector('.batch').value;
                }
               
                console.log(grp_name);
                console.log(subject);
                var grp_name = batch === 'Choose Batch' ? selectedClass : batch;

                document.getElementById("hiddenSubject").value = subject; // Set hidden field value
                document.getElementById("hiddenBatch").value = batch; // Set hidden field va
                document.getElementById("hiddenClass").value =selectedClass ; // Set hidden field va
                

                // Send marks data to PHP script using AJAX
                $.ajax({
                    url: "tw_marks.php",
                    type: "POST",
                    data: {subject:subject,grp_name:grp_name},
                    success: function(response) {
                   alert(response);

                   if(response==="Please enter unit test marks, assignment marks, and attendance marks for the selected course first."){
                    document.getElementById("down").style.display="none";
                   }else{
                    document.getElementById("down").style.display="block";
                   }
             }
                     // Log the response data to the console for debugging
        // Your code to handle the response data goes here
    
                    });
                
                    
            }
        
        });
    });


</script>
</html>