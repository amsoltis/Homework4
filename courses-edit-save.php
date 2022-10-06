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
$cInstructor = $_POST['cInstructor'];
$cNumber = $_POST['cNumber'];
$cSection = $_POST['cSection'];

$sql = "update Courses set InstructorID=?, CourseNumber=?, Section=? where CourseID=?";
//echo $sql;
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issi", $cInstructor, $cNumber, $cSection, $_POST['id']);
    $stmt->execute();
?>
    
    <h1>Edit Courses</h1>
<div class="alert alert-success" role="alert">
  Courses edited.
</div>
    <a href="courses.php" class="btn btn-primary">Go back</a>
  </body>

<footer>
<?php require_once("footer.php"); ?>
</footer>

