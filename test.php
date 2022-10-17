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
        $sqlAdd = "insert into Cars (Color, Make, Year) value (?, ?, ?)";
        $stmtAdd = $conn->prepare($sqlAdd);
        $stmtAdd->bind_param("ssi", $_POST['cColor'], $_POST['cMake'], $_POST['cYear']);
        $stmtAdd->execute();   
      echo '<div class="alert alert-success" role="alert">New Car added.</div>';
      break;
    case 'Edit':
      $sqlEdit = "update Cars set Color=?, Make=?, Year=? where CarID=?";
      $stmtEdit = $conn->prepare($sqlEdit);
      $stmtEdit->bind_param("ssii", $_POST['cColor'], $_POST['cMake'], $_POST['cYear'], $_POST['cid']);
      $stmtEdit->execute();
      echo '<div class="alert alert-success" role="alert">Instructor edited.</div>';
      break;
    case 'Delete':
        $sqlDelete = "Delete From Cars where CarID=?";
        $stmtDelete = $conn->prepare($sqlDelete);
        $stmtDelete->bind_param("i", $_POST['cid']);
        $stmtDelete->execute();
      echo '<div class="alert alert-success" role="alert">Instructor deleted.</div>';
  }
}
?>
      <h1>Cars</h1>
      <table class="table table-striped">
          
          <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCourse">
        Add New
      </button>

      <!-- Modal -->
      <div class="modal fade" id="addCourse" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addInstructorLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="addCarLabel">Add Car</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="post" action="">
                <div class="mb-3">
                  <label for="editCar<?=$row["CarID"]?>Name" class="form-label">Color</label>
                          <input type="text" class="form-control" id="editCar<?=$row["CarID"]?>Name" aria-describedby="editCar<?=$row["CarID"]?>Help" name="cColor">
                          <label for="editCar<?=$row["CarID"]?>Name" class="form-label">Make</label>
                          <input type="text" class="form-control" id="editCar<?=$row["CarID"]?>Name" aria-describedby="editCar<?=$row["CarID"]?>Help" name="cMake">
                          <label for="editCar<?=$row["CarID"]?>Name" class="form-label">Year</label>
                          <input type="text" class="form-control" id="editCar<?=$row["CarID"]?>Name" aria-describedby="editCar<?=$row["CarID"]?>Help" name="cYear">
                          <div id="editCar<?=$row["CarID"]?>Help" class="form-text">Enter the Car information.</div>
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
            <th>Color</th>
            <th>Make</th>
            <th>Year</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          
<?php
$sql = "SELECT * FROM Cars";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>
          
          <tr>
            <td><?=$row["CarID"]?></td>
            <td><?=$row["Color"]?></td>
            <td><?=$row["Make"]?></td>
            <td><?=$row["Year"]?></td>
            <td>
              <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#editCar<?=$row["carID"]?>">
                Edit
              </button>
              <div class="modal fade" id="editCar<?=$row["carID"]?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editCar<?=$row["carID"]?>Label" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="editCar<?=$row["carID"]?>Label">Edit Instructor</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="post" action="">
                        <div class="mb-3">
                          <label for="editCar<?=$row["carID"]?>Name" class="form-label">Color</label>
                          <input type="text" class="form-control" id="editCar<?=$row["carID"]?>Name" aria-describedby="editCar<?=$row["carID"]?>Help" name="cColor" value="<?=$row['Color']?>">
                          <label for="editCar<?=$row["carID"]?>Name" class="form-label">Make</label>
                          <input type="text" class="form-control" id="editCar<?=$row["carID"]?>Name" aria-describedby="editCar<?=$row["carID"]?>Help" name="cMake" value="<?=$row['Make']?>">
                          <label for="editCar<?=$row["carID"]?>Name" class="form-label">Year</label>
                          <input type="text" class="form-control" id="editCar<?=$row["carID"]?>Name" aria-describedby="editCar<?=$row["carID"]?>Help" name="cYake" value="<?=$row['Year']?>">
                          <div id="editCar<?=$row["carID"]?>Help" class="form-text">Enter the Car Information.</div>
                        </div>
                        <input type="hidden" name="iid" value="<?=$row['carID']?>">
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
                <input type="hidden" name="cid" value="<?=$row["CarID"]?>" />
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
