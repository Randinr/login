<?php
include 'koneksi.php'; // Ensure database connection is correct

$id = $_GET['id'];
$query = "SELECT * FROM users WHERE id='$id'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $updated_username = mysqli_real_escape_string($conn, $_POST['updated_username']);
    $updated_password = mysqli_real_escape_string($conn, $_POST['updated_password']);
    $query = "UPDATE users SET username='$updated_username', password='$updated_password' WHERE id='$id'";

    if (mysqli_query($conn, $query)) {
        header('Location: index.php'); // Redirect to main page after update
        exit;
    } else {
        echo "<div class='alert alert-danger' role='alert'>Error updating record: " . mysqli_error($conn) . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #7b4b94, #EB1616);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            background-color: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        .form-container h2 {
            font-weight: bold;
            margin-bottom: 1.5rem;
        }
        .form-container .btn-primary {
            background-color: #0000FF;
            border: none;
            width: 100%;
            padding: 0.5rem;
            font-size: 1rem;
            border-radius: 50px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Edit Account</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <input type="text" class="form-control" id="updated_username" name="updated_username" value="<?php echo $user['username']; ?>" placeholder="Enter Username" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" id="updated_password" name="updated_password" placeholder="New Password" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Account</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
