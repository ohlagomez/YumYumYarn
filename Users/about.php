<?php
session_start(); 
include '../db.php';

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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@latest/font/bootstrap-icons.css" rel="stylesheet">
    <link href="../styles.css" rel="stylesheet">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous">
    <link rel="icon" href="../images/logo.png" type="image/x-icon">
    <title>About Us</title>
</head>
<header>
<nav class="navbar navbar-expand-xl">
  <div class="container" id="top">
    <div class="row align-items-center">
      <div class="col-sm-4"> <!-- Adjusted the grid size -->
        <a class="navbar-brand" href="#">
        <img src="../images/logo.png" alt="YYY" class="icon-image" style="width: 85%; height: auto;">


        </a>
      </div>
    </div>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
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
          <a href="user.php"class="nav-link">Home</a>
        </li>
        <li class="nav-item">
          <a href="usercookbook.php" class="nav-link">Cookbook</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</header>
<style>
    body {
            margin: 0; /* Remove default margin */
        }

        body::before {
            content: "";
            position: fixed;
            width: 100%;
            height: 100%;
            background-image: url(../images/Bg1.png);
            background-size: cover;
            background-position: center center;
            filter: blur(5px); /* Adjust the blur intensity as needed */
            z-index: -1; /* Send the background behind other content */
        }

        .container {
            position: relative;
            z-index: 1; /* Bring the content above the blurred background */
        }
</style>
<body style="background-image: url(../images/Bg1.png); object-fit: cover;">
    <div class="container text-center align-items-center justify-content-center">
        <div class="row">
        <div class="col-sm-4">
        <img src="../about/Ohla.png" alt="YYY" class="" style="width: 50%; height: auto; object-fit: contain;">
        <h1 style="font-size: medium; font-weight: bold;">Gomez, Marienorelyne Laviña </h1>
        <p style="font-size: small; font-style: italic; font-weight: bold;"></p>
        <img src="../about/Oli.png" alt="YYY" class="" style="width: 50%; height: auto; object-fit: contain;">
        <h1 style="font-size: medium; font-weight: bold;">Oliveros, Clarhence Ashley Ilaw</h1>
        <p style="font-size: small; font-style: italic; font-weight: bold;"></p>
        <img src="../about/Rea.png" alt="YYY" class="" style="width: 50%; height: auto; object-fit: contain;">
        <h1 style="font-size: medium; font-weight: bold;">Rea, Justine Riggs Brian Macalintal</h1>
        <p style="font-size: small; font-style: italic; font-weight: bold;"></p>
        <img src="../about/Luis.png" alt="YYY" class="" style="width: 50%; height: auto; object-fit: contain;">
        <h1 style="font-size: medium; font-weight: bold;">Reyes, Maria Luisa Salarza</h1>
        <p style="font-size: small; font-style: italic; font-weight: bold;"></p>
        <img src="../about/Dyl.png" alt="YYY" class="" style="width: 50%; height: auto; object-fit: contain;">
        <h1 style="font-size: medium; font-weight: bold;">Hidalgo, Dylan Piolo Obispo</h1>
        <p style="font-size: small; font-style: italic; font-weight: bold;"></p>
        <img src="../about/Idan.png" alt="YYY" class="" style="width: 50%; height: auto; object-fit: contain;">
        <h1 style="font-size: medium; font-weight: bold;">Karasig, Raedann Imperial</h1>
        <p style="font-size: small; font-style: italic; font-weight: bold;"></p>
        </div>
        <div class="col-sm-8">
        <h2 style="padding-top: 30px;">OUR TEAM</h2>
        <h1 style="font-size:xx-large; font-weight: bold;"> WHO WE ARE:</h1>
        <div class="container border rounded rounded-3 p-4 my-5" style="background-color: rgba(255, 255, 255, 0.7);">

        <h1 style="font-size: medium;  font-size: large; font-style: italic;">Welcome to YumYumYarn, a realm where the irresistible allure of delectable flavors seamlessly intertwines with the captivating art of storytelling. Prepare to embark on a culinary odyssey like no other, where we skillfully weave together the intricate tapestry of food and yarn, crafting a narrative that transcends the ordinary. Our gastronomic haven beckons you to immerse yourself in the sensory symphony of mouthwatering recipes, whimsical anecdotes, and the sheer joy of creating unforgettable moments through the fusion of culinary delights and the world of yarn. <br> <br>

        Picture this – each dish we present is not merely a recipe but a vibrant thread intricately woven into the tapestry of our culinary universe. It's a journey of exploration and discovery, where the palette of flavors dances harmoniously with the rhythmic textures of yarn. YumYumYarn is more than just a food blog; it's a jubilant celebration of tastes, a canvas for boundless creativity, and a haven radiating the comforting warmth that arises from the shared passion for both exceptional food and the artistry of yarn. <br> <br>

        Immerse yourself in the magic as we invite you to savor the sumptuous details of our culinary creations, each recipe a carefully crafted chapter in the story we tell through the fusion of gastronomy and craftsmanship. From indulgent desserts that awaken the sweetest symphonies on your taste buds to savory masterpieces that evoke the richness of our culinary heritage, our offerings are a testament to the diversity and vibrancy of the world of YumYumYarn. <br> <br>

        As you traverse through our virtual kitchen, you'll encounter more than just recipes. You'll discover the personalities behind the creations – the chefs, the storytellers, the yarn enthusiasts, and the dreamers. Our team is a collection of passionate individuals, each bringing a unique flavor to the mix. Meet Marienorelyne, the maestro of delectable desserts; Clarhence, the culinary virtuoso behind savory wonders; Justine, the storyteller weaving tales into every dish; Maria Luisa, the guardian of traditional flavors; Dylan, the artisan of innovative cuisines; and Raedann, the visionary pushing the boundaries of gastronomic art. <br> <br>

        So, whether you're a seasoned chef, a novice in the kitchen, a yarn enthusiast, or simply someone seeking to be whisked away into a world where food and storytelling collide, YumYumYarn welcomes you with open arms. Indulge your senses, allow your taste buds to dance, and let the creative spirit of YumYumYarn inspire you. Join us in this grand tapestry of flavors, where every moment is an invitation to explore, savor, and be enchanted. Get ready to be inspired, for the journey has just begun!" <br> <br>
        </h1>
        <p style="font-size: small; font-style: italic; font-weight: bold;"></p>
        <img src="../images/Team.jpg" alt="YYY" class="rounded rounded-5" style="width: 90%; height: auto;">
        </div>
        </div>
        </div>
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
    </div>
</footer>
</html>