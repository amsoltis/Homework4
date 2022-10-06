<head>
<?php require_once("header.php"); ?>
</head>


<body>
<h1>Add Cars</h1>
<form method="post" action="cars-add-save.php">
<div class="mb-3">
    <label for="Color" class="form-label">Car Color</label>
    <input type="text" class="form-control" id="Color" aria-describedby="nameHelp" name="cColor" value="<?=$row['Color']?>">
  </div>
  <div class="mb-3">
    <label for="Make" class="form-label">Car Make</label>
    <input type="text" class="form-control" id="Make" aria-describedby="nameHelp" name="cMake" value="<?=$row['Make']?>">
  </div>
    <div class="mb-3">
    <label for="Year" class="form-label">Car Year</label>
    <input type="text" class="form-control" id="TYear" aria-describedby="nameHelp" name="cYear" value="<?=$row['Year']?>">
  </div>
  <input type="hidden" name="id" value="<?=$row['CarID']?>">
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </body>

<footer>
<?php require_once("footer.php"); ?>
</footer>