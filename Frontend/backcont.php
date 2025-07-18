<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Process form data
        $name = $_POST["name"];
        $email = $_POST["email"];
        $Gender= $_POST["Gender"];
        $message = $_POST["message"];

        // Process the rest of the form data as needed
        $dbConnection = mysqli_connect("localhost", "root", "", "cse227.1");
        $query = "INSERT INTO review(name, email, gender,review) VALUES ('$name', '$email','$Gender','$message')";
        mysqli_query($dbConnection, $query);
        mysqli_close($dbConnection);

        // Display a success message 
        echo "<p>Form submitted successfully!</p>";
    } else {
        // Handle the case where error occur
        echo "<p>Error occur </p>";
    }

?>
