<?php
require("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);

    $firstname = $data['firstname'];
    $middle_name = $data['middle_name'];
    $lastname = $data['lastname'];
    $familyname = $data['familyname'];
    $email = $data['email'];
    $phonenumber = $data['phonenumber'];
    $password = $data['password'];
    $dob = $data['dob'];
    $user_type=$data['user_type'];

    $sql = "INSERT INTO users (firstname, middle_name, lastname, familyname, email, phonenumber, password1, birth,user_type)
            VALUES ('$firstname', '$middle_name', '$lastname', '$familyname', '$email', '$phonenumber', '$password', '$dob','$user_type')";
$response = array();
if ($conn->query($sql) === true) {
    $response['message'] = "Data stored successfully";
 
} else {
    $response['message'] = "Error: " . $sql . "<br>" . $conn->error;
}


    echo json_encode($response);
}

$conn->close();
?>
