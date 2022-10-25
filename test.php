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
        $sqlAdd = "insert into Courses (InstructorID, CourseNumber, Section) value (?, ?, ?)";
        $stmtAdd = $conn->prepare($sqlAdd);
        $stmtAdd->bind_param("isi", $_POST['cInsID'], $_POST['cCourse'], $_POST['cSection']);
        $stmtAdd->execute();   
      echo '<div class="alert alert-success" role="alert">New Course added.</div>';
      break;
    case 'Edit':
      $sqlEdit = "update Courses set InstructorID=?, CourseNumber=?, Section=? where CourseID=?";
      $stmtEdit = $conn->prepare($sqlEdit);
      $stmtEdit->bind_param("isii", $_POST['cInsID'], $_POST['cCourse'], $_POST['cSection'], $_POST['cid']);
      $stmtEdit->execute();
      echo '<div class="alert alert-success" role="alert">Course edited.</div>';
      break;
    case 'Delete':
        $sqlDelete = "Delete From Courses where Courseid=?";
        $stmtDelete = $conn->prepare($sqlDelete);
        $stmtDelete->bind_param("i", $_POST['cid']);
        $stmtDelete->execute();
      echo '<div class="alert alert-success" role="alert">Course deleted.</div>';
  }
}
?>
      <h1>Courses</h1>
      <table class="table table-striped">
          
          <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCourse">
        Add New
      </button>

      <!-- Modal -->
      <div class="modal fade" id="addCourse" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addCourseLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="addCourseLabel">Add Course</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="post" action="">
                <div class="mb-3">
                  <label for="editCourse<?=$row["CourseID"]?>Name" class="form-label">InstructorID</label>
                          <input type="text" class="form-control" id="editCourse<?=$row["CourseID"]?>Name" aria-describedby="editCourse<?=$row["CourseID"]?>Help" name="cInsID">
                          <label for="editCourse<?=$row["CourseID"]?>Name" class="form-label">CourseNumber</label>
                          <input type="text" class="form-control" id="editCourse<?=$row["CourseID"]?>Name" aria-describedby="editCourse<?=$row["CourseID"]?>Help" name="cCourse">
                          <label for="editCourse<?=$row["CourseID"]?>Name" class="form-label">Section</label>
                          <input type="text" class="form-control" id="editCourse<?=$row["CourseID"]?>Name" aria-describedby="editCourse<?=$row["CourseID"]?>Help" name="cSection">
                          <div id="editCourse<?=$row["CourseID"]?>Help" class="form-text">Enter the Course information.</div>
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
            <th>CourseID</th>
            <th>InstructorID</th>
            <th>Instructor</th>
            <th>Course</th>
            <th>Section</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          
<?php
$sql = "SELECT CourseID, CourseNumber, Section, C.InstructorID, FirstName, LastName From Instructor I inner join Courses C on I.InstructorID=C.InstructorID";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>
          
          <tr>
            <td><?=$row["CourseID"]?></td>
            <td><?=$row["InstructorID"]?></td>
            <td><?=$row["LastName"]." "?><?=$row["FirstName"]?></a></td>
            <td><?=$row["CourseNumber"]?></td>
            <td><?=$row["Section"]?></td>
            <td>
              <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#editCourse<?=$row["CourseID"]?>">
                Edit
              </button>
              <div class="modal fade" id="editCourse<?=$row["CourseID"]?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editCourse<?=$row["CourseID"]?>Label" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="editCourse<?=$row["CourseID"]?>Label">Edit Course</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="post" action="">  
                        <div class="mb-3">
                          <label for="instructorList" class="form-label">Instructor</label>
                          <select class="form-select" aria-label="Select Instructor" id="instructorList" name="cInsID">
                          <?php
                            $instructorSQL = "select * from Instructor";
                            $instructorResult = $conn->query($instructorSQL);
                            while($instructorRow = $instructorResult->fetch_assoc()) {
                            if ($instructorRow['InstructorID'] == $row['InstructorID']) {
                            $selText = " selected";
                            } else {
                            $selText = "";
                            }
                            ?>
                            <option value="<?=$supervisorRow['InstructorID']?>"<?=$selText?>><?=$row["LastName"]." "?><?=$row["FirstName"]?></option>
                            <?php
                            }
                            ?>
                          </select>
                          <label for="editCourse<?=$row["CourseID"]?>Name" class="form-label">CourseNumber</label>
                          <input type="text" class="form-control" id="editCourse<?=$row["CourseID"]?>Name" aria-describedby="editCourse<?=$row["CourseID"]?>Help" name="cCourse" value="<?=$row['CourseNumber']?>">
                          <label for="editCourse<?=$row["CourseID"]?>Name" class="form-label">Section</label>
                          <input type="text" class="form-control" id="editCourse<?=$row["CourseID"]?>Name" aria-describedby="editCourse<?=$row["CourseID"]?>Help" name="cSection" value="<?=$row['Section']?>">
                          <div id="editCourse<?=$row["CourseID"]?>Help" class="form-text">Enter the Course Information.</div>
                        </div>
                        <input type="hidden" name="cid" value="<?=$row['CourseID']?>">
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
                <input type="hidden" name="cid" value="<?=$row["CourseID"]?>" />
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
