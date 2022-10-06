<head>
<?php require_once("header.php"); ?>
</head>

<body>
    <h1>Edit Course</h1>
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

$sql = "SELECT CourseID, InstructorID, CourseNumber, Section from Courses WHERE CourseID=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_POST['id']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>
<form method="post" action="courses-edit-save.php">
<div class="mb-3">
    <label for="courseNumber" class="form-label">Course Number</label>
    <input type="text" class="form-control" id="courseNumber" aria-describedby="nameHelp" name="cNumber" value="<?=$row['CourseNumber']?>">
  </div>
  <div class="mb-3">
    <label for="Section" class="form-label">Section</label>
    <input type="text" class="form-control" id="Section" aria-describedby="nameHelp" name="cSection" value="<?=$row['Section']?>">
  </div>
    <div class="mb-3">
    <label for="courseInsturctor" class="form-label">Instructor ID</label>
    <input type="text" class="form-control" id="courseInsturctor" aria-describedby="nameHelp" name="cInstructor" value="<?=$row['InstructorID']?>">
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
