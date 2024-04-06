<?php
include 'config.php';

$user = $_POST['user'];
$pass = $_POST['pass'];

$username = "SELECT username FROM `login` WHERE sr=1";

$password = "SELECT passwords FROM `login` WHERE sr=1";

// Execute the query to get the username
$result = mysqli_query($conn, $username);
$result2=mysqli_query($conn, $password);

// Check if the query was successful
if ($result && $result2) {
    // Fetch the result row as an associative array
    $row = mysqli_fetch_assoc($result);
    $row2 = mysqli_fetch_assoc($result2);
    
    // Extract the username from the row
    $username = $row['username'];
    $password= $row2['passwords'];

    $usernameString = (string)$username;
    $passwordString = (string)$password;

    if($usernameString===$user && $passwordString===$pass){
        echo "Login Successful";
    }
    else{
        echo "Incorrect username and password";
    }

    // Output the username string
   
} else {
    // Handle the case where the query fails
    echo "Error executing query: " . mysqli_error($conn);
}

// Remember to close the database connection
mysqli_close($conn);
?>
