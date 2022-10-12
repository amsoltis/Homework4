<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Instructors</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
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
        $stmtAdd = $conn->prepare($sql);
        $stmtAdd->bind_param("ss", $_POST['iFirstName'], $_POST['iLastName']);
        $stmtAdd->execute();   
      echo '<div class="alert alert-success" role="alert">New instructor added.</div>';
      break;
    case 'Edit':
      $sqlEdit = "update Instructor set FirstName=?, LastName=? where InstructorID=?";
      $stmtEdit = $conn->prepare($sqlEdit);
      $stmtEdit->bind_param("si", $_POST['iFirstName'], $_POST['id']);
      $stmtEdit->execute();
      echo '<div class="alert alert-success" role="alert">Instructor edited.</div>';
    case 'Delete':
        $sqlDelete = "Delete From Instructor where InstructorID=?";
        $stmtDelete = $conn->prepare($sql);
        $stmtDelete->bind_param("i", $_POST['id']);
        $stmtDelete->execute();
      echo '<div class="alert alert-success" role="alert">Instructor deleted.</div>';
  }
}
?>
    
      <h1>Instructors</h1>
      <table class="table table-striped">
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
                          <label for="editInstructor<?=$row["InstructorID"]?>Name" class="form-label">Name</label>
                          <input type="text" class="form-control" id="editInstructor<?=$row["InstructorID"]?>Name" aria-describedby="editInstructor<?=$row["InstructorID"]?>Help" name="iName" value="<?=$row['FirstName']?>">
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
                <button type="submit" class="btn" onclick="return confirm('Are you sure?')">Delete</button>
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
      <br />
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
                  <label for="instructorName" class="form-label">Name</label>
                  <input type="text" class="form-control" id="instructorName" aria-describedby="nameHelp" name="iName">
                  <div id="nameHelp" class="form-text">Enter the instructor's name.</div>
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
  </body>
</html>