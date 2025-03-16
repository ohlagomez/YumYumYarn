<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <!-- Include Bootstrap CSS from CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@latest/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <link href="styles.css" rel="stylesheet"> 
    <style>
        .form-group {
            color: #f5f5f5;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 20px;
            position: relative;
        }
        .form-group label {
            margin-bottom: 8px;
            display: block;
            color: #ffd700;  /* Golden yellow labels */
            text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
        }
        .form-group input {
            height: 45px;
            padding: 10px 15px;
            border-radius: 8px;
            border: 2px solid rgba(255,255,255,0.1);
            background-color: rgba(255,255,255,0.9);
            transition: all 0.3s ease;
            font-size: 15px;
        }
        .form-group input:focus {
            border-color: #ffd700;
            box-shadow: 0 0 10px rgba(255,215,0,0.2);
            outline: none;
        }
        .form-group input[type="file"] {
            padding: 8px;
            background-color: rgba(255,255,255,0.8);
        }
        /* Style for the validation messages */
        .error-message {
            color: #ff4444;
            font-size: 14px;
            margin-top: 5px;
            display: none;
        }
        /* Container style update */
        .container.border {
            background-color: rgba(0, 0, 0, 0.75);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.3);
        }
        /* Alert messages styling */
        #validationMessages {
            border-radius: 8px;
            font-weight: 500;
            margin-bottom: 25px;
        }
        /* Button container spacing */
        .d-flex.justify-content-between {
            margin-top: 30px;
        }
        .container.border {
            padding: 10px; /* Adjusted padding */
            border-radius: 5px; /* Adjusted border-radius */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .btn {
            background-color: yellow;
            color: black;
            border: none;
            padding: 7px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }
        .btn-success:hover {
            background-color: gray;
            color: white;
        }
        .btn-primary:hover {
            background-color: gray;
            color: white;
        }   
        /* Add these styles for the popup */
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.2);
            z-index: 1000;
            text-align: center;
            min-width: 300px;
        }
        .popup-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.5);
            z-index: 999;
        }
        .popup-close {
            position: absolute;
            right: 10px;
            top: 10px;
            cursor: pointer;
            font-size: 20px;
        }
    </style>
</head>
<header>
<nav class="navbar navbar-expand-xl">
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
          <a href="login.php" class="nav-link">Log In</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">Register</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</header>
