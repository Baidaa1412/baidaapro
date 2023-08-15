<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "useraccounts";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Read JSON input
    $data = json_decode(file_get_contents("php://input"), true);
    $email = $data['email'];
    $password = $data['password'];
    
    $response = array(); // Create an empty response array
    
    $sql = "SELECT * FROM users WHERE `email` = ? && password1='$password' ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email); // Bind both parameters
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password1'])) {
            if ($row['user_type'] === 'super_user') {
                header("Location: user_dashboard.php");
            } else {
                $_SESSION['email'] = $email;
                $_SESSION['name'] = $row['first_name'] . ' ' . $row['middle_name'] . ' ' . $row['last_name'];
                $_SESSION['familyName'] = $row['familyname'];
                header("Location: admin_dashboard.php");
            }
            
            // You can set additional session variables as needed
            
        } else {
           
            $response['success'] = true;
            $response['redirect'] = 'admin_dashboard.php';
        }
    } else {
        $response['success'] = false;
        $response['message'] = 'Invalid password.';
    }}
    else {
        $response['success'] = false;
        $response['message'] = 'not found';
    }

    header('Content-Type: application/json');
    echo json_encode($response);


$conn->close();
?>
