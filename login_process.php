<?php
session_start();
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM accounts WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Check the user's role
        $role = $row['username'];

        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;

            // Redirect based on the user's role
            if ($role == 'admin') {
                // Show a welcome message for the admin
                echo '<script>
                        alert("Login successful! Welcome, Admin!");
                        window.location.href = "Admin/admin.php";
                      </script>';
                exit();
            } else {
                // User login successful - show JavaScript alert
                echo '<script>
                        alert("Login successful! Welcome!");
                        window.location.href = "Users/user.php";
                      </script>';
                exit();
            }
        } else {
            // Incorrect password - show JavaScript alert
            echo '<script>
                    alert("Incorrect password. Please try again.");
                    window.location.href = "login.php";
                  </script>';
            exit();
        }
    } else {
        // Username not found - show JavaScript alert
        echo '<script>
                alert("Username not found. Please try again.");
                window.location.href = "login.php";
              </script>';
        exit();
    }

    mysqli_close($conn);
}

// 404 Error for unauthorized access
header("HTTP/1.0 404 Not Found");
echo "404 Not Found";
exit();
?>
