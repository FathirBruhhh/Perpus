<?php
session_start();
include 'config.php';

// Create Book
if (isset($_POST['create'])) {
    $judul = $_POST['judul'];
    $penerbit = $_POST['penerbit'];
    $pengarang = $_POST['pengarang'];
    $tahun = $_POST['tahun'];

    // Handle file upload for cover
    $cover = null;
    if (isset($_FILES['cover']) && $_FILES['cover']['error'] == 0) {
        $cover = addslashes(file_get_contents($_FILES['cover']['tmp_name']));
    }

    // Insert book into the database
    $sql = "INSERT INTO books (judul, penerbit, pengarang, tahun, cover) VALUES ('$judul', '$penerbit', '$pengarang', '$tahun', '$cover')";
    if (mysqli_query($conn, $sql)) {
        header('Location: buku.php'); // Redirect to book list after creation
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
    <title>Create Book</title>
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
        .form-container {
            background-color: #f8f9fa;
            padding: 30px;
            margin: 20px auto;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 800px;
        }
    </style>
</head>
<body>
<a href="buku.php" class="btn btn2">Back</a>

<div class="form-container">
    <div class="container mt-5">
        <h2>Create Book</h2>
        <form action="create_buku.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="judul">Judul</label>
                <input type="text" name="judul" class="form-control" placeholder="Judul Buku" required>
            </div>
            <div class="mb-3">
                <label for="penerbit">Penerbit</label>
                <input type="text" name="penerbit" class="form-control" placeholder="Nama Penerbit" required>
            </div>
            <div class="mb-3">
                <label for="pengarang">Pengarang</label>
                <input type="text" name="pengarang" class="form-control" placeholder="Nama Pengarang" required>
            </div>
            <div class="mb-3">
                <label for="tahun">Tahun</label>
                <input type="date" name="tahun" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="cover">Cover</label>
                <input type="file" name="cover" class="form-control" accept="image/*">
            </div>
            <br>
            <button type="submit" name="create" class="btn btn">Create Book</button>
        </form>
    </div>
</div>

</body>
</html>
