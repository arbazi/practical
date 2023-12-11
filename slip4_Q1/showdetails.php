<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="style.css">
   <title>Student</title>
</head>
<body>
<div class="search-box">
<h3>SEARCH REGISTRATION DETAILS USING STUDENT ROLL NO</h3>
<form method="get">
<p>Enter Roll number</p>
<input type="text" name="number" />
<input type="submit" name="submit" />
</div>
<div class="result-box">
<!---php code--->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "student";

$number = $_GET['number'];
$conn=mysqli_connect($servername, $username, $password, $database);
   
   if(! $conn ) {
      die('Could not connect - database not found' );
   }
   
   $sql = "SELECT * FROM student_table where roll_no = '$number' ";
   $result = mysqli_query(  $conn,$sql );
   
   if(! $result ) {
      die('Could not get data - error 404' );
   }
   
   while($row = mysqli_fetch_array($result)) {
      echo "roll_no :{$row[0]}  <br> ".
         "Student NAME : {$row[1]} <br> ".

         "--------------------------------<br>";
   }

   echo "Fetched data successfully\n";
   mysqli_close($conn);
?>

</form>
</div>
</body>