<body style="background-image: url('images/bg1.jpg'); object-fit: cover;">
    <div class="container border p-4" style="max-width: 600px; margin: 40px auto;">
        <h2 class="text-center mb-4" style="color: #ffd700; font-weight: 900; font-size: 36px; text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">Registration</h2>
        <form action="register_process.php" method="post" enctype="multipart/form-data">

            <?php
                if (isset($_GET['error'])) {
                    echo '<div id="validationMessages" class="alert alert-danger text-center">' . $_GET['error'] . '</div>';
                    unset($_GET['error']);
                } elseif (isset($_GET['confirmation'])) {
                    echo '<div id="validationMessages" class="alert alert-success text-center">' . $_GET['confirmation'] . '</div>';
                    unset($_GET['confirmation']);
                } else {
                    echo '<div id="validationMessages" class="alert alert-info text-center">Fill out all the fields.</div>';
                }
            ?>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required autocomplete="email"/>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Choose a username" required autocomplete="username"/>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required autocomplete="new-password"/>
                <div id="passwordError" class="error-message text-danger mt-1"></div>
            </div>

            <div class="form-group">
                <label for="confirm">Confirm Password</label>
                <input type="password" class="form-control" id="confirm" name="confirm" placeholder="Confirm your password" required autocomplete="new-password"/>
                <div id="confirmPassError" class="error-message text-danger mt-1"></div>
            </div>
            <div class="form-group">
                <label for="profile">Profile Picture</label>
                <input type="file" class="form-control" id="profile" name="profile"/>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-success">Register</button>
                <a href="login.php" class="btn btn-primary">Back</a>
            </div>
        </form>
    </div>    

    <footer class="container-fluid text-light text-center p-1" style="background-color: #303030;">
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

    <!-- Include Bootstrap JS and Popper.js from CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Function to show the success popup
        function showSuccessPopup() {
            document.getElementById("success-popup").style.display = "block";
        }

        // Call the showSuccessPopup function when the document is ready
        document.addEventListener("DOMContentLoaded", function() {
            <?php
            // Check if registration was successful and show the popup
            if (isset($_GET['success']) && $_GET['success'] == 'true') {
                echo 'showSuccessPopup();';
            }
            ?>
        });
    </script>
    <script>
    document.querySelector('form').addEventListener('submit', function(e) {
        e.preventDefault(); // Prevent form submission initially
        
        // Get password values
        const password = document.getElementById('password').value;
        const confirm = document.getElementById('confirm').value;
        
        // Reset error messages
        document.getElementById('passwordError').textContent = '';
        document.getElementById('confirmPassError').textContent = '';
        
        // Validate passwords
        let isValid = true;
        
        if (password.length < 5) {
            document.getElementById('passwordError').textContent = 'Password must be at least 5 characters long';
            isValid = false;
        }
        
        if (password !== confirm) {
            document.getElementById('confirmPassError').textContent = 'Passwords do not match';
            isValid = false;
        }
        
        // If validation passes, submit the form
        if (isValid) {
            this.submit();
        }
    });
    
    // Real-time password match checking
    document.getElementById('confirm').addEventListener('input', function() {
        const password = document.getElementById('password').value;
        const confirm = this.value;
        const errorElement = document.getElementById('confirmPassError');
        
        if (password !== confirm) {
            errorElement.textContent = 'Passwords do not match';
            errorElement.style.color = '#ff4444';
        } else {
            errorElement.textContent = 'Passwords match';
            errorElement.style.color = '#4CAF50';
        }
    });
    </script>

    <!-- Add these divs before the closing body tag -->
    <div class="popup-overlay" id="overlay"></div>
    <div class="popup" id="errorPopup">
        <span class="popup-close" onclick="closePopup('errorPopup')">&times;</span>
        <h3 style="color: #ff4444;">Error</h3>
        <p id="errorMessage"></p>
        <button class="btn btn-danger" onclick="closePopup('errorPopup')">Close</button>
    </div>

    <div class="popup" id="successPopup">
        <span class="popup-close" onclick="closePopup('successPopup')">&times;</span>
        <h3 style="color: #4CAF50;">Success!</h3>
        <p>Registration completed successfully!</p>
        <button class="btn btn-success" onclick="window.location.href='login.php'">Go to Login</button>
    </div>

    <script>
        function showPopup(popupId, message = '') {
            document.getElementById('overlay').style.display = 'block';
            document.getElementById(popupId).style.display = 'block';
            if (message) {
                document.getElementById('errorMessage').textContent = message;
            }
        }

        function closePopup(popupId) {
            document.getElementById('overlay').style.display = 'none';
            document.getElementById(popupId).style.display = 'none';
        }

        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault(); // Prevent form submission initially
            
            // Get password values
            const password = document.getElementById('password').value;
            const confirm = document.getElementById('confirm').value;
            
            // Reset error messages
            document.getElementById('passwordError').textContent = '';
            document.getElementById('confirmPassError').textContent = '';
            
            // Validate passwords
            let isValid = true;
            
            if (password.length < 5) {
                showPopup('errorPopup', 'Password must be at least 5 characters long');
                isValid = false;
            } else if (password !== confirm) {
                showPopup('errorPopup', 'Passwords do not match');
                isValid = false;
            }
            
            // If validation passes, submit the form
            if (isValid) {
                this.submit();
            }
        });

        // Show success popup if registration was successful
        <?php if (isset($_GET['success']) && $_GET['success'] == 'true'): ?>
            document.addEventListener('DOMContentLoaded', function() {
                showPopup('successPopup');
            });
        <?php endif; ?>
        
        // Real-time password match checking
        document.getElementById('confirm').addEventListener('input', function() {
            const password = document.getElementById('password').value;
            const confirm = this.value;
            const errorElement = document.getElementById('confirmPassError');
            
            if (password !== confirm) {
                errorElement.textContent = 'Passwords do not match';
                errorElement.style.color = '#ff4444';
            } else {
                errorElement.textContent = 'Passwords match';
                errorElement.style.color = '#4CAF50';
            }
        });
    </script>
</body>
</html>
