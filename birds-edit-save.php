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
$bName = $_POST['bName'];
$bColor = $_POST['bColor'];
$bAge = $_POST['bAge'];

$sql = "update Birds set Name=?, Color=?, Age=? where Birdid=?";
//echo $sql;
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssii", $bName, $bColor, $bAge, $_POST['id']);
    $stmt->execute();
?>
    
    <h1>Edit Birds</h1>
<div class="alert alert-success" role="alert">
  Bird edited.
</div>
    <a href="birds.php" class="btn btn-primary">Go back</a>
  </body>

<footer>
<?php require_once("footer.php"); ?>
</footer>