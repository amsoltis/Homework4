<head>
<?php require_once("header.php"); ?>
</head>

<body>
<form method="post" action="courses-add-save.php">
<div class="mb-3">
    <label for="courseNumber" class="form-label">Course Number</label>
    <input type="text" class="form-control" id="courseNumber" aria-describedby="nameHelp" name="cNumber" value="<?=$row['CourseNumber']?>">
  </div>
  <div class="mb-3">
    <label for="Section" class="form-label">Section</label>
    <input type="text" class="form-control" id="Section" aria-describedby="nameHelp" name="cSection" value="<?=$row['Section']?>">
  </div>
    <div class="mb-3">
    <label for="courseInsturctor" class="form-label">Instructor ID</label>
    <input type="text" class="form-control" id="courseInsturctor" aria-describedby="nameHelp" name="cInstructor" value="<?=$row['InstructorID']?>">
  </div>
  <input type="hidden" name="id" value="<?=$row['CourseID']?>">
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </body>

<footer>
<?php require_once("footer.php"); ?>
</footer>