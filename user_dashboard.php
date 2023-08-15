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
<h1 id="h1" style="text-align: center;">Welcome in user Page </h1>
<?php

require("config.php");
$userData="SELECT * FROM users";
$sql=$conn->query($userData);


if($sql->num_rows > 0){
    echo "<table border='2' style='margin-left: 45%; margin-top:20%;'>";

    echo "<tr>";
    echo "<th>User Name</th>";
    echo "<th>User Email</th>";
    while($row=$sql->fetch_assoc()){

        echo "<tr>";
    echo "<td>".$row['firstname']."</td>"; 
    echo "<td>".$row['email']."</td>"; 

        echo "</tr>";
    
}
echo "</table>";


}else{

    echo "No Data Found";
}


?>
<button style=" margin-left:47% ;margin-top:4%; background-color:#CFDB2F; border-color:#CFDB2F; border-raduis:2px;
cusore:pointer;"><a href="./index.html" style="text-decoration: none;
    font-weight: bold;
    color: black;
   ">Log out</a></button>
</body>
</html>
