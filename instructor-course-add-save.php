<head>
<?php require_once("header.php"); ?>
</head>

<body>
    
<?php
$servername = "localhost";
$username = "asoltiso_asoltis";
$password = "OUcreate!";
$dbname = "asoltiso_homework3";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$iFirstName = $_POST['iFirstName'];
$iLastName = $_POST['iLastName'];

$sql = "insert into Courses (InstructorID, CourseNumber, Section) value (?, ?, ?)";
//echo $sql;
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iss",$_POST['id'],$iFirstName, $iLastName);
    $stmt->execute();        
?>
    
    <h1>Add Course</h1>
<div class="alert alert-success" role="alert">
  New course added.
</div>
    <a href="instructor.php" class="btn btn-primary">Go back</a>
  </body>

<footer>
<?php require_once("footer.php"); ?>
</footer>

