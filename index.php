<?php
include "db.php";
$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>Student Management</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container mt-5">
<div class="card-custom">

<h2 class="mb-4 text-center">Student Management System</h2>

<a href="add.php" class="btn btn-primary btn-custom mb-3">Add Student</a>

<table class="table table-dark table-hover">
<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Course</th>
<th>Created</th>
<th>Action</th>
</tr>
</thead>
<tbody>

<?php while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td><?= $row['id']; ?></td>
<td><?= $row['name']; ?></td>
<td><?= $row['email']; ?></td>
<td><?= $row['course']; ?></td>
<td><?= $row['created_at']; ?></td>
<td>
<a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm btn-custom">Edit</a>
<a href="delete.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm btn-custom">Delete</a>
</td>
</tr>
<?php } ?>

</tbody>
</table>

</div>
</div>

</body>
</html>