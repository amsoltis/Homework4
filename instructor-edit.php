<head>
<?php require_once("header.php"); ?>
</head>

<body>
    <h1>Edit Instructor</h1>
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

$sql = "SELECT InstructorID, FirstName, LastName from Instructor where InstructorID=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_POST['id']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>
<form method="post" action="instructor-edit-save.php">
<div class="mb-3">
    <label for="instructorFirstName" class="form-label">Name</label>
    <input type="text" class="form-control" id="instructorFirstName" aria-describedby="nameHelp" name="iFirstName" value="<?=$row['FirstName']?>">
    <div id="nameHelp" class="form-text">Enter the instructor's name.</div>
  </div>
  <div class="mb-3">
    <label for="instructorLastName" class="form-label">Name</label>
    <input type="text" class="form-control" id="instructorLastName" aria-describedby="nameHelp" name="iLastName" value="<?=$row['LastName']?>">
    <div id="nameHelp" class="form-text">Enter the instructor's name.</div>
  </div>

  <input type="hidden" name="id" value="<?=$row['InstructorID']?>">
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
