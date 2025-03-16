<?php
session_start();
require '../db.php';

if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}

// Fetch user data from the database
$username = $_SESSION['username'];
$query = "SELECT profile, email FROM accounts WHERE username = '$username'";
$result = mysqli_query($conn, $query);

if ($result) {
    $userData = mysqli_fetch_assoc($result);
    $profilePictureFilename = $userData['profile'];
    $email = $userData['email'];

    if ($profilePictureFilename) {
        $profilePicturePath = "../" . $profilePictureFilename;
    }
}

// Fetch recent posts
$query = "SELECT * FROM posts WHERE author = '$username' ORDER BY dateAT DESC LIMIT 10";
$result = mysqli_query($conn, $query);

$recentPosts = array();
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $recentPosts[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - Cooking Delights</title>
    
    <!-- CSS Links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../styles.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@latest/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="icon" href="../images/logo.png" type="image/x-icon">
    
    <!-- Your existing styles -->
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }

        .profile-container {
            margin: 20px;
            display: flex;
        }

        .profile-picture {
            border-radius: 50%;
            width: 150px;
            height: 150px;
            background-color: #FFDB58; /* Mustard Yellow */
        }

        .profile-description {
            margin-left: 20px;
            font-size: 18px; /* Larger font size for profile description */
        }

        .content {
            margin: 20px;
            color: #333; /* Dark Gray */
            font-size: 18px; /* Larger font size for content */
        }

        .image-section {
            margin: 20px;
            color: #333; /* Dark Gray */
            font-size: 18px; /* Larger font size for image section */
        }

        .image-section img {
            max-width: 100%;
            height: auto;
        }

        .additional-content {
            margin: 20px;
            color: #333; /* Dark Gray */
            font-size: 18px; /* Larger font size for additional content */
        }

        .bookmarks-section {
            margin: 20px;
            color: #333; /* Dark Gray */
            font-size: 18px; /* Larger font size for bookmarks section */
        }

        .posted-content-section {
            margin: 20px;
            color: #333; /* Dark Gray */
            font-size: 18px; /* Larger font size for posted content section */
        }

        .add-post-section {
            margin: 20px;
            color: #333; /* Dark Gray */
            font-size: 18px; /* Larger font size for add post section */
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-xl">
            <div class="container" id="top">
                <div class="row align-items-center">
                    <div class="col-md-4"> <!-- Adjusted the grid size -->
                        <a class="navbar-brand" href="#">
                            <img src="../images/logo.png" alt="YYY" class="icon-image" style="width: 85%; height: auto;">
                        </a>
                    </div>
                </div>
                
                <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="border: 3px solid white;">
                    <i style="color: white;" class="fas fa-bars"></i>
                </button>
                
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="user.php" class="nav-link">Home</a>
      </li>
                        <li class="nav-item">
                            <a href="cookbook/cookbook.php" class="nav-link">Cookbook</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container">
        <div class="profile-container">
            <img class="profile-picture" src="<?= $profilePicturePath ?>" alt="User Icon" width="45" height="45">
            <div class="profile-description">
            </div>
        </div>

        <div class="user-info-section">
            <h3>User Information</h3>
            <p>Username: <?= $username ?></p>
            <p>Email: <?= isset($email) ? $email : 'Not available' ?></p>
            <!-- Add more account info as needed -->
        </div>

        <!-- User's own posts -->
        <div class="posted-content-section">
            <h3>Your Posts</h3>
            <?php
            foreach ($recentPosts as $userPost) {
                // Assuming your 'posts' table has a column named 'content' for the post content
                $postContent = htmlspecialchars($userPost['content']);

                // Display each post
                echo '<div class="card mb-4 border border-solid">';
                echo '<img src="../images/' . $userPost['image'] . '" class="card-img-top" alt="Post Image" style="height: 400px; object-fit: cover;">';
                echo '<div class="card-body">';
                echo '<div class="blog-text">';
                echo '<div class="d-flex align-items-center">';
                
                // Display user details
                $postAuthor = $userPost['username'];
                $query = "SELECT profile FROM accounts WHERE username = '$postAuthor'";
                $result = mysqli_query($conn, $query);
                
                if ($result && $row = mysqli_fetch_assoc($result)) {
                    $profilePictureFilename = $row['profile'];
                    
                    if ($profilePictureFilename) {
                        $profilePicturePath = "../" . $profilePictureFilename;
                        echo '<img src="' . $profilePicturePath . '" alt="User Profile" class="rounded-circle me-2" width="50" height="50">';
                        echo '<div class="user-details">';
                        echo '<p>' . $userPost['username'] . '</p>';
                        echo '<p>' . $userPost['email'] . '</p>';
                        echo '</div>';
                    }
                }
                echo '</div>';
                
                echo '<span>' . $userPost['dateAT'] . '</span>';
                echo '<h2>' . $userPost['title'] . '</h2>';
                echo '<p>' . $userPost['description'] . '</p>';
                echo '<p>' . $userPost['genre'] . '</p>';
                echo '<a href="#" class="btn btn-warning mt-auto">See More</a>';
                
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>

    <footer class="container-fluid bg-dark text-light text-center p-1">
        <div class="row border border-top-0 border-secondary px-2 py-2">
            <div class="col-sm-4 d-flex flex-row align-items-center">
                <img src="../images/logo.png" alt="YYY" class="icon-image" style="width: 15%; height: auto;">
                <h5 style="font-weight: bolder; font-size: 2rem;">YumYumYarn</h5>
            </div>
            <div class="col-sm-5"></div>
            <div class="col-sm-3 p-3 d-flex flex-row">
                <a href="#" class="btn btn-light mt-auto btn-custom">Donation</a>
                <a href="#" class="btn btn-light mt-auto btn-custom">Subscribe</a>
            </div>
        </div>
        <div class="container mt-2">
            <div class="row text-align-center">
                <div class="col-sm-4">
                    <h6 style="font-size: 1.6rem;">Location</h6>
                    <p style="font-size: 0.8rem;">387Q+8WH,<br>
                        Alvarez St., San Pablo City,<br>
                        Laguna, Philippines
                    </p>
                    <p style="font-size: 0.8rem;">PAMANTASAN NG LUNGSOD NG SAN PABLO</p>
                </div>
                <div class="col-sm-4">
                    <h6 style="font-size: 1.6rem;">Contacts</h6>
                    <p style="font-size: 0.8rem;">+6390187661</p>
                    <p style="font-size: 0.8rem;">www.Facebook.com<br>
                        www.YumYumYarn.com</p>
                </div>
                <div class="col-sm-4 ">
                    <h6 style="font-size: 1.6rem;">Terms & Agreements</h6>
                    <a href="#" style="font-size: 0.9rem;">Terms and Policies<br></a>
                    <a href="#" style="font-size: 0.9rem;">Condition and Agreements</a>
                </div>
            </div>
        </div>
        <div class="social-links m-0">
            <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="text-light"><i class="bi-facebook"></i></a>
            <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="text-light"><i class="bi-twitter"></i></a>
            <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="text-light"><i class="bi-instagram"></i></a>
            <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="text-light"><i class="bi-pinterest"></i></a>
        </div>
        <span>All Rights reserved, <span style="color: #f2e30f;">@YumYumYarn.CO</span> A Raptive Partner Site.</span>
    </div>
</footer>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
$(document).ready(function () {
    $('#userProfileModal').on('show.bs.modal', function (event) {
        var modal = $(this);
        modal.find('.modal-title').text('Account Menu');
        modal.find('.modal-body img').attr('src', '<?= $profilePicturePath ?>');
        modal.find('.modal-body .h5').text('<?= $username ?>');
        modal.find('.modal-body .email').text('Email: <?= $email ?>');
    });
});

function logoutConfirmation() {
    var confirmLogout = confirm("Are you sure you want to logout?");
    if (confirmLogout) {
        window.location.href = "../index.php";
    }
}

document.addEventListener('DOMContentLoaded', function () {
    // ... existing loading screen and see more functionality ...
});
</script>
</body>
</html>
