<head>
<?php require_once("header.php"); ?>
</head>

<body>
<h1>Add Course</h1>
<form method="post" action="courses-add-save.php">
<div class="mb-3">
    <label for="courseNumber" class="form-label">Course Number</label>
    <input type="text" class="form-control" id="courseNumber" aria-describedby="nameHelp" name="cNumber">
  </div>
  <div class="mb-3">
    <label for="Section" class="form-label">Section</label>
    <input type="text" class="form-control" id="Section" aria-describedby="nameHelp" name="cSection">
  </div>
    <div class="mb-3">
    <label for="courseInsturctor" class="form-label">Instructor ID</label>
    <input type="text" class="form-control" id="courseInsturctor" aria-describedby="nameHelp" name="cInstructor">
  </div>
  <input type="hidden" name="id" value="<?=$row['CourseID']?>">
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </body>

<footer>
<?php require_once("footer.php"); ?>
</footer>