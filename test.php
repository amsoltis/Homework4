  <head>
<?php require_once("header.php"); ?>
</head>

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
  while($row = $result->fetch_assoc()) {}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
</head>
<body>

<h2>Modal Example</h2>

<!-- Trigger/Open The Modal -->
<button id="myBtn">Open Modal</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
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
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</body>
</html>

