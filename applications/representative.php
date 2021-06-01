<?php 
include_once '../includes/loader.php';
$company_name = $reg_number = $isic = $industry = $company_email = $company_phone = $address = $location = ""; 
session_start();
if(isset($_POST['company_name'])){
    $company_name = $_POST['company_name'];
    $reg_number = $_POST['registration_number'];
    $isic = $_POST['isic'];
    $industry = $_POST['industry'];
    $company_email = $_POST['company_email'];
    $company_phone = $_POST['company_phone'];
    $address = $_POST['address'];
    $location = $_POST['location'];
    
    $_SESSION['company_name'] = $company_name;
    $_SESSION['registration_number'] = $reg_number;
    $_SESSION['isic'] = $isic;
    $_SESSION['industry'] = $industry;
    $_SESSION['company_email'] = $company_email;
    $_SESSION['company_phone'] = $company_phone;
    $_SESSION['address'] = $address;
    $_SESSION['location'] = $location;
    
}

if (isset($_POST['first_name'])) {
    $first_name = $_POST['first_name'];
    $surname = $_POST['surname'];
    $id_number = $_POST['id_number'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    
    $company_name= $_SESSION['company_name'];
    $reg_number = $_SESSION['registration_number'];
    $isic = $_SESSION['isic'];
    $industry = $_SESSION['industry'];
    $company_email = $_SESSION['company_email'];
    $company_phone = $_SESSION['company_phone'];
    $address = $_SESSION['address'];
    $location = $_SESSION['location'];
    
    Application::newApplication($company_name, $reg_number, $isic, $industry, $company_email, $company_phone,
        $address, $location, $first_name, $id_number, $surname, $email, $phone);
    session_destroy();
    session_abort();
    header("location:success.php");
    
}
    
    



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KYC Registration</title>

    <link rel="shortcut icon" href="../assets/img/icons/coat-of-arms.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/applications.css">


</head>

<body>


    <div class="applications-main">
        <div class="row col-md-12">

            <div class="arms-fixed col-md-6">
                <img src="../assets/img/icons/coat-of-arms.png" alt="coat-of-arms" class="img">
            </div>
            <div class="col-md-5  offset-md-5 applications-section">
                <h1>Portal Access Application</h1>
                <h3>Representative Details (Step 2 of 3)</h3>
                <hr>
                <form class="" method="post">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" id="first_name" class="form-control" placeholder=""
                            aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="surname">Surname</label>
                        <input type="text" name="surname" id="surname" class="form-control" placeholder=""
                            aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="id_number">Nation ID Number</label>
                        <input type="text" name="id_number" id="id_number" class="form-control" placeholder=""
                            aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" name="phone" id="phone" class="form-control" placeholder=""
                            aria-describedby="helpId" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="person_email" class="form-control" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="" id="Remember" required>
                        <label for="Remember">I have read and agree to the <a href="">Terms and Conditions of
                                Service</a></label>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Apply" class="btn btn-info float-right col-md-4 margin-bottom ">
                        <p><a href="institution.php" class="btn btn-link float-right"> <i class="fa fa-arrow-left"
                                    aria-hidden="true"></i> Back
                            </a></p>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
</body>

</html>