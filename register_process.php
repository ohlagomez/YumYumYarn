<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];

        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Handle profile picture upload
        if (isset($_FILES["profile"]) && $_FILES["profile"]["error"] == UPLOAD_ERR_OK) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["profile"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Check if the file is an actual image
            $check = getimagesize($_FILES["profile"]["tmp_name"]);
            if ($check === false) {
                echo "File is not an image. <a class='try-again-link' href='register.php'>Try Again</a>";
                exit();
            }

            // Check file size (optional)
            if ($_FILES["profile"]["size"] > 500000) {
                echo "Sorry, your file is too large. <a class='try-again-link' href='register.php'>Try Again</a>";
                exit();
            }

            // Allow certain file formats
            $allowed_formats = array("jpg", "jpeg", "png", "gif");
            if (!in_array($imageFileType, $allowed_formats)) {
                echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed. <a class='try-again-link' href='register.php'>Try Again</a>";
                exit();
            }

            // Move the uploaded file to the target directory
            if (move_uploaded_file($_FILES["profile"]["tmp_name"], $target_file)) {
                echo "The file " . basename($_FILES["profile"]["name"]) . " has been uploaded.";
                $profile = $target_file; // Update the $profile variable with the file path
            } else {
                echo "Sorry, there was an error uploading your file. <a class='try-again-link' href='register.php'>Try Again</a>";
                exit();
            }
        } else {
            echo "Error uploading profile picture. <a class='try-again-link' href='register.php'>Try Again</a>";
            exit();
        }

        // Insert data into the database
        $sql = "INSERT INTO accounts (username, email, password, confirm, profile) VALUES ('$username', '$email', '$hashed_password', '$confirm', '$profile')";
        
        if (mysqli_query($conn, $sql)) {
            $_SESSION['username'] = $username;
            header("Location: login.php");
        } else {
            echo "Error: " . mysqli_error($conn) . "<a class='try-again-link' href='register.php'>Try Again</a>";
        }
    }

    mysqli_close($conn);
?>
