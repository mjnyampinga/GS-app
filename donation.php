<?php
//Database information
$servername = "localhost"; // Replace with your server's hostname or IP address
$username = "nyampinga03"; // Replace with your MySQL username
$password = "12345@jose03"; // Replace with your MySQL password
$dbname = "nyampinga03"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}





$date = date('Y-m-d H:i:s');

// Retrieve data from the HTML form
$name = $_POST['firstName'];
$email = $_POST['email'];
$phoneNumber = $_POST['phoneNumber'];
$message = $_POST['message'];

$date = date('Y-m-d H:i:s');

// Remove any non-digit characters from the phone number
$phoneNumber = preg_replace('/\D/', '', $phoneNumber);

// Validate the phone number structure
if (preg_match('/^\+?\d{1,3}[9\d]{2,13}$/', $phoneNumber)) {
    // Phone number structure is valid, proceed with storing the information in the database

    // Hash the password
   
    // Insert data into the database
    $sql = "INSERT INTO donations (name, email,  phoneNumber, message, donationDate) VALUES ('$name', '$email',  '$phoneNumber', '$message', NOW())";
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
