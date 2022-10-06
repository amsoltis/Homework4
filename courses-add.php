<head>
<?php require_once("header.php"); ?>
</head>

<body>
<form method="post" action="birds-edit-save.php">
<div class="mb-3">
    <label for="Name" class="form-label">Bird Name</label>
    <input type="text" class="form-control" id="Name" aria-describedby="nameHelp" name="bName" value="<?=$row['Name']?>">
  </div>
  <div class="mb-3">
    <label for="Color" class="form-label">Bird Color</label>
    <input type="text" class="form-control" id="Color" aria-describedby="nameHelp" name="bColor" value="<?=$row['Color']?>">
  </div>
    <div class="mb-3">
    <label for="Age" class="form-label">Bird Age</label>
    <input type="text" class="form-control" id="Age" aria-describedby="nameHelp" name="bAge" value="<?=$row['Age']?>">
  </div>
  <input type="hidden" name="id" value="<?=$row['Birdid']?>">
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </body>

<footer>
<?php require_once("footer.php"); ?>
</footer>