<?php
session_start();
require 'db.php';
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}

// Check if the user has the correct role
if ($_SESSION['username'] === 'admin') {
  // Redirect to a different page or show an error message
  header("Location: login.php");
  exit();
}

// Assuming you are using POST method to submit the form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $message = mysqli_real_escape_string($conn, $_POST['message']);

  // SQL query to insert data into the 'contacts' table
  $sql = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";

  // Perform the query
  if (mysqli_query($conn, $sql)) {
      // If insertion is successful, set a session variable and redirect to login.php
      $_SESSION['username'] = $name;  // Assuming you want to store the 'name' in the session
      header("Location: index.php");
      exit(); // Make sure to exit after header() to avoid further execution
  } else {
      // If there is an error, display the error message
      echo "Error: " . mysqli_error($conn) . "<a class='try-again-link' href='register.php'>Try Again</a>";
  }
}

// Close the database connection
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filipino Spaghetti </title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-dFsfn7I2ZkBCvz3PkWJUpaytGvKhe5tKzuz6rtk/HOpZq1u8U/sL/F4ORLSzN1hD" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@latest/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <link href="styles.css" rel="stylesheet">
  </head>
<body>

<!-- Navbar --> 
<nav class="navbar navbar-expand-lg">
  <div class="container" id="top">
    <div class="row align-items-center">
      <div class="col-sm-4"> <!-- Adjusted the grid size -->
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
          <a href="index.php" class="nav-link">Home</a>
        </li>
        <li class="nav-item">
          <a href="about.php" class="nav-link">About</a>
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


<style>
body {
      font-family: sans-serif;
    }

    .container h1 {
      font-weight: bold;
      font-style: italic;
      font-size: 35px;
    }
    .tasty-recipes-jump-link {
      text-decoration: none;
      font-weight: bold;
    }

    .tasty-recipes-jump-link:hover {
      text-decoration: underline;
    }
    .tasty-recipes-quick-links a.tasty-recipes-jump-link {
    display: block;
    text-transform: uppercase;
    padding-top: 10px;
    }

    .tasty-recipes-quick-links a.tasty-recipes-jump-link {
        --tw-text-opacity: 1;
        color: rgb(112 64 98/var(--tw-text-opacity));
        display: block;
        padding-bottom: 10px;
        padding-top: .10px;
        text-transform: uppercase;
    }

    .tasty-recipes-quick-links {
        text-align: center;
    }
    </style>



<!-- Hero Section -->
<div class="container text-center align-items-center">
    <h1 class="display-4">Filipino Spaghetti </h1>
    <p class="lead">Experience the Taste of Filipino</p>
</body>
</html>
<style>
  
</style>
  </script>
  <div class="tasty-recipes-quick-links">
    <a class="tasty-recipes-jump-link" href="#tasty-recipes-94185">Jump to Recipe</a>
    </div>
    <img src="../../images/spag.jpg" alt="filipino spaghetti" class="img rounded" style="width: 850px; height: 500px;">
    
      </header>
  </div>
</div>




<!-- About Section -->
<section id="about" class="container my-5">
<div class="row">
    <div class="col-lg-6 d-flex flex-column align-items-center">
        <h2 class="mb-4">About Filipino Spaghetti</h2>
        <p class="text-justify" >
        It’s a thing. It’s a sweet, sticky, saucy, even-sold-at-McDonald’s thing.<br>

        <br>
        Much like the pancit from last week, this meal was served at almost every birthday party at the orphanage where I worked this last year, usually mushed together on kids’
         plastic plates with heaping piles of steaming rice and some mixed vegetables. On this particular party day, Auntie Elvira and Auntie Puriza invited me into the kitchen and
          showed me how it’s done. Here’s the story, in pictures.<br>

      <br>
      PS. Red hot dogs remain one of my unsolved mysteries about the Philippines.<br>
      

        <!-- Features: Save, Bookmark, Like -->
        <div class="mt-4 d-flex justify-content-center align-items-center">
            <button class="btn btn-outline-primary">
            <i class="fas fa-save"></i> Save
            </button>
            <button class="btn btn-outline-danger ml-2">
            <i class="fas fa-bookmark"></i> Bookmark
            </button>
            <button class="btn btn-outline-success ml-2">
            <i class="fas fa-thumbs-up"></i> Like
            </button>
        </div>
    </div>
    <div class="col-lg-6">
        <img src="../../images/cook1.jpg" alt="Chef preparing pasta" class="img-fluid rounded">
    </div>
