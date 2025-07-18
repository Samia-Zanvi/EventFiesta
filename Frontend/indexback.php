<?php
// Check if the form is submitted

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form data and store it in the backend (you need to implement this part)
    $name = $_POST["name"];
    $email = $_POST["Email"];
    $dob = $_POST["dob"];
    $phone = $_POST["phone"];
    $Gender = $_POST["Gender"];
    $religion = $_POST["Religion"];
     $packages = $_POST["packages"];

    // Replace the following with your actual database connection code
    $dbConnection = mysqli_connect("localhost", "root", "", "cse227.1");

    // Check if the connection was successful
    if (!$dbConnection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Escape special characters to prevent SQL injection
    $name = mysqli_real_escape_string($dbConnection, $name);
    $email = mysqli_real_escape_string($dbConnection, $email);
    $dob = mysqli_real_escape_string($dbConnection, $dob);
    $phone = mysqli_real_escape_string($dbConnection, $phone);
    $Gender = mysqli_real_escape_string($dbConnection, $Gender);
    $religion = mysqli_real_escape_string($dbConnection, $religion);
    $packages = mysqli_real_escape_string($dbConnection, $packages);

    // Check if the email already exists in the database
    $checkQuery = "SELECT * FROM registration WHERE email = '$email'";
    $result = mysqli_query($dbConnection, $checkQuery);

    if (mysqli_num_rows($result) > 0) {
        echo "<p>Email is already registered. Please use a different email.</p>";
    } else {
        // Insert data into the database
        $insertQuery = "INSERT INTO Registration (name, email, dob, phone, gender, religion, packages) VALUES ('$name', '$email', '$dob', '$phone', '$Gender', '$religion', '$packages')";

        if (mysqli_query($dbConnection, $insertQuery)) {
            echo "<p>Contragulations,your registration is successful!</p>";
        } else {
            echo "Error: " . $insertQuery . "<br>" . mysqli_error($dbConnection);
        }
    }

    // Close the database connection
    mysqli_close($dbConnection);
}
?>
