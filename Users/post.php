<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();
require '../db.php';

if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
  }
  
  // Check if the user has the correct role
  if ($_SESSION['username'] === 'admin') {
    // Redirect to a different page or show an error message
    header("Location: ../login.php");
    exit();
  }
  

// Adjust these values based on your requirements
ini_set('upload_max_filesize', '10M');
ini_set('post_max_size', '10M');
ini_set('max_input_time', 300);
ini_set('max_execution_time', 300);

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$username = $_SESSION['username'];
$email = '';
$profilePicturePath = '';

$query = "SELECT email, profile FROM accounts WHERE username = '$username'";
$result = mysqli_query($conn, $query);

if ($result) {
    $userData = mysqli_fetch_assoc($result);
    if (isset($userData['email'], $userData['profile'])) {
        $email = $userData['email'];
        $profile = $userData['profile'];
        $profilePicturePath = "../{$userData['profile']}";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $genre = mysqli_real_escape_string($conn, $_POST['genre']);

    $targetDir = "../uploadedphoto";
    $targetFile = $targetDir . '/' . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
            echo "File is not an image.";
        }
    }

    if (is_file($targetFile)) {
        $uploadOk = 0;
        echo "File already exists.";
    }

    if ($_FILES["image"]["size"] > 500000000000) {
        $uploadOk = 0;
        echo "File is too large.";
    }

    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($imageFileType, $allowedExtensions)) {
        $uploadOk = 0;
        echo "Only JPG, JPEG, PNG, and GIF files are allowed.";
    }

    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            $dateAt = date('Y-m-d H:i:s');
            $query = "INSERT INTO posts (profile, username, email, title, image, description, genre, dateAT) 
                        VALUES ('$profile', '$username', '$email', '$title', '$targetFile', '$description', '$genre', '$dateAt')";
            mysqli_query($conn, $query);

            header('Location: user.php');
            exit();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@latest/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" href="../images/logo.png" type="image/x-icon">
    <link href="../styles.css" rel="stylesheet">
    <title>Create Post</title>
</head>
<header class="container-fluid text-center bg-dark text-light py-3" style="background-size: cover; background-position: center;">
    <div class="container">
    <h1 class="display-4" style="font-family: 'Cuciniere', sans-serif; font-weight: bold; font-style: italic; color: white; text-shadow: 2px 2px 4px #333, -2px -2px 4px #555;">YumYumYarn</h1>
        <nav>
            <div class="text-center align-items-center">
            <ul class="nav justify-content-center">
                <li class="nav-item"><a class="nav-link text-light" href="user.php"style="font-weight: bold;">Home</a></li>
                <li class="nav-item"><a class="nav-link text-light" href="#create-post"style="font-weight: bold;">Create Post</a></li>
            </ul>
            </div>
        </nav>
    </div>
</header>
<body>
<style>
       body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            position: relative;

        }

        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background: url(../images/utensils.jpg) no-repeat center center fixed;
            background-size: cover;
            filter: blur(5px); /* Adjust the blur strength as needed */
            animation: fadeIn 2s ease-in-out; /* Add a fadeIn animation */
        }

        header h1 {
            animation: bounceIn 1s ease-in-out; /* Add a bounceIn animation */
        }
        
        header h1:hover {
            color: orange; /* Change the color on hover */
            transform: scale(1.2); /* Scale up on hover */
        }

        header {
            background-color: #333;
            color: white;
            padding: 1em;
            text-align: center;
        }

        main {
            display: flex;
            justify-content: space-between;
            padding: 20px;
        }

        section {
            width: 70%;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .card {
        background-color: rgba(255, 255, 255, 0.5);
    }
</style>

<div class="container-fluid">
    <div class="row" style="padding-top: 30px; padding-bottom: 30px;">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="font-weight-bold"style="font-weight: bold;">Create Post</h3>
                    <p>
                        <img src="<?= $profilePicturePath ?>" alt="User Icon" width="45" height="45" class="rounded-circle me-2">
                        <span class="font-weight-bold"><?= $_SESSION['username'] ?></span>
                        (<i class="fas fa-envelope"></i> <span class="font-weight-bold"><?= $email ?></span>)
                    </p>
                </div>
                <div class="card-body">
                    <form action="post.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="title" class="form-label font-weight-bold"style="font-weight: bold;">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label font-weight-bold" style="font-weight: bold;">Image</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label font-weight-bold"style="font-weight: bold;">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text font-weight-bold"style="font-weight: bold;" for="inputGroupSelect01">Genre</label>
                            <select class="form-select" id="inputGroupSelect01" name="genre">
                                <option selected></option>
                                <option value="Meats">Meats</option>
                                <option value="Veggies">Veggies</option>
                                <option value="Pastries">Pastries</option>
                                <option value="Beverages">Beverages</option>
                                <option value="Liquor">Liquor</option>
                                <option value="Dessert">Dessert</option>
                            </select>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary font-weight-bold">Post</button>
                        <a href="user.php" class="btn btn-secondary font-weight-bold">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
<footer class="container-fluid text-light text-center p-1" style="background-color: #303030;">
        <div class="social-links m-0">
          <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="text-light"><i class="bi-facebook"></i></a>
          <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="text-light"><i class="bi-twitter"></i></a>
          <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="text-light"><i class="bi-instagram"></i></a>
          <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="text-light"><i class="bi-pinterest"></i></a>
      </div>
          <span>All Rights reserved, <span style="color: #f2e30f;">@YumYumYarn.CO</span> A Raptive Partner Site.</span>
      </div>
    </footer>
</html>