</div>

  <hr class="wp-block-separator has-alpha-channel-opacity">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h2 class="wp-block-heading">Ingredients For This Tasty Filipino Spaghetti</h2>
        <p>There aren’t many! Yay!</p>
        <figure class="wp-block-image mx-auto d-block">
          <img src="../../images/spaghetti-2.jpg" decoding="async" width="500" height="400" >
        </figure>
      </div>
    </div>
  </div>

  <style>
  .centered-bullets {
    text-align: center;
    padding: 0;
    margin: 0;
  }

  .centered-bullets li {
    margin-bottom: 10px;
    text-align: left;
    display: flex;
    align-items: center;
  }

  .centered-bullets li::before {
    content: '•';
    color: #555; /* Change the color if needed */
    margin-right: 10px; /* Adjust the space between bullet and text */
    font-size: 1.5em; /* Adjust the bullet size */
  }
</style>  

<div class="container">
    <div class="row">
      <div class="col-11" style="display: flex; flex-direction: column; align-items: center; font-weight: bold; ">
        <ul class="centered-bullets">
          <li>Del Monte <em>(spaghetti sauce)</em></li>
          <li>Evaporada Milk</li>
          <li>Hotdog <em></em></li>
          <li>Tomato Paste</li>
          <li>Cheese</li>
          <li>Garlic</li>
          <li>Onion</li>
          <li>Bell Pepper</li>
          <li>Ground Pork</li>
          <li>Banana Ketsup</li>
          <li>Salt, Pepper and Sugar  </li>
          <li>Banana Ketsup</li>
        </ul>
      </div>
    </div>
  </div>

  
  <style>
    .recipe-step {
      background-color:  #fffceb; /* Light yellow background */
      padding: 20px;
      margin-bottom: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
    }

    .recipe-step h3 {
      margin-top: 0;
      color: #ff8f00; /* Orange text color */
    }
  </style>
</head>
<body>

  <hr class="wp-block-separator has-alpha-channel-opacity">

  <!-- Step 1 -->
  <div class="container recipe-step">
    <h2 class="wp-block-heading" id="how-to-make">How To Make This Filipino Spaghetti</h2>
    <h3 class="wp-block-heading" id="h-step-1-soften-your-butter">Step 1: Brown the hot dogs.</h3>
    <p> For an authentic feel, use Filipino "red" hot dogs. If not available, you can also use diced ham or sliced Vienna sausages to add a smoky flavor.</p>
  </div>

  <!-- Step 2 -->
  <div class="container recipe-step">
    <h3 class="wp-block-heading" id="h-step-2-grate-that-garlic-right-in-there">Step 2: Brown the meat.</h3>
    <p>Cook the ground beef using the SAUTE feature on NORMAL. You can substitute with ground chicken or turkey for a leaner option.</p>
  </div>

  <!-- Step 3 -->
  <div class="container recipe-step">
    <h3 class="wp-block-heading" id="h-step-3-add-parmesan-and-parsley">Step 3: Add Parmesan and parsley.</h3>
    <p>Finely grated Parmesan cheese is where it’s at! That savory flavor and golden browning – YUM.</p>
    <p>I also like to add a little bit of garlic powder at this point just to slightly extend my garlick-ing of things (but with more subtlety than fresh garlic).</p>
  </div>

  <!-- Step 4 -->
  <div class="container recipe-step">
    <h3 class="wp-block-heading" id="h-step-4-spread-that-amazingness-on-your-bread">Step 4: Spread that amazingness on your bread.</h3>
    <p>I find this amount of butter mixture is good for half of a long loaf of French bread.</p>
  </div>

  <!-- Step 5 -->
  <div class="container recipe-step">
    <h3 class="wp-block-heading" id="h-step-5-bake-it">Step 5: Bake it!</h3>
    <p>If you don’t want any browning, first of all, why? It’s delightful. Second of all, you’ll just want to go for more like 375 to 400 degrees for 7-10 minutes.</p>
    <p>If you like it a little golden brown, like I do, with a bit of texture on top, shoot for 10 minutes at 400 to 425 degrees. Just keep an eye on it and nudge it up as needed.</p>
  </div>


