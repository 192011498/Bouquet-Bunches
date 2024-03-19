<?php


// Connect to your database (replace with your database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bouquet";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$id = $_SESSION['id'];
// Prepare a SQL query to retrieve the username from the signup database based on user ID
$sql = "SELECT username FROM signup WHERE id = $id";

// Execute the query
$result = $conn->query($sql);

// Check if the query was successful
if ($result->num_rows > 0) {
    // Fetch the username from the result set
    $row = $result->fetch_assoc();
    $username = $row['username'];
} else {
    // If no username found, you can set a default value or handle accordingly
    $username = "Guest";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/0e16635bd7.js" crossorigin="anonymous"></script>
    <!-- Animate CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!--========== BOXICONS ==========-->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
        /* Add your custom styles here */
        .navbar-custom {
            background-color: #07212e;
        }

        .navbar-custom .nav-link {
            color: #ffffff !important;
            /* Set the text color to white */
        }

        .navbar-brand {
            font-size: 18px;
            /* Adjust the font size as needed */
            margin-right: auto;
            /* Align to the left */
        }

        .navbar-toggler-icon {
            color: #ffffff !important; /* Set menu icon color to white */
        }

        /* Adjustments for responsiveness */
        @media (max-width: 991px) {
            .input-mobile-search {
                margin-top: 10px;
            }
            .navbar-nav {
                margin-top: 10px; /* Add some margin to navbar-nav */
            }
            .navbar-collapse {
                border-top: 1px solid #fff; /* Add border on top of collapsed menu */
                max-height: none; /* Reset max-height to accommodate collapsed menu */
            }
            .navbar-collapse ul.navbar-nav {
                flex-direction: column; /* Arrange menu items vertically */
            }
            .navbar-collapse ul.navbar-nav .nav-item {
                margin-bottom: 5px; /* Add margin between collapsed menu items */
            }
        }
        .logo-img {
    width: 55px;
    height: 50px;
}
    </style>

</head>

<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow navbar-custom fixed-top">
        <div class="container">
        <img src="images/logo-2.png" alt="Logo" class="navbar-brand logo-img"> 
            <span class="navbar-brand logo h6 text-white">Bouquet & Bunches</span>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#templatemo_main_nav" aria-controls="templatemo_main_nav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="templatemo_main_nav">
                <div class="ms-auto">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cus-order.php">Orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php"><?php echo $username; ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="start.php">Logout</a>
                        </li>
                    </ul>
                </div>
                <!-- Mobile Search -->
                <div class="d-lg-none input-mobile-search">
                    <div class="input-group">
                        <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                    </div>
                </div>
                <!-- End Mobile Search -->
            </div>
        </div>
    </nav>
    <!-- Close Header -->
    

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
