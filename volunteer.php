<?php
//Database information
$servername = "localhost"; 
$username = "mulimuoki001"; 
$password = "15121@Muli"; 
$dbname = "mulimuoki001"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}





$date = date('Y-m-d H:i:s');

// Retrieve data from the HTML form
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$availability = $_POST['availability'];
$location = $_POST['location'];

$date = date('Y-m-d H:i:s');

// Remove any non-digit characters from the phone number
$phone = preg_replace('/\D/', '', $phone);

// Validate the phone number structure
if (preg_match('/^\+?\d{1,3}[9\d]{2,13}$/', $phone)) {
    // Phone number structure is valid, proceed with storing the information in the database

    // Hash the password
   
    // Insert data into the database
    $sql = "INSERT INTO volunteers (name, email,  location, availability, phone,  date) VALUES ('$name', '$email',  '$location', '$availability', '$phone', '$date')";
    $result = $conn->query($sql);
    if ($result === false) {
        throw new Exception("Error executing query: " . $conn->error);
    }

    // Close connection
    $conn->close();
    header("Location: thankyou.html");
    exit();
} else {
    // Phone number structure is invalid, display an error message to the user
    echo "Invalid phone number format. Please enter a valid phone number.";
}


// Close connection
$conn->close();
header("Location: thankyou.html");
exit();
?>
