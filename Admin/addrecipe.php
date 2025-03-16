<?php
session_start();
include '../db.php';

// Check if the user has the correct role
if ($_SESSION['username'] !== 'admin') {
    // Redirect to a different page or show an error message
    header("Location: ../login.php");
    exit();
  }


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dishname = $_POST['dish'];
    $image = $_FILES["image"];
    $author = $_POST['author'];
    $origin = $_POST['origin'];
    $genre = $_POST['genre'];
    $steps = $_POST['steps'];

    $target_dir = "../recipe/";
    $target_file = $target_dir . basename($image["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($image["tmp_name"]);
    if ($check === false) {
        echo "File is not an image. <a class='try-again-link' href='register.php'>Try Again</a>";
        exit();
    }

    if ($image["size"] > 500000000) {
        echo "Sorry, your file is too large. <a class='try-again-link' href='register.php'>Try Again</a>";
        exit();
    }

    $allowed_formats = array("jpg", "jpeg", "png", "gif");
    if (!in_array($imageFileType, $allowed_formats)) {
        echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed. <a class='try-again-link' href='register.php'>Try Again</a>";
        exit();
    }

    if (move_uploaded_file($image["tmp_name"], $target_file)) {
        $profile = $target_file;

        $sql = "INSERT INTO recipe (dishname, image, author, origin, genre, steps) VALUES ('$dishname', '$target_file', '$author', '$origin', '$genre', '$steps')";

        if (mysqli_query($conn, $sql)) {
            $_SESSION['username'] = $username;
            header("Location: admin.php");
        } else {
            echo "Error: " . mysqli_error($conn) . "<a class='try-again-link' href='register.php'>Try Again</a>";
        }
    } else {
        echo "Sorry, there was an error uploading your file. <a class='try-again-link' href='register.php'>Try Again</a>";
        exit();
    }

    // Now, fetch the user data and check the profile picture
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];

        // Reconnect to the database
        include '../db.php';

        $query = "SELECT profile FROM accounts WHERE username = '$username'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $userData = mysqli_fetch_assoc($result);
            $profilePictureFilename = $userData['profile'];

            if ($profilePictureFilename) {
                $profilePicturePath = "../" . $profilePictureFilename;
                ?>
                <li class="nav-item">
                    <div class="d-flex text-center align-items-center">
                        <img src="<?= $profilePicturePath ?>" alt="User Icon" width="45" height="45"
                            class="rounded-circle me-2" data-bs-toggle="modal" data-bs-target="#userProfileModal">
                            <span class="text-center fw-bold text-light" style="font-family: 'monospace', sans-serif; color: light; font-size: 1.25rem; margin-right: 20px;"><?= $username ?></span>
                    </div>
                </li>
                <?php
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CookBook</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@latest/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" href="../images/logo.png" type="image/x-icon">
    <link href="../styles.css" rel="stylesheet"> 
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
</head>
<header class="container-fluid text-center bg-dark text-light py-3" style="background-size: cover; background-position: center;">
    <div class="container">
    <h1 class="display-4" style="font-family: 'Cuciniere', sans-serif; font-weight: bold; font-style: italic; color: white; text-shadow: 2px 2px 4px #333, -2px -2px 4px #555;">YumYumYarn</h1>
        <nav>
            <div class="text-center align-items-center">
            <ul class="nav justify-content-center">
            <?php
        // Check if the user is logged in
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];

            // Fetch user data from the database, including the profile picture filename
            $query = "SELECT profile FROM accounts WHERE username = '$username'";
            $result = mysqli_query($conn, $query);

            if ($result) {
                $userData = mysqli_fetch_assoc($result);
                $profilePictureFilename = isset($userData['profile']) ? $userData['profile'] : null;

                if ($profilePictureFilename) {
                    // Assuming the profile pictures are stored in the "uploads" folder
                    $profilePicturePath = "../" . $profilePictureFilename; // Added a trailing slash here
                    ?>
                    <li class="nav-item">
                        <div class="d-flex text-center align-items-center">
                            <!-- Added a data-bs-toggle and data-bs-target attributes for modal -->
                            <img src="<?= $profilePicturePath ?>" alt="User Icon" width="45" height="45"
                                class="rounded-circle me-2" data-bs-toggle="modal" data-bs-target="#userProfileModal">
                                <span class="text-center fw-bold text-light" style="font-family: 'monospace', sans-serif; color: light; font-size: 1.25rem; margin-right: 20px;"><?= $username ?></span>
                        </div>
                    </li>
                    <?php
                }
            }
        } else {
            // If the user is not logged in, show the regular logout link
        }
        ?>
                <li class="nav-item"><a class="nav-link text-light" href="admin.php"style="font-weight: bold;">Home</a></li>
            </ul>
            </div>
        </nav>
    </div>
</header>
<body style="object-fit: cover;">
    <div class="container" style="margin-top: 100px; max-width: 50%; margin: 20px auto;">
      <div class="card">
        <div class="card-header">
          <h2 class="text-center" style="color: black; font-weight: 900; font-size: 40px;">Recipe</h2>
          <form action="addrecipe.php" method="post" enctype="multipart/form-data">
          <div class="form-group my-3" style="color: black">
              <label for="dish">Dish Name</label>
              <input type="text" class="form-control" name="dish" id="dish" required />
          </div>

          <div class="form-group my-3" style="color: black">
              <label for="image">Photo:</label>
              <input type="file" class="form-control" name="image" id="image" required />
          </div>

          <div class="form-group my-3" style="color: black">
              <label for="author">Author:</label>
              <input type="text" class="form-control" name="author" id="author" required />
          </div>
              <div class="input-group my-3">
              <label class="input-group-text" for="inputGroupSelectOrigin">Origin</label>
              <select class="form-select" id="inputGroupSelectOrigin" name="origin">
                      <option selected></option>
                      <option value="Philippines">Philippines</option>
                      <option value="Italy">Italy</option>
                      <option value="Mexico">Mexico</option>
                      <option value="Japan">Japan</option>
                      <option value="India">India</option>
                      <option value="America">America</option>
                  </select>
              </div>
              <div class="input-group my-3">
              <label class="input-group-text" for="inputGroupSelectGenre">Genre</label>
              <select class="form-select" id="inputGroupSelectGenre" name="genre">
                      <option selected></option>
                      <option value="Meats">Meats</option>
                      <option value="Veggies">Veggies</option>
                      <option value="Pastries">Pastries</option>
                      <option value="Dessert">Dessert</option>
                      <option value="Fruits">Fruits</option>
                      <option value="Beverages">Beverages</option>
                      <option value="Pasta">Pasta</option>
                  </select>
              </div>
              <div class="form-group my-3" style="color: black">
                  <label for="steps">Steps</label>
                  <textarea class="form-control" name="steps" id="steps" style="height: 150px;" required></textarea>
              </div>
              <div class="d-flex justify-content-between">
                  <button type="submit" class="btn btn-success">Submit</button>
                  <a href="admin.php" class="btn btn-primary">Back</a>
              </div>
          </form>
        </div>
      </div>  
    </div>  

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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
