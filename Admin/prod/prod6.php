<?php
session_start();
include '../../db.php';
// Check if the user has the correct role
if ($_SESSION['username'] !== 'admin') {
    // Redirect to a different page or show an error message
    header("Location: ../../login.php");
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
    <title>Smoked Steak</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-dFsfn7I2ZkBCvz3PkWJUpaytGvKhe5tKzuz6rtk/HOpZq1u8U/sL/F4ORLSzN1hD" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@latest/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="icon" href="../../images/logo.png" type="image/x-icon">
    <link href="../../styles.css" rel="stylesheet">
  </head>
<body>

<!-- Navbar --> 
<nav class="navbar navbar-expand-lg">
  <div class="container" id="top">
    <div class="row align-items-center">
      <div class="col-sm-4"> <!-- Adjusted the grid size -->
        <a class="navbar-brand" href="#">
        <img src="../../images/logo.png" alt="YYY" class="icon-image" style="width: 85%; height: auto;">


        </a>
      </div>
    </div>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav ml-auto">
      <?php
        // Check if the user is logged in
        if (isset($_SESSION['username'])) {
          $username = $_SESSION['username'];
      
          // Establish the database connection
          $conn = mysqli_connect('127.0.0.1', 'root', '', 'yyy');
      
          if (!$conn) {
              die("Connection Failed: " . mysqli_connect_error());
          }
      
          // Fetch user data from the database, including the profile picture filename
          $query = "SELECT profile FROM accounts WHERE username = '$username'";
          $result = mysqli_query($conn, $query);
      
          if ($result) {
              $userData = mysqli_fetch_assoc($result);
              $profilePictureFilename = $userData['profile'];
      
              if ($profilePictureFilename) {
                  // Assuming the profile pictures are stored in the "uploads" folder
                  $profilePicturePath = "../../" . $profilePictureFilename; // Added a trailing slash here
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
          } else {
              echo "Error in query: " . mysqli_error($conn);
          }
      
          // Close the connection after using it
          mysqli_close($conn);
      } else {
          // If the user is not logged in, show the regular logout link
      }
        ?>

      
        <li class="nav-item">
            <a href="../admin.php" class="nav-link">Home</a>
        </li>
        <li class="nav-item">
          <a href="../adminpost.php" class="nav-link">Post</a>
        </li>
        <li class="nav-item">
          <a href="../admincookbook.php" class="nav-link">Cookbook</a>
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
    <h1 class="display-4">Smoked Steak</h1>
    <p class="lead">Experience the Taste of Meaty Mexico Steak</p>
</body>
</html>
  </script>
  <div class="tasty-recipes-quick-links">
    <a class="tasty-recipes-jump-link" href="#tasty-recipes-94185">Jump to Recipe</a>
    </div>
    <img src="../../images/Smoke-Steak.jpg" class="img rounded" style="width: 850px; height: 500px;">
    
      </header>
  </div>
</div>




<!-- About Section -->
<section id="about" class="container my-5">
  <div class="row" style="height: 400px;">
    <div class="col-lg-6 d-flex flex-column align-items-center" style="height: 400px;">
      <h2 class="mb-4">About Smoked Steak</h2>
      <p class="text-justify">
      Smoke is an ingredient! You should be able to taste the beef and the smoke, and the basic seasoning is there to bring it all together and help the beef taste even better.
      <br>
        <br>
        Because you are using smoke as a distinct flavor, you can play around with the type of wood you use in this recipe to give your meat a unique and specific flavor. You can also try out different wood with different cuts of meat to find the combo that speaks to your soul.<br>

        <br>
        For those of you wanting a rather mild smoked flavor with the most vibrant color use cherry wood with your steak. This steak will taste great and look incredible.<br>

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
        <img src="../../images/Cooking-Steak.jpg" class="img-fluid rounded" style="height: 55%; width: 100%;">
      </div>
    </div>
  </div>
</section>


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
        <h2 class="wp-block-heading">Ingredients For This Smoked Steak</h2>
        <p>There aren’t many! Yay!</p>
        <figure class="wp-block-image mx-auto d-block">
          <img src="../../images/Ingrid-Steak.jpg" decoding="async" width="500" height="700" style="object-fit: contain;" >
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
          <li>Steak <em>(New York strip, tenderloin, and rib eye are all options)</em></li>
          <li>Kosher salt </li>
          <li>Pepper</li>
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

<div class="container font-sans">
    <div class="row">
      <div class="col-12 text-center">

        <h3 class="wp-block-heading" >Best Steak for Smoking</h3>
        <p> You can utilize this cooking method for pretty much any type of steak, but I highly recommend using a quality piece of beef that is at least 1 1/2 inches thick. My favorite cuts to smoke are rib eyes, strip steaks, and tenderloins. You can also use this method on a thick cut like a top sirloin (London broil) that is great sliced thin after cooking. 
           If you use a cut that is too thin (like a skirt, flank, thin cut sirloin, etc) the steak will cook through too quickly on the smoker without giving you that great slow smoked flavor.</p>
          
        <p>Following these instructions, you can smoke the most amazing rib eyes, tenderloins, and strip steaks of your life! Since this method is based on temperature and not time, you can smoke steaks
           as thick as you like! Just be sure to plan ahead so you’ve got plenty of time to let that slow smoke roll and infuse your meat with that tasty smoke flavor.</p>

        <figure class="wp-block-image mx-auto d-block">
          <img src="../../images/smoked steak.jpg" decoding="async" width="700" height="500">
        </figure>
          </div>
    </div>


  <hr class="wp-block-separator has-alpha-channel-opacity">

  <!-- Step 1 -->
  <div class="container recipe-step">
    <h2 class="wp-block-heading" id="how-to-make">How To Make This Smoked Steak</h2>
    <h3 class="wp-block-heading" >Step 1: FIRE UP THE SMOKER.</h3>
    <p>Pat the steaks dry with a paper towel then season on all sides with cracked black pepper and kosher salt (definitely go with kosher salt on this one, friends. It’ll have the best flavor).</p>
    </div>

  <!-- Step 2 -->
  <div class="container recipe-step">
    <h3 class="wp-block-heading" >Step 2: SEASON THE STEAKS.</h3>
    <p> Sprinkle both sides of the chicken with kosher salt, black pepper, and garlic powder. Add a drizzle of oil to a sauté pan (I like to use a cast iron casserole pan) and when it’s hot, cook the chicken, flipping halfway through until the chicken is done. Remove it to a cutting board or a plate and keep warm for later.</p>
  </div>

  <!-- Step 3 -->
  <div class="container recipe-step">
    <h3 class="wp-block-heading" >Step 3: GET SMOKY!</h3>
    <p>Place your steak on the grates of your smoker, close the lid, and smoke the meat until the steaks reach your desired internal temperature (115 degrees for rare, 125 for medium rare, 135 for medium, 145 for medium well and 155 for well). </p>
   </div>

  <!-- Step 4 -->
  <div class="container recipe-step">
    <h3 class="wp-block-heading" >Step 4: PREHEAT A CAST IRON SKILLET.</h3>
    <p>Remove the steaks from the grill and preheat a 12″ cast iron skillet over high heat (you can do this on a grill or in your kitchen). Once your skillet is preheated, lightly coat the bottom of the skillet with a high heat oil (avocado oil is a great option).</p>
  </div>

  <!-- Step 5 -->
  <div class="container recipe-step">
    <h3 class="wp-block-heading" >Step 5: SEAR THE STEAKS.</h3>
    <p>Place the steaks in the preheated skillet and sear them for approximately 2 minutes per side. Continue to cook the steaks until they reach the final desired doneness (125 degrees for rare, 135 degrees for medium rare, 145 degrees for medium, 155 degrees for medium well, and 165 degrees for well done).</p>
  </div>

  <!-- Step 6 -->
    <div class="container recipe-step">
    <h3 class="wp-block-heading" >Step 5: REST THEN SERVE.</h3>
    <p>Pull your steaks from the skillet and rest them for 10 minutes. Serve with an additional sprinkle of salt, if desired.</p>
  </div>

  <div class="container font-sans">
    <div class="row">
      <div class="col-12 text-center">

        <h3 class="wp-block-heading" >How Long to Smoke Steaks</h3>
        <p> It takes approximately 1 hour to smoke steaks. Cook time varies greatly when smoking steaks depending on the cut and thickness of the steak you are cooking, the consistency of the temperature of your smoker, and how done you prefer to cook your steak. Adjust cook time as needed to get your steak cooked the way you like it.</p>
          
        <p>I recommend using a meat thermometer (the ThermoWorks Mk4 or ThermoPop are both great options) and keep an eye on temperature as you go. Remove the steak when it hits your preferred doneness, and you won’t have to worry about your steak becoming overcooked.</p>

        <figure class="wp-block-image mx-auto d-block">
          <img src="../../images/How Long Steak.jpg" decoding="async" width="700" height="500">
        </figure>
          </div>
    </div>

<div id="tasty-recipes-94185" class="tasty-recipes tasty-recipe-94185 tasty-recipes-display tasty-recipes-has-image" data-tasty-recipes-customization="primary-color.border-color"> </div>
    <header class="tasty-recipes-entry-header" style="background-color: #f8f8f8; padding: 20px; border: 2px solid #ffd700; border-radius: 10px;">
    <div class="tasty-recipes-image" style="text-align: center;">
        <img loading="lazy" decoding="async" width="183" height="183" src="../../images/Smoked-Steak-.jpg"  style="border: 4px solid #ffd700; border-radius: 10px;">
</div>

    <h2 class="tasty-recipes-title" style="color: #333; text-transform: uppercase; margin-top: 15px; text-align:center">Smoked Steak</h2>
    <hr style="border: 1px solid #ffd700; background-color: #ffd700; margin: 15px 0;">
    <div class="tasty-recipes-details" style="color: #555; font-size: 14px; font-size:20px; ">
        <ul style="list-style-type: none; padding: 0; margin: 0;">
            <li class="author" style="margin-bottom: 10px; text-align:center ">
                <span style="color: #666;">Author:</span>
                <a style="color: #0066cc; text-decoration: none;" >Susie Bulloch </a>
            </li>
            <li class="total-time" style="margin-bottom: 10px; text-align:center">
                <span style="color: #666;">
                    <svg viewBox="0 0 24 24" style="width: 18px; height: 18px; fill: #666; vertical-align: text-top; ">
                        <use xlink:href="#tasty-recipes-icon-clock"></use>
                    </svg>
                    Total Time:
                </span>
                <span style="color: #333; font-weight: bold;">1 hr 25 mins</span>
            </li>
            <li class="yield" style="margin-bottom: 10px; text-align:center">
                <span style="color: #666;">
                    <svg viewBox="0 0 24 24" style="width: 18px; height: 18px; fill: #666; vertical-align: text-top;">
                        <use xlink:href="#tasty-recipes-icon-cutlery"></use>
                    </svg>
                    Yield:
                </span>
                <span style="color: #333; font-weight: bold; ">
                    <span data-amount="5" data-amount-original-type="frac" data-amount-should-round="frac">4</span> servings <span data-amount="2"></span>  
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
                <input type="checkbox" >
                <label for="ingredient1" >4 1 1/2 inch <strong> steaks  </strong> ((New York strip, tenderloin, and rib eye are all great options))</label>
            </span>
        </li>
        <li data-tr-ingredient-checkbox="checked">
            <span class="tr-ingredient-checkbox-container">
                <input type="checkbox" >
                <label for="ingredient2" >1 teaspoon<strong> kosher salt </strong></label>
            </span>
        </li>
        <li data-tr-ingredient-checkbox="checked">
            <span class="tr-ingredient-checkbox-container">
                <input type="checkbox">
                <label for="ingredient3">½ teaspoon<strong>  pepper AND garlic powder </strong></label>
            </span>
        </li>
        
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
          <li id="instruction-step-1">Preheat smoker to 225 degrees F with your wood of choice.&nbsp;</li>
          <li id="instruction-step-2">Use a paper towel to pat you steaks dry on all sides. Season on all sides with kosher salt and cracked black pepper.</li>
          <li id="instruction-step-3">Place your steaks on the smoker, close the lid, and smoke until the internal temperature of your steak reaches 115 degrees F (for rare steak), 125 (medium rare), 135 (medium), 145 (medium well), or 155 degrees F (well done).</li>
          <li id="instruction-step-4">Remove the steaks from the grill and set them aside while you preheat a 12" cast iron skillet over high heat.</li>
          <li id="instruction-step-5">Lightly coat the bottom of your skillet with a high heat oil (like avocado oil). Place the steaks in the pan and sear for approximately 2 minutes per side. Cook until the internal temperature of your steak reaches your desired doneness: 125 degrees F (rare), 135 (medium rare), 145 (medium), 155 degrees (medium well), or 165 degrees F (well done). </li>
          <li id="instruction-step-6">Remove your steaks from the skillet and allow the steak to rest for 10 minutes. Serve with an additional sprinkle of salt, if desired.</li>
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
        <form action="../../prod6.php" method="post" enctype="multipart/form-data">
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
      <img src="../../images/logo.png" alt="YYY" class="icon-image" style="width: 15%; height: auto;">
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
