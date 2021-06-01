<?php 
include_once 'includes/loader.php';

$email = $password = $invalid = "";
if (isset($_POST['email'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $user = new User();
    if($user->login($email, $password)){
        $userType = $user->getTypeID();
        session_start();
        $_SESSION['userID'] = $user->getID();
        if($userType == 1){
            header("location:nrb_admin/");
        }elseif ($userType == 2){
            $_SESSION['instID'] = $user->getInstitutionID();
            header("location:admin/");
        }else{
            header("location:portal/");
        }
    }else{
        $invalid = "Invalid Email & Password Combnation!";
    }
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
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Sign In| KYC Portal</title>
</head>

<body>
    <div class="row">
        <div class="">

        </div>
        <div class="col-md-3 offset-md-4 mt-5">

            <form action="" method="post">
                <div class="form-group icon-container">
                    <img src="assets/img/icons/coat-of-arms.png" alt="coat-of-arms" class="login-icon">
                </div>
                <div class="form-group">
                    <p class="login-heading"><label for="email">Sign In</label></p>
                    <small class="error-text"><?php echo $invalid ?></small>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" required <?php echo "value='$email'"?>>
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required <?php echo "value='$password'"?>>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="" id="Remember">
                    <label for="Remember">Remember Me</label>
                </div>
                <div class="form-group">
                    <input type="submit" value="Sign In" class="btn btn-info float-right col-md-4 margin-bottom">
                    <p class="float-right"><a href="index.php" class="btn btn-link"> <i class="fa fa-arrow-left"
                                aria-hidden="true"></i> Back </a></p>
                </div>
            </form>


        </div>
    </div>
</body>

</html>