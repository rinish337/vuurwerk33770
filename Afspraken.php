<html>
<style> 
body{
background-color:rgb(175, 175, 175);    
}


table{
background-color:seagreen;
margin: auto;
border-style: groove;
font-family: sans-serif;
width: max-content;
height:200px;
}
th{
    background-color:green;
    height:30;
}
td{
    font-weight:;
    background-color: springgreen;
}

</style>
<a href=../index.html>home</a>
<body>  
<?php
$servername = "localhost"; 
$username = "root";
$password = "";
$db_name="afspraken";
include "create_funcs.php";
//init
    $conn = new PDO("mysql:host=$servername;dbname=$db_name", $username, $password); 
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

$sql = "SELECT * FROM afspraken";
$result = $conn -> query($sql);

echo"<table border='4'>";
echo"<tr><th>". "Voornaam "  ."</th><th>". "Achternaam "  ."</th><th>". "waar "  ."</th><th>". "datum "  ."</th><th>". "tijd "  ."</th></tr>";

while ($row = $result -> fetch()) {
  
    echo"<tr>";
    echo "<td>".$row['voornaam']."</td>" ;
    echo"<td>".$row['achternaam']."</td>" ;
    echo"<td>".$row['waar']."</td>";
    echo"<td>". $row['datum']."</td>";
    echo "<td>".$row['tijd']."</td>";
    echo"</tr>";
 
}
echo"</table>";




?>
</body>
</html>


