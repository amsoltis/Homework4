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

$sql = "Delete From Birds where BirdID=?";
//echo $sql;
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $_POST['id']);
    $stmt->execute();
?>
    
    <h1>Delete Bird</h1>
<div class="alert alert-success" role="alert">
  Bird deleted.
</div>
    <a href="birds.php" class="btn btn-primary">Go back</a>
    </body>

<footer>
<?php require_once("footer.php"); ?>
</footer>