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

$sql = "INSERT INTO Instructor ('FirstName', 'LastName') VALUES ('?', '?')";
//echo $sql;
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $iFirstName, $iLastName);
    $stmt->execute();
?>
    <h1>Add Instructor</h1>
<div class="alert alert-success" role="alert">
  Instructor added.
</div>
    <a href="instructor.php" class="btn btn-primary">Go back</a>
  </body>

<footer>
<?php require_once("footer.php"); ?>
</footer>

