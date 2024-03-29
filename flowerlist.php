<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <!-- title -->
    <title>Single Product</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- owl carousel -->
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <!-- magnific popup -->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!-- animate css -->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!-- mean menu css -->
    <link rel="stylesheet" href="assets/css/meanmenu.min.css">
    <!-- main style -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- responsive -->
    <link rel="stylesheet" href="assets/css/responsive.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    
<style>
      .order-container {
        display: flex;
        align-items: center; /* Center items vertically */
        margin-bottom: 20px; /* Adjust margin as needed */
        border: 1px solid #ddd; /* Optional: Add border for a visual separation */
        
        border-radius: 10px; /* Optional: Add border-radius for rounded corners */
        padding: 10px; /* Optional: Add padding for spacing */
    }

    .order-message {
        margin: 0; /* Reset margin for the message */
    }
    .product-image img {
    width: 200px;
    height: 190px;
}
    .search-container {
        margin-top: 80px;
        margin-bottom: 20px;
    }
    .search-container input[type=text] {
        padding: 10px;
        font-size: 17px;
        border: none;
        border-radius: 5px 0 0 5px;
    }

    .search-container button {
        padding: 10px 15px;
        background: #007bff;
        color: #fff;
        font-size: 17px;
        border: none;
        cursor: pointer;
        border-radius: 0 5px 5px 0;
    }

    .search-container button:hover {
        background: #0056b3;
    }

    /* Adjust header margin to remove white space */
    header {
        margin-bottom: 0;
    }.product-section{
        top:100px;
    }.cart-btn {
    text-decoration: none; /* Remove underline */
}

</style>
</head>

<body>
    
    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
    
    <?php include 'header1.php'; ?>
    
    <!-- Search container -->
    <div class="container">
        <div class="search-container">
            <div class="row">
                <div class="col-md-12">
                    <form method="GET">
                        <input type="text" placeholder="Search.." name="search" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Product section -->
    <div class="product-section mt-60 mb-150">
        <div class="container">
            <div class="row product-lists">
                <?php
                // Retrieve shopname from the session
                $shopname = $_SESSION['shopname'];

                // Define the base query
                $query = "SELECT id, image, price, flower_name FROM flowers WHERE shopname = '$shopname'";

                // Check if search query is set
                if (isset($_GET['search'])) {
                    $search = '%' . $_GET['search'] . '%'; // Search term
                    $query .= " AND flower_name LIKE ?"; // Add search condition to the query

                    // Prepare the query
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("s", $search);
                } else {
                    // If no search query, execute without search condition
                    $stmt = $conn->prepare($query);
                }

                // Execute the query
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="col-lg-4 col-md-6 text-center">';
                        echo '<div class="single-product-item">';
                        echo '<div class="product-image">';
                        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="' . $row['price'] . '" />';
                        echo '</div>';
                        echo '<p class="product-price"><span></span> Rs.' . $row['price'] . '</p>';
                        echo '<p class="product-name">' . $row['flower_name'] . '</p>'; // Added product name
                        echo '<a href="editflowers.php?id=' . urlencode($row['id']) . '" class="cart-btn"> Edit</a>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo "No products found.";
                }

                // Close the database connection
                $conn->close();
                ?>
            </div>
        </div>
    </div>
    <!-- end products -->

    
    
    <!-- jquery -->
    <script src="assets/js/jquery-1.11.3.min.js"></script>
    <!-- bootstrap -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- count down -->
    <script src="assets/js/jquery.countdown.js"></script>
    <!-- isotope -->
    <script src="assets/js/jquery.isotope-3.0.6.min.js"></script>
    <!-- waypoints -->
    <script src="assets/js/waypoints.js"></script>
    <!-- owl carousel -->
    <script src="assets/js/owl.carousel.min.js"></script>
    <!-- magnific popup -->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <!-- mean menu -->
    <script src="assets/js/jquery.meanmenu.min.js"></script>
    <!-- sticker js -->
    <script src="assets/js/sticker.js"></script>
    <!-- main js -->
    <script src="assets/js/main.js"></script>

</body>
</html>
