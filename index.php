<?php
session_start();
require 'db.php';

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
    <link href="styles.css" rel="stylesheet">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous">
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <title>YumYumYarn</title>
    <style>
        .btn-custom {
          background-color: goldenrod;
          color: black;
          font-weight: bolder;
          font-size: large;
          transition: background-color 0.3s ease;
          margin: 8px;
        }

        .btn-custom:hover {
          background-color: yellow;
        }

        .card-body {
        padding-bottom: 1.5rem;
        
        }

        .blog-text {
            margin-bottom: 1.5rem;
        }

        .btn-read-more {
            margin-top: 1.5rem;
        }

        .card-title a {
        text-decoration: none;
        color: inherit;
        }

        .card-title a:hover {
          text-decoration: none;
          color: inherit;
        }

        .bold {
                font-weight: bold;
        }

        aside {
            padding: 20px;
            width: 25%;
            background-color: #f8f9fa;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .category-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .category-list-item {
            margin-bottom: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .category-list-item:hover {
            background-color: #e9ecef;
        }

    </style>
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
<nav class="navbar navbar-expand-xl">
  <div class="container" id="top">
    <div class="row align-items-center">
      <div class="col-md-4"> <!-- Adjusted the grid size -->
        <a class="navbar-brand" href="#">
        <img src="images/logo.png" alt="YYY" class="icon-image" style="width: 85%; height: auto;">
        </a>
      </div>
    </div>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a href="#" class="nav-link">Home</a>
        </li>
  
        <li class="nav-item">
          <a href="cookbook.php" class="nav-link">Cookbook</a>
        </li>
        <li class="nav-item">
          <a href="login.php" class="nav-link">Sign In</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<script>
(function(){
			// Mobile Navigation script
			var burgerBtn = document.getElementById('burgerBtn');
			var globalNavigation = document.getElementById('global-navigation');
			var menu = document.querySelector('.menu');
			// when the mobile burger button is clicked, toggle a class of navigation to the main section
			burgerBtn.addEventListener('click', function() {
				globalNavigation.classList.toggle('navigation');
			// when the mobile burger button is clicked, replaces 'aria-expanded=false' to true
				if (menu.classList.contains('is-active')) {
					this.setAttribute('aria-expanded', 'false');
					menu.classList.remove('is-active');
				} else {
					menu.classList.add('is-active');
					this.setAttribute('aria-expanded', 'true');
				}
			})
		})();
  </script>
  <div class="banner text-center">
    <div class="container">
        <h1 class="banner-title">
            <span>YumYumYarnn</span> 
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
                        <img src="images\chicken.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-lg-block">
                            <h5>Sweet Seasoned Chinese Style Chicken</h5>
                            <p1>Sweet and Sour Chicken is made by batter-frying chicken and then tossing it in a quick and easy sweet and sour sauce. </p1>
                        </div>
                        </div>
                    
                        <div class="carousel-item" data-bs-interval="1500">
                        <img src="images\egg and fries.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-lg-block">
                            <h5>American Style Breakfast</h5>
                            <p1>a perfectly cooked, fluffy scrambled egg nestled between two slices of toasted artisanal bread, creating the foundation of our Egg Sandwich.</p1>
                        </div>
                        </div>
                       
                        <div class="carousel-item" data-bs-interval="1500">
                        <img src="images\food.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-lg-block">
                            <h5>Bacon Frenzy</h5>
                            <p1> featuring a mouthwatering Scrambled Egg and Bacon delight. This breakfast ensemble promises to tantalize your taste buds with the perfect union of fluffy scrambled eggs and crispy, smoky bacon.</p1>
                        </div>
                        </div>

                        <div class="carousel-item" data-bs-interval="1500">
                        <img src="images\pasta.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-lg-block">
                            <h5>Baked Mac Overload</h5>
                            <p1>a quintessential Italian comfort dish that will transport your taste buds to the heart of Mediterranean indulgence. Crafted with love and authenticity, this dish is a celebration of pasta perfection and rich, savory flavors.</p1>
                        </div>
                        </div>
                       
                        <div class="carousel-item" data-bs-interval="1500">
                        <img src="images\pizza.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-lg-block">
                            <h5>American Dream Pizza</h5>
                            <p1>a slice of heaven that captures the essence of this iconic American classic. Born from the city that never sleeps, our pizza pays homage to the bold and vibrant flavors that define New York's culinary landscape.</p1>
                        </div>
                        </div>

                        <div class="carousel-item" data-bs-interval="1500">
                        <img src="images\ramen.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-lg-block">
                            <h5>Exclusive Miso Soup</h5>
                            <p1> exquisite Miso Soup, a soul-warming bowl that captures the essence of tradition and umami-rich flavors. Crafted with meticulous care, this iconic Japanese dish is a celebration of simplicity and complexity in perfect harmony.</p1>
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
              <div class="col-lg-10">
                  <div class="title">
                      <h2 class="text-center">Recent Posts</h2>
                      <p class="text-center">Check out the latest posts from our community</p>
                  </div>

                  <?php foreach ($recentPosts as $post) : ?>
                      <div class="card mb-4">
                          <img src="images/<?= $post['image'] ?>" class="card-img-top" alt="Post Image" style="height: 400px; object-fit: cover;">
                          <div class="card-body border border-solid border-5">
                              <div class="blog-text">
                                  <?php
                                  $username = $post['username'];
                                  $query = "SELECT profile FROM accounts WHERE username = '$username'";
                                  $result = mysqli_query($conn, $query);

                                  if ($result && $row = mysqli_fetch_assoc($result)) {
                                      $profilePictureFilename = $row['profile'];

                                      if ($profilePictureFilename) {
                                          $profilePicturePath = "" . $profilePictureFilename;
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
                      <h2 class="genre-title text-center">Categories</h2>
                      <p class="text-center">Choose your poison</p>
                      <ul class="list-group">
                          <li class="list-group-item genre-item p-5" style="background-image: url(images/meatbg.jpg);">Meats</li>
                          <li class="list-group-item genre-item p-5" style="background-image: url(images/veggiebg.jpg);">Veggies</li>
                          <li class="list-group-item genre-item p-5" style="background-image: url(images/fruitsbg.jpg);">Fruits</li>
                          <li class="list-group-item genre-item p-5" style="background-image: url(images/dessertbg.jpg);">Dessert</li>
                          <li class="list-group-item genre-item p-5" style="background-image: url(images/liquorbg.jpg);">Liquor</li>
                          <!-- Add more genres as needed -->
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </section>
<script>
    document.getElementById('seeMoreButton').addEventListener('click', function () {
      if (seeMoreButton) {
    seeMoreButton.addEventListener('click', function () {
        // Add logic to handle "See More" button click
        // You can load more posts or perform any other action here
        alert('See More button clicked!');
    });
}
    });
</script>


<section class="blog" id="blog">
    <div class="container">
        <div class="title">
            <h2>The Latest & Greatest </h2>
            <p>"A culinary adventure for every palate. From kitchen experiments to<br> mouthwatering recipes, savor the joy of cooking and the art of indulgence."</p>
        </div>

<!-- ITEM 1 -->
<div class="row row-cols-1 row-cols-xl-3 g-4">
  <div class="col">
    <div class="card mb-4 h-100">
      <img src="images/garlic bread.jpg" class="card-img-top" alt="..." style="object-fit: cover; width: 100%; height: 200px;">
      <div class="card-body">
        <span class="my-4 md:my-2 entry-date text-xxs text-gray-600 font-arvo tracking-giant uppercase">October 30, 2023</span>
        <h5 class="card-title text-dark">
          <a class="text-black bold">Toasty Cheesy Garlic Bread </a>
        </h5>
        <p style="text-align: justify;">
          Your go-to for garlic bread! French bread, butter, fresh garlic, garlic powder, Parmesan, and parsley. It’s so simple and so ridiculously good. This content is a little bit longer.
        </p>
        <p class="mt-4 font-sans font-bold tracking-widest text-base">
          <a href="prod.php" class="btn btn-warning read-more position-absolute bottom-0 end-0 m-3">Read More</a>
        </p>
      </div>
    </div>
  </div>

  <!-- ITEM 2 -->
  <div class="col">
    <div class="card mb-4 h-100">
      <img src="images/Creamy-Pesto-Pasta-with-Chicken.jpg" class="card-img-top" alt="..." style="object-fit: cover; width: 100%; height: 200px;">
      <div class="card-body">
        <span class="my-4 md:my-2 entry-date text-xxs text-gray-600 font-arvo tracking-giant uppercase">October 30, 2023</span>
        <h5 class="card-title text-dark">
          <a class="text-black bold">Creamy Pesto Pasta with Chicken</a>
        </h5>
        <p style="text-align: justify;">
          Easy homemade creamy pesto pasta with chicken! This creamy pesto pasta recipe is an easy recipe but full of flavor. Tastes like Fancy takeout but simple enough to make at home. Guaranteed to please pasta lovers!
        </p>
        <p class="mt-4 font-sans font-bold tracking-widest text-base">
          <a href="prod2.php" class="btn btn-warning read-more position-absolute bottom-0 end-0 m-3">Read More</a>
        </p>
      </div>
    </div>
  </div>

  <!-- ITEM 3 -->
  <div class="col">
    <div class="card mb-4 h-100">
      <img src="images/Chocolate-Chip-Cookies-Recipe.jpg" class="card-img-top" alt="..." style="object-fit: cover; width: 100%; height: 200px;">
      <div class="card-body">
        <span class="my-4 md:my-2 entry-date text-xxs text-gray-600 font-arvo tracking-giant uppercase">October 30, 2023</span>
        <h5 class="card-title text-dark">
          <a class="text-black bold">Chocolate Chip Cookies</a>
        </h5>
        <p style="text-align: justify;">
          Browned butter and brown sugar caramelly goodness, crispy edges, barely thick and soft centers, and melty little puddles of chocolate chips.
        </p>
        <p class="mt-4 font-sans font-bold tracking-widest text-base">
          <a href="prod3.php" class="btn btn-warning read-more position-absolute bottom-0 end-0 m-3">Read More</a>
        </p>
      </div>
    </div>
  </div>
</div>


 <!-- ITEM 4 -->
<div class="row row-cols-1 row-cols-xl-3 g-4">
  <div class="col">
    <div class="card mb-4 h-100">
      <img src="images/spag.jpg" class="card-img-top" alt="..." style="object-fit: cover; width: 100%; height: 200px;">
      <div class="card-body">
        <span class="my-4 md:my-2 entry-date text-xxs text-gray-600 font-arvo tracking-giant uppercase">October 30, 2023</span>
        <h5 class="card-title text-dark">
          <a class="text-black bold">Filipino Spaghetti</a>
        </h5>
        <p style="text-align: justify;">
        This recipe is every kid’s favorite – Filipino Spaghetti – and comes from the orphanage that I worked at for a year in Cebu. Spaghetti, hot dogs, tomato sauce, and seasonings. So simple, so good.
        </p>
        <p class="mt-4 font-sans font-bold tracking-widest text-base">
          <a href="prod4.php" class="btn btn-warning read-more position-absolute bottom-0 end-0 m-3">Read More</a>
        </p>
      </div>
    </div>
  </div>

 <!-- ITEM 5 -->
 <div class="col">
    <div class="card mb-4 h-100">
      <img src="images/hot-choco.jpg" class="card-img-top" alt="..." style="object-fit: cover; width: 100%; height: 200px;">
      <div class="card-body">
        <span class="my-4 md:my-2 entry-date text-xxs text-gray-600 font-arvo tracking-giant uppercase">November 19, 2023</span>
        <h5 class="card-title text-dark">
          <a class="text-black bold">Hot Chocolate for Two</a>
        </h5>
        <p style="text-align: justify;">
        Hot chocolate for two recipe is one that we make all the time! It has just five simple ingredients and makes the perfect amount for two! You’re going to love it!
        </p>
        <p class="mt-4 font-sans font-bold tracking-widest text-base">
          <a href="prod5.php" class="btn btn-warning read-more position-absolute bottom-0 end-0 m-3">Read More</a>
        </p>
      </div>
    </div>
  </div>

  <!-- ITEM 6 -->
  <div class="col">
    <div class="card mb-4 h-100">
      <img src="images/steak.jpg" class="card-img-top" alt="..." style="object-fit: cover; width: 100%; height: 200px;">
      <div class="card-body">
        <span class="my-4 md:my-2 entry-date text-xxs text-gray-600 font-arvo tracking-giant uppercase">October 30, 2023</span>
        <h5 class="card-title text-dark">
          <a class="text-black bold">Smokey Steak</a>
        </h5>
        <p style="text-align: justify;">
        Super meaty and smokey steak that is good for everybody.</p>
        <p class="mt-4 font-sans font-bold tracking-widest text-base">
          <a href="prod3.php" class="btn btn-warning read-more position-absolute bottom-0 end-0 m-3">Read More</a>
        </p>
      </div>
    </div>
  </div>
</div>
</section>

<footer class="container-fluid bg-dark text-light text-center p-1">
    <div class="row border border-top-0 border-secondary px-2 py-2">
    <div class="col-sm-4 d-flex flex-row align-items-center">
      <img src="images/logo.png" alt="YYY" class="icon-image" style="width: 15%; height: auto;">
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

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@latest/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@latest/dist/umd/popper.min.js"></script>

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
                postDiv.classList.add('col-lg-12');
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

        xhr.open('GET', get_more_posts.php?start=${postCount}, true);
        xhr.send();
      });
    });
  </script>

     <script>
  // Get all elements with the class 'read-more'
  var readMoreButtons = document.querySelectorAll('.read-more');

  // Add a click event listener to each 'Read More' button
  readMoreButtons.forEach(function (button) {
    button.addEventListener('click', function (event) {
      // Handle the 'Read More' button click
      event.preventDefault();
      window.location.href = button.getAttribute('href');
    });
  });
</script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    var loadingScreen = document.getElementById('loading-screen');
    loadingScreen.style.display = 'none';
  });
</script>
</body>
</html>