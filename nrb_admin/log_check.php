<?php
include_once '../includes/loader.php';
session_start();
if (!isset($_SESSION['userID'])) header("location:../");
$userID = $_SESSION['userID'];
$user = new User();
$user->load($userID);
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/img/icons/coat-of-arms.png" type="image/x-icon">

    <!--Stylesheets-->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/applications.css">
    <title>NRB Admin</title>
</head>

<body>

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand" href="#"><img src="../assets/img/logo-light.png" alt="logo" width="200"></a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.php"><i class="fas fa-door-open"></i> Applications</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="reports.php"> <i class="fas fa-file-invoice    "></i> Verification
                        Reports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profile.php"><i class="fa fa-user" aria-hidden="true"></i> Profile</a>
                </li>
            </ul>
            <div class="my-2 my-lg-0 nav-item">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
					<li class="nav-item">
						<span class="nav-link"><?php echo $user->getFullName()?> | </span>
					</li>
                    <li class="nav-item">
                        <a class="nav-link" href="../?logout"> <i class="fas fa-sign-out-alt    "></i> Sign out </a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>