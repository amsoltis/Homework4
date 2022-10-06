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
    <a href="instructors.php" class="btn btn-primary">Go back</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
