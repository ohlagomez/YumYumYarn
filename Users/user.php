<?php
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

// Fetch recent posts from the database
$query = "SELECT * FROM posts ORDER BY dateAT DESC LIMIT 10";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@latest/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous">
    <link href="../styles.css" rel="stylesheet">
    <link rel="icon" href="../images/logo.png" type="image/x-icon">
    <title>YumYumYarn</title>
</head>

<body>  
<div id="loading-screen" class="loading-screen" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(75, 73, 66); display: flex; justify-content: center; align-items: center; z-index: 9999; transition: opacity 0.3s ease-in-out;opacity: 1;">
  <div class="loading-content" style="text-align: center;">
    <div class="spinner-border text-warning" role="status" style="width: 3rem; height: 3rem;">
      <span class="visually-hidden">Loading...</span>
    </div>
    <p class="loading-text" style="margin-top: 10px; font-size: 1rem; color: #fff;">Loading...</p>
  </div>
</div>
<header>
<nav class="navbar navbar-expand-lg">
  <div class="container" id="top">
    <div class="row align-items-center">
      <div class="col-sm-4"> <!-- Adjusted the grid size -->
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
      <?php
        // Check if the user is logged in
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];

            // Fetch user data from the database, including the profile picture filename
            $query = "SELECT profile FROM accounts WHERE username = '$username'";
            $result = mysqli_query($conn, $query);

            if ($result) {
                $userData = mysqli_fetch_assoc($result);
                $profilePictureFilename = $userData['profile'];

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
 
 
        <li class="nav-item">
          <a href="post.php" class="nav-link">Post</a>
        </li>
        <li class="nav-item">
          <a href="usercookbook.php" class="nav-link">Cookbook</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Settings
            </a>
            <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="../index.php">Logout</a>
                <a class="dropdown-item" href="acc.php">Account Info</a>
            </div>
        </li>
      </ul>
    </div>
  </div>
</nav>

  <div class="banner text-center">
    <div class="container">
        <h1 class="banner-title">
            <span>YumYumYarn</span> 
        </h1>
      <p style="color: white; font-weight:bolder; font-size:1.5rem; padding-bottom: 60px;"> <!-- Use a light salmon color for the text -->
      Where Every Recipe Tells a <span style="color: yellow; font-weight:bolder">Story.</span>
        </p>
      <div class="container">
        <form class="row g-2 align-items-center justify-content-center">
          <div class="col-auto">
            <input type="text" class="form-control" placeholder="Search" style="width: 500px; height: 50px;">
          </div>
          <div class="col-auto">
            <button type="submit" class="btn bg-warning">
                <i class="fas fa-search"></i>
            </button>
          </div>
        </form>
      </div>
    </div>
  </header>
  
  <!-- design -->
  <section class="design" id="design">
      <div class="container">
          <div class="title text-center">
              <h2>RECENT HOT TRENDS</h2>
              <p></p>
          </div>

        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="4" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="5" aria-label="Slide 2"></button>

            </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="1500">
                        <img src="../images/chicken.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-lg-block">
                            <h5>Sweet Seasoned Chinese Style Chicken</h5>
                            <p1>Sweet and Sour Chicken is made by batter-frying chicken and then tossing it in a quick and easy sweet and sour sauce.</p1>
                        </div>
                        </div>
                    
                        <div class="carousel-item" data-bs-interval="1500">
                        <img src="../images/egg and fries.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-lg-block">
                            <h5>American Style Breakfast</h5>
                            <p1>a perfectly cooked, fluffy scrambled egg nestled between two slices of toasted artisanal bread, creating the foundation of our Egg Sandwich.</p1>
                        </div>
                        </div>
                       
                        <div class="carousel-item" data-bs-interval="1500">
                        <img src="../images/food.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-lg-block">
                            <h5>Bacon Frenzy</h5>
                            <p1>featuring a mouthwatering Scrambled Egg and Bacon delight. This breakfast ensemble promises to tantalize your taste buds with the perfect union of fluffy scrambled eggs and crispy, smoky bacon.</p1>
                        </div>
                        </div>

                        <div class="carousel-item" data-bs-interval="1500">
                        <img src="../images/pasta.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-lg-block">
                            <h5>Baked Mac Overload</h5>
                            <p1>a quintessential Italian comfort dish that will transport your taste buds to the heart of Mediterranean indulgence. Crafted with love and authenticity, this dish is a celebration of pasta perfection and rich, savory flavors.</p1>
                        </div>
                        </div>
                       
                        <div class="carousel-item" data-bs-interval="1500">
                        <img src="../images/pizza.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-lg-block">
                            <h5>American Dream Pizza</h5>
                            <p1>a slice of heaven that captures the essence of this iconic American classic. Born from the city that never sleeps, our pizza pays homage to the bold and vibrant flavors that define New York's culinary landscape.</p1>
                        </div>
                        </div>

                        <div class="carousel-item" data-bs-interval="1500">
                        <img src="../images/ramen.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-lg-block">
                            <h5>Exclusive Miso Soup</h5>
                            <p1>exquisite Miso Soup, a soul-warming bowl that captures the essence of tradition and umami-rich flavors. Crafted with meticulous care, this iconic Japanese dish is a celebration of simplicity and complexity in perfect harmony.</p1>
                        </div>
                        </div>
                    
            </div>
                   
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    </div>
              </div>
          </section>
      </div>
  </section>

  <section class="recent-posts">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <div class="title">
                      <h2 class="text-center">Recent Posts</h2>
                      <p class="text-center">Check out the latest posts from our community</p>
                  </div>

                  <?php foreach ($recentPosts as $post) : ?>
                      <div class="card mb-4 border border-solid">
                          <img src="../images/<?= $post['image'] ?>" class="card-img-top" alt="Post Image" style="height: 400px; object-fit: cover;">
                          <div class="card-body">
                              <div class="blog-text">
                                  <?php
                                  $username = $post['username'];
                                  $query = "SELECT profile FROM accounts WHERE username = '$username'";
                                  $result = mysqli_query($conn, $query);

                                  if ($result && $row = mysqli_fetch_assoc($result)) {
                                      $profilePictureFilename = $row['profile'];

                                      if ($profilePictureFilename) {
                                          $profilePicturePath = "../" . $profilePictureFilename;
                                          ?>
                                          <div class="d-flex align-items-center">
                                            <img src="<?= $profilePicturePath ?>" alt="User Profile" class="rounded-circle me-2" width="50" height="50">
                                            <div class="user-details">
                                                <p><?= $post['username'] ?></p>
                                                <p><?= $post['email'] ?></p>
                                            </div>
                                          </div>
                                          <?php
                                      }
                                  }
                                  ?>
                                  <span><?= $post['dateAT'] ?></span>
                                  <h2><?= $post['title'] ?></h2>
                                  <p><?= $post['description'] ?></p>
                                  <p><?= $post['genre'] ?></p>
                                  <a href="#" class="btn btn-warning mt-auto">See More</a>
                              </div>
                          </div>
                      </div>
                  <?php endforeach; ?>
              </div>

              <div class="col-lg-2">
                  <div class="genre-section text-center">
                      <h2 class="genre-title text-center text-warning" style="font-weight: bolder;">Sponsors</h2>
                      <p class="text-center" style="font-weight: bold;">Advertisements</p>
                      <ul class="list-group">
                      <img src="../images/1.png" alt="YYY" class="image py-4" style="width: auto; height: 100%;">
                      <img src="../images/2.png" alt="YYY" class="image" style="width: auto; height: 100%;">
                      <img src="../images/3.png" alt="YYY" class="image py-4" style="width: auto; height: 100%;">
                      <img src="../images/4.png" alt="YYY" class="image" style="width: auto; height: 100%;">
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </section>

   <!-- blog -->
   <style>
    .card-body {
        padding-bottom: 1.5rem; /* Add more padding at the bottom of the card body */
        /* Justify the paragraph text */
    }

    .blog-text {
        margin-bottom: 1.5rem; /* Add more margin at the bottom of the blog text */
    }

    .btn-read-more {
        margin-top: 1.5rem; /* Add more margin at the top of the "Read More" button */
    }
    .card-title a {
    text-decoration: none; /* Remove underline */
    color: inherit; /* Inherit the color from the parent (paragraph) */
  }
   .card-title a:hover {
    text-decoration: none; /* Remove underline on hover */
    color: inherit; /* Inherit the color from the parent (paragraph) on hover */
  }
  .bold {
            font-weight: bold;
        }
</style>

<section class="blog" id="blog">
    <div class="container">
        <div class="title">
            <h2>The Latest & Greatest </h2>
            <p>"A culinary adventure for every palate. From kitchen experiments to<br> mouthwatering recipes, savor the joy of cooking and the art of indulgence."</p>
        </div>

<!-- ITEM 1 -->
<div class="row row-cols-1 row-cols-lg-3 g-4">
  <div class="col">
    <div class="card mb-4 h-100">
      <img src="../images/garlic bread.jpg" class="card-img-top" alt="..." style="object-fit: cover; width: 100%; height: 200px;">
      <div class="card-body">
        <span class="my-4 md:my-2 entry-date text-xxs text-gray-600 font-arvo tracking-giant uppercase">October 30, 2023</span>
        <h5 class="card-title text-dark">
          <a class="text-black bold">Toasty Cheesy Garlic Bread </a>
        </h5>
        <p style="text-align: justify;">
          Your go-to for garlic bread! French bread, butter, fresh garlic, garlic powder, Parmesan, and parsley. It’s so simple and so ridiculously good. This content is a little bit longer.
        </p>
        <p class="mt-4 font-sans font-bold tracking-widest text-base">
          <a href="prod/prod.php" class="btn btn-warning read-more position-absolute bottom-0 end-0 m-3">Read More</a>
        </p>
      </div>
    </div>
  </div>

  <!-- ITEM 2 -->
  <div class="col">
    <div class="card mb-4 h-100">
      <img src="../images/Creamy-Pesto-Pasta-with-Chicken.jpg" class="card-img-top" alt="..." style="object-fit: cover; width: 100%; height: 200px;">
      <div class="card-body">
        <span class="my-4 md:my-2 entry-date text-xxs text-gray-600 font-arvo tracking-giant uppercase">October 30, 2023</span>
        <h5 class="card-title text-dark">
          <a class="text-black bold">Creamy Pesto Pasta with Chicken</a>
        </h5>
        <p style="text-align: justify;">
          Easy homemade creamy pesto pasta with chicken! This creamy pesto pasta recipe is an easy recipe but full of flavor. Tastes like Fancy takeout but simple enough to make at home. Guaranteed to please pasta lovers!
        </p>
        <p class="mt-4 font-sans font-bold tracking-widest text-base">
          <a href="prod/prod2.php" class="btn btn-warning read-more position-absolute bottom-0 end-0 m-3">Read More</a>
        </p>
      </div>
    </div>
  </div>

  <!-- ITEM 3 -->
  <div class="col">
    <div class="card mb-4 h-100">
      <img src="../images/Chocolate-Chip-Cookies-Recipe.jpg" class="card-img-top" alt="..." style="object-fit: cover; width: 100%; height: 200px;">
      <div class="card-body">
        <span class="my-4 md:my-2 entry-date text-xxs text-gray-600 font-arvo tracking-giant uppercase">October 30, 2023</span>
        <h5 class="card-title text-dark">
          <a class="text-black bold">Chocolate Chip Cookies</a>
        </h5>
        <p style="text-align: justify;">
          Browned butter and brown sugar caramelly goodness, crispy edges, barely thick and soft centers, and melty little puddles of chocolate chips.
        </p>
        <p class="mt-4 font-sans font-bold tracking-widest text-base">
          <a href="prod/prod3.php" class="btn btn-warning read-more position-absolute bottom-0 end-0 m-3">Read More</a>
        </p>
      </div>
    </div>
  </div>
</div>


 <!-- ITEM 4 -->
<div class="row row-cols-1 row-cols-lg-3 g-4">
  <div class="col">
    <div class="card mb-4 h-100">
      <img src="../images/spag.jpg" class="card-img-top" alt="..." style="object-fit: cover; width: 100%; height: 200px;">
      <div class="card-body">
        <span class="my-4 md:my-2 entry-date text-xxs text-gray-600 font-arvo tracking-giant uppercase">October 30, 2023</span>
        <h5 class="card-title text-dark">
          <a class="text-black bold">Filipino Spaghetti</a>
        </h5>
        <p style="text-align: justify;">
        This recipe is every kid’s favorite – Filipino Spaghetti – and comes from the orphanage that I worked at for a year in Cebu. Spaghetti, hot dogs, tomato sauce, and seasonings. So simple, so good.
        </p>
        <p class="mt-4 font-sans font-bold tracking-widest text-base">
          <a href="prod/prod4.php" class="btn btn-warning read-more position-absolute bottom-0 end-0 m-3">Read More</a>
        </p>
      </div>
    </div>
  </div>

  <!-- ITEM 5 -->
  <div class="col">
    <div class="card mb-4 h-100">
      <img src="../images/hot-choco.jpg" class="card-img-top" alt="..." style="object-fit: cover; width: 100%; height: 200px;">
      <div class="card-body">
        <span class="my-4 md:my-2 entry-date text-xxs text-gray-600 font-arvo tracking-giant uppercase">November 19, 2023</span>
        <h5 class="card-title text-dark">
          <a class="text-black bold">Hot Chocolate for Two</a>
        </h5>
        <p style="text-align: justify;">
        Hot chocolate for two recipe is one that we make all the time! It has just five simple ingredients and makes the perfect amount for two! You’re going to love it!
        </p>
        <p class="mt-4 font-sans font-bold tracking-widest text-base">
          <a href="prod/prod5.php" class="btn btn-warning read-more position-absolute bottom-0 end-0 m-3">Read More</a>
        </p>
      </div>
    </div>
  </div>

  <!-- ITEM 6 -->
  <div class="col">
    <div class="card mb-4 h-100">
      <img src="../images/steak.jpg" class="card-img-top" alt="..." style="object-fit: cover; width: 100%; height: 200px;">
      <div class="card-body">
        <span class="my-4 md:my-2 entry-date text-xxs text-gray-600 font-arvo tracking-giant uppercase">January 1, 2023</span>
        <h5 class="card-title text-dark">
          <a class="text-black bold">Smokey Steak</a>
        </h5>
        <p style="text-align: justify;">
        Smoked steak is an incredibly delicious way to prepare steak. The steak comes off the grill juicy and full of flavor. You don’t need to get fancy with seasonings, as the smoke does most of the work for you.  
      </p>
        <p class="mt-4 font-sans font-bold tracking-widest text-base">
          <a href="prod/prod6.php" class="btn btn-warning read-more position-absolute bottom-0 end-0 m-3">Read More</a>
        </p>
      </div>
    </div>
  </div>
</div>
</section>

<!-- end of blog -->

    <!-- footer -->
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
    <!-- end of footer -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@latest/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script>
    <?php
    // Check if the user is logged in
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];

        // Fetch user data from the database, including the profile picture filename and email
        $query = "SELECT profile, email FROM accounts WHERE username = '$username'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $userData = mysqli_fetch_assoc($result);
            $profilePictureFilename = $userData['profile'];
            $profilePicturePath = "../" . $profilePictureFilename;
            $email = $userData['email'];
            ?>
            $(document).ready(function () {
                // Update the modal content with user information
                $('#userProfileModal').on('show.bs.modal', function (event) {
                    var modal = $(this);
                    modal.find('.modal-title').text('Account Menu');
                    modal.find('.modal-body img').attr('src', '<?= $profilePicturePath ?>');
                    modal.find('.modal-body .h5').text('<?= $username ?>');
                    modal.find('.modal-body .email').text('Email: <?= $email ?>');
                    // Add more user information fields as needed
                });
            });
            <?php
        }
    }
    ?>
