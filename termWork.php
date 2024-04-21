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
            <span>
            PICT
            </span>
        </a>
      </header>
      <!-- end header section -->

    <div class="download">
        <input type="submit" class="down" id="down" value="Download Here">
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
                    <input type="submit"  value="Calculate Term Work" class="calc" id="calc">
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



$(document).ready(function(){
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
               
                // Send marks data to PHP script using AJAX
                $.ajax({
                    url: "tw_marks.php",
                    type: "POST",
                    data: {subject:subject,grp_name:grp_name},
                    success: function(response){ // Show success message or handle accordingly
                        alert(response);
                    }
                });

                document.getElementById("down").style.display="block";
            }
        });
    });


    
    // var pdfData = "data:application/pdf;base64," + response;
    //                     var newTab = window.open();
    //                     newTab.document.write('<iframe width="100%" height="100%" src="' + pdfData + '"></iframe>');
  


</script>
</html>