  <head>
<?php require_once("header.php"); ?>
</head>

<body>
    <h1>Cars</h1>
  <a href="cars-add.php" class="btn btn-primary">Add New Car</a>
  <table class="table table-striped">
  <thead>
    <tr>
      <th>CarID</th>
      <th>Color</th>
      <th>Make</th>
      <th>Year</th>
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

$sql = "SELECT CarID, Color, Make, Year from Cars Order by CarID";
//echo $sql;
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
        <form method="post" action="cars-edit.php">
        <input type="hidden" name="id" value="<?=$row["CarID"]?>" />
        <input type="submit" value="Edit" />
      </form>
    </td>
    <td>
      <form method="post" action="cars-delete.php">
        <input type="hidden" name="id" value="<?=$row["CarID"]?>" />
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
<?php require_once("footer.php"); ?>
</footer>
