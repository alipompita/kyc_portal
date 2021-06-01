<?php 
if (isset($_GET['logout'])){
    session_start();
    session_destroy();
    session_abort();
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/icons/coat-of-arms.png" type="image/x-icon">

    <!--Stylesheets-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/applications.css">
    <title>KYC Portal</title>
</head>

<body>

    <div class="applications-main">
        <div class="row col-md-12">

            <div class="arms-fixed col-md-6">
                <img src="assets/img/icons/coat-of-arms.png" alt="coat-of-arms" class="img">
            </div>
            <div class="col-md-6 applications-section offset-md-5">
                <h1>KYC Portal</h1>
                <h3>Welcome</h3>
                <br>
                <p>
                    Verify your customers' Identification with the National Registration Bureau.
                    <b>Know Your Customer</b>
                </p>

                <div class="row">
                    <a href="login.php" class="col-md-4 app-navication left-radius transition">
                        <div class="icon-container">
                            <img src="assets/img/icons/gate.png" alt="portal" class="home-icon">
                        </div>
                        <div class="icon-container">
                            <h4>Open Portal</h4>
                        </div>
                    </a>

                    <a href="applications/" class="col-md-4 app-navication right-radius transition">
                        <div class="icon-container">
                            <img src="assets/img/icons/application.png" alt="portal" class="home-icon">
                        </div>
                        <div class="icon-container">
                            <h4>Apply for Access</h4>
                        </div>
                    </a>
                </div>

            </div>

        </div>
    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/font-awesome.js"></script>
</body>

</html>