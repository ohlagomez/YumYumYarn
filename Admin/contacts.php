<?php
session_start();
include '../db.php'; 
// Check if the user has the correct role
if ($_SESSION['username'] !== 'admin') {
    // Redirect to a different page or show an error message
    header("Location: ../login.php");
    exit();
  }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post_id = $_POST["edit_post_id"] ?? $_POST["delete_contact_no"];
    $action = isset($_POST["action"]) ? $_POST["action"] : null;

    $conn = mysqli_connect('127.0.0.1', 'root', '', 'yyy');

    if (!$conn) {
        die("Connection Failed: " . mysqli_connect_error());
    }

    if ($action == "delete") {
        // Handle delete operation
        $sql_delete = "DELETE FROM contacts WHERE `contactno` = ?";
        $stmt_delete = mysqli_prepare($conn, $sql_delete);

        if ($stmt_delete) {
            mysqli_stmt_bind_param($stmt_delete, "i", $post_id);
            mysqli_stmt_execute($stmt_delete);

            // Check for success or failure
            if (mysqli_stmt_affected_rows($stmt_delete) > 0) {
                // Redirect or perform other actions after deletion
                header("Location: contacts.php");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@latest/font/bootstrap-icons.css" rel="stylesheet">
    <link href="../styles.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous">
    <link rel="icon" href="../images/logo.png" type="image/x-icon">
    <title>Contacts</title>
</head>

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
                    <?php
                    // Check if the user is logged in
                    if (isset($_SESSION['username'])) {
                        $username = $_SESSION['username'];

                        // Fetch user data from the database, including the profile picture filename
                        $query = "SELECT profile FROM accounts WHERE username = '$username'";
                        $result = mysqli_query($conn, $query);

                        if ($result) {
                            $userData = mysqli_fetch_assoc($result);
                            $profilePictureFilename = $userData['profile'];

                            if ($profilePictureFilename) {
                                // Assuming the profile pictures are stored in the "uploads" folder
                                $profilePicturePath = "../" . $profilePictureFilename; // Added a trailing slash here
                                ?>
                                <li class="nav-item">
                                    <div class="d-flex text-center align-items-center">
                                        <!-- Added a data-bs-toggle and data-bs-target attributes for modal -->
                                        <img src="<?= $profilePicturePath ?>" alt="User Icon" width="45" height="45"
                                            class="rounded-circle me-2" data-bs-toggle="modal"
                                            data-bs-target="#userProfileModal">
                                        <span class="text-center fw-bold text-light"
                                            style="font-family: 'monospace', sans-serif; color: light; font-size: 1.25rem; margin-right: 20px;"><?= $username ?></span>
                                    </div>
                                </li>
                                <?php
                            }
                        }
                    } else {
                        // If the user is not logged in, show the regular logout link
                    }
                    ?>
                    <li class="nav-item">
                        <a href="admin.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Cookbook</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<body>
<?php
// Assuming you have a database connection and a query to fetch data, replace with your actual code
$sql = "SELECT * FROM contacts";
$result = mysqli_query($conn, $sql);
?>

<div class="container align-items-center justify-content-center p-5">
    <div class="card">
        <div class="card-header">
            <h2 class="text-center text-dark">User Feedback</h2>
        </div>

        <?php
        // Check if there are any records
        if (mysqli_num_rows($result) > 0) {
            // Loop through the result set
            while ($row = mysqli_fetch_assoc($result)) {
                $name = $row["name"];
                $email = $row["email"];
                $message = $row["message"];

                // Display the card for each contact
                echo "<div class='card mb-3'>
                        <div class='row g-0'>
                            <div class='col-md-8 d-flex flex-column'>
                                <div class='card-body px-5'>
                                    <h5 class='card-title text-dark'>Name: $name</h5>
                                    <p class='card-text'>Email: $email</p>
                                    <p class='card-text'>Message: $message</p>
                                    <form method='POST' action='contacts.php'>
                                        <input type='hidden' name='delete_contact_no' value='" . $row["contactno"] . "'>
                                        <button type='submit' name='action' value='delete' class='btn btn-danger btn-mx-5 position-absolute bottom-0 end-0' style='margin: 5px;' onclick='return confirmDelete(" . $row["contactno"] . ")'><i class='bi bi-trash'></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>";
            }
        } else {
            echo "<p>No Records Found</p>";
        }

        mysqli_close($conn);
        ?>
    </div>
</div>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
