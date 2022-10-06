  <head>
<?php require_once("header.php"); ?>
</head>

<body>
    <h1>Birds</h1>
  <a href="birds-add.php" class="btn btn-primary">Add New Bird</a>
  <table class="table table-striped">
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

$sql = "SELECT Birdid, Name, Color, Age from Birds Order by Birdid";
//echo $sql;
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
        <form method="post" action="birds-edit.php">
        <input type="hidden" name="id" value="<?=$row["Birdid"]?>" />
        <input type="submit" value="Edit" />
      </form>
    </td>
    <td>
      <form method="post" action="birds-delete.php">
        <input type="hidden" name="id" value="<?=$row["Birdid"]?>" />
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
<br><?php require_once("footer.php"); ?></br>
</footer>
