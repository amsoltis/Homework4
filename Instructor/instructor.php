  <head>
<?php require_once("header.php"); ?>
</head>

<body>
    <h1>Instructors</h1>
  <a href="instructor-add.php" class="btn btn-primary">Add New Instructor</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  <table class="table table-striped">
  <thead>
    <tr>
      <th>InstructorID</th>
      <th>Name</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
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

$sql = "SELECT InstructorID, LastName, FirstName FROM Instructor";
//echo $sql;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>
  <tr>
    <td><?=$row["InstructorID"]?></td>
    <td><?=$row["LastName"]." "?><?=$row["FirstName"]?></a></td>
    <td>
      <form method="post" action="instructor-edit.php">
        <input type="hidden" name="id" value="<?=$row["InstructorID"]?>" />
        <input type="submit" value="Edit" />
      </form>
    </td>
    <td>
      <form method="post" action="instructor-delete.php">
        <input type="hidden" name="id" value="<?=$row["InstructorID"]?>" />
        <input type="submit" value="Delete" />
      </form>
    </td>
  </tr>
<?php
  }
} else {
  echo "0 results";
}
$conn->close();
?>
  </tbody>
    </table>
      </body>
<footer>
Delete button works, use with caution!
<?php require_once("footer.php"); ?>
</footer>
