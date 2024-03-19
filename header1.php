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
$sql = "SELECT shopname FROM sellersignup WHERE id = $id";

// Execute the query
$result = $conn->query($sql);

// Check if the query was successful
if ($result->num_rows > 0) {
    // Fetch the username from the result set
    $row = $result->fetch_assoc();
    $username = $row['shopname'];
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

        /* Add style for live location */
        .live-location {
            margin-left: auto; /* Align to the right */
            padding: 10px 20px;
            color: #ffffff; /* Text color */
        }
        .logo-img {
    width: 55px;
    height: 50px;
}
.right-sidebar {
            position: fixed;
            top: 56px; 
            right: -300px; /* Initially hide it off the screen */
            width: 300px;
            height: 100%;
            background-color: #fff; /* Adjust as needed */
            z-index: 1000; /* Ensure it's above other content */
            transition: right 0.3s ease; /* Add transition for smooth animation */
            box-shadow: -5px 0px 15px rgba(0, 0, 0, 0.1); /* Add shadow for better visibility */
        }

        .show-sidebar {
            right: 0; /* Move it to the screen when toggled */
        }

        /* Additional styling for the sidebar content */
        .sidebar-content {
            padding: 20px;
        }

        .sidebar-content table {
            width: 100%;
        }

        .sidebar-content table tbody tr:nth-child(even) {
            background-color: #f8f9fa; /* Gray color for even rows */
        }

        .sidebar-content table tbody tr:nth-child(odd) {
            background-color: #fff; /* White color for odd rows */
        }

        .sidebar-content table td {
            padding: 10px;
        }

        .sidebar-content table td a {
            text-decoration: none; /* Remove underline */
            color: #000; /* Change text color to black */
        }
        /* Additional styling for logo image */
        .logo-img {
            width: 55px;
            height: 50px;
        }
        .navbar-toggler {
    margin-right: 15px; /* Adjust as needed */
    padding: 0; /* Remove padding */
}

/* Adjust the right margin of the navbar brand */
.navbar-brand {
    margin-right: auto; /* Move the brand to the left */
}

/* Adjust the padding of the navbar items */
.navbar-nav {
    padding-right: 15px; /* Adjust as needed */
}
.icon {
    width: 20px;
    height: 20px;
}
    </style>

</head>

<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow navbar-custom fixed-top">
        <div class="container">
        <!-- <li class="nav-item">
                            <span class="live-location" id="userLocation">
                                <i class="fas fa-map-marker-alt"></i> 
                                Loading...
                            </span>
                        </li> -->
                        <img src="images/logo-2.png" alt="Logo" class="navbar-brand logo-img"> 
                        <span class="navbar-brand logo h8 text-white">Bouquet & Bunches</span>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#templatemo_main_nav" aria-controls="templatemo_main_nav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="templatemo_main_nav">
                <div class="ms-auto">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="sell-home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="sell-orders.php">Orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="sell-profile.php"><?php echo $username; ?></a>
                        </li>
                        
                       
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bx bx-menu"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Header -->

    <!-- Right Sidebar -->
    <div class="right-sidebar" id="rightSidebar">
        <div class="sidebar-content">
            <table class="table table-striped">
                <tbody>
                <tr>
    <td>
        <img src="flowers/wrappericon.png" alt="Flower Icon" class="icon">
        <a href="upload.php">Add Wrapper</a>
    </td>
</tr>
<tr>
    <td>
        <img src="flowers/flowericon.png" alt="Flower Icon" class="icon">
        <a href="upload_flower.php">Add Flowers</a>
    </td>
</tr>
<tr>
    <td>
    <img src="images/rippen-1.png" alt="Flower Icon" class="icon">
        <a href="upload_ties.php">Add Ties</a>
    </td>
</tr>
<tr>
    <td>
        <img src="flowers/wrappericon.png" alt="Flower Icon" class="icon">
        <a href="Wrappers.php">Wrapppers List</a>
    </td>
</tr>
<tr>
    <td>
        <img src="flowers/flowericon.png" alt="Flower Icon" class="icon">
        <a href="flowerlist.php">Flower List</a>
    </td>
</tr>
<tr>
    <td>
    <img src="images/rippen-1.png" alt="Flower Icon" class="icon">
        <a href="Ties.php">Ties List</a>
    </td>
</tr>
<tr>
    <td>
       
        <a href="start.php">
            <i class="fas fa-sign-out-alt" style="font-size: 20px;"></i>
            Logout
        </a>
    </td>
</tr>

                </tbody>
            </table>
        </div>
    </div>
    <!-- End Right Sidebar -->


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
    <script>
        $(document).ready(function () {
            $('.dropdown-toggle').click(function () {
                $(this).next('.dropdown-menu').toggleClass('show');
            });
        });

        // Get user's live location
        function getUserLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showUserLocation);
            } else {
                console.log("Geolocation is not supported by this browser.");
            }
        }

        // Display user's live location
        function showUserLocation(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;

            // Call reverse geocoding to get the address
            fetch(`https://api.bigdatacloud.net/data/reverse-geocode-client?latitude=${latitude}&longitude=${longitude}&localityLanguage=en`)
                .then(response => response.json())
                .then(data => {
                    var userLocation = document.getElementById('userLocation');
                    userLocation.innerHTML = `<i class="fas fa-map-marker-alt"></i> ${data.city}, ${data.principalSubdivision}, ${data.countryName}`;
                })
                .catch(error => console.error('Error:', error));
        }

        // Call getUserLocation function when the page loads
        window.onload = getUserLocation;
    </script>
   <script>
    document.addEventListener("DOMContentLoaded", function () {
        // Get the elements
        var menuIcon = document.querySelector('.bx-menu');
        var rightSidebar = document.getElementById('rightSidebar');

        // Add event listener to the menu icon
        menuIcon.addEventListener('click', function () {
            // Toggle the class to show/hide the sidebar
            rightSidebar.classList.toggle('show-sidebar');
        });

        // Add event listener to the document to close sidebar when clicking outside menu options
        document.addEventListener('click', function (event) {
            // Check if the clicked element is not a part of the menu or the sidebar
            if (!event.target.closest('.navbar-nav') && !event.target.closest('.right-sidebar')) {
                // Check if sidebar is open
                if (rightSidebar.classList.contains('show-sidebar')) {
                    // Close the sidebar
                    rightSidebar.classList.remove('show-sidebar');
                }
            }
        });
    });
</script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.dropdown-toggle').click(function () {
                $(this).next('.dropdown-menu').toggleClass('show');
            });
        });
    </script>
</body>

</html>