<div id="tasty-recipes-94185" class="tasty-recipes tasty-recipe-94185 tasty-recipes-display tasty-recipes-has-image" data-tasty-recipes-customization="primary-color.border-color"> </div>
    <header class="tasty-recipes-entry-header" style="background-color: #f8f8f8; padding: 20px; border: 2px solid #ffd700; border-radius: 10px;">
    <div class="tasty-recipes-image" style="text-align: center;">
        <img loading="lazy" decoding="async" width="183" height="183" src="../../images/spag.jpg" class="attachment-thumbnail size-thumbnail" alt="Garlic bread slices on a cutting board." style="border: 4px solid #ffd700; border-radius: 10px;">
</div>

    <h2 class="tasty-recipes-title" style="color: #333; text-transform: uppercase; margin-top: 15px; text-align:center">Filipino Spaghetti</h2>
    <hr style="border: 1px solid #ffd700; background-color: #ffd700; margin: 15px 0;">
    <div class="tasty-recipes-details" style="color: #555; font-size: 14px; font-size:20px; ">
        <ul style="list-style-type: none; padding: 0; margin: 0;">
            <li class="author" style="margin-bottom: 10px; text-align:center ">
                <span style="color: #666;">Author:</span>
                <a style="color: #0066cc; text-decoration: none;" href="https://pinchofyum.com/about">Lalaine</a>
            </li>
            <li class="total-time" style="margin-bottom: 10px; text-align:center">
                <span style="color: #666;">
                    <svg viewBox="0 0 24 24" style="width: 18px; height: 18px; fill: #666; vertical-align: text-top; ">
                        <use xlink:href="#tasty-recipes-icon-clock"></use>
                    </svg>
                    Total Time:
                </span>
                <span style="color: #333; font-weight: bold;">20 minutes</span>
            </li>
            <li class="yield" style="margin-bottom: 10px; text-align:center">
                <span style="color: #666;">
                    <svg viewBox="0 0 24 24" style="width: 18px; height: 18px; fill: #666; vertical-align: text-top;">
                        <use xlink:href="#tasty-recipes-icon-cutlery"></use>
                    </svg>
                    Yield:
                </span>
                <span style="color: #333; font-weight: bold; ">
                    <span data-amount="5" data-amount-original-type="frac" data-amount-should-round="frac">12</span> servings </span>  
                    
                </span>
            </li>
        </ul>

    <style>
      .tasty-recipes-ingredients li::before {
      content: none;
    }
    </style>

<hr class="wp-block-separator has-alpha-channel-opacity">
    <div class="tasty-recipes-ingredients" style="display: flex; flex-direction: column; align-items: center;">
    <div class="tasty-recipes-ingredients-header" style="text-align: center; font-size:20px;">
        <div class="tasty-recipes-ingredients-clipboard-container">
            <h3 data-tasty-recipes-customization="h3-color.color h3-transform.text-transform">Ingredients</h3>
        </div>
        <div data-tasty-recipes-customization="body-color.color" style="text-align: left; font-size:20px;">
    
      <style>
      ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        li {
            margin-bottom: 10px;
        }

        label {
            position: relative;
            display: inline-block;
        }

        label::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            width: 0;
            height: 2px;
            background-color: #2196f3; /* Change this color to your desired underline color */
            transition: width 0.3s ease;
        }

        input:checked + label::after {
            width: 100%;
        }

        label:hover {
            color: #2196f3; /* Change this color to your desired text color on hover */
        }
    </style>
        
    <ul style="list-style: none; padding: 0; margin: 0;">
    <li data-tr-ingredient-checkbox="checked">
        <span class="tr-ingredient-checkbox-container">
            <input type="checkbox" id="ingredient1">
            <label for="ingredient1" data-amount="1">1 pound  <strong>uncooked spaghetti</strong></label>
            </span>
    </li>
    <li data-tr-ingredient-checkbox="checked">
        <span class="tr-ingredient-checkbox-container">
            <input type="checkbox" id="ingredient1">
            <label for="ingredient2" data-amount="1">1 tablespoon  <strong> oil</strong></label>
           </li>
    <li data-tr-ingredient-checkbox="checked">
        <span class="tr-ingredient-checkbox-container">
            <input type="checkbox" id="ingredient1">
            <label for="ingredient3" data-amount="4">4 Filipino-style <strong>hotdogs</strong>, sliced diagonally </label>
            </li>
    <li data-tr-ingredient-checkbox="checked">
        <input type="checkbox" id="ingredient4">
        <label for="ingredient4" data-amount="1" >1 <strong>onion, </strong> peeled and chopped</label>
        </li>
    <li data-tr-ingredient-checkbox="checked">
        <input type="checkbox" id="ingredient5">
        <label for="ingredient5"  data-amount="3">3 cloves <strong> garlic </strong>, peeled and minced</label>
       </li>
    <li data-tr-ingredient-checkbox="checked">
        <input type="checkbox" id="ingredient6">
        <label for="ingredient6" data-amount="1" >1 <strong>bell pepper,</strong>  seeded, cored and chopped</label>
       </li>
    <li data-tr-ingredient-checkbox="checked">
        <input type="checkbox" id="ingredient7">
        <label for="ingredient5"  data-amount="1">1 pound  <strong>ground beef </strong></label>
       </li>
    <li data-tr-ingredient-checkbox="checked">
        <input type="checkbox" id="ingredient8">
        <label for="ingredient5"  data-amount="2">2 cups   <strong>tomato sauce </strong></label>
    </li> 
       <li data-tr-ingredient-checkbox="checked">
        <input type="checkbox" id="ingredient9">
        <label for="ingredient5"  data-amount="½">½ cup  <strong>tomato paste </strong></label>
       </li> 
    <li data-tr-ingredient-checkbox="checked">
        <input type="checkbox" id="ingredient10">
        <label for="ingredient5"  data-amount="1">1 cup <strong>banana ketchup </strong>, preferably sweet and spicy   </label>
       </li> 
       </li> 
   <li data-tr-ingredient-checkbox="checked">
        <input type="checkbox" id="ingredient11">
        <label for="ingredient5"  data-amount="1">1 cup  <strong> beef broth</strong></label>
       </li> 
    </li> 
       <li data-tr-ingredient-checkbox="checked">
        <input type="checkbox" id="ingredient12">
        <label for="ingredient5"  data-amount="1">1 teaspoon  <strong> sugar </strong></label>
       </li> 
    </li> 
       <li data-tr-ingredient-checkbox="checked">
        <input type="checkbox" id="ingredient13">
        <label for="ingredient5"  data-amount="">  <strong>salt and pepper  </strong>to taste</label>
       </li> 
    </li> 
       <li data-tr-ingredient-checkbox="checked">
        <input type="checkbox" id="ingredient14">
        <label for="ingredient5"  data-amount="½">½ cup  <strong> quick-melt cheese,  </strong>shredded</label>
       </li> 
    
