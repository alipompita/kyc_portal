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
    <title>Application | KYC Portal</title>
</head>

<body>
    <div class="row">
        <div class="">

        </div>
        <div class="col-md-10 offset-md-1">

            <form action="">

                <div class="form-group icon-container">
                    <img src="assets/img/icons/coat-of-arms.png" alt="coat-of-arms" class="login-icon">
                </div>
                <p class="login-heading"><label for="company_name">Apply For Registration</label></p>
                <div class="row">
                    <div class="col-md-5">
                        <p class="subsection-heading">Institution Details</p>
                        <hr>
                        <div class="form-group">
                            <label for="company_name">Company Name</label>
                            <input type="text" name="email" id="company_name" class="form-control" placeholder=""
                                required>
                        </div>
                        <div class="form-group">
                            <label for="registration_number">Registration Number</label>
                            <input type="text" name="registration_number" id="registration_number" class="form-control"
                                placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="registration_number">ISIC Number</label>
                            <input type="text" name="registration_number" id="registration_number" class="form-control"
                                placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="service">Indusry</label>
                            <select name="" id="service_selector" class="form-control">
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
                            <label for="location">Location</label>
                            <select name="location" id="location" class="form-control">
                                <option value="BT">Blantyre</option>
                                <option value="LL">Lilongwe</option>
                                <option value="MZ">Mzuzu</option>
                                <option value="ZA">Zomba</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="company_email">Company Email</label>
                            <input type="text" name="company_email" id="company_email" class="form-control"
                                placeholder="">
                        </div>
                    </div>
                    <div class="col-md-5 offset-md-1">
                        <p class="subsection-heading">
                            Contact Person Details
                        </p>
                        <hr>
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
                            <input type="text" name="email" id="person_email" class="form-control" placeholder=""
                                required>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="" id="Remember" required>
                            <label for="Remember">I have read and agree to the <a href="">Terms and Conditions of
                                    Service</a></label>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Sign In"
                                class="btn btn-info float-right col-md-4 margin-bottom">
                        </div>

                    </div>
                </div>

                <hr>


            </form>


        </div>
    </div>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/font-awesome.js"></script>
    <script src="assets/js/application.js"></script>
</body>

</html>