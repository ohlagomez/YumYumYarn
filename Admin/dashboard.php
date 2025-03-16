<?php
session_start();
// Establish the database connection
$conn = mysqli_connect('127.0.0.1', 'root', '', 'yyy');

// Check if the connection was successful
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

// Check if the user has the correct role
if ($_SESSION['username'] !== 'admin') {
    // Redirect to a different page or show an error message
    header("Location: ../login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST["delete_user_id"];
    $action = isset($_POST["action"]) ? $_POST["action"] : null;

    if ($action == "delete") {
        // Handle delete operation
        $sql_delete = "DELETE FROM accounts WHERE ID = ?";
        $stmt_delete = mysqli_prepare($conn, $sql_delete);

        if ($stmt_delete) {
            mysqli_stmt_bind_param($stmt_delete, "i", $user_id);
            mysqli_stmt_execute($stmt_delete);

            // Check for success or failure
            if (mysqli_stmt_affected_rows($stmt_delete) > 0) {
                // Redirect or perform other actions after deletion
                header("Location: dashboard.php");
                exit();
            } else {
                echo "Error deleting user account: " . mysqli_stmt_error($stmt_delete);
            }

            mysqli_stmt_close($stmt_delete);
        } else {
            echo "Error preparing statement: " . mysqli_error($conn);
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@latest/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="icon" href="../images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
</head>

<style>
       body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            position: relative;

        }

        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background: url(../images/utensils.jpg) no-repeat center center fixed;
            background-size: cover;
            filter: blur(5px); /* Adjust the blur strength as needed */
            animation: fadeIn 2s ease-in-out; /* Add a fadeIn animation */
        }

        header h1 {
            animation: bounceIn 1s ease-in-out; /* Add a bounceIn animation */
        }
        
        header h1:hover {
            color: orange; /* Change the color on hover */
            transform: scale(1.2); /* Scale up on hover */
        }

        header {
            background-color: #333;
            color: white;
            padding: 1em;
            text-align: center;
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

        .card {
        background-color: rgba(255, 255, 255, 0.5);
    }
</style>



<body>
<header class="container-fluid text-center bg-dark text-light py-3" style="background-size: cover; background-position: center;">
    <div class="container">
    <h1 class="display-4" style="font-family: 'Cuciniere', sans-serif; font-weight: bold; font-style: italic; color: white; text-shadow: 2px 2px 4px #333, -2px -2px 4px #555;">YumYumYarn</h1>
        <nav>
            <div class="text-center align-items-center">
            <ul class="nav justify-content-center">
            <?php
        // Check if the user is logged in
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];

            // Fetch user data from the database, including the profile picture filename
            $query = "SELECT profile FROM accounts WHERE username = '$username'";
            $result = mysqli_query($conn, $query);

            if ($result) {
                $userData = mysqli_fetch_assoc($result);
                $profilePictureFilename = isset($userData['profile']) ? $userData['profile'] : null;

                if ($profilePictureFilename) {
                    // Assuming the profile pictures are stored in the "uploads" folder
                    $profilePicturePath = "../" . $profilePictureFilename; // Added a trailing slash here
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
            }
        } else {
            // If the user is not logged in, show the regular logout link
        }
        ?>
                <li class="nav-item"><a class="nav-link text-light" href="admin.php"style="font-weight: bold;">Home</a></li>
            </ul>
            </div>
        </nav>
    </div>
</header>

<main>
        <table class="table text-center justify-content-center border table-bordered table-striped table-hover border-dark border-5">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center">User No.</th>
                    <th class="text-center">Profile Picture</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Username</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>

            <?php
                $conn = mysqli_connect('127.0.0.1', 'root', '', 'yyy');

                if (!$conn) {
                    die("Connection Failed: " . mysqli_connect_error());
                }

                $sql = "SELECT * FROM accounts";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row["ID"] . "</td>";

                        echo "<td>";
                        if (!empty($row["profile"])) {
                            $imagePath = "../" . $row["profile"];
                            if (file_exists($imagePath)) {
                                echo "<img src='" . htmlspecialchars($imagePath) . "' alt='Profile Picture' width='100' height='auto'>";
                            } else {
                                echo "Image not found at path: " . htmlspecialchars($imagePath);
                            }
                        } else {
                            echo "No Picture";
                        }
                        echo "</td>";

                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["username"] . "</td>";


                        // Add only the "Delete" button
                        echo "<td>" .
                            "<form method='POST' action='dashboard.php'>" .
                            "<input type='hidden' name='delete_user_id' value='" . $row["ID"] . "'>" .
                            "<button type='submit' name='action' value='delete' class='btn btn-danger btn-sm' style='margin: 5px;' onclick='return confirmDelete(" . $row["ID"] . ")'><i class='bi bi-trash'></i></button>" .
                            "</form>" .
                            "</td>";

                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No Records Found</td></tr>";
                }

                mysqli_close($conn);
            ?>
        </table>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    function confirmDelete(postId) {
        var confirmation = confirm('Are you sure you want to delete this post?');
        if (!confirmation) {
            // If the user cancels the confirmation, return false to prevent form submission
            return false;
        }
    }
    </script>
    </body>
<footer class="container-fluid bg-dark text-light text-center p-1">
    <div class="social-links">
        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="text-light"><i class="bi-facebook"></i></a>
        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="text-light"><i class="bi-twitter"></i></a>
        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="text-light"><i class="bi-instagram"></i></a>
        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="text-light"><i class="bi-pinterest"></i></a>
    </div>
    <span>@YumYumYarn.CO</span>
</footer>

</body>
</html>
