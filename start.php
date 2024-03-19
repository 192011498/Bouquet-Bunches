<!DOCTYPE html>
<html lang="en">
<head>
<!-- basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- mobile metas -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<!-- site metas -->
<title>Twisty Tails</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">  
<!-- bootstrap css -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<!-- style css -->
<link rel="stylesheet" type="text/css" href="css/style.css">
<!-- Responsive-->
<link rel="stylesheet" href="css/responsive.css">
<!-- fevicon -->
<link rel="icon" href="images/fevicon.png" type="image/gif" />
<!-- Scrollbar Custom CSS -->
<link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
<!-- Tweaks for older IEs-->
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
<!-- owl stylesheets --> 
<link rel="stylesheet" href="css/owl.carousel.min.css">
<link rel="stylesheet" href="css/owl.theme.default.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<style>
     body {
            margin: 0;
            padding: 0;
        }

        .logo-container,
        .image-container {
            margin: 0;
        }

        .gallery_item {
            margin: 0;
        }
    .logo-container {
    position: relative;
    z-index: 2; /* Ensure the logo is above other elements */
}

.image-container {
    position: relative;
    height:50%;
}

.logo {
    position: absolute;
    top: 0;
    left: 0;
    width: 166px;
}

.image {
    height: 50%;
}

.menu_text {
    position: absolute;
    top: 0;
    left: 0;
    z-index: 2;
}

.taital {
    position: absolute;
    top: 0;
    right: 0;
    z-index: 2;
}

.image-container {
    position: relative;
}

.image {
    height: 50%; /* Adjust the height of the image as needed */
    /* Your other image styles */
}

.login-register-btn {
    border-radius: 80px;
    width:160px;
    height:40px;
    background: #f7941d;
    margin-left: 1250px;
    top: 39px;
    position: absolute;
    z-index: 2;
}

.login-register-btn a {
    color: white;
    text-decoration: none;
    padding: 10px 20px; /* Adjust padding as needed */
}

.right-side {
    width: 300px; /* Set width to 300px */
    max-width: 100%;
    margin: 0 auto; /* Center the content horizontally */
}

.intro-text {
    font-size: 24px;
    font-weight: 500;
    line-height: 1.5;
    font-family: 'Forte', cursive; /* Change font style to Forte */
    z-index: 3; /* Ensure text is above the image */
    position: absolute; /* Position absolutely */
    top: 250px; /* Adjust top position as needed */
    left: 530px; /* Adjust left position as needed */
    transform: translate(-50%, -50%); /* Center the text */
    color: #f7941d; /* Set text color */
} /* Add your CSS styles here */
        .gallery_images {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }.gallery_images .gallery_text {
            margin-left: 20px;
        }

        /* Limit the width of "About Bouquets" section */
        .about_section {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 100px;
        }

        .gallery_item {
            flex: 0 0 48%;
            margin-bottom: 20px;
        }

        .gallery_image,
        .gallery_text {
            width: 100%;
            display: block;
        }

        .gallery_image img {
            max-width: 100%;
            height: auto;
        }

