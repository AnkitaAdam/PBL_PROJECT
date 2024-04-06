function validateForm() {
    // Validate input field
    var marksInput = document.getElementById("marks");
    var marks = marks.value.trim(); // Trim any leading or trailing whitespace

    if (marks === "" || isNaN(marks) || parseInt(marks) < 0 || parseInt(marks) > 90) {
        alert("Invalid marks.");
        marks.focus(); // Set focus to marks input field
        return false; // Prevent form submission
    }

    // Validate combobox selections
    var classSelect = document.getElementById("class");
    var subjectSelect = document.getElementById("course");

    if (classSelect.value === "" || subjectSelect.value === "") {
        alert("Please select both class and subject.");
        return false; // Prevent form submission
    }

    // Form is valid, allow submission
    return true;
}