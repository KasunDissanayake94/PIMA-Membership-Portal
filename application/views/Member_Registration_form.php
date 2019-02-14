<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PIMA</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>assets/css/agency.min.css" rel="stylesheet">


</head>

<body id="page-top">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">PIMA</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ml-auto">

                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="<?php echo base_url();?>users/user_login">Member Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="<?php echo base_url();?>users/register_member">Apply For Membership</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Header -->
<header class="masthead">
    <div class="container">
        <div class="intro-text">

            <form>
                <h1>Member Registration</h1>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputState">Title</label>
                        <select id="inputState" class="form-control">
                            <option selected>Mr</option>
                            <option selected>Ms</option>
                            <option selected>Mrs</option>
                            <option selected>Rev</option>
                            <option selected>Other</option>
                        </select>
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputFirstName">First Name</label>
                        <input type="text" class="form-control" name="first_name" id="inputFirstName" placeholder="First Name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputSurname">Surname</label>
                        <input type="text" class="form-control" name="surname" id="inputSirName" placeholder="Surname">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputFullName">Full Name</label>
                    <input type="text" class="form-control" name="full_name" id="inputFullName" placeholder="Full Name">
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputNic">NIC NO</label>
                        <input type="text" class="form-control" name="nic" id="inputNic" placeholder="NIC No">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassport">PASSPORT NO</label>
                        <input type="text" class="form-control" name="passport_no" id="inputPassport" placeholder="Passport Number">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputOffice">Mobile NO 1</label>
                        <input type="text" class="form-control" name="mobile_1" id="inputOffice" placeholder="Official Mobile">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPersonal">Mobile NO 2</label>
                        <input type="text" class="form-control" name="mobile_2" id="inputPersonal" placeholder="Personal Mobile">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputPEmail">Personal Email</label>
                        <input type="email" class="form-control" name="personal_email" id="inputPEmail" placeholder="Personal Email">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputOEmail">Office Email</label>
                        <input type="email" class="form-control" name="office_email" id="inputOEmail" placeholder="Office Email">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="address1">Residence Address</label>
                        <input type="text" class="form-control" name="address1" id="inputOEmail" placeholder="Address 1">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="address2">Residence Address</label>
                        <input type="text" class="form-control" name="address2" id="inputOEmail" placeholder="Address 2">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="city">City</label>
                        <input type="text" class="form-control" name="city" id="city" placeholder="City">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="district">District</label>
                        <input type="text" class="form-control" name="district" id="district" placeholder="District">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">City</label>
                        <input type="text" class="form-control" id="inputCity">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">State</label>
                        <select id="inputState" class="form-control">
                            <option selected>Choose...</option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputZip">Zip</label>
                        <input type="text" class="form-control" id="inputZip">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                            Check me out
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Sign in</button>
            </form>

        </div>
    </div>
</header>

<!-- Services -->


<!-- Bootstrap core JavaScript -->
<script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="<?php echo base_url();?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Contact form JavaScript -->
<script src="<?php echo base_url();?>assets/js/jqBootstrapValidation.js"></script>
<script src="<?php echo base_url();?>assets/js/contact_me.js"></script>

<!-- Custom scripts for this template -->
<script src="<?php echo base_url();?>assets/js/agency.min.js"></script>

</body>

</html>





