<?php
session_start();
include 'config.php';

// Read Books
$sql = "SELECT * FROM books";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book List</title>
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
        .form-container {
            background-color: #f8f9fa;
            padding: 30px;
            margin: 20px auto;
            margin-top: 70px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 1200px;
        }

        .btn-a {
            display: block;
            width: 100%;
            text-align: center;
            border: none;
            background: #a29bfe;
            outline: none;
            border-radius: 3px;
            font-size: 1.2rem;
            color: #FFF;
            cursor: pointer;
            transition: .3s;
        }
        .btn-b {
            display: block;
            width: 100%;
            text-align: center;
            border: none;
            background: #bac0ff;
            outline: none;
            border-radius: 3px;
            font-size: 1.2rem;
            color: #FFF;
            cursor: pointer;
            transition: .3s;
        }
        .btn-b:hover {
            background: #6c5ce7;
            color: #000000;
        }
        .btn-c:hover {
            background: #6c5ce7;
            color: #000000;
        }
    </style>
</head>
<body>
<ul class="btn-a">
    <li><a href="login_user.php" class="btn-c">Home</a></li>
    <li><a href="buku.php" class="btn-b">Buku</a></li>
</ul>

<div class="form-container">
    <div class="container mt-5">
        <div class="row">
            <h2>Book List</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Judul</th>
                        <th>Penerbit</th>
                        <th>Pengarang</th>
                        <th>Tahun</th>
                        <th>Cover</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1; // Nomor urut
                    while ($book = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $book['judul']; ?></td>
                        <td><?php echo $book['penerbit']; ?></td>
                        <td><?php echo $book['pengarang']; ?></td>
                        <td><?php echo $book['tahun']; ?></td>
                        <td>
                            <?php if ($book['cover']): ?>
                                <img src="data:image/jpeg;base64,<?php echo base64_encode($book['cover']); ?>" alt="Cover" style="width: 100px; height: auto;">
                            <?php else: ?>
                                <span>No Cover</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

</body>
</html>
