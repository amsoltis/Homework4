<head>
<?php require_once("header.php"); ?>
</head>

<body>
    <h1>Edit Birds</h1>
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

$sql = "SELECT Birdid, Name, Color, Age from Birds WHERE BirdID=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_POST['id']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>
<form method="post" action="birds-edit-save.php">
<div class="mb-3">
    <label for="Name" class="form-label">Bird Name</label>
    <input type="text" class="form-control" id="Name" aria-describedby="nameHelp" name="bName" value="<?=$row['Name']?>">
  </div>
  <div class="mb-3">
    <label for="Color" class="form-label">Color</label>
    <input type="text" class="form-control" id="Color" aria-describedby="nameHelp" name="bColor" value="<?=$row['Color']?>">
  </div>
    <div class="mb-3">
    <label for="Age" class="form-label">Age</label>
    <input type="text" class="form-control" id="Age" aria-describedby="nameHelp" name="bAge" value="<?=$row['Age']?>">
  </div>
  <input type="hidden" name="id" value="<?=$row['CourseID']?>">
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php
  }
} else {
  echo "0 results";
}
$conn->close();
?>
  </body>

<footer>
<?php require_once("footer.php"); ?>
</footer>
