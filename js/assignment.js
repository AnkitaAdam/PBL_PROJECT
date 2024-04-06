
function validateForm() {


    var subject = document.getElementById("subject").value;
    var classSelected = document.getElementById("class").value;
    var Totalass = document.getElementById("TotalAss").value;
    

    if (subject === "Choose Subject" || classSelected === "Choose Batch" || Totalass==="Total Assignment" ) {

        alert("Please select all subject,class,number of assignments");
        return false; // Prevent form submission
    }
    return true; // Allow form submission
}