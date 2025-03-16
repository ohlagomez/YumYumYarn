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
    <title>Toasty Golden Brown Garlic Bread</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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

<!-- Hero Section -->
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
    padding-bottom: 5px;
    }

    .tasty-recipes-quick-links a.tasty-recipes-jump-link {
        --tw-text-opacity: 1;
        color: rgb(112 64 98/var(--tw-text-opacity));
        display: block;
        text-transform: uppercase;
    }

    .tasty-recipes-quick-links {
        text-align: center;
    }
    </style>

    <div class="container text-center align-items-center">
        <h1 class="display-4" style="padding-top: 10PX";>Toasty Cheesy Garlic Bread</h1>
        <p class="lead" style="margin-bottom:0px">Experience the Taste of United States</p>
    </body>
    </html>

      </script>
  <div class="tasty-recipes-quick-links">
    <a class="tasty-recipes-jump-link" href="#tasty-recipes-94185">Jump to Recipe</a>
    </div>
    <img src="images/garlic bread.jpg" class="img rounded" style="width: 850px; height: 500px;">
    
      </header>
  </div>
</div>




<!-- About Section -->
<section id="about" class="container my-5">
<div class="row">
    <div class="col-lg-6 d-flex flex-column align-items-center">
        <h2 class="mb-4">About Garlic Bread</h2>
        <p class="text-justify" >
        I would like to feed you extremely large bites of this cheesy garlic bread. It’s simple. Cheesy. Garlicky. Carby… deliciousness.<br>

        <br>
There’s a certain joy that comes from simplicity. The way a good cup of coffee can change your mood. 
The minute of silence you get when you’ve had a head spinning, crazy day. The sweet bliss that comes from a new pair of fuzzy socks.
 (Okay, maybe that’s just me). You know, the kind of unadulterated happiness you
  feel when you find a twenty while you’re doing your laundry. That kind. <br>

  <br>

