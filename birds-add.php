<head>
<?php require_once("header.php"); ?>
</head>


<body>
<h1>Add Bird</h1>
<form method="post" action="birds-add-save.php">
<div class="mb-3">
    <label for="Name" class="form-label">Bird Name</label>
    <input type="text" class="form-control" id="Name" aria-describedby="nameHelp" name="bName">
  </div>
  <div class="mb-3">
    <label for="Color" class="form-label">Bird Color</label>
    <input type="text" class="form-control" id="Color" aria-describedby="nameHelp" name="bColor">
  </div>
    <div class="mb-3">
    <label for="Age" class="form-label">Bird Age</label>
    <input type="text" class="form-control" id="Age" aria-describedby="nameHelp" name="bAge">
  </div>
  <input type="hidden" name="id" value="<?=$row['Birdid']?>">
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </body>

<footer>
<?php require_once("footer.php"); ?>
</footer>