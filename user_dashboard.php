<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

  <h1 id="h1">Welcome </h1>
</body>
</html>
<?php
$servername = "localhost";
$username = "root";
$dbpassword = "";
$dbname = "useraccounts";

$conn = new mysqli($servername, $username, $dbpassword, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if the user is a super user
// Replace 'user_type_column' with the actual column name in your database that represents the user type
$sql = "SELECT user_type FROM userinfo WHERE user_type = 'super_user'";
$result = $conn->query($sql);

// If the user is a super user, display the table
if ($result->num_rows > 0) {
  $sql = "SELECT * FROM userinfo";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Email</th><th>Mobile</th><th>First Name</th><th>Middle Name</th><th>Last Name</th><th>Family Name</th><th>Date of Birth</th><th>User Type</th></tr>";

    while ($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row['email'] . "</td>";
      echo "<td>" . $row['mobile'] . "</td>";
      echo "<td>" . $row['first_name'] . "</td>";
      echo "<td>" . $row['middle_name'] . "</td>";
      echo "<td>" . $row['last_name'] . "</td>";
      echo "<td>" . $row['familyname'] . "</td>";
      echo "<td>" . $row['dob'] . "</td>";
      echo "<td>" . $row['user_type'] . "</td>";
      echo "</tr>";
    }

    echo "</table>";
  } else {
    echo "No users found.";
  }
} else {
  echo "You are not authorized to view this table.";
}

$conn->close();
?>