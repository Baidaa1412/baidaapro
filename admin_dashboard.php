<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body style="background-image:url(./back.png);background-repeat: no-repeat;
background-size:cover; ">
  <h1 id="h1" style="text-align: center;">Welcome in Admin Page </h1>

<?php
require("config.php");
$userData="SELECT * FROM users";
$sql=$conn->query($userData);

    if($sql->num_rows > 0){
        echo"<table border='2' style='margin-left: 30%; margin-top:10%;'>";
        echo "<tr>";
        echo "<th>User Name</th>";
        echo "<th>middle_name</th>";
        echo "<th>lasttname</th>";
        echo "<th>familyname</th>";
        echo "<th>User Email</th>";
        echo "<th>phonenumber</th>";
        echo "<th>birth</th>";
        echo "</tr>";

        while($row=$sql->fetch_assoc()){
            echo "<tr>";
            echo "<td>".$row['firstname']."</td>"; 
            echo "<td>".$row['middle_name']."</td>"; 
            echo "<td>".$row['lastname']."</td>";
            echo "<td>".$row['familyname']."</td>"; 
            echo "<td>".$row['email']."</td>";  
            echo "<td>".$row['phonenumber']."</td>";
            echo "<td>".$row['birth']."</td>";
            echo "</tr>";
        }

        echo "</table>";

    } else {
        echo "No Data Found";
    }

?>

<button style=" margin-left:47% ;margin-top:4%; background-color:#CFDB2F; border-color:#CFDB2F; border-raduis:2px; cursor:pointer;">
    <a href="./index.html" style="text-decoration: none; font-weight: bold; color: black;">Log out</a>
</button>
</body>
</html>