</script>

<script>
    <?php
    // Check if the user is logged in
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];

        // Fetch user data from the database, including the profile picture filename and email
        $query = "SELECT profile, email FROM accounts WHERE username = '$username'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $userData = mysqli_fetch_assoc($result);
            $profilePictureFilename = $userData['profile'];
            $profilePicturePath = "../" . $profilePictureFilename;
            $email = $userData['email'];
            ?>
            $(document).ready(function () {
                // Update the modal content with user information
                $('#userProfileModal').on('show.bs.modal', function (event) {
                    var modal = $(this);
                    modal.find('.modal-title').text('Account Menu');
                    modal.find('.modal-body img').attr('src', '<?= $profilePicturePath ?>');
                    modal.find('.modal-body .h5').text('<?= $username ?>');
                    modal.find('.modal-body .email').text('Email: <?= $email ?>');
                    // Add more user information fields as needed
                });
            });
            <?php
        }
    }
    ?>
</script>
    <script>
        function logoutConfirmation() {
            var confirmLogout = confirm("Are you sure you want to logout?");
            if (confirmLogout) {
                window.location.href = "../index.php";
            } else {
            }
        }   
    </script> 
    <script>
    document.addEventListener('DOMContentLoaded', function () {
      const loadingScreen = document.getElementById('loading-screen');
      const seeMoreButton = document.getElementById('seeMoreButton');
      const postContainer = document.getElementById('postContainer');
      const seeMoreButtonContainer = document.getElementById('seeMoreButtonContainer');

      let postCount = 10; // Start with the initial number of posts

      seeMoreButton.addEventListener('click', function () {
        // Show loading screen after a short delay
        setTimeout(function () {
          loadingScreen.style.display = 'flex';
        }, 5000); // Adjust the delay time in milliseconds

        // Use AJAX to fetch more posts from the server
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
          if (xhr.readyState === 4 && xhr.status === 200) {
            // Hide loading screen when the AJAX request is complete
            loadingScreen.style.display = 'none';

            const newPosts = JSON.parse(xhr.responseText);
            if (newPosts.length > 0) {
              newPosts.forEach(post => {
                const postDiv = document.createElement('div');
                postDiv.classList.add('col-md-12');
                postDiv.innerHTML = `
                  <div class="blog-item">
                    <div class="blog-img">
                      <img src="${post.image}" alt="Post Image">
                      <span><i class="far fa-heart"></i></span>
                    </div>
                    <div class="blog-text">
                      <img src="${post.profile}" alt="User Profile">
                      <p>${post.username}</p>
                      <p>${post.email}</p>
                      <span>${post.dateAT}</span>
                      <h2>${post.title}</h2>
                      <p>${post.description}</p>
                      <a class="btn btn-warning" href="#">Read More</a>
                    </div>
                  </div>
                `;
                postContainer.appendChild(postDiv);
              });
              postCount += newPosts.length;

              // Hide the "See More" button if no more posts
              if (postCount >= <?= count($recentPosts) ?>) {
                seeMoreButtonContainer.style.display = 'none';
              }
            }
          }
        };

        xhr.open('GET', `get_more_posts.php?start=${postCount}`, true);
        xhr.send();
      });
    });
  </script>

    <script>
      document.addEventListener('DOMContentLoaded', function () {
        var loadingScreen = document.getElementById('loading-screen');
        loadingScreen.style.display = 'none';
      });
    </script>

    <div class="modal fade" id="userProfileModal" tabindex="-1" aria-labelledby="userProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-right">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userProfileModalLabel">Account Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex flex-column align-items-center">
                    <img src="" alt="User Icon" width="100" height="100" class="rounded-circle mb-3">
                    <p class="h5 mb-0"></p>
                </div>
                <hr class="my-3">
                <div class="mb-3">
                    <label class="fw-bold">Email:</label>
                    <span class="email"></span>
                </div>
                <!-- Add more user information fields as needed -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>