<!DOCTYPE html>
<html>
<head>
    <title>User Information</title>
    <style>
    body{
    background-image:url(./back.png);
    max-width: 100%;
    background-size:cover;
    background-repeat: no-repeat;
}</style>
</head>

<body style="background-image:url(./back.png);">
<?php
session_start();
if (isset($_SESSION['email']) && isset($_SESSION['firstname']) && isset($_SESSION['familyname'])) {
    $email = $_SESSION['email'];
    $firstName = $_SESSION['firstname'];
    $familyName = $_SESSION['familyname'];

    // Extract the first name, last name, and family name from the full name
    $nameParts = explode(' ', $firstName);

    // Ensure there are enough parts before accessing the last name
    if (count($nameParts) >= 2) {
        $lastName = end($nameParts); // Last part is the last name
    } else {
        $lastName = ''; // Set an empty last name
    }

    // Display the user information
    echo "<h1>Welcome, $firstName</h1>";
    echo "<p>Email: $email</p>";
    echo "<p>Full Name: $firstName $lastName $familyName</p>";
} else {
    echo "<h2>Welcome!</h2>";
}
?>
</body>
</html>
