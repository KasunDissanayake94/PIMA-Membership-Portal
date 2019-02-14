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

            <form action="<?php echo base_url();?>users/member_register" method="POST">
                <h1>Member Registration</h1>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="title">Title</label>
                        <select id="title" class="form-control" name="title">
                            <option name="mr" selected>Mr</option>
                            <option name="ms">Ms</option>
                            <option name="mrs">Mrs</option>
                            <option name="rev">Rev</option>
                            <option name="other">Other</option>
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
                        <label for="res_address1">Residence Address</label>
                        <input type="text" class="form-control" name="res_address1" id="res_address1" placeholder="Address 1">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="res_address2">Residence Address</label>
                        <input type="text" class="form-control" name="res_address2" id="res_address2" placeholder="Address 2">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="res_city">City</label>
                        <input type="text" class="form-control" name="res_city" id="res_city" placeholder="City">
                    </div>
                        <div class="form-group col-md-3">
                            <label for="district">District</label>
                            <select id="district" class="form-control" name="res_district">
                                <option selected value="Ampara">Ampara</option>
                                <option value="Anuradhapura">Anuradhapura</option>
                                <option value="">Badulla</option>
                                <option value="Batticaloa">Batticaloa</option>
                                <option value="Colombo">Colombo</option>
                                <option value="Galle">Galle</option>
                                <option value="Gampaha">Gampaha</option>
                                <option value="Hambantota">Hambantota</option>
                                <option value="Jaffna">Jaffna</option>
                                <option value="Kalutara">Kalutara</option>
                                <option value="Kandy">Kandy</option>
                                <option value="Kilinochchi">Kilinochchi</option>
                                <option value="Kurunegala">Kurunegala</option>
                                <option value="Mannar">Mannar</option>
                                <option value="Matale">Matale</option>
                                <option value="Matara">Matara</option>
                                <option value="Monaragala">Monaragala</option>
                                <option value="Mullaitivu">Mullaitivu</option>
                                <option value="Nuwara Eliya">Nuwara Eliya</option>
                                <option value="Polonnaruwa">Polonnaruwa</option>
                                <option value="Puttalam">Puttalam</option>
                                <option value="Ratnapura">Ratnapura</option>
                                <option value="Trincomalee">Trincomalee</option>
                                <option value="Vavuniya">Vavuniya</option>

                            </select>
                </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputOffice_1">Office Address</label>
                        <input type="text" class="form-control" name="Office_address1" id="inputOffice_1" placeholder="Address 1">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputOOffice_2">Office Address</label>
                        <input type="text" class="form-control" name="Office_address2" id="inputOOffice_2" placeholder="Address 2">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="Office_city">City</label>
                        <input type="text" class="form-control" name="Office_city" id="Office_city" placeholder="City">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="Office_district">District</label>
                        <select id="Office_district" class="form-control" name="Office_district">
                            <option selected value="Ampara">Ampara</option>
                            <option value="Anuradhapura">Anuradhapura</option>
                            <option value="">Badulla</option>
                            <option value="Batticaloa">Batticaloa</option>
                            <option value="Colombo">Colombo</option>
                            <option value="Galle">Galle</option>
                            <option value="Gampaha">Gampaha</option>
                            <option value="Hambantota">Hambantota</option>
                            <option value="Jaffna">Jaffna</option>
                            <option value="Kalutara">Kalutara</option>
                            <option value="Kandy">Kandy</option>
                            <option value="Kilinochchi">Kilinochchi</option>
                            <option value="Kurunegala">Kurunegala</option>
                            <option value="Mannar">Mannar</option>
                            <option value="Matale">Matale</option>
                            <option value="Matara">Matara</option>
                            <option value="Monaragala">Monaragala</option>
                            <option value="Mullaitivu">Mullaitivu</option>
                            <option value="Nuwara Eliya">Nuwara Eliya</option>
                            <option value="Polonnaruwa">Polonnaruwa</option>
                            <option value="Puttalam">Puttalam</option>
                            <option value="Ratnapura">Ratnapura</option>
                            <option value="Trincomalee">Trincomalee</option>
                            <option value="Vavuniya">Vavuniya</option>

                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="enrolment">Year of Enrolment at PIM</label>
                        <input type="date" class="form-control" name="enrolment" id="enrolment" placeholder="Year of Enrolment">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="completion">Year of Completion at PIM</label>
                        <input type="date" class="form-control" name="completion" id="completion" placeholder="Year of Completion">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="graduation">Year of Graduation </label>
                        <input type="date" class="form-control" name="graduation" id="graduation" placeholder="Year of Graduation">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="student_no">PIM Student No</label>
                        <input type="text" class="form-control" name="student_no" id="student_no" placeholder="PIM Student No">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputState">Speciality</label>
                        <select id="inputState" class="form-control" name="speciality">
                            <option value="finance" selected>Finance</option>
                            <option value="it">IT</option>
                            <option value="tourism">Tourism</option>
                            <option value="hr">HR</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputState">Experienced Industries</label>
                        <select id="inputState" class="form-control" name="experience">
                            <option value="tourism" selected>Tourism</option>
                            <option value="banking">Banking</option>
                            <option value="manufacturing">Manufacturing</option>
                            <option value="insurance">Insurance</option>
                        </select>
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="file" name="Upload the Photo">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="file" name="Link to Upload the Payment Confirmation">
                    </div>

                </div>
                
                <button type="submit" class="btn btn-primary">Register</button>
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





