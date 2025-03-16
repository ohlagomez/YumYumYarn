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
    <title>Chocolate Chip Cookies</title>
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
    <h1 class="display-4">Chocolate Chip Cookies</h1>
    <p class="lead">Experience the Taste of Italy</p>
</body>
</html>

  </script>
  <div class="tasty-recipes-quick-links">
    <a class="tasty-recipes-jump-link" href="#tasty-recipes-94185">Jump to Recipe</a>
    </div>
    <img src="images/Chocolate-Chip-Cookies-Recipe.jpg" alt="Delicious Pasta" class="img rounded" style="width: 850px; height: 500px;">
    
      </header>
  </div>
</div>




<!-- About Section -->
<section id="about" class="container my-5">
<div class="row">
    <div class="col-lg-6 d-flex flex-column align-items-center">
        <h2 class="mb-4">About Chocolate Chip Cookies </h2>
        <p class="text-justify" >
        These chewy Chocolate Chip Cookies are the perfect cookie with a soft and moist center, melty mo
        rsels of chocolate, and crisp edges. It’s the only chocolate chip cookie recipe you’ll ever need because it’s classic—not fussy, complicated, or time-consuming.
        <br> 
        <br>
         Homemade chocolate chip cookies with chewy and soft texture, gooey chocolate chips, and the sweetest aroma coming from your oven. 
        As America’s most loved cookie, they are perfect for every occasion, whether you’re making Christmas cookies, comforting a neighbor, or surprising your kiddos with a sweet after-school treat.<br>
      <br>
      Just like with Chocolate Crinkle Cookies or Christmas Sugar Cookies, everyone needs a go-to chocolate chip cookie recipe, so here’s why this one is a keeper. </p><br>
  

      <style>
       .list-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff9e6; /* Lighter yellow background color */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }

        .list-container:hover {
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        .is-style-checks {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .is-style-checks li {
            position: relative;
            padding-left: 26px;
            margin-bottom: 8px;
            line-height: 1.4;
        }

        .is-style-checks li::before {
            content: '\2713';
            position: absolute;
            left: 0;
            color: #2196f3;
            font-size: 18px;
        } </style>
</head>
<body>

<div class="list-container">
    <ul class="is-style-checks">
        <li>The cookies stay soft for days</li>
        <li>Easy, straightforward recipe with tips to make it foolproof!</li>
        <li>No resting/refrigerating time—so you can satisfy your craving immediately</li>
        <li>Pantry staple ingredients</li>
        <li>True to the classic flavor everyone loves</li>
        <li>Stores and freezes well</li>
        <li>Make ahead option to always have dough on hand</li>
    </ul>
</div>
      

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
        <img src="images/cook1.jpg" alt="Chef preparing pasta" class="img-fluid rounded">
    </div>
</div>

  <hr class="wp-block-separator has-alpha-channel-opacity">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h2 class="wp-block-heading">Ingredients For This Creamy Pesto <br> Pasta with Chicken</h2>
        <p>There aren’t many! Yay!</p>
        <figure class="wp-block-image mx-auto d-block">
          <img src="images/Chocolate-Chip-Cookies-ingrid.jpg" decoding="async" width="500" height="600" style="object-fit: contain;">
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
    <div class="col-11" style="display: flex; flex-direction: column; align-items: center; font-weight: bold;   ">
      <ul class="centered-bullets">
        <li>Chocolate chips</li>
        <li>Sugar <em>(Granulated and brown sugar)</em></li>
        <li>Unsalted butter</li>
        <li>Eggs</li>
        <li>All-purpose flour</li>
        <li>Vanilla extract</li>
        <li>Baking soda</li>
        <li>Salt</li>
      </ul>
    </div>
  </div>
</div>

  <div class="main-section">
    <div class="contentbox contentbox-red contentbox-background notop nobot" style="text-align: center;">
        <h2 class="wp-block-natasha-heading-with-icon heading-icon heading-icon-plain">
            <span style="display: block; font-size: 28px; font-style: italic;">How to Buy Chocolate Chips </span>
        </h2>
        <p style="text-align: left; font-style: italic; font-size: 22px;">Chocolate chips come in different varieties. Here’s what to look for:</p>
        <ul style="text-align: left; font-size: 20px;">
            <li><strong>Semi-sweet chocolate chips</strong> (46%-60% cocoa): the traditional chip for chocolate chip cookies. You can use full-size or mini chips, chunks, or even chopped chocolate. Nestle, Tollhouse, Ghirardelli, Guittard, Kirkland, Hershey’s….they all work!</li>
            <li><strong>Milk chocolate chips</strong> (10% cocoa): these make very sweet cookies, so have your glass of milk ready. Try mixing with semi-sweet.</li>
            <li><strong>Bittersweet chocolate chips</strong> (70% cocoa): less sweet and intensely chocolatey. These produce a more “adult” cookie.</li>
        </ul>
        <figure class="wp-block-image mx-auto d-block">
            <img src="images/Chocolate-Chip-Cookies-7.jpg" decoding="async" width="500" height="700" class="mx-auto">
        </figure>
    </div>
</div>

<style>
    .main-section {
        background-color: #f8f8f8; /* Set background color for the main section */
        padding: 20px; /* Adjust padding as needed */
        border-radius: 10px; /* Add rounded corners */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
        margin-bottom: 20px; /* Add space at the bottom */
    }

    .contentbox h2 {
        color: #333; /* Change text color for the heading */
        background-color: #f0e4d7; /* Change background color for the heading */
        padding: 10px; /* Add padding to the heading */
        border-radius: 5px; /* Add rounded corners to the heading */
    }

    .contentbox p {
        color: #555; /* Change text color */
    }

    .contentbox ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .contentbox li {
        margin-bottom: 10px;
    }
</style>

          <!-------------------------------------------------------------------------------------------------------- -->
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
 
 <style>
  .recipe-step {
    text-align: justify;
  }
</style>
  <!-- Step 1 -->
  <div class="container recipe-step">
    <h2 class="wp-block-heading" id="how-to-make">How To Make This Chocolate Chip Cookies</h2>
    <h3 class="wp-block-heading" id="h-step-1-soften-your-butter">Step 1: Preheat Oven.</h3>
    <p>Preheat Oven to 350 degrees and cover 3 cookie sheets with parchment paper or Silpat mats. Cream the butter and sugars together for 5 minutes until light and fluffy—this is the most important step to get a chewy cookie. Be sure to beat for the full amount of time!
    </div>

  <!-- Step 2 -->
  <div class="container recipe-step">
    <h3 class="wp-block-heading" id="h-step-2-grate-that-garlic-right-in-there">Step 2: Beat eggs.</h3>
    <p> Beat eggs into the butter mixture one at a time followed by the vanilla extract.
    </div>

  <!-- Step 3 -->
  <div class="container recipe-step">
    <h3 class="wp-block-heading" id="h-step-3-add-parmesan-and-parsley">Step 3: Combine.</h3>
    <p>Combine the dry ingredients (flour, salt, and sifted baking soda) in a separate bowl, and then add the dry ingredients into the wet ingredients in thirds. Finally, fold the chocolate chips into the dough. Be sure not to over-mix (this can cause the dough to become tough).
    </div>

  <!-- Step 4 -->
  <div class="container recipe-step">
    <h3 class="wp-block-heading" id="h-step-4-spread-that-amazingness-on-your-bread">Step 4: Roll.</h3>
    <p>Roll balls of dough or use a trigger release scoop to scoop 3 Tbsp balls onto the prepared cookie sheets.
    </div>

   <!-- Step 5 -->
  <div class="container recipe-step">
    <h3 class="wp-block-heading" id="h-step-4-spread-that-amazingness-on-your-bread">Step 5: Bake.</h3>
    <p>Bake one cookie sheet at a time for 12-15 minutes. The tops should still look a bit wet and not browned. We usually bake 1/3 of the cookies at a time and refrigerate or freeze the rest for later, so see our tips below.
    </div>

  <!-- Step 6 -->
  <div class="container recipe-step">
    <h3 class="wp-block-heading" id="h-step-4-spread-that-amazingness-on-your-bread">Step 6: Rest.</h3>
    <p>Rest the cookies on the baking sheet for about 5 minutes, then transfer to a cooling rack. Store cookies in an airtight container on the counter for 5 days. To warm the cookies, try toasting in a toaster oven or baking at 350 for 2-3 minutes.
    </div> 


<div id="tasty-recipes-94185" class="tasty-recipes tasty-recipe-94185 tasty-recipes-display tasty-recipes-has-image" data-tasty-recipes-customization="primary-color.border-color"> </div>
    <header class="tasty-recipes-entry-header" style="background-color: #f8f8f8; padding: 20px; border: 2px solid #ffd700; border-radius: 10px;">
    <div class="tasty-recipes-image" style="text-align: center;">
        <img loading="lazy" decoding="async" width="183" height="183" src="images/Favorite-Browned-Butter-Chocolate-Chip-Cookies.jpg" class="attachment-thumbnail size-thumbnail" alt="Garlic bread slices on a cutting board." style="border: 4px solid #ffd700; border-radius: 10px;">
</div>

    <h2 class="tasty-recipes-title" style="color: #333; text-transform: uppercase; margin-top: 15px; text-align:center">House Favorite Garlic Bread</h2>
    <hr style="border: 1px solid #ffd700; background-color: #ffd700; margin: 15px 0;">
    <div class="tasty-recipes-details" style="color: #555; font-size: 14px; font-size:20px; ">
        <ul style="list-style-type: none; padding: 0; margin: 0;">
            <li class="author" style="margin-bottom: 10px; text-align:center ">
                <span style="color: #666;">Author:</span>
                <a style="color: #0066cc; text-decoration: none;" >Marzia</a>
            </li>
            <li class="total-time" style="margin-bottom: 10px; text-align:center">
                <span style="color: #666;">
                    <svg viewBox="0 0 24 24" style="width: 18px; height: 18px; fill: #666; vertical-align: text-top; ">
                        <use xlink:href="#tasty-recipes-icon-clock"></use>
                    </svg>
                    Total Time:
                </span>
                <span style="color: #333; font-weight: bold;">22 minutes</span>
            </li>
            <li class="yield" style="margin-bottom: 10px; text-align:center">
                <span style="color: #666;">
                    <svg viewBox="0 0 24 24" style="width: 18px; height: 18px; fill: #666; vertical-align: text-top;">
                        <use xlink:href="#tasty-recipes-icon-cutlery"></use>
                    </svg>
                    Yield:
                </span>
                <span style="color: #333; font-weight: bold; ">
                    <span data-amount="5" data-amount-original-type="frac" data-amount-should-round="frac">26</span>  chocolate chip cookies <span data-amount="2"></span>  
                    <span style="font-size: 80%; color: #777;">&times; 1</span>
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

        <div data-tasty-recipes-customization="body-color.color" style="text-align: left; font-size:20px;">
        <ul style="list-style: none; padding: 0; margin: 0;">
        <li data-tr-ingredient-checkbox="checked">
            <span class="tr-ingredient-checkbox-container">
                <input type="checkbox" id="ingredient3">
                <label for="ingredient3" data-amount="1">1 cup <strong> unsalted butter </strong></label>
            </span>
        </li>
        <li data-tr-ingredient-checkbox="checked">
            <span class="tr-ingredient-checkbox-container">
                <input type="checkbox" id="ingredient4">
                <label for="ingredient4" data-amount="1/2"> 1/2 cup  <strong> granulated sugar </strong></label>
            </span>
        </li>
        <li data-tr-ingredient-checkbox="checked">
            <span class="tr-ingredient-checkbox-container">
                <input type="checkbox" id="ingredient5">
                <label for="ingredient5" data-amount="1">1 cup<strong>  light brown sugar</strong> tightly packed</label>
            </span>
        </li>
        <li data-tr-ingredient-checkbox="checked">
            <span class="tr-ingredient-checkbox-container">
                <input type="checkbox" id="ingredient6">
                <label for="ingredient6" data-amount="2" >2 <strong> large eggs </strong> , room temperature</label>
            </span>
        </li>
        <li data-tr-ingredient-checkbox="checked">
            <span class="tr-ingredient-checkbox-container">
                <input type="checkbox" id="ingredient7">
                <label for="ingredient7" data-amount="2" >2 teaspoons<strong>  vanilla extract </strong></label>
            </span>
        </li>
        <li data-tr-ingredient-checkbox="checked">
            <span class="tr-ingredient-checkbox-container">
                <input type="checkbox" id="ingredient8">
                <label for="ingredient8" data-amount="3">3 cups <strong> all-purpose flour </strong></label>
            </span>
        </li>
        <li data-tr-ingredient-checkbox="checked">
            <span class="tr-ingredient-checkbox-container">
                <input type="checkbox" id="ingredient9">
                <label for="ingredient9" data-amount="1" >1 teaspoon<strong> baking soda </strong></label>
            </span>
        </li>
        <li data-tr-ingredient-checkbox="checked">
            <span class="tr-ingredient-checkbox-container">
                <input type="checkbox" id="ingredient10">
                <label for="ingredient10" data-amount="1" > 1 teaspoon<strong> salt </strong></label>
            </span>
        </li>
        <li data-tr-ingredient-checkbox="checked">
            <span class="tr-ingredient-checkbox-container">
                <input type="checkbox" id="ingredient11">
                <label for="ingredient11" data-amount="2"> 2 cups <strong> semi-sweet chocolate chips </strong></label>
            </span>
        </li>
    </ul>
</div>
</div>
</div>

    <hr class="wp-block-separator has-alpha-channel-opacity">   
    <div class="tasty-recipes-instructions-header" style="text-align:center; font-size:20px;" >
    <h3 data-tasty-recipes-customization="h3-color.color h3-transform.text-transform">Instructions</h3>
    </div>
        <div data-tasty-recipes-customization="body-color.color" style="text-align:justify; font-size:20px; ">
        <ol>
        <li id="instruction-step-1">Preheat oven to 350˚ F. Line a baking sheet with parchment or Silpat liner. In the bowl of a stand mixer with paddle attachment, combine 2 sticks of butter, 1 cup of packed brown sugar and 1/2 cup of white sugar. Beat 5 minutes on medium/high speed until creamy and light, scraping down the bowl as needed. </style> <br></li>
        <li id="instruction-step-2">Add 2 eggs, one at a time, beating well with each addition, scraping down the bowl as needed, then beat in 2 tsp of vanilla.</li>
        <li id="instruction-step-3">In a separate bowl, combine 3 cups of flour, 1 tsp salt, and 1 tsp of baking soda (sifted to eliminate lumps). Add the flour mixture to the creamed butter in thirds, mixing to incorporate with each addition. Fold in 2 cups of chocolate chips.</li>
        <li id="instruction-step-4">Use an ice cream scoop to get even balls of dough (3 Tbsp each). Place scoops of dough onto lined baking sheet about 2 inches apart. Mine fit onto 3 cookie sheets and made 26 cookies. Roll balls lightly with your hands then stud tops of cookie balls with reserved chocolate chips. Bake right away or cover and refrigerate until ready to bake.</li>
        <li id="instruction-step-5">Bake one cookie sheet at a time for 12-15 min at 350˚F (we bake 12 minutes), until edges are just turning golden. The tops should still look under-baked. Allow cookies to cool on the baking sheet 5 min then transfer to a rack to cool.</li>
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
        <form action="prod3.php" method="post" enctype="multipart/form-data">
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
