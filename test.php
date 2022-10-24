<!doctype html>
<html lang="en">
<head>
    <?php require_once("header.php"); ?>
</head>
<body>
    <div class="container">
      
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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  switch ($_POST['saveType']) {
    case 'Add':
        $sqlAdd = "insert into Instructor (FirstName, LastName) value (?, ?)";
        $stmtAdd = $conn->prepare($sqlAdd);
        $stmtAdd->bind_param("ss", $_POST['iFirstName'], $_POST['iLastName']);
        $stmtAdd->execute();   
      echo '<div class="alert alert-success" role="alert">New instructor added.</div>';
      break;
    case 'Edit':
      $sqlEdit = "update Instructor set FirstName=?, LastName=? where InstructorID=?";
      $stmtEdit = $conn->prepare($sqlEdit);
      $stmtEdit->bind_param("ssi", $_POST['iFirstName'], $_POST['iLastName'], $_POST['iid']);
      $stmtEdit->execute();
      echo '<div class="alert alert-success" role="alert">Instructor edited.</div>';
      break;
    case 'Delete':
        $sqlDelete = "Delete From Instructor where InstructorID=?";
        $stmtDelete = $conn->prepare($sqlDelete);
        $stmtDelete->bind_param("i", $_POST['iid']);
        $stmtDelete->execute();
      echo '<div class="alert alert-success" role="alert">Instructor deleted.</div>';
  }
}
?>
      <h1>Instructors</h1>

      <select class="form-select" aria-label="Select instructor" id="instructorList" name="iid">
<?php
    $instructorSql = "select * from instructor";
    $instructorResult = $conn->query($instructorSql);
    while($instructorRow = $instructorResult->fetch_assoc()) {
      if ($instructorRow['InstructorID'] == $row['InstructorID']) {
        $selText = " selected";
      } else {
        $selText = "";
      }
?>
  <option value="<?=$instructorRow['InstructorID']?>"<?=$selText?>><?=$instructorRow['firstName']?></option>
<?php
    }
?>
</select>

      <table class="table table-striped">
          
          <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addInstructor">
        Add New
      </button>

      <!-- Modal -->
      <div class="modal fade" id="addInstructor" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addInstructorLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="addInstructorLabel">Add Instructor</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="post" action="">
                <div class="mb-3">
                  <label for="editInstructor<?=$row["InstructorID"]?>Name" class="form-label">First Name</label>
                          <input type="text" class="form-control" id="editInstructor<?=$row["InstructorID"]?>Name" aria-describedby="editInstructor<?=$row["InstructorID"]?>Help" name="iFirstName">
                          <label for="editInstructor<?=$row["InstructorID"]?>Name" class="form-label">Last Name</label>
                          <input type="text" class="form-control" id="editInstructor<?=$row["InstructorID"]?>Name" aria-describedby="editInstructor<?=$row["InstructorID"]?>Help" name="iLastName">
                          <div id="editInstructor<?=$row["InstructorID"]?>Help" class="form-text">Enter the instructor's name.</div>
                        </div>
                <input type="hidden" name="saveType" value="Add">
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  
          
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          
<?php
$sql = "SELECT InstructorID, LastName, FirstName FROM Instructor Order by InstructorID";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>
          
          <tr>
            <td><?=$row["InstructorID"]?></td>
            <td><?=$row["LastName"]." "?><?=$row["FirstName"]?></a></td>
            <td>
              <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#editInstructor<?=$row["InstructorID"]?>">
                Edit
              </button>
              <div class="modal fade" id="editInstructor<?=$row["InstructorID"]?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editInstructor<?=$row["InstructorID"]?>Label" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="editInstructor<?=$row["InstructorID"]?>Label">Edit Instructor</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="post" action="">
                        <div class="mb-3">
                          <label for="editInstructor<?=$row["InstructorID"]?>Name" class="form-label">First Name</label>
                          <input type="text" class="form-control" id="editInstructor<?=$row["InstructorID"]?>Name" aria-describedby="editInstructor<?=$row["InstructorID"]?>Help" name="iFirstName" value="<?=$row['FirstName']?>">
                          <label for="editInstructor<?=$row["InstructorID"]?>Name" class="form-label">Last Name</label>
                          <input type="text" class="form-control" id="editInstructor<?=$row["InstructorID"]?>Name" aria-describedby="editInstructor<?=$row["InstructorID"]?>Help" name="iLastName" value="<?=$row['LastName']?>">
                          <div id="editInstructor<?=$row["InstructorID"]?>Help" class="form-text">Enter the instructor's name.</div>
                        </div>
                        <input type="hidden" name="iid" value="<?=$row['InstructorID']?>">
                        <input type="hidden" name="saveType" value="Edit">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </td>
            <td>
              <form method="post" action="">
                <input type="hidden" name="iid" value="<?=$row["InstructorID"]?>" />
                <input type="hidden" name="saveType" value="Delete">
                <button type="submit" class="btn" onclick="return confirm('Are you sure?')"> Delete </button>
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
<?php require_once("footer.php"); ?>
</footer>

</html>
