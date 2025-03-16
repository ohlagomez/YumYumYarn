<?php
session_start();
include 'db.php';

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
    <title>Hot Chocolate for Two</title>
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
    <h1 class="display-4" style="padding-top: 10PX;"style="padding-top: 10PX">Hot Chocolate for Two</h1>
    <p class="lead">Experience the Taste of Italy</p>
</body>
</html>
<style>
  
</style>
  </script>
  <div class="tasty-recipes-quick-links">
    <a class="tasty-recipes-jump-link" href="#tasty-recipes-94185">Jump to Recipe</a>
    </div>
    <img src="images/hot-choco.jpg" alt="Delicious Pasta" class="img rounded" style="width: 850px; height: 500px;">
    
      </header>
  </div>
</div>




<!-- About Section -->
<section id="about" class="container my-5">
<div class="row">
    <div class="col-lg-6 d-flex flex-column align-items-center">
        <h2 class="mb-4">About Hot Chocolate for Two</h2>
        <p class="text-justify" >
        This got me thinking, why are we only making hot chocolate for a group, why not share my small batch hot chocolate recipe with you too?
        <br>

        <br>
        I’ve been making my stove top hot chocolate for some years now. I’m the kind of person that always goes on the hunt for something sweet right after dinner
         (and hubby is the same too.) So in the winter time, we always have dinner, hubby cleans up while I throw together a batch of my hot chocolate for two. 
         <br>
         <br>
        It takes less than 10 minutes from start to finish, and it’s our favorite hot chocolate</p> <br>

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
        <img src="images/Cooking-Hot-Chocolate-for-Two-.jpg"  class="img-fluid rounded" style="width: 850px; height: 400px;">
    </div>
</div>

<style>
  .wp-block-heading {
    font-weight: bold;
    font-style: italic;
    font-family: sans-serif;
  }
</style>

  <hr class="wp-block-separator has-alpha-channel-opacity">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h2 class="wp-block-heading">Ingredients For This Hot Chocolate for Two</h2>
        <p>There aren’t many! Yay!</p>
        <figure class="wp-block-image mx-auto d-block">
          <img src="images/Hot-Chocolate-for-Two-.jpg" decoding="async" width="500" height="500" >
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
      <div class="col-12" style="display: flex; flex-direction: column; align-items: center; font-weight: bold;">
        <ul class="centered-bullets">
          <li>Cocoa powder </li>
          <li>Milk or half and half</li>
          <li>Chocolate </li>
          <li>Sugar</li>
          <li>Salt</li>
          <li>Vanilla extract</li>
        </ul>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-12 text-center">

        <h3 class="wp-block-heading" id="h-what-type-of-bread-is-best-for-garlic-bread">Will chocolate chips work?</h3>
        <p> Yes, I’ve tested the recipe with both semi-sweet chocolate chips and chopped chocolate, both work equally well here. </p>

        <p><strong><em>What kind of chocolate do you need?</em></strong></p>
        <p>I like to use semi-sweet chocolate for my hot chocolate recipe. However, you can also use bittersweet or milk chocolate. Bittersweet chocolate will yield a less sweet hot 
          chocolate, but you can add more sugar to taste if you’d like. Milk chocolate will make this hot chocolate super sweet, so if that’s you’re thing, you will be fine! If you decide 
          to use milk chocolate I do advise that you taste it first before adding in any sugar; chances are you won’t need it.</p>
          <figure class="wp-block-image mx-auto d-block">
          <img src="images/Hot-Chocolate-for-Two-1.jpg" decoding="async" width="500" height="500">
        </figure>
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
    <h2 class="wp-block-heading" id="how-to-make">How To Make This Hot Chocolate for two</h2>
    <h3 class="wp-block-heading" id="h-step-1-soften-your-butter">Step 1: </h3>
    <p>Whisk the cocoa powder and water together in a saucepan.</p>
  </div>

  <!-- Step 2 -->
  <div class="container recipe-step">
    <h3 class="wp-block-heading" id="h-step-2-grate-that-garlic-right-in-there">Step 2: </h3>
    <p>Pour in the milk and let it heat up until it starts steaming</p>
    
  </div>

  <!-- Step 3 -->
  <div class="container recipe-step">
    <h3 class="wp-block-heading" id="h-step-3-add-parmesan-and-parsley">Step 3:</h3>
    <p>Add the chocolate and allow it to sit for 30 seconds before whisking</p>
   </div>

  <!-- Step 4 -->
  <div class="container recipe-step">
    <h3 class="wp-block-heading" id="h-step-4-spread-that-amazingness-on-your-bread">Step 4:</h3>
    <p>Taste and add sugar.</p>
  </div>

  <!-- Step 5 -->
  <div class="container recipe-step">
    <h3 class="wp-block-heading" id="h-step-5-bake-it">Step 5:</h3>
    <p>Heat to the desired temperature; turn off the heat add salt and vanilla.</p>
    </div>

  <!-- Step 6 -->
  <div class="container recipe-step">
    <h3 class="wp-block-heading" id="h-step-6-bake-it">Step 6:</h3>
    <p>Serve.</p>
    </div>

