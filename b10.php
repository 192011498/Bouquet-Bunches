<?php 
session_start();
include 'header.php'; ?>
<br></br>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
    <script src="script10.js"></script>
    <style>
        a{
            text-decoration:none;
        }
        .wrapper {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff; /* Set your desired background color */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        
    </style>
    
</head>

<body style="margin-top:-30px; background-image: linear-gradient( 95.2deg, rgba(173,252,234,1) 26.8%, rgba(192,229,246,1) 64% );" >
<br><br>
<div class="wrapper">
    <div class="container" >
        <div class="body-wrapper">
            <div>
                <div class="text-center">
                    <div class="d-inline-block p-2 bg-primary b-radius" id="header-text"> Customize Your Bouquet Here
                    </div>
                </div>

                <div class="container-sm pt-5">
                    <div class="d-flex">
                        <div class="mr-4">
                        <div class="wrapper">
                            <div class="image-preview payment-image" >
                            <?php
                                            // Check if the image identifier is passed in the URL
                                            if(isset($_GET['image'])) {
                                                $image_identifier = $_GET['image'];
                                                $image_file_path = "temp_images/{$image_identifier}.jpg";
                                                if(file_exists($image_file_path)) {
                                                    // Display the image if it exists
                                                    echo '<img class="w-100" src="' . $image_file_path . '" />';
                                                } else {
                                                    // Display a placeholder or default image if the image file doesn't exist
                                                    echo '<img class="w-100" src="images/Redcolor.png" />';
                                                }
                                            } else {
                                                // Display a placeholder or default image if no image identifier is provided
                                                echo '<img class="w-100" src="images/Redcolor.png" />';
                                            }
                                        ?>
                                <div class="tie-overlay" id="tie-overlay"></div>
                                <div class="" id="flower-overlay"> </div>
                            </div>
                        </div>
                        </div>
                        <div class="px-4">

                            <div id="list-right-wrapper">
                                <div class="thumbnail-img flower-list" id="flower-list">
                                    <div class="v-flex" id="flower-list-inner">
                                        <!-- JS will fill the flower list here -->
                                    </div>
                                </div>

                                <div class="thumbnail-img tie-list" id="tie-list">
                                    <div class="v-flex" id="tie-list-inner">
                                        <!-- JS will fill the tie list here -->
                                    </div>
                                </div>
                                <script>createListItems()</script>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="pt-4" id="total-wrapper">
                    <div id="bill-summary">
                        <!-- JS will fill the billing here -->
                    </div>
                </div>
                

                <div class="pt-5">
                    <div id="footer-btn">
                        <div>
                        <button onclick="onClickFlowerOrTies('FLOWER')" type="button"
    class="w-100 btn btn-outline-primary text-center mt-3" style="top: 50px;">Flowers</button>

                        </div>
                        <div class="pt-4">
                        <button onclick="onClickFlowerOrTies('TIES')" type="button"
    class="w-100 btn btn-outline-primary text-center mt-3">Bouquets Ties</button>

                        </div>
                    </div>

                   

                    <div class="pt-5" id="complete-btn">
                      
                        <form class="payment-form" id="payment-form" method="post">
                            <input type="file" name="image" id="image-input" style="display: none;">
                                <!-- <button type="button" id="capture-button" class="payment-button w-100 btn btn-primary text-left">Upload Image</button> -->
                           
                         
                        <button disabled onclick="onClickComplete()" type="button" id="complete-btn-id" 
                        
                            class="capture-button payment-button w-100 btn btn-primary text-left">Complete</button>
                        </form>
                    </div>
                
                    
                    <div class="pt-5 finish-btn"  id="finish-btn">
                        <button onclick="onClickFinish()" type="button" id="finish-id"
                            class=" w-100 btn btn-primary text-left">Finish</button>
                    </div>
                
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        // Function to capture and send the image to the server
        document.querySelector('.capture-button').addEventListener('click', function () {
            // Capture the screenshot of the .payment-image
            html2canvas(document.querySelector(".payment-image")).then(function (canvas) {
                // Convert the canvas to a Blob
                canvas.toBlob(function (blob) {
                    // Create a FormData object to send the image data
                    var formData = new FormData();
                    formData.append('image', blob, 'payment_image.png');

                    // Send the image data to the server using AJAX
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', 'upload_image.php', true);

                    xhr.onload = function () {
                        if (xhr.status === 200) {
                            console.log(xhr.responseText);
                         
                        } else {
                            console.error("Error: " + xhr.status);
                            alert("Error uploading image.");
                        }
                    };

                    xhr.send(formData);
                });
            });
        });
    </script>
</body>

</html>