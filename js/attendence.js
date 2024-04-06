function validateForm() {
    var classSelected = document.getElementById("class").value;

    if (classSelected === "Choose Class") {
        alert("Please select the class");
        return false; // Prevent form submission
    }
    return true; // Allow form submission

}
