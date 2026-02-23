<?php
include "db.php";

$success = "";
$error = "";

if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    $sql = "INSERT INTO students (name, email, course) VALUES ('$name', '$email', '$course')";
    
    if(mysqli_query($conn, $sql)) {
        $success = "Student added successfully!";
    } else {
        $error = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Student</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container d-flex justify-content-center align-items-center" style="min-height:100vh;">
<div class="card-custom" style="width:450px;">

<h3 class="text-center mb-4">Add New Student</h3>

<?php if($success): ?>
<div class="alert alert-success text-center">
<?= $success ?>
</div>
<?php endif; ?>

<?php if($error): ?>
<div class="alert alert-danger text-center">
<?= $error ?>
</div>
<?php endif; ?>

<form method="POST">

<div class="mb-3">
<label class="form-label">Full Name</label>
<input type="text" name="name" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Email Address</label>
<input type="email" name="email" class="form-control" required>
</div>

<div class="mb-4">
<label class="form-label">Course</label>
<input type="text" name="course" class="form-control" required>
</div>

<div class="d-grid">
<button type="submit" name="submit" class="btn btn-success btn-custom">
Add Student
</button>
</div>

</form>

<hr class="my-4">

<div class="text-center">
<a href="index.php" class="btn btn-outline-light btn-sm btn-custom">
← Back to Dashboard
</a>
</div>

</div>
</div>

</body>
</html>