</ul>

</div>
</div>
</div>

    <hr class="wp-block-separator has-alpha-channel-opacity">
    <div class="tasty-recipes-instructions-header" style="text-align:center; font-size:20px;" >
    <h3 data-tasty-recipes-customization="h3-color.color h3-transform.text-transform">Instructions</h3>
    </div>
    <div data-tasty-recipes-customization="body-color.color" style="text-align:justify; font-size:20px;">
        <ol>
        <li id="instruction-step-1">In a pot over medium heat, cook spaghetti in salted boiling water according to package's direction for about 7 to 9 minutes or until firm to bite. Drain well.&nbsp;</li>
        <li id="instruction-step-2">In a large saucepan, heat oil. Add sliced hot dogs and cook, stirring occasionally, for about 1 to 2 minutes or until lightly browned. Remove from pan and set aside.</li>
        <li id="instruction-step-3">Add onions, garlic, and bell peppers to pan. Cook until softened. </li>
        <li id="instruction-step-4">Add ground beef and cook, stirring occasionally and breaking into small pieces until lightly browned. Drain any excess fat.</li>
        <li id="instruction-step-5">Add tomato sauce, tomato paste, ketchup, and beef broth. Stir in sugar. </li>
        <li id="instruction-step-6">Bring to a boil and then lower heat to simmer, covered, for about one hour or until meat is fully cooked and sauce is thickened. If the sauce is getting too thick, add water in ½ cup increments as needed. </li>
        <li id="instruction-step-7">During the last 10 minutes of cooking, add browned hot dogs. Season with salt and pepper to taste. </li>
        <li id="instruction-step-8">To serve, spoon spaghetti sauce over noodles and top with shredded cheese. </li>
        </ol>
        </div>

        </div>
</header>



    
<!-- Contact Section -->
<section id="contact" class="bg-light py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 text-center">
        <h2 class="mb-4">Contact Us</h2>
        <form action="prod4.php" method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
          </div>
          <div class="mb-3">
            <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
          </div>
          <div class="mb-3">
            <textarea class="form-control" id="message" name="message" rows="4" placeholder="Your Message" required></textarea>
          </div>
          <div class="d-grid gap-2">
            <button type="submit" class="btn btn-warning">Send Message</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

</section>

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



<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
