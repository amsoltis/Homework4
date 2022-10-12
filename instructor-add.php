<head>
<?php require_once("header.php"); ?>
</head>

<body>
<h1>Add Instructor</h1>
<form method="post" action="instructor-add-save.php">
<div class="mb-3">
    <label for="instructorFirstName" class="form-label">First Name</label>
    <input type="text" class="form-control" id="instructorFirstName" aria-describedby="nameHelp" name="iFirstName">
  </div>
  <div class="mb-3">
    <label for="instructorLastName" class="form-label">Last Name</label>
    <input type="text" class="form-control" id="instructorLastName" aria-describedby="nameHelp" name="iLastName">
    <div id="nameHelp" class="form-text">Enter the instructor's name.</div>
  </div>

  <input type="hidden" name="id" value="<?=$row['InstructorID']?>">
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<footer>
<?php require_once("footer.php"); ?>
</footer>