<div id="tasty-recipes-94185" class="tasty-recipes tasty-recipe-94185 tasty-recipes-display tasty-recipes-has-image" data-tasty-recipes-customization="primary-color.border-color"> </div>
    <header class="tasty-recipes-entry-header" style="background-color: #f8f8f8; padding: 20px; border: 2px solid #ffd700; border-radius: 10px;">
    <div class="tasty-recipes-image" style="text-align: center;">
        <img loading="lazy" decoding="async" width="183" height="183" src="images/hot-choco.jpg"style="border: 4px solid #ffd700; border-radius: 10px;">
</div>

    <h2 class="tasty-recipes-title" style="color: #333; text-transform: uppercase; margin-top: 15px; text-align:center">Hot Chocolate for Two</h2>
    <hr style="border: 1px solid #ffd700; background-color: #ffd700; margin: 15px 0;">
    <div class="tasty-recipes-details" style="color: #555; font-size: 14px; font-size:20px; ">
        <ul style="list-style-type: none; padding: 0; margin: 0;">
            <li class="author" style="margin-bottom: 10px; text-align:center ">
                <span style="color: #666;">Author:</span>
                <a style="color: #0066cc; text-decoration: none;" >Marko</a>
            </li>
            <li class="total-time" style="margin-bottom: 10px; text-align:center">
                <span style="color: #666;">
                    <svg viewBox="0 0 24 24" style="width: 18px; height: 18px; fill: #666; vertical-align: text-top; ">
                        <use xlink:href="#tasty-recipes-icon-clock"></use>
                    </svg>
                    Total Time:
                </span>
                <span style="color: #333; font-weight: bold;">7 minutes</span>
            </li>
            <li class="yield" style="margin-bottom: 10px; text-align:center">
                <span style="color: #666;">
                    <svg viewBox="0 0 24 24" style="width: 18px; height: 18px; fill: #666; vertical-align: text-top;">
                        <use xlink:href="#tasty-recipes-icon-cutlery"></use>
                    </svg>
                    Yield:
                </span>
                <span style="color: #333; font-weight: bold; ">
                    <span data-amount="5" data-amount-original-type="frac" data-amount-should-round="frac">2</span> servings  
                    <span style="font-size: 80%; color: #777;"></span>
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
            <label for="ingredient1">1 tablespoon <strong>cocoa powder</strong> + 3 tablespoons water</label>
        </span>
    </li>
    <li data-tr-ingredient-checkbox="checked">
        <span class="tr-ingredient-checkbox-container">
            <input type="checkbox" id="ingredient2">
            <label for="ingredient2"> 1 1/2 cups <strong>whole milk or half and half</strong></label>
        </span>
    </li>
    <li data-tr-ingredient-checkbox="checked">
        <span class="tr-ingredient-checkbox-container">
            <input type="checkbox" id="ingredient3">
            <label for="ingredient3"> 1/3 cup (2 1/2 ounces)<strong>semi sweet chocolate</strong>(chopped or chips)</label>
        </span>
    </li>
    <li data-tr-ingredient-checkbox="checked">
        <input type="checkbox" id="ingredient4">
        <label for="ingredient4">1-3 tablespoons<strong>sugar</strong> (more or less to taste)</label>
    </li>
    <li data-tr-ingredient-checkbox="checked">
        <input type="checkbox" id="ingredient5">
        <label for="ingredient5"> 1/8- 1/4 teaspoon<strong>sea salt</strong></label>
    </li>
    <li data-tr-ingredient-checkbox="checked">
        <input type="checkbox" id="ingredient6">
        <label for="ingredient6">2 tablespoons <strong>1/2 teaspoon vanilla extract</strong></label>
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
        <li id="instruction-step-1">SIMMER: combine the cocoa powder and water in a saucepan and whisk. Pour in the milk and heat it over medium-high heat until the milk starts to steam but doesn’t reach a boil.&nbsp;</li>
        <li id="instruction-step-2">FINISH: Lower the heat too low, and add the chocolate. Let sit for 30 seconds, then use a whisk to combine. Add 1 tablespoon of sugar, taste and adjust with additional sugar as desired. 
          Add 1/8 teaspoon salt, taste and adjust with additional salt as desired, we usually go with 1/4 teaspoon as we prefer a less sweet hot chocolate. Continue to heat on low if it needs to be hotter but make sure that it doesn’t boil! Turn off the heat, stir in the vanilla and pour hot chocolate into mugs. Top with whipped cream, marshmallows, or cocoa powder or chocolate syrup if desired!</li>
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
        <form action="prod5.php" method="post" enctype="multipart/form-data">
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
