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
$iName = $_POST['iName'];

$sql = "update Instructor set FirstName=? where InstructorID=?";
//echo $sql;
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $iName, $_POST['id']);
    $stmt->execute();
?>
    
    <h1>Edit Instructor</h1>
<div class="alert alert-success" role="alert">
  Instructor edited.
</div>
    <a href="instructor.php" class="btn btn-primary">Go back</a>
  </body>

<footer>
<?php require_once("footer.php"); ?>
</footer>

