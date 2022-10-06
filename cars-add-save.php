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
$cColor = $_POST['cColor'];
$cMake = $_POST['cMake'];
$cYear = $_POST['cYear'];

$sql = "INSERT INTO Cars (Color, Make, Year) VALUE (?, ?, ?)";
//echo $sql;
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $cColor, $cMake, $cYear);
    $stmt->execute();
?>
    
    <h1>Add Cars</h1>
<div class="alert alert-success" role="alert">
  Cars added.
</div>
    <a href="cars.php" class="btn btn-primary">Go back</a>
  </body>

<footer>
<?php require_once("footer.php"); ?>
</footer>


