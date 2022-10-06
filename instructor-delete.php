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

$sql = "Delete From Instructor where InstructorID=?";
//echo $sql;
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $_POST['id']);
    $stmt->execute();
?>
    
    <h1>Delete Instructor</h1>
<div class="alert alert-success" role="alert">
  Instructor deleted.
</div>
    <a href="instructor.php" class="btn btn-primary">Go back</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>

<footer>
<?php require_once("footer.php"); ?>
</footer>