This garlic bread is just that simple.<br>
<br>
Let’s talk good kitchen magic. Now, If I could only get that ‘magic’ to do the dishes.<br>
<br>
Let’s make quick cheesy garlic bread!.</p> <br>

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
        <img src="images/Cooking-Garlic-Bread.jpg" alt="Chef preparing pasta" class="img-fluid rounded">
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
        <h2 class="wp-block-heading">Ingredients For This Amaze Garlic Bread</h2>
        <p>There aren’t many! Yay!</p>
        <figure class="wp-block-image mx-auto d-block">
          <img src="images/prod/step1.jpg" decoding="async" width="500" height="500" >
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
          <li>French bread <em> (more on that in a second)</em></li>
          <li>Butter</li>
          <li>Garlic <em>(I use both fresh garlic and a pinch of garlic powder)</em></li>
          <li>Parmesan cheese</li>
          <li>Parsley</li>
        </ul>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-12 text-center">

        <p>Which leads us to the most important decision one can make about garlic bread, I think.</p>
        <h3 class="wp-block-heading" id="h-what-type-of-bread-is-best-for-garlic-bread">What Type of Bread is Best for Garlic Bread?</h3>
        <p> This is something that I’ve spent a stupid amount of time thinking about, and all of it comes down to this: </p>

        <p><strong><em>What do you really want from your garlic bread? </em></strong></p>
        <p>We need to anchor its identity. Do you want it to sop up sauces? Do you want it to give you a hearty, 
          crusty chunk that you can sink your teeth into? Do you just want it to be a vehicle for that Parmesan-laced
           garlic butter flavor? Is it standing on its own or coming alongside something else? </p>

        <p>The two main breads that are easiest to think about for garlic bread, I think, are these two, which are
          labeled in the store as “French bread” and “baguette”.</p>
          <figure class="wp-block-image mx-auto d-block">
          <img src="images/prod/step2.jpg" decoding="async" width="500" height="500">
        </figure>
          </div>
    </div>

    <div class="container">
    <div class="row">
      <div class="col-12 text-center">
    <p>I have made multiple rounds of this garlic bread on both types of bread, and they’re both delicious. </p>
      
      <p>But ultimately I’ve found that I prefer <strong>French bread</strong> because it has a more even crumb with fewer holes, giving you a flatter surface area to 
      spread the butter mixture and therefore a more even golden brown topping to your garlic bread. </p>
    
      <p>French bread is on the lighter and fluffier side, which, to be honest, gave me pause. I generally like a really hearty bread that has some density, crunch, and chew to it. But after many many batches of this, I’ve actually really enjoyed the lightness of the French bread because it can kind of be both – it gets crunchy and chewy with the golden browning of the Parmesan on top, 
        but it’s light enough to sop up whatever sauces and soups you’re eating it with. </p>
    
        <p>I’ve also seen garlic bread made with <a href="https://www.youtube.com/watch?v=hUeW3Wlhy18">challah</a>, and <a href="https://www.theepicureanmouse.com/easy-sourdough-garlic-bread/">sourdough</a>, and <a href="https://www.marcellinaincucina.com/jamie-olivers-tear-n-share-garlic-bread-2/">ciabatta</a>, and being that it’s garlic bread – I kind of don’t think you can go wrong. But if you’re asking me 
        (and you are on my website!) in the year of our Lord 2023, I’m going with French bread.</p>
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
    <h2 class="wp-block-heading" id="how-to-make">How To Make This Garlic Bread</h2>
    <h3 class="wp-block-heading" >Step 1: Soften your butter.</h3>
    <p>I do this in the microwave, in short increments, and then whisk it to get it smooth-ish. Cutting it into uniform chunks (like the photo above) will help it soften at an even rate.</p>
  </div>

  <!-- Step 2 -->
  <div class="container recipe-step">
    <h3 class="wp-block-heading" >Step 2: Grate that garlic right in there.</h3>
    <p>My hot take: anything more than one clove is overpowering and generally unpleasant. Stop at one!</p>
    <p>It doesn’t seem like it will be enough, but trust me. Even for me – a self-proclaimed garlic lover – one clove is plenty.</p>
  </div>

  <!-- Step 3 -->
  <div class="container recipe-step">
    <h3 class="wp-block-heading" >Step 3: Add Parmesan and parsley.</h3>
    <p>Finely grated Parmesan cheese is where it’s at! That savory flavor and golden browning – YUM.</p>
    <p>I also like to add a little bit of garlic powder at this point just to slightly extend my garlick-ing of things (but with more subtlety than fresh garlic).</p>
  </div>

  <!-- Step 4 -->
  <div class="container recipe-step">
    <h3 class="wp-block-heading" >Step 4: Spread that amazingness on your bread.</h3>
    <p>I find this amount of butter mixture is good for half of a long loaf of French bread.</p>
  </div>

  <!-- Step 5 -->
  <div class="container recipe-step">
    <h3 class="wp-block-heading" >Step 5: Bake it!</h3>
    <p>If you don’t want any browning, first of all, why? It’s delightful. Second of all, you’ll just want to go for more like 375 to 400 degrees for 7-10 minutes.</p>
    <p>If you like it a little golden brown, like I do, with a bit of texture on top, shoot for 10 minutes at 400 to 425 degrees. Just keep an eye on it and nudge it up as needed.</p>
  </div>


<div id="tasty-recipes-94185" class="tasty-recipes tasty-recipe-94185 tasty-recipes-display tasty-recipes-has-image" data-tasty-recipes-customization="primary-color.border-color"> </div>
    <header class="tasty-recipes-entry-header" style="background-color: #f8f8f8; padding: 20px; border: 2px solid #ffd700; border-radius: 10px;">
    <div class="tasty-recipes-image" style="text-align: center;">
        <img loading="lazy" decoding="async" width="183" height="183" src="images/Garlic-Bread.jpg" class="attachment-thumbnail size-thumbnail" alt="Garlic bread slices on a cutting board." style="border: 4px solid #ffd700; border-radius: 10px;">
