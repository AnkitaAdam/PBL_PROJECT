document.getElementById("searchBtn").addEventListener("click", function() {
    // Simulated student data
    const studentData = {
        name: "Vaishnavi",
        rollNo: "12345",
        batch: "Batch 1",
        subject: "Mathematics"
        // Add other student data here
    };
    
    // Simulated search result, replace with actual search logic
    // const searchedRollNo = document.getElementById("rollNo").value;
    // if (searchedRollNo === studentData.rollNo) {
    //     displayStudentDetails(studentData);
    // } else {
    //     alert("Student not found!");
    // }
});

function displayStudentDetails(studentData) {
    // Display student details section
    document.querySelector(".student-details").style.display = "block";

    // Update student details
    document.getElementById("name").textContent = studentData.name;
    document.getElementById("rollNo").textContent = studentData.rollNo;
    document.getElementById("batch1").textContent = studentData.batch;
    document.getElementById("subject").textContent = studentData.subject;

    document.getElementById("assignmentMarks").innerText = "77";
}
