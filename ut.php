<?php
include 'config.php';

// $sql="select * from `Student`";
// $result=mysqli_query($conn,$sql);

// if($result)
// {
//       $row=mysqli_fetch_assoc($result);
//       echo $row['Name'];
// }
?>

<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css/ut.css">
    <link rel="shortcut icon" type="x-icon" href="img/logo.png">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    

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
      <form method="post" onsubmit="return validateForm()">
    <section class="table__header">
    
    <div class="container1">
    <div class="item" id="div1">
       
        <select name="course" class="subject" id="subject">
        <option selected disabled>Choose Subject</option>
            
            <option value="EM3">EM3</option>
            <option value="PA">PA</option>
            <option value="DMS">DMS</option>
            <option value="CG">CG</option>
          </select>
          
    </div>

    <div class="item" id="div2">
     
        <select name="class" class="class1" id="class" >
            <option selected disabled>Choose Class</option>
            <option value="SE9">SE9</option>
            <option value="SE10">SE10</option>
            <option value="SE11">SE11</option>
           
          </select>
    </div>
    <div class="item" id="div3">
        <input type="submit" class="sub" value="Show Students" name="submit">
    </div>    

</div>

</section>
</form>
      <!-- display records here -->
      <div class="container">
        <form action="" method="POST" onsubmit="return submit2()">
            <table class="table" >
                <thead class="thead-dark">
                    <tr>
                        <!-- <th>Sr. no.</th> -->
                        <th width="33%">Roll No</th>
                        <th width="33%">Name</th>
                        <th width="33%">Marks</th>
                        <th width="33%">Converted Marks</th>
                    </tr>
                    <!-- <tr style="white-space: fit;">
                        <td><img src="bjp.png" alt="bjp" height="30px" width="30px"></td>
                        <td>Priyanka Sundalam</td>
                        <td>BJP</td>
                    </tr> -->
                </thead>
                <tbody>
                        <!-- <tr>
                            <td width="33%"><img src="img/bjp.png" alt="bjp" height="30px" width="30px"></td>
                            <td width="33%">Priyanka Sundalam</td>
                            <td width="33%">BJP</td>
                        </tr> -->
                        <?php
                        if(isset($_POST['submit'])) {
                        $class = $_POST['class'];
                        $course=$_POST['course'];

                        $sql="";
                        if($class=="SE9"){
                            $sql = "SELECT Roll_no, Name FROM students WHERE Roll_no>='23101' AND Roll_no<='23180'";
                        }elseif($class=="SE10"){
                            $sql = "SELECT Roll_no, Name FROM students WHERE Roll_no>'23180' AND Roll_no<='23280'";
                        }else if($class=="SE11"){
                            $sql = "SELECT Roll_no, Name FROM students WHERE Roll_no>='23361' AND Roll_no<='23363'";
                        }
                        
                        $result = $conn->query($sql);
  
                        if ($result->num_rows > 0) {
                            // Output data of each row
                            $counter=1;
                            while($row = $result->fetch_assoc()) {
                              echo '<tr>
                                <td>'.$row["Roll_no"].'</td>
                                <td style="text-align: left;">'.$row["Name"].'</td>
                                <td><input type="number" name="marks_'.$counter.'" value="" required max="90" min="0"> /90</td>
        
                                <td>
                                    <span class="converted-marks">/20</span>
                                </td>
                                </tr>';
                              $counter++;
                            }
                            
                            echo '<script>
                               
                                    document.addEventListener("DOMContentLoaded", function () {
                                    document.getElementById("submit_marks_btn").style.display = "block";
                                    document.getElementById("convert_marks_btn").style.display = "block";
                                   
                                     

                                });
                                                              
                             
                            </script>';

                        }
                      } 
                     // $conn->close();
                       ?>
                    
                    
                    </tbody>
            </table>

            <div class="submit2"  style="display:flex;justify-content:center;flex-direction:column;float:right">
                    </br>
                    </br>
            <input type="button" id="convert_marks_btn" class="submit" value="Convert Marks" style="color:black;border-radius: 7px;cursor: pointer;font-size: 16px; padding: 10px 20px;display:none;background-color:#d1e0e0;border-style:solid;border-color:black">
                    </br></br>
            <input type="submit" id="submit_marks_btn" class="submit" value="Submit Marks" disabled style="color:black;border-radius: 7px;cursor: pointer;font-size: 16px; padding: 10px 20px;display:none; background-color:#d1e0e0;border-style:solid;border-color:black" > 
                    </div>         
 
        </form>
      </div>
      
      

      <script src="js/ut.js">


</script>
<script>
 
 function validateForm2(){
    var isValid = true;
    $(".table tbody tr").each(function(){
        var marksInput = $(this).find("input[type='number']");
        var marks = parseInt(marksInput.val());
        if (isNaN(marks) || marks < 0 || marks > 90) {
            alert("Please enter valid marks (between 0 and 90) for all students");
            isValid = false; // Set validation flag to false
            return false; // Exit the loop early
        }
    });

    return isValid; // Return the validation flag
}

$(document).ready(function(){
    // Click event handler for convert marks button
    $("#convert_marks_btn").click(function(event){
        event.preventDefault();
        if(validateForm2()){
            $(".table tbody tr").each(function(){
                var marksInput = $(this).find("input[type='number']");
                var marks = parseInt(marksInput.val());
                // Convert marks to out of 20
                var convertedMarks = Math.ceil((marks / 90) * 20);
                $(this).find(".converted-marks").text(convertedMarks);
            });
            $("#submit_marks_btn").prop("disabled", false);
        }
    });
});

$(document).ready(function(){
        // Click event handler for submit marks button
        $("#submit_marks_btn").click(function(event){
            // Get the selected subject
            event.preventDefault();
            if ($("#convert_marks_btn").prop("disabled")) {
                alert("Please convert the marks before submitting.");
                return; // Exit the function if Convert Marks button is not clicked
            }
            if(validateForm2()){
                console.log("hi");
                var course = $(".subject").val();
                
                // Array to store marks data
                var tableData = [];
                var rollNo;
                var marks;
                var convertedMarks;
                // Iterate over each row in the table to collect marks and roll numbers
                $(".table tbody tr").each(function(){
                    rollNo = $(this).find("td:nth-child(1)").text();
                    marks = $(this).find("input[type='number']").val();
                    convertedMarks = $(this).find(".converted-marks").text();

                    tableData.push({
                        rollNo: rollNo,
                        marks: marks,
                        convertedMarks: convertedMarks
                    });
                });

                
                
                // Send marks data to PHP script using AJAX
                $.ajax({
                    url: "im.php",
                    type: "POST",
                    data: {course: "<?php echo $course; ?>", tableData: tableData},
                    success: function(response){
                        // alert(data);
                        alert(response); // Show success message or handle accordingly
                    }
                });
            }
        });
    });
    </script>
                   
</body>
</html>