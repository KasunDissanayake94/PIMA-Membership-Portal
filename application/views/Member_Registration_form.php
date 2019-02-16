

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Login</title>

    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url();?>assets/assets1/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url();?>assets/assets1/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->

</head>

<body class="bg-dark">

<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Member Registration</div>
        <div class="card-body">
            <?php if($this->session->flashdata('member_success')):  ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $this->session->flashdata('member_success');?>
                </div>
            <?php endif;?>
            <?php if($this->session->flashdata('member_failed')):  ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $this->session->flashdata('member_failed');?>
                </div>
            <?php endif;?>

            <form  action="<?php echo base_url();?>users/member_register" method="POST">
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
                        <select id="res_city" class="form-control" name="res_city">
                            <option selected value="Ampara">Ambalangoda</option>
                            <option value="Anuradhapura">Ampara</option>
                            <option value="">Anuradhapura</option>
                            <option value="Batticaloa">Avissawella</option>
                            <option value="Colombo">Badulla</option>
                            <option value="Galle">Balangoda</option>
                            <option value="Gampaha">Bandarawela</option>
                            <option value="Hambantota">Batticaloa</option>
                            <option value="Jaffna">Beruwala</option>
                            <option value="Kalutara">Chavakacheri</option>
                            <option value="Kandy">Chilaw</option>
                            <option value="Kilinochchi">Colombo</option>
                            <option value="Kurunegala">Dambulla</option>
                            <option value="Mannar">Dehiwala-Mount Lavinia</option>
                            <option value="Matale">Embilipitiya</option>
                            <option value="Matara">Eravur</option>
                            <option value="Monaragala">Galle</option>
                            <option value="Mullaitivu">Gampaha</option>
                            <option value="Nuwara Eliya">Gampola</option>
                            <option value="Polonnaruwa">Hambantota</option>
                            <option value="Puttalam">Haputale</option>
                            <option value="Ratnapura">Harispattuwa</option>
                            <option value="Trincomalee">Hatton</option>
                            <option value="Ja-Ela">Ja-Ela</option>
                            <option value="Jaffna">Jaffna</option>
                            <option value="Kadugannawa">Kadugannawa</option>
                            <option value="Kalmunai">Kalmunai</option>
                            <option value="Kalutara">Kalutara</option>
                            <option value="Kandy">Kandy</option>
                            <option value="Kattankudy">Kattankudy</option>
                            <option value="Katunayake">Katunayake</option>
                            <option value="Kegalle">Kegalle</option>
                            <option value="Kelaniya">Kelaniya</option>
                            <option value="Kolonnawa">Kolonnawa</option>
                            <option value="Kuliyapitiya">Kuliyapitiya</option>
                            <option value="Kurunegala">Kurunegala</option>
                            <option value="Mannar">Mannar</option>
                            <option value="Matale">Matale</option>
                            <option value="Matara">Matara</option>
                            <option value="Minuwangoda">Minuwangoda</option>
                            <option value="Moneragala">Moneragala</option>
                            <option value="Moratuwa">Moratuwa</option>
                            <option value="Nawalapitiya">Nawalapitiya</option>
                            <option value="Negombo">Negombo</option>
                            <option value="Nuwara Eliya">Nuwara Eliya</option>
                            <option value="Panadura">Panadura</option>
                            <option value="Peliyagoda">Peliyagoda</option>
                            <option value="Point Pedro">Point Pedro</option>
                            <option value="Puttalam">Puttalam</option>
                            <option value="Ratnapura">Ratnapura</option>
                            <option value="Sri Jayawardenapura Kotte">Sri Jayawardenapura Kotte</option>
                            <option value="Talawakele">Talawakele</option>
                            <option value="Tangalle">Tangalle</option>
                            <option value="Trincomalee">Trincomalee</option>
                            <option value="Valvettithurai">Valvettithurai</option>
                            <option value="Vavuniya">Vavuniya</option>
                            <option value="Wattala">Wattala</option>
                            <option value="Wattegama">Wattegama</option>
                            <option value="Weligama">Weligama</option>

                        </select>
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
                        <label for="res_phone">Residence Phone No</label>
                        <input type="text" class="form-control" name="res_phone" id="res_phone" placeholder="Residence Phone No">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="designation">Designation</label>
                        <input type="text" class="form-control" name="designation" id="designation" placeholder="Designation">
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
                        <select id="Office_city" class="form-control" name="Office_city">
                            <option selected value="Ampara">Ambalangoda</option>
                            <option value="Anuradhapura">Ampara</option>
                            <option value="">Anuradhapura</option>
                            <option value="Batticaloa">Avissawella</option>
                            <option value="Colombo">Badulla</option>
                            <option value="Galle">Balangoda</option>
                            <option value="Gampaha">Bandarawela</option>
                            <option value="Hambantota">Batticaloa</option>
                            <option value="Jaffna">Beruwala</option>
                            <option value="Kalutara">Chavakacheri</option>
                            <option value="Kandy">Chilaw</option>
                            <option value="Kilinochchi">Colombo</option>
                            <option value="Kurunegala">Dambulla</option>
                            <option value="Mannar">Dehiwala-Mount Lavinia</option>
                            <option value="Matale">Embilipitiya</option>
                            <option value="Matara">Eravur</option>
                            <option value="Monaragala">Galle</option>
                            <option value="Mullaitivu">Gampaha</option>
                            <option value="Nuwara Eliya">Gampola</option>
                            <option value="Polonnaruwa">Hambantota</option>
                            <option value="Puttalam">Haputale</option>
                            <option value="Ratnapura">Harispattuwa</option>
                            <option value="Trincomalee">Hatton</option>
                            <option value="Vavuniya">Ja-Ela</option>
                            <option value="Vavuniya">Jaffna</option>
                            <option value="Vavuniya">Kadugannawa</option>
                            <option value="Vavuniya">Kalmunai</option>
                            <option value="Vavuniya">Kalutara</option>
                            <option value="Vavuniya">Kandy</option>
                            <option value="Vavuniya">Kattankudy</option>
                            <option value="Vavuniya">Katunayake</option>
                            <option value="Vavuniya">Kegalle</option>
                            <option value="Vavuniya">Kelaniya</option>
                            <option value="Vavuniya">Kolonnawa</option>
                            <option value="Vavuniya">Kuliyapitiya</option>
                            <option value="Vavuniya">Kurunegala</option>
                            <option value="Vavuniya">Mannar</option>
                            <option value="Vavuniya">Matale</option>
                            <option value="Vavuniya">Matara</option>
                            <option value="Vavuniya">Minuwangoda</option>
                            <option value="Vavuniya">Moneragala</option>
                            <option value="Vavuniya">Moratuwa</option>
                            <option value="Vavuniya">Nawalapitiya</option>
                            <option value="Vavuniya">Negombo</option>
                            <option value="Vavuniya">Nuwara Eliya</option>
                            <option value="Vavuniya">Panadura</option>
                            <option value="Vavuniya">Peliyagoda</option>
                            <option value="Vavuniya">Point Pedro</option>
                            <option value="Vavuniya">Puttalam</option>
                            <option value="Vavuniya">Ratnapura</option>
                            <option value="Vavuniya">Sri Jayawardenapura Kotte</option>
                            <option value="Vavuniya">Talawakele</option>
                            <option value="Vavuniya">Tangalle</option>
                            <option value="Vavuniya">Trincomalee</option>
                            <option value="Vavuniya">Valvettithurai</option>
                            <option value="Vavuniya">Vavuniya</option>
                            <option value="Vavuniya">Wattala</option>
                            <option value="Vavuniya">Wattegama</option>
                            <option value="Vavuniya">Weligama</option>

                        </select>
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
                <div class="form-group col-md-6">
                    <label for="country">Country</label>
                    <select id="country" class="form-control" name="country">
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
                <div>
                    <button  type="submit" class="btn btn-primary">Register Member</button>

                </div>

            </form>

        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url();?>assets/assets1/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/assets1/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url();?>assets/assets1/vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
