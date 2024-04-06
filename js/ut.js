
function validateForm() {

   
    var subject = document.getElementById("subject").value;
    var classSelected = document.getElementById("class").value;

    if (subject === "Choose Subject" || classSelected === "Choose Class") {
        alert("Please select both subject and class");
        return false; // Prevent form submission
    }
    return true; // Allow form submission

}

