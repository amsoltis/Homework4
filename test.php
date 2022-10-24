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
        $sqlAdd = "insert into Birds (Name, Color, Age) value (?, ?, ?)";
        $stmtAdd = $conn->prepare($sqlAdd);
        $stmtAdd->bind_param("ssi", $_POST['bName'], $_POST['bColor'], $_POST['bAge']);
        $stmtAdd->execute();   
      echo '<div class="alert alert-success" role="alert">New Car added.</div>';
      break;
    case 'Edit':
      $sqlEdit = "update Birds set Name=?, Color=?, Age=? where Birdid=?";
      $stmtEdit = $conn->prepare($sqlEdit);
      $stmtEdit->bind_param("ssii", $_POST['bName'], $_POST['bColor'], $_POST['bAge'], $_POST['bid']);
      $stmtEdit->execute();
      echo '<div class="alert alert-success" role="alert">Car edited.</div>';
      break;
    case 'Delete':
        $sqlDelete = "Delete From Cars where CarID=?";
        $stmtDelete = $conn->prepare($sqlDelete);
        $stmtDelete->bind_param("i", $_POST['cid']);
        $stmtDelete->execute();
      echo '<div class="alert alert-success" role="alert">Car deleted.</div>';
  }
}
?>
      <h1>Birds</h1>
      <table class="table table-striped">
          
          <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCourse">
        Add New
      </button>

      <!-- Modal -->
      <div class="modal fade" id="addCourse" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addCarLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="addCarLabel">Add Car</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="post" action="">
                <div class="mb-3">
                  <label for="editBird<?=$row["Birdid"]?>Name" class="form-label">Name</label>
                          <input type="text" class="form-control" id="editBird<?=$row["Birdid"]?>Name" aria-describedby="editBird<?=$row["Birdid"]?>Help" name="bName">
                          <label for="editBird<?=$row["Birdid"]?>Name" class="form-label">Color</label>
                          <input type="text" class="form-control" id="editBird<?=$row["Birdid"]?>Name" aria-describedby="editBird<?=$row["Birdid"]?>Help" name="bColor">
                          <label for="editBird<?=$row["Birdid"]?>Name" class="form-label">Age</label>
                          <input type="text" class="form-control" id="editBird<?=$row["Birdid"]?>Name" aria-describedby="editBird<?=$row["Birdid"]?>Help" name="bAge">
                          <div id="editBird<?=$row["Birdid"]?>Help" class="form-text">Enter the Car information.</div>
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
            <th>Bird ID</th>
            <th>Name</th>
            <th>Color</th>
            <th>Age</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          
<?php
$sql = "SELECT * FROM Birds";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>
          
          <tr>
            <td><?=$row["Birdid"]?></td>
            <td><?=$row["Name"]?></td>
            <td><?=$row["Color"]?></td>
            <td><?=$row["Age"]?></td>
            <td>
              <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#editBird<?=$row["Birdid"]?>">
                Edit
              </button>
              <div class="modal fade" id="editBird<?=$row["Birdid"]?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editBird<?=$row["Birdid"]?>Label" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="editBird<?=$row["Birdid"]?>Label">Edit Bird</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="post" action="">  
                        <div class="mb-3">
                          <label for="editBird<?=$row["Birdid"]?>Name" class="form-label">Color</label>
                          <input type="text" class="form-control" id="editBird<?=$row["Birdid"]?>Name" aria-describedby="editBird<?=$row["Birdid"]?>Help" name="bName" value="<?=$row['Name']?>">
                          <label for="editBird<?=$row["Birdid"]?>Name" class="form-label">Make</label>
                          <input type="text" class="form-control" id="editBird<?=$row["Birdid"]?>Name" aria-describedby="editBird<?=$row["Birdid"]?>Help" name="bColor" value="<?=$row['Color']?>">
                          <label for="editBird<?=$row["Birdid"]?>Name" class="form-label">Year</label>
                          <input type="text" class="form-control" id="editBird<?=$row["Birdid"]?>Name" aria-describedby="editBird<?=$row["Birdid"]?>Help" name="bAge" value="<?=$row['Age']?>">
                          <div id="editBird<?=$row["Birdid"]?>Help" class="form-text">Enter the Bird Information.</div>
                        </div>
                        <input type="hidden" name="bid" value="<?=$row['Birdid']?>">
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
