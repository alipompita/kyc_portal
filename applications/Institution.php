<?php 
$company_name = $reg_number = $isic = $industry = $company_email = $company_phone = $address = $location = "";
session_start();
if (isset($_SESSION['company_name'])) {
    $company_name= $_SESSION['company_name'];
    $reg_number = $_SESSION['registration_number'];
    $isic = $_SESSION['isic'];
    $industry = $_SESSION['industry'];
    $company_email = $_SESSION['company_email'];
    $company_phone = $_SESSION['company_phone'];
    $address = $_SESSION['address'];
    $location = $_SESSION['location'];
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
                <h3>Institution Details (Step 1 of 2)</h3>
                <hr>
                <form class="" action="representative.php" method="post">

                    <div class="form-group">
                        <label for="company_name">Company Name</label>
                        <input type="text" name="company_name" id="company_name" class="form-control" placeholder="" required <?php echo "value='$company_name'"?>>
                    </div>
                    <div class="form-group">
                        <label for="registration_number">Registration Number</label>
                        <input type="text" name="registration_number" id="registration_number" class="form-control"
                            placeholder="" required <?php echo "value='$reg_number'"?>>
                    </div>
                    <div class="form-group">
                        <label for="isic">ISIC Number</label>
                        <input type="text" name="isic" id="isic" class="form-control"
                            placeholder="" required <?php echo "value='$isic'"?>>
                    </div>
                    <div class="form-group">
                        <label for="service">Indusry</label>
                        <select name="industry" id="service_selector" class="form-control">
                            <option value="">
                                Banking
                            </option>
                            <option value="">
                                Insurance Blocking
                            </option>
                            <option value="">
                                Insurance Policy Provision
                            </option>
                            <option value="other">
                                Other
                            </option>
                        </select>
                    </div>
                    <div class="form-group" id="other">

                    </div>
                    <div class="form-group">
                        <label for="company_phone">Company Phone</label>
                        <input type="text" name="company_phone" id="company_email" class="form-control" placeholder="" <?php echo "value='$company_phone'"?>>
                    </div>
                    <div class="form-group">
                        <label for="company_email">Company Email</label>
                        <input type="text" name="company_email" id="company_email" class="form-control" placeholder="" <?php echo "value='$company_email'"?>>
                    </div>

                    <div class="form-group">
                        <label for="address">Adress</label>
                        <textarea name="address" id="adress" class="form-control" placeholder="" required><?php echo $address?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="location">Location</label>
                        <select name="location" id="location" class="form-control">
                            <option value="BT">Blantyre</option>
                            <option value="LL">Lilongwe</option>
                            <option value="MZ">Mzuzu</option>
                            <option value="ZA">Zomba</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Next" class="btn btn-info float-right col-md-4 margin-bottom ">
                        <p><a href="index.html" class="btn btn-link float-right"> <i class="fa fa-window-close"
                                    aria-hidden="true"></i> Cancel
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