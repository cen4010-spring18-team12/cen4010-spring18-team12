<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Database</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .container{ align-content: center; padding: 30px; }
        .table{padding-left: 650px;}
    </style>
    
</head>
<body>
    
    <div class="container">
      
        <h2>Input Z Number:</h2>
        <form align="center" class="form-signin" action="search-form.php" method="post"> 
        <input type="text" class="form-control" placeholder="Enter student Z#" name="znumber" required><br>
            <div class="form-group">
                <input align="center" type="submit" class="btn btn-primary" value="Search">
            </div>
            <input type="button" class="btn btn-primary" value="Main Page" onclick="window.location.href='http://lamp.cse.fau.edu/~CEN4010_S2018g12/index.html'" />
        </form>
    </div>    
</body>
</html>

<?php
// Include config file
require_once 'config.php';
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if (isset($_POST['znumber'])) 
{ 
$znumber= $_POST["znumber"];
$sql = "select * from UserInfo where znumber = $znumber";
$result = $link->query($sql);


echo "<div class='table'>";
		echo "<div class='row-fluid'>";
			echo "<div class='col-lg-6'";
			echo "<div class='table-responsive'>";
				echo "<table class='table table-hover table-inverse'>";
				
				echo "<tr>";
				echo "<th>Z#</th>";
				echo "<th>Name</th>";
                echo "<th>Class-CRN</th>";
                echo "<th>College</th>";
                echo "<th>Department</th>";
                echo "<th>Class</th>";
                echo "<th>Class Number</th>";
                echo "<th>Class Name</th>";
                echo "<th>Email</th>";
				echo "</tr>";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
						echo "<tr>";
						echo "<td>" . $row["znumber"] . "</td>";
						echo "<td>" . $row["Name"] . "</td>";
                        echo "<td>" . $row["class-crn"] . "</td>";
                        echo "<td>" . $row["college"] . "</td>";
                        echo "<td>" . $row["department"] . "</td>";
                        echo "<td>" . $row["class"] . "</td>";
                        echo "<td>" . $row["classnumber"] . "</td>";
                        echo "<td>" . $row["classname"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
						echo "</tr>";			
					}
				} else {
					echo "0 results";
				}
				
				echo "</table>";
}
?>