</div>

    <h2 class="tasty-recipes-title" style="color: #333; text-transform: uppercase; margin-top: 15px; text-align:center">House Favorite Garlic Bread</h2>
    <hr style="border: 1px solid #ffd700; background-color: #ffd700; margin: 15px 0;">
    <div class="tasty-recipes-details" style="color: #555; font-size: 14px; font-size:20px; ">
        <ul style="list-style-type: none; padding: 0; margin: 0;">
            <li class="author" style="margin-bottom: 10px; text-align:center ">
                <span style="color: #666;">Author:</span>
                <a style="color: #0066cc; text-decoration: none;">Lindsay</a>
            </li>
            <li class="total-time" style="margin-bottom: 10px; text-align:center">
                <span style="color: #666;">
                    <svg viewBox="0 0 24 24" style="width: 18px; height: 18px; fill: #666; vertical-align: text-top; ">
                        <use xlink:href="#tasty-recipes-icon-clock"></use>
                    </svg>
                    Total Time:
                </span>
                <span style="color: #333; font-weight: bold;">15 minutes</span>
            </li>
            <li class="yield" style="margin-bottom: 10px; text-align:center">
                <span style="color: #666;">
                    <svg viewBox="0 0 24 24" style="width: 18px; height: 18px; fill: #666; vertical-align: text-top;">
                        <use xlink:href="#tasty-recipes-icon-cutlery"></use>
                    </svg>
                    Yield:
                </span>
                <span style="color: #333; font-weight: bold; ">
                    <span data-amount="5" data-amount-original-type="frac" data-amount-should-round="frac">5</span> servings (about <span data-amount="2">2</span> pieces per person) 
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
            <label for="ingredient1" >half a loaf of <strong>French bread</strong></label>
            </span>
    </li>
    <li data-tr-ingredient-checkbox="checked">
        <span class="tr-ingredient-checkbox-container">
            <input type="checkbox" id="ingredient1">
            <label for="ingredient2">1 stick (1/2 cup) <strong>salted butter</strong>, cut into chunks</label>
           </li>
    <li data-tr-ingredient-checkbox="checked">
        <span class="tr-ingredient-checkbox-container">
            <input type="checkbox" id="ingredient1">
            <label for="ingredient3" >1 large clove <strong>garlic</strong></label>
            </li>
    <li data-tr-ingredient-checkbox="checked">
        <input type="checkbox" id="ingredient4">
        <label for="ingredient4" >1/4 teaspoon <strong>garlic powder</strong></label>
        </li>
    <li data-tr-ingredient-checkbox="checked">
        <input type="checkbox" id="ingredient5">
        <label for="ingredient5"  >1/2 <span >cup</span> finely grated <strong>Parmesan cheese</strong></label>
       </li>
    <li data-tr-ingredient-checkbox="checked">
        <input type="checkbox" id="ingredient6">
        <label for="ingredient6" >2 tablespoons <strong>minced fresh parsley</strong></label>
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
        <li id="instruction-step-1">Preheat the oven to 400 degrees.&nbsp;</li>
        <li id="instruction-step-2">Soften the butter in the microwave in short increments. I like to whisk it to get it smoothed out a bit.</li>
        <li id="instruction-step-3">Grate the garlic directly into the butter. Add the garlic powder, Parmesan, and parsley; stir to combine.</li>
        <li id="instruction-step-4">Cut the French bread in half and spread with the butter mixture (this amount of butter is good for half of one large French bread loaf – see photos above).</li>
        <li id="instruction-step-5">Bake for 9-10 minutes in the middle of the oven, adding an extra 1-2 minutes or bumping to 425 at the end for more browning.</li>
        <li id="instruction-step-6">Remove from the oven, cut into slices, and serve. Life is good.</li>
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
        <form action="prod.php" method="post" enctype="multipart/form-data">
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
