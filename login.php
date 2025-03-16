<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Include Bootstrap CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@latest/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous">
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <link href="styles.css" rel="stylesheet">
    <style>
        /* Custom styles can be added here */
        .form-group {
            color: #f5f5f5;
            font-size: 20px;
            font-weight: 700;
        }
        .btn {
            background-color: yellow;
            align-content: center;
            color: black;
            border: none;
            padding: 7px 90px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            margin: 20px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: gray;
            color: white;
        }
        .mt-3 {
            color: white;
            text-align: center;
        }
    </style>
</head>
<header>
    <div class="container-fluid bg-dark ">
        <nav class="navbar navbar-expand-lg">
            <div class="container" id="top">
                <div class="row">
                    <div class="col-md-12"> <!-- Adjusted the grid size -->
                        <a class="navbar-brand" href="#">
                            <img src="images/logo.png" alt="YYY" class="icon-image" style="width: 25%; height: auto;">
                        </a>
                    </div>
                </div>
                <ul class="navbar-nav ml-auto ">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">Home</a>
                    </li>
    
                    <li class="nav-item">
                        <a href="cookbook/cookbook.php" class="nav-link">Cookbook</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<body style="background-image: url('images/bg1.jpg'); object-fit: cover">

    <div class="container" style="max-width: 400px; margin: 20px auto;">
        <h2 class="text-center mb-4" style="color: #f5f5f5; font-weight: 900; font-size: 40px;">Login</h2>
        <div class="container border border-3" style="padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 10);">
            <!-- Your existing form code -->
            <form action="login_process.php" method="post">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control my-2" id="username" name="username" placeholder="Enter username" required autocomplete="username" />
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control my-2" id="password" name="password" placeholder="********" required autocomplete="current-password" />
                </div>
                <button type="submit" class="btn" value="Login" style="margin-left: 65px;">Login</button>
            </form>
            <p class="mt-3">Don't have an account? <a href="registration.php">Register here</a></p>
        </div>
    </div>

    <footer class="container-fluid text-light text-center py-3 p-1" style="background-color: #303030;  bottom: 0; width: 100%;">
        <div class="social-links m-0">
            <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="text-light"><i class="bi-facebook"></i></a>
            <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="text-light"><i class="bi-twitter"></i></a>
            <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="text-light"><i class="bi-instagram"></i></a>
            <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="text-light"><i class="bi-pinterest"></i></a>
        </div>
        <span>All Rights reserved, <span style="color: #f2e30f;">@YumYumYarn.CO</span> A Raptive Partner Site.</span>
    </footer>

    <!-- Include Bootstrap JS and Popper.js from CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
