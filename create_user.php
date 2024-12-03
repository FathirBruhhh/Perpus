<?php
session_start();
include 'config.php';

// Create User
if (isset($_POST['create'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Insert user into the database
    $sql = "INSERT INTO users (username, email, password, role) VALUES ('$name', '$email', '$password', '$role')";
    if (mysqli_query($conn, $sql)) {
        header('Location: user.php'); // Redirect to user list after creation
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            width: 100%;
            min-height: 100vh;
            background-image: linear-gradient(rgba(0, 0, 0, .5), rgba(0, 0, 0, .5)), url(images/unnamed.jpg);
            background-position: center;
            background-size: cover;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
            color: #111;
        }
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: white;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: black;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover:not(.btn-primary) {
            background-color: #e6e6e6;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 15px 20px;
            text-align: center;
            border: none;
            background: #a29bfe;
            outline: none;
            border-radius: 30px;
            font-size: 1.2rem;
            color: #FFF;
            cursor: pointer;
            transition: .3s;
        }
 
        .btn:hover {
            transform: translateY(-5px);
            background: #6c5ce7;
        }
        .btn2 {
            display: block;
            width: 10%;
            padding: 15px 20px;
            text-align: center;
            border: none;
            background: #a29bfe;
            outline: none;
            border-radius: 5px;
            font-size: 1.2rem;
            color: #FFF;
            cursor: pointer;
            transition: .3s;
        }
 
        .btn2:hover {
            transform: translateY(5px);
            background: #6c5ce7;
        }

        /* Custom styles for form width */

        .form-container {
            background-color: #f8f9fa; /* Warna background */
            padding: 30px;
            margin: 20px auto;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 800px;
        }

    </style>
</head>
<body>
<a href="user.php" class="btn btn2">Back</a>

<div class="form-container">
    <div class="container mt-5">
            <h2>Create User</h2>
            <form action="create_user.php" method="post">
                <div class="mb-3">
                    <label for="name">Username</label>
                    <input type="text" name="name" class="form-control" placeholder="Username/Nama" required>
                </div>
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="contoh@example.com" required>
                </div>
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="mb-3">
                    <label for="role">Role</label>
                    <select name="role" class="form-control" required>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>
                <br>
                <button type="submit" name="create" class="btn btn">Create User</button>
            </form>
    </div>
</div>

</body>
</html>
