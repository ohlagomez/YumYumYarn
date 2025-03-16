<?php
session_start();
// Check if the user has the correct role
if ($_SESSION['username'] !== 'admin') {
    // Redirect to a different page or show an error message
    header("Location: ../login.php");
    exit();
  }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post_id = $_POST["edit_post_id"] ?? $_POST["delete_post_id"];
    $action = isset($_POST["action"]) ? $_POST["action"] : null;

    $conn = mysqli_connect('127.0.0.1', 'root', '', 'yyy');

    if (!$conn) {
        die("Connection Failed: " . mysqli_connect_error());
    }

    if ($action == "edit") {
        // Handle edit operation
        $sql_fetch = "SELECT * FROM posts WHERE `no.` = ?";
        $stmt_fetch = mysqli_prepare($conn, $sql_fetch);

        if ($stmt_fetch) {
            mysqli_stmt_bind_param($stmt_fetch, "i", $post_id);
            mysqli_stmt_execute($stmt_fetch);

            $result_fetch = mysqli_stmt_get_result($stmt_fetch);

            if ($row = mysqli_fetch_assoc($result_fetch)) {
                // Use $row array to pre-fill the form with existing data for editing

                // Redirect or perform other actions after editing
                header("Location: managepost.php");
                exit();
            } else {
                echo "Error: Post not found.";
            }

            mysqli_stmt_close($stmt_fetch);
        } else {
            echo "Error preparing statement: " . mysqli_error($conn);
        }
    } elseif ($action == "delete") {
        // Handle delete operation
        $sql_delete = "DELETE FROM posts WHERE `no.` = ?";
        $stmt_delete = mysqli_prepare($conn, $sql_delete);

        if ($stmt_delete) {
            mysqli_stmt_bind_param($stmt_delete, "i", $post_id);
            mysqli_stmt_execute($stmt_delete);

            // Check for success or failure
            if (mysqli_stmt_affected_rows($stmt_delete) > 0) {
                // Redirect or perform other actions after deletion
                header("Location: managepost.php");
                exit();
            } else {
                echo "Error deleting post: " . mysqli_stmt_error($stmt_delete);
            }

            mysqli_stmt_close($stmt_delete);
        } else {
            echo "Error preparing statement: " . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@latest/font/bootstrap-icons.css" rel="stylesheet"> 
    <link rel="icon" href="../images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../styles.css">
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
                <li class="nav-item"><a class="nav-link text-light" href="admin.php"style="font-weight: bold;">Home</a></li>
                <li class="nav-item"><a class="nav-link text-light" href="adminpost.php"style="font-weight: bold;">Create Post</a></li>
                <li class="nav-item"><a class="nav-link text-light" href="#"style="font-weight: bold;">Manage Post</a></li>
            </ul>
            </div>
        </nav>
    </div>
</header>
    <main>
        <div class="container py-2" style="background-color: rgba(255, 255, 255, 0.5);">
        <table class="table text-center justify-content-center border table-bordered table-dark table-striped table-hover border-dark border-5" style="background-color: rgba(255, 255, 255, 0.5);">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center">Post No.</th>
                    <th class="text-center">Profile Picture</th>
                    <th class="text-center">Username</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Title</th>
                    <th class="text-center">Image</th>
                    <th class="text-center">Genre</th>
                    <th class="text-center">Date</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>

            <?php
                $conn = mysqli_connect('127.0.0.1', 'root', '', 'yyy');

                if (!$conn) {
                    die("Connection Failed: " . mysqli_connect_error());
                }

                $sql = "SELECT * FROM posts";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row["no."] . "</td>";

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

                        echo "<td>" . $row["username"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["title"] . "</td>";

                        echo "<td>";
                        if (!empty($row["image"])) {
                            $imagePath = $row["image"];
                            if (file_exists($imagePath)) {
                                echo "<img src='" . htmlspecialchars($imagePath) . "' alt='Profile Picture' width='100' height='auto'>";
                            } else {
                                echo "Image not found at path: " . htmlspecialchars($imagePath);
                            }
                        } else {
                            echo "No Picture";
                        }
                        echo "</td>";

                        echo "<td>" . $row["genre"] . "</td>";
                        echo "<td>" . $row["dateAT"] . "</td>";
                        echo "<td>" .
                            "<form method='POST' action='managepost.php'>" .
                            "<input type='hidden' name='edit_post_id' value='" . $row["no."] . "'>" .
                            "<input type='hidden' name='delete_post_id' value='" . $row["no."] . "'>" .
                            "<button type='submit' name='action' value='delete' class='btn btn-danger btn-sm' style='margin: 5px;' onclick='return confirmDelete(" . $row["no."] . ")'><i class='bi bi-trash'></i></button>" .
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
        </div>
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
</html>
