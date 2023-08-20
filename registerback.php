<?php
include('connection.php');
 
if(isset($_POST['kathighths'])){
	 
// Escape user inputs for security
$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
 
// Attempt insert query execution
$sql = "INSERT INTO teachers (firstname, lastname, email, username, password) VALUES ('$firstname', '$lastname', '$email','$username','$password')";
if(mysqli_query($conn, $sql)){
      header('Location: login.html');
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 
// Close connection
mysqli_close($conn);
}


else{
$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
 
// Attempt insert query execution
$sql = "INSERT INTO students (firstname, lastname, email, username, password) VALUES ('$firstname', '$lastname', '$email','$username','$password')";
if(mysqli_query($conn, $sql)){
    echo "Records added successfully.",
    header('Location: login.html');
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 
// Close connection
mysqli_close($conn);
}
?>
