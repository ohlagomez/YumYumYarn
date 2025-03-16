<?php
session_start();
require '../../db.php';
if (!isset($_SESSION['username'])) {
    header("Location: ../../login.php");
    exit();
  }
  
  // Check if the user has the correct role
  if ($_SESSION['username'] === 'admin') {
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
    <title>Creamy Pesto Pasta with Chicken</title>
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
          <a href="../user.php" class="nav-link">Home</a>
        </li>
        <li class="nav-item">
          <a href="../post.php" class="nav-link">Post</a>
        </li>
        <li class="nav-item">
          <a href="../usercookbook.php" class="nav-link">Cookbook</a>
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
    <h1 class="display-4">Creamy Pesto Pasta with Chicken</h1>
    <p class="lead">Experience the Taste of Italy</p>
</body>
</html>
  </script>
  <div class="tasty-recipes-quick-links">
    <a class="tasty-recipes-jump-link" href="#tasty-recipes-94185">Jump to Recipe</a>
    </div>
    <img src="../../images/Creamy-Pesto-Pasta-with-Chicken.jpg" alt="Delicious Pasta" class="img rounded" style="width: 850px; height: 500px;">
    
      </header>
  </div>
</div>




<!-- About Section -->
<section id="about" class="container my-5">
<div class="row">
    <div class="col-lg-6 d-flex flex-column align-items-center">
        <h2 class="mb-4">About Creamy Pesto Pasta with Chicken</h2>
        <p class="text-justify" >
        I wanted to create something that started with searing the chicken in a skillet. Then building the flavors one ingredient at a time. We’ll use chicken stock to deglaze the pan so that all of that flavor goes right into the creamy pesto sauce. I’m happy to report that not only is
         this recipe simple enough for anyone to make, it’s delicious and perfect for date night too!
        <br>
        <br>
        Most of the ingredients in this recipe are pantry staples. If you’re someone who like basil pesto, I have a killer recipe for a homemade version 
        but you can also use store-bought pesto if you’d like. My tip for using store-bought pesto is to check 
        the refrigerated prepared food section of your grocery store to see if they sell a fresh refrigerated
         version instead of the one in the tomato sauce or pasta aisle. That tends to make this whole thing taste so much better!<br>

  <br>


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
        <h2 class="wp-block-heading">Ingredients For This Creamy Pesto <br> Pasta with Chicken</h2>
        <p>There aren’t many! Yay!</p>
        <figure class="wp-block-image mx-auto d-block">
          <img src="../../images/Creamy-Pesto-Pasta-with-Chicken(1).jpg" decoding="async" width="500" height="700" style="object-fit: contain;" >
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
          <li>Chicken</li>
          <li>Seasoning <em>(kosher salt, black pepper, and garlic powder)</em> </li>
          <li>Pasta</li>
          <li>Butter</li>
          <li>Garlic</li>
          <li>Flour</li>
          <li>Chicken Stock</li>
          <li>Half and Half</li>
          <li>Basil Pesto</li>
          <li>Broccoli florets </li>
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
    <h2 class="wp-block-heading" id="how-to-make">How To Make This Creamy Pesto Pasta with Chicken</h2>
    <h3 class="wp-block-heading" id="h-step-1-soften-your-butter">Step 1: Prepare the pasta.</h3>
    <p>Get a large pot of water going and make sure to salt the water generously when it boils. Allow the pasta to cook for a minute or two less than the package directions so that you can finish cooking the pasta in the sauce at the end. You’ll want to save a splash of pasta water before you drain the penne. Pasta cooking water is perfect for creating a silky, glossy sauce!
    </div>

  <!-- Step 2 -->
  <div class="container recipe-step">
    <h3 class="wp-block-heading" id="h-step-2-grate-that-garlic-right-in-there">Step 2: Season and sear the chicken.</h3>
    <p> Sprinkle both sides of the chicken with kosher salt, black pepper, and garlic powder. Add a drizzle of oil to a sauté pan (I like to use a cast iron casserole pan) and when it’s hot, cook the chicken, flipping halfway through until the chicken is done. Remove it to a cutting board or a plate and keep warm for later.</p>
  </div>

  <!-- Step 3 -->
  <div class="container recipe-step">
    <h3 class="wp-block-heading" id="h-step-3-add-parmesan-and-parsley">Step 3: Make the sauce in the same pan.</h3>
    <p>Add the butter to the sauce pan and saute the garlic and red pepper flakes. When the garlic is fragrant, add the flour and stir to combine. You want to make sure to let the flour cook in the butter for at least a minute so you cook out the raw flavor. Then, slowly pour in the chicken broth as you whisk to scrape up all that stuck on flavor. Allow the chicken stock to heat through.
       The flour will cause the sauce to thicken. Then, pour in the half and half and pesto and stir to combine. Add parmesan cheese, let the sauce simmer, when the sauce starts to thicken, add the prepared pasta and broccoli to the sauce. You can also chop the chicken and add it right in or just slice and lay the chicken on top. It the pesto sauce gets too thick at any point, you can thin it out with a splash of pasta water. </p>
   </div>

  <!-- Step 4 -->
  <div class="container recipe-step">
    <h3 class="wp-block-heading" id="h-step-4-spread-that-amazingness-on-your-bread">Step 4: Serve  warm.</h3>
    <p>I usually slice the chicken and serve it right on top– family style! You can also stir it all together and just serve in plates.</p>
  </div>


<div id="tasty-recipes-94185" class="tasty-recipes tasty-recipe-94185 tasty-recipes-display tasty-recipes-has-image" data-tasty-recipes-customization="primary-color.border-color"> </div>
    <header class="tasty-recipes-entry-header" style="background-color: #f8f8f8; padding: 20px; border: 2px solid #ffd700; border-radius: 10px;">
    <div class="tasty-recipes-image" style="text-align: center;">
        <img loading="lazy" decoding="async" width="183" height="183" src="https://pinchofyum.com/wp-content/uploads/Garlic-Bread-11-Square-183x183.jpg" class="attachment-thumbnail size-thumbnail" alt="Garlic bread slices on a cutting board." style="border: 4px solid #ffd700; border-radius: 10px;">
</div>

    <h2 class="tasty-recipes-title" style="color: #333; text-transform: uppercase; margin-top: 15px; text-align:center">House Favorite Garlic Bread</h2>
    <hr style="border: 1px solid #ffd700; background-color: #ffd700; margin: 15px 0;">
    <div class="tasty-recipes-details" style="color: #555; font-size: 14px; font-size:20px; ">
        <ul style="list-style-type: none; padding: 0; margin: 0;">
            <li class="author" style="margin-bottom: 10px; text-align:center ">
                <span style="color: #666;">Author:</span>
                <a style="color: #0066cc; text-decoration: none;" href="https://pinchofyum.com/about">Marzia</a>
            </li>
            <li class="total-time" style="margin-bottom: 10px; text-align:center">
                <span style="color: #666;">
                    <svg viewBox="0 0 24 24" style="width: 18px; height: 18px; fill: #666; vertical-align: text-top; ">
                        <use xlink:href="#tasty-recipes-icon-clock"></use>
                    </svg>
                    Total Time:
                </span>
                <span style="color: #333; font-weight: bold;">35 minutes</span>
            </li>
            <li class="yield" style="margin-bottom: 10px; text-align:center">
                <span style="color: #666;">
                    <svg viewBox="0 0 24 24" style="width: 18px; height: 18px; fill: #666; vertical-align: text-top;">
                        <use xlink:href="#tasty-recipes-icon-cutlery"></use>
                    </svg>
                    Yield:
                </span>
                <span style="color: #333; font-weight: bold; ">
                    <span data-amount="5" data-amount-original-type="frac" data-amount-should-round="frac">5-6</span> servings <span data-amount="2"></span>  
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
                <label for="ingredient3" data-amount="1">1 tablespoon<strong> oil </strong></label>
            </span>
        </li>
        <li data-tr-ingredient-checkbox="checked">
            <span class="tr-ingredient-checkbox-container">
                <input type="checkbox" id="ingredient4">
                <label for="ingredient4" data-amount="1">1 teaspoon<strong> kosher salt </strong></label>
            </span>
        </li>
        <li data-tr-ingredient-checkbox="checked">
            <span class="tr-ingredient-checkbox-container">
                <input type="checkbox" id="ingredient5">
                <label for="ingredient5" data-amount="0.5" data-unit="teaspoon">½ teaspoon<strong>  pepper AND garlic powder </strong></label>
            </span>
        </li>
        <li data-tr-ingredient-checkbox="checked">
            <span class="tr-ingredient-checkbox-container">
                <input type="checkbox" id="ingredient6">
                <label for="ingredient6" data-amount="12" data-unit="ounces">12 ounces<strong> penne (or other short-cut pasta) </strong></label>
            </span>
        </li>
        <li data-tr-ingredient-checkbox="checked">
            <span class="tr-ingredient-checkbox-container">
                <input type="checkbox" id="ingredient7">
                <label for="ingredient7" data-amount="2" data-unit="tablespoon">2 tablespoons<strong> butter </strong></label>
            </span>
        </li>
        <li data-tr-ingredient-checkbox="checked">
            <span class="tr-ingredient-checkbox-container">
                <input type="checkbox" id="ingredient8">
                <label for="ingredient8" data-amount="2/4">2-4 cloves<strong> garlic, pressed </strong></label>
            </span>
        </li>
        <li data-tr-ingredient-checkbox="checked">
            <span class="tr-ingredient-checkbox-container">
                <input type="checkbox" id="ingredient9">
                <label for="ingredient9" data-amount="1" data-unit="tablespoon">1 tablespoon<strong> flour </strong></label>
            </span>
        </li>
        <li data-tr-ingredient-checkbox="checked">
            <span class="tr-ingredient-checkbox-container">
                <input type="checkbox" id="ingredient10">
                <label for="ingredient10" data-amount="¼ - ½" data-unit="teaspoon">¼ - ½ teaspoon<strong> red pepper flakes </strong></label>
            </span>
        </li>
        <li data-tr-ingredient-checkbox="checked">
            <span class="tr-ingredient-checkbox-container">
                <input type="checkbox" id="ingredient11">
                <label for="ingredient11" data-amount="¾" data-unit="cup">¾ cup<strong> chicken stock </strong></label>
            </span>
        </li>
        <li data-tr-ingredient-checkbox="checked">
            <span class="tr-ingredient-checkbox-container">
                <input type="checkbox" id="ingredient12">
                <label for="ingredient12" data-amount="1 ¼" data-unit="cup">1 ¼ cup<strong> half and half </strong></label>
            </span>
        </li>
        <li data-tr-ingredient-checkbox="checked">
            <span class="tr-ingredient-checkbox-container">
                <input type="checkbox" id="ingredient13">
                <label for="ingredient13" data-amount="¼" data-unit="cup">¼ cup  homemade or store-bought  <strong> basil pesto </strong></label>
            </span>
        </li>
        <li data-tr-ingredient-checkbox="checked">
            <span class="tr-ingredient-checkbox-container">
                <input type="checkbox" id="ingredient14">
                <label for="ingredient14" data-amount="1 ¼" data-unit="cup">1 ¼ cup<strong> steamed broccoli florets </strong></label>
            </span>
        </li>
        <li data-tr-ingredient-checkbox="checked">
            <span class="tr-ingredient-checkbox-container">
                <input type="checkbox" id="ingredient15">
                <label for="ingredient15" data-amount="¼" data-unit="cup">¼ cup<strong> parmesan cheese </strong></label>
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
          <div data-tasty-recipes-customization="body-color.color" style="text-align:justify; font-size:20px;">
          <ol>
          <li id="instruction-step-1">Boil. </style> <br> Bring a large stock pot of water to boil. Salt generously and cook the pasta 1 minute less of package directions; save ½ cup of pasta water. Drain and set pasta aside for now.&nbsp;</li>
          <li id="instruction-step-2">Chicken. <br> Season the chicken with salt, pepper, and garlic powder. Heat a casserole pan (or saute pan) over medium-high heat. Add the oil and cook the chicken for roughly 6-12 minutes or until the chicken is cooked through to 165ºF. Remove to a plate; keep warm. Once cooled, you can slice or dice it.</li>
          <li id="instruction-step-3">Sauce. <br> Over medium heat, add the butter to the same pan. Allow it to melt, then saute the garlic and red pepper flakes for 30 seconds before adding the flour. Let the flour cook for 1 minute. Slowly pour in the chicken stock as you whisk to scrape up and deglaze any stuck on bits. Allow the sauce to simmer and thicken slightly; about 1-2 minutes. Then pour in the half and half and pesto. Stir to combine and allow it to regain a simmer. Add the Parmesan cheese, pasta, and steamed broccoli. If the sauce thickens too much at any point, use the pasta water to thin it back out. Taste and adjust with additional salt or more pasta water as desired.</li>
          <li id="instruction-step-4">Serve. <br> Add the chicken to the serving dish and serve family style, or serve pasta in bowls and top with chicken.</li>
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
        <form action="../../prod2.php" method="post" enctype="multipart/form-data">
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