</style>
</head>
<body>
    <!-- section banner start -->
    <div class="header_section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 logo-container">
                    <div><img src="Images/logo-2.png" class="logo"></div>
                </div>
                <div class="col-md-8 image-container">
                    <div><img src="flowers/background2.jpeg" style="max-width: 100%; height: 600px; width: 100%;"></div>
                    <div class="menu_text">
                        <ul>
                            <button class="login-register-btn">
                                <a href="signup.php">Log in / Register</a>
                            </button>
                        </ul>
                    </div>
                    <p class="intro-text">Welcome to Bouquet & Bunches, your one-stop destination for customizing bouquets. Whether you're looking for a special gift or want to create something unique for yourself, our application has got you covered.</p>
                </div>
            </div>
            <div class="banner_main">
                <div class="container">
                    <div class="ram">
                        <div class="left-side">
                            <!-- Removed intro-text here -->
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h1 class="taital" style="width: 65%; float: left; font-size: 31pt;  font-weight: 700; left: 50px; margin-top: 480px; font-family: emoji; color: white;">Customized Bouquet</h1>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- section banner end -->
    <!-- section about start -->
    <div class="about_section">
        <div class="about_text">
            <div class="container">
            <h1 class="about_taital_1"><strong><span style="color: #f7941d;">About Bouquets</span></strong></h1>
            <p class="magna_text">Bouquets hold significant cultural and emotional importance in various aspects of life. They serve as timeless symbols of love, joy, celebration, and remembrance, enriching both personal and societal experiences.</p>
            <p class="magna_text">They serve as expressions of affection, conveying heartfelt emotions and sentiments to loved ones.Bouquets play a central role in commemorating life's milestones, from weddings and anniversaries to birthdays and graduations.</p>
            <!-- Add more information as needed -->
                
            </div>
        </div>
    </div>
    <!-- section about end -->
     <!-- section gallery start -->
     <div class="gallery_main layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="about_taital"><strong><span style="color: #ffffff;"></span> Sample Bouquets </strong></h1>
                    
                </div>
            </div>

            <div class="row">
                <div class="gallery_images">
                    <div class="gallery_item">
                        <img src="flowers/image3.png" class="gallery_image">
                        
                    </div>
                    <div class="gallery_item">
                        <div class="gallery_text1" style="font-family: 'Forte', cursive; line-height: 2;">Whether celebrating a special milestone, expressing love and gratitude, or honoring a loved one's memory, customization allows individuals to create bespoke arrangements that reflect their unique style and sentiment. They serve as expressions of affection, conveying heartfelt emotions and sentiments to loved ones. Additionally, bouquets offer solace and support during times of loss and mourning, serving as gestures of sympathy and remembrance. </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="gallery_images">
                    <div class="gallery_item">
                          <div class="gallery_text" style="font-family: 'Forte', cursive; line-height: 2;">Beyond their emotional significance, bouquets also contribute to the aesthetic beauty of spaces, enhancing ambiance and creating memorable experiences. Their fragrant blooms and vibrant colors uplift spirits, evoke positive emotions, and leave lasting impressions on both givers and recipients. Bouquets symbolize the beauty of nature and the enduring power of love, making them cherished gifts for all occasions.</div>
                    </div>
                    <div class="gallery_item">
                           <img src="flowers/image2.png" class="gallery_image">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- section gallery end -->

    <div class="footer_section_2">
    <div class="column col-lg-3 col-md-6">
        <h2 class="widget-title">About Customized Bouquets</h2>
        <p class="magna_text">Customized bouquets offer a unique and personal touch to any occasion. At Bouquet & Bunches, we specialize in creating stunning arrangements tailored to your preferences. Whether you have a specific color scheme in mind, a favorite flower, or a special message to convey, our expert florists will work with you to bring your vision to life.</p>
        <p class="magna_text">With our wide selection of fresh flowers and creative designs, you can create a one-of-a-kind bouquet that perfectly suits the recipient and the occasion. From birthdays to weddings, anniversaries to graduations, customized bouquets add an extra layer of thoughtfulness and sentimentality to any event.</p>
    </div>
    <div class="column col-lg-3 col-md-6">
        <div class="footer-box get-in-touch">
            <h2 class="widget-title">Get in Touch</h2>
            <ul>
                <li>Saveetha School of Engineering</li>
                <li>saveetha@saveetha.com</li>
                <li>+91 111 222 3333</li>
            </ul>
        </div>
    </div>
    <div class="column col-lg-3 col-md-6">
        <div class="footer-box pages">
            <h2 class="widget-title">Pages</h2>
            <ul>
                                    <li><a href="#"><img src="flowers/fb.png"> FaceBook</a></li>
                                    <li><a href="#"><img src="flowers/google.png"> Google</a></li>
                                    <li><a href="#"><img src="flowers/linkedin.png"> LinkedIn</a></li>
                                    <li><a href="#"><img src="flowers/twitter.png"> Twitter</a></li>
             </ul>
        </div>
    </div>
    <div class="column col-lg-3 col-md-6">
        <div class="footer-box subscribe">
            <h2 class="widget-title">Subscribe</h2>
            <p>Subscribe to our mailing list to get the latest updates.</p>
            <p><li>saveetha@saveetha.com</li><p>
            
        </div>
    </div>
</div>

<style>
   /* Footer styles */
   .footer_section_2 {
            background-color: black;
            color: white;
            display: flex;
            flex-wrap: wrap;
            left:0px;
            justify-content: space-between;
            padding: 40px 0;
        }.footer-box ul li img {
            width: 20px;
            height: 20px;
        }
        .column {
            flex-basis: calc(25% - 20px); /* Adjust the width and gap as needed */
            margin-bottom: 20px;
        }.column .widget-title {
    margin-left: 10px;
}

.column p {
    margin-left: 10px;
}
        .widget-title {
            color: #f7941d;
            font-size: 18px;
            margin-bottom: 10px;
        }
        .footer-box ul {
            list-style: none;
            padding: 0;
        }
        .footer-box ul li {
            margin-bottom: 10px;
        }
        .footer-box a {
            color: white;
            text-decoration: none;
        }
        .footer-box input[type="email"] {
            padding: 10px;
            border-radius: 5px;
            border: none;
            margin-right: 10px;
            width: 70%;
        }
        .footer-box button[type="submit"] {
            background-color: #f7941d;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .footer-box button[type="submit"]:hover {
            background-color: #e88314;
        }
        .copyright {
            margin-top: 20px;
            text-align: center;
            color: #777;
            font-size: 14px;
        }
        .social-icons {
            margin-top: 20px;
            text-align: center;
        }
        .social-icons ul {
            padding: 0;
            list-style: none;
        }
        .social-icons ul li {
            display: inline-block;
            margin-right: 10px;
        }
        .social-icons ul li:last-child {
            margin-right: 0;
        }
        .social-icons ul li a {
            display: block;
            color: white;
            text-decoration: none;
            font-size: 20px;
        }.social-icons ul li a i {
    color: white;
}

</style>
    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <!-- javascript --> 
      <script src="js/owl.carousel.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      
     
</body>
</html>