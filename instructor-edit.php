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
    <label for="instructorName" class="form-label">First Name</label>
    <input type="text" class="form-control" id="instructorName" aria-describedby="nameHelp" name="iName" value="<?=$row["FirstName"]." "?>">
    <div id="nameHelp" class="form-text">Enter the instructor's name.</div>
  </div>
  <input type="hidden" name="id" value="<?=$row['InstructorID']?>">
  <button type="submit"/button>
</form>
<?php
  }
} else {
  echo "0 results";
}
$conn->close();
?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>

<footer>
<?php require_once("footer.php"); ?>
</footer>
