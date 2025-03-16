<?php
session_start();
require '../db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cooking Delights</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@latest/font/bootstrap-icons.css" rel="stylesheet">
    <link href="../styles.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous">
    <link rel="icon" href="images/logo.png" type="image/x-icon">
</head>

<style>
    body::before {
        content: "";
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
        background: url(images/Backg.jpg) no-repeat center center fixed;
        background-size: cover;
        filter: blur(5px);
        /* Adjust the blur strength as needed */
        animation: fadeIn 2s ease-in-out;
        /* Add a fadeIn animation */
    }

    main {
        display: flex;
        justify-content: space-between;
        padding: 20px;
        
    }

    section {
        width: 70%;
        background-color: #ffffff;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }

    aside {
        width: 25%;
        background-color: #f8f9fa;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }

    .search-bar {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }

    .search-input {
        width: 80%;
        padding: 10px;
        border: 1px solid #ced4da;
        border-radius: 5px;
    }

    .search-button {
        width: 20%;
        padding: 10px;
        background-color: #007bff;
        color: #fff;
        border: 1px solid #007bff;
        border-radius: 5px;
        cursor: pointer;
    }

    .search-button:hover {
        background-color: #0056b3;
        border: 1px solid #0056b3;
    }

    .origin-section,
        .genre-section {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            
        }

        .genre-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
            color: orange;
        }

        .genre-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .genre-list-item:hover {
            color: orange;
            /* Change the color on hover */
            cursor: pointer;
            /* Change the cursor on hover */
        }

        .genre-list-item {
            margin-bottom: 8px;
            color: #333;
        }
    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }
</style>

<header>
    <nav class="navbar navbar-expand-xl">
        <div class="container " id="top">
            <div class="row align-items-center">
                <div class="col-sm-4">
                    <!-- Adjusted the grid size -->
                    <a class="navbar-brand" href="#">
                        <img src="../images/logo.png" alt="YYY" class="icon-image" style="width: 85%; height: auto;">
                    </a>
                </div>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="../index.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                         <a href="../login.php" class="nav-link">Sign In</a>
                    </li>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<body style="margin: 0; padding: 0; font-family: 'Arial', sans-serif; position: relative;">
    <main>
        <section>
            <div class="container ">
                <?php
                $conn = mysqli_connect('127.0.0.1', 'root', '', 'yyy');

                if (!$conn) {
                    die("Connection Failed: " . mysqli_connect_error());
                }

                // Initial SQL query without filters
                $sql = "SELECT * FROM recipe";
                
                // Check if a search query is present
                if (isset($_GET['search'])) {
                    $search = mysqli_real_escape_string($conn, $_GET['search']);
                    $sql .= " WHERE dishname LIKE '%$search%'";
                } elseif (isset($_GET['origin'])) {
                    $origin = mysqli_real_escape_string($conn, $_GET['origin']); // Fixed variable name here
                    $sql .= " WHERE origin = '$origin'";
                } elseif (isset($_GET['genre'])) { // Check if a genre filter is present
                    $genre = mysqli_real_escape_string($conn, $_GET['genre']);
                    $sql .= " WHERE genre = '$genre'";
                }
                

                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $imagePictureFilename = htmlspecialchars($row["image"]);
                        // Display Recipe Details
                        echo "<div class='card mb-3'>";
                        echo "<div class='row g-0'>";
                        echo "<div class='col-md-4'>";
                        // Display Image
                        if ($imagePictureFilename) {
                                // Assuming the profile pictures are stored in the "uploads" folder
                                $imagePicturePath = "" . $imagePictureFilename; // Added a trailing slash here
                    
                        echo "<img src='" . $imagePicturePath . "' alt='Dish Image' class='img-fluid'>";
                        echo "</div>";
                        echo "<div class='col-md-8 d-flex flex-column'>";
                        echo "<div class='card-body'>";
                        // Display Dish Name
                        echo "<h5 class='card-title text-dark'>" . $row["dishname"] . "</h5>";
                        // Display Author
                        echo "<p class='card-text'>Author: " . $row["author"] . "</p>";
                        // "See More" button at the lower-right
                        echo "<a href='#recipeModal" . $row['no'] . "' class='btn btn-warning mt-auto align-self-end position-absolute bottom-0 end-0 m-3'
                                data-bs-toggle='modal'>See More</a>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";

                        // Recipe Modal
                        echo "<div class='modal fade' id='recipeModal" . $row['no'] . "' tabindex='-1'
                                aria-labelledby='recipeModalLabel" . $row['no'] . "' aria-hidden='true'>";
                        echo "<div class='modal-dialog modal-lg'>";
                        echo "<div class='modal-content'>";
                        echo "<div class='modal-header'>";
                        echo "<h5 class='modal-title' id='recipeModalLabel" . $row['no'] . "'>Recipe Details</h5>";
                        echo "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
                        echo "</div>";
                        echo "<div class='modal-body'>";
                        // Recipe Details
                        echo "<h5 class='card-title text-dark' style='text-align: center;'>" . $row["dishname"] . "</h5>";
                        // Display Image
                        echo "<img src='" . htmlspecialchars($row["image"]) . "' alt='Dish Image' class='img-fluid mb-3 d-block mx-auto'";
                        // Display Author
                        echo "<p class='card-text'><strong>Author:</strong> " . $row["author"] . "</p>";
                        // Display Origin
                        echo "<p class='card-text'><strong>Origin:</strong> " . $row["origin"] . "</p>";
                        // Display Genre
                        echo "<p class='card-text'><strong>Genre:</strong> " . $row["genre"] . "</p>";
                        // Display Steps
                        echo "<p class='card-text'><strong>Steps:</strong> " . nl2br($row["steps"]) . "</p>";
                        echo "</div>";
                        echo "<div class='modal-footer'>";
                        // Back button
                        echo "<button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Back</button>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        }
                    }
                } else {
                    echo "<p>No Records Found</p>";
                }

                mysqli_close($conn);
                ?>
            </div>
        </section>

        <aside style="width: 25%; background-color: #f8f9fa; padding: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-radius: 10px;">
        <form action="" method="get">
            <div class="search-bar">
                <input type="text" class="search-input" placeholder="Search..." name="search">
                <button type="submit" class="search-button"><i class="fas fa-search"></i></button>
            </div>
        </form>

        
        <div class="origin-section" >
        <h2 class="genre-title">Origin</h2>
        <ul class="genre-list" style="display: flex; flex-direction: column;">
            <li class="genre-list-item"><a href="?origin=Philippines">Philippines</a></li>
            <li class="genre-list-item"><a href="?origin=Mexico">Mexico</a></li>
            <li class="genre-list-item"><a href="?origin=Italy">Italy</a></li>
        </ul>
    </div>

    <div class="genre-section">
        <h2 class="genre-title">Genre</h2>
        <ul class="genre-list" style="display: flex; flex-direction: column;">
            <li class="genre-list-item"><a href="?genre=Meats">Meats</a></li>
            <li class="genre-list-item"><a href="?genre=Veggies">Veggies</a></li>
            <li class="genre-list-item"><a href="?genre=Beverages">Beverages</a></li>
            <li class="genre-list-item"><a href="?genre=Pastries">Pastries</a></li>
        </ul>
    </div>
    </aside>
</main>

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
  

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
</body>

</html>
