<head>
<?php require_once("header.php"); ?>
</head>

<body>
    <h1>Edit Car</h1>
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

$sql = "SELECT CarID, Color, Make, Year from Cars WHERE CarID=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_POST['id']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>
<form method="post" action="cars-edit-save.php">
<div class="mb-3">
    <label for="Color" class="form-label">Car Color</label>
    <input type="text" class="form-control" id="Color" aria-describedby="nameHelp" name="cColor" value="<?=$row['Color']?>">
  </div>
  <div class="mb-3">
    <label for="Make" class="form-label">Car Make</label>
    <input type="text" class="form-control" id="Make" aria-describedby="nameHelp" name="cMake" value="<?=$row['Make']?>">
  </div>
    <div class="mb-3">
    <label for="Year" class="form-label">Car Year</label>
    <input type="text" class="form-control" id="TYear" aria-describedby="nameHelp" name="cYear" value="<?=$row['Year']?>">
  </div>
  <input type="hidden" name="id" value="<?=$row['CarID']?>">
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
