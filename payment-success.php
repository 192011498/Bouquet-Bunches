<!DOCTYPE html>
<html>
<head>
    <title>Thank You - Dood</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
</head>
<body class="">
    <br><br><br><br>
    <article class="bg-secondary mb-3">  
        <div class="card-body text-center">
            <h4 class="text-white">Payment Successful<br></h4>
            <img src="images/sucess.png" alt="Successful Image" style="width: 100px; height: auto;">
            <br>
            <!-- No need for the link here -->
        </div>
        <br><br><br>
    </article>

    <!-- Add this script to perform the redirection -->
    <script>
        // Redirect to home.php after a delay (e.g., 3 seconds)
        setTimeout(function() {
            window.location.href = "home.php";
        }, 3000); // Adjust the delay as needed
    </script>
</body>
</html>
