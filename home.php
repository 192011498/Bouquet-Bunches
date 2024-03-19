<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/meanmenu.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    
</head>
<body>
    
    <?php include 'header.php'; ?>
    <div class="latest-news mt-150 mb-150">
        <div class="container">
            <div class="row">
                <?php
                $sellerQuery = "SELECT id, shopname, shop_photo, address FROM sellersignup";
                $sellerResult = $conn->query($sellerQuery);
                if ($sellerResult->num_rows > 0) {
                    while ($sellerRow = $sellerResult->fetch_assoc()) {
                        $shopname = $sellerRow['shopname'];
                        $address = $sellerRow['address'];
                        $shopPhoto = $sellerRow['shop_photo'];
                ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-latest-news" onclick="setShopName('<?php echo $shopname; ?>')">
                                <a href="covers.php?shopname=<?php echo urlencode($shopname); ?>">
                                <div class="latest-news-bg shadow" style="background-image: url('data:image/jpeg;base64,<?php echo base64_encode($shopPhoto); ?>');"></div>
                                </a>
                                <div class="news-text-box">
                                    <h3><a href="covers.php?shopname=<?php echo urlencode($shopname); ?>"><?php echo $shopname; ?></a></h3>
                                    <p class="blog-meta">
                                        <span class="author"><i class="fas fa-user"></i> Admin</span>
                                        <span class="date"><i class="fas fa-calendar"></i> <?php echo date("d F, Y"); ?></span>
                                    </p>
                                    <p class="excerpt"><?php echo $address; ?></p>
                                    <a href="covers.php?shopname=<?php echo urlencode($shopname); ?>" class="read-more-btn"> </a>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "No sellers found.";
                }
                $conn->close();
                ?>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery-1.11.3.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.countdown.js"></script>
    <script src="assets/js/jquery.isotope-3.0.6.min.js"></script>
    <script src="assets/js/waypoints.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/jquery.meanmenu.min.js"></script>
    <script src="assets/js/sticker.js"></script>
    <script src="assets/js/main.js"></script>

    <script>
        function setShopName(shopname) {
            $.ajax({
                type: "POST",
                url: "set_session.php",
                data: { shopname: shopname },
                success: function(response) {
                    console.log(response);
                    // After setting session, redirect to rippen.php
                    window.location.href = 'rippen.php';
                }
            });
        }
    </script>
</body>
</html>
