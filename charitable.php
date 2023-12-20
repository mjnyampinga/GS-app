<?php
// Database information
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

// Retrieve data from the HTML form
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$location = $_POST['location'];
$capacity = $_POST['capacity'];
$diet = $_POST['message'];
$schedule = $_POST['availability'];

// Remove any non-digit characters from the phone number
$phone = preg_replace('/\D/', '', $phone);

// Validate the phone number structure
if (preg_match('/^\+?\d{1,3}[9\d]{2,13}$/', $phone)) {
    // Phone number structure is valid, proceed with storing the information in the database

    // Use prepared statement to prevent SQL injection
    $sql = "INSERT INTO charitableorg (name, email, phone, location, capacity, diet, schedule, date) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssissi', $name, $email, $phone, $location, $capacity, $diet, $schedule);
    $stmt->execute();
    
    // Check for errors
    if ($stmt->error) {
        echo "Error executing query: " . $stmt->error;
    } else {
        // Redirect to the thank you page
        header("Location: thankyou.html");
        exit();
    }
} else {
    // Phone number structure is invalid, display an error message to the user
    echo "Invalid phone number format. Please enter a valid phone number.";
}

// Close connection
$stmt->close();
$conn->close();
?>
