<?php
include "db.php";

if(!isset($_GET['id'])){
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM students WHERE id = $id");
$row = mysqli_fetch_assoc($result);

if(!$row){
    header("Location: index.php");
    exit();
}

$success = "";
$error = "";

if(isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    $sql = "UPDATE students 
            SET name='$name', email='$email', course='$course' 
            WHERE id=$id";

    if(mysqli_query($conn, $sql)) {
        $success = "Student updated successfully!";
        $result = mysqli_query($conn, "SELECT * FROM students WHERE id = $id");
        $row = mysqli_fetch_assoc($result);
    } else {
        $error = "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Student</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container d-flex justify-content-center align-items-center" style="min-height:100vh;">
<div class="card-custom" style="width:450px;">

<h3 class="text-center mb-4">Edit Student</h3>

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
<input type="text" name="name" class="form-control" 
value="<?= $row['name']; ?>" required>
</div>

<div class="mb-3">
<label class="form-label">Email Address</label>
<input type="email" name="email" class="form-control" 
value="<?= $row['email']; ?>" required>
</div>

<div class="mb-4">
<label class="form-label">Course</label>
<input type="text" name="course" class="form-control" 
value="<?= $row['course']; ?>" required>
</div>

<div class="d-grid">
<button type="submit" name="update" 
class="btn btn-warning btn-custom">
Update Student
</button>
</div>

</form>

<hr class="my-4">

<div class="text-center">
<a href="index.php" 
class="btn btn-outline-light btn-sm btn-custom">
← Back to Dashboard
</a>
</div>

</div>
</div>

</body>
</html>