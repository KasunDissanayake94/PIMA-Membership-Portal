<!--Header Start-->
<?php
$this->load->view('header');
?>
<!--Header End-->


<body id="page-top">

<!--Nav Bar Start-->
<?php
$this->load->view('navbar');
?>
<!--Nav Bar End-->

<div id="wrapper">
    <!--Side Bar Start-->
    <?php
    $this->load->view('sidebar');
    ?>
    <!--Side Bar End-->

    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">View Requests</li>
            </ol>



            <!-- Area Chart Example-->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-chart-area"></i>
                    Member Requests</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <form action="<?php echo base_url();?>MemberController/registerMemberToSystem" method="POST">



                                <?php
                                /* first we will make sure we have data to display. $users variable is actually the $data['users'] that we sent from the controller to the view... */
                                foreach ($member as $perreq)
                                {
                                    echo "
                                <div class=\"form-row\">
                      <input type='text' class='form-control' name='imgUrl' value='$perreq->member_image' hidden readonly placeholder='imgUrl''>
                      <input type='text' class='form-control' name='id' value='$perreq->id' hidden readonly placeholder='ID''>
                    <div class=\"form-group col-md-4\">
                        <label for=\"title\">Title</label>
                      <input type='text' class='form-control' name='title' value='$perreq->title' readonly placeholder='Title''>

                        
                    </div>

                </div>
                <div class=\"form-row\">
                    <div class=\"form-group col-md-6\">
                        <label for=\"inputFirstName\">First Name</label>
                        <input type=\"text\" class=\"form-control\" readonly name=\"first_name\" value='$perreq->first_name' id=\"inputFirstName\" placeholder=\"First Name\">
                    </div>
                    <div class=\"form-group col-md-6\">
                        <label for=\"inputSurname\">Surname</label>
                        <input type=\"text\" class=\"form-control\" name=\"surname\" value='$perreq->surname' readonly id=\"inputSirName\" placeholder=\"Surname\">
                    </div>
                </div>
                <div class=\"form-group\">
                    <label for=\"inputFullName\">Full Name</label>
                    <input type=\"text\" class=\"form-control\" name=\"full_name\" id=\"inputFullName\" value='$perreq->name_in_full' readonly placeholder=\"Full Name\">
                </div>

                <div class=\"form-row\">
                    <div class=\"form-group col-md-6\">
                        <label for=\"inputNic\">NIC NO</label>
                        <input type=\"text\" class=\"form-control\" name=\"nic\" id=\"inputNic\" value='$perreq->nic_no' readonly placeholder=\"NIC No\">
                    </div>
                    <div class=\"form-group col-md-6\">
                        <label for=\"inputPassport\">PASSPORT NO</label>
                        <input type=\"text\" class=\"form-control\" name=\"passport_no\" id=\"inputPassport\" value='$perreq->passport_no' readonly placeholder=\"Passport Number\">
                    </div>
                </div>
                <div class=\"form-row\">
                    <div class=\"form-group col-md-6\">
                        <label for=\"inputOffice\">Mobile NO 1</label>
                        <input type=\"text\" class=\"form-control\" name=\"mobile_1\" id=\"inputOffice\" value='$perreq->mobile_1' readonly placeholder=\"Official Mobile\">
                    </div>
                    <div class=\"form-group col-md-6\">
                        <label for=\"inputPersonal\">Mobile NO 2</label>
                        <input type=\"text\" class=\"form-control\" name=\"mobile_2\" id=\"inputPersonal\" value='$perreq->mobile_2' readonly placeholder=\"Personal Mobile\">
                    </div>
                </div>
                <div class=\"form-row\">
                    <div class=\"form-group col-md-6\">
                        <label for=\"inputPEmail\">Personal Email</label>
                        <input type=\"email\" class=\"form-control\" name=\"personal_email\" id=\"inputPEmail\" value='$perreq->personal_email' readonly placeholder=\"Personal Email\">
                    </div>
                    <div class=\"form-group col-md-6\">
                        <label for=\"inputOEmail\">Office Email</label>
                        <input type=\"email\" class=\"form-control\" name=\"office_email\" id=\"inputOEmail\" value='$perreq->official_email' readonly placeholder=\"Office Email\">
                    </div>
                </div>
                <div class=\"form-row\">
                    <div class=\"form-group col-md-3\">
                        <label for=\"res_address1\">Residence Address 1</label>
                        <input type=\"text\" class=\"form-control\" name=\"res_address1\" id=\"res_address1\" value='$perreq->residence_address_1' readonly placeholder=\"Address 1\">
                    </div>
                    <div class=\"form-group col-md-3\">
                        <label for=\"res_address2\">Residence Address 2</label>
                        <input type=\"text\" class=\"form-control\" name=\"res_address2\" id=\"res_address2\" value='$perreq->residence_address_2' readonly placeholder=\"Address 2\">
                    </div>

                    <div class=\"form-group col-md-3\">
                        <label for=\"res_city\">City</label>
                              <input type=\"text\" class=\"form-control\" placeholder=\"First name\" value='$perreq->residence_city' readonly>
                        
                    </div>
                    <div class=\"form-group col-md-3\">
                        <label for=\"district\">District</label>
                              <input type=\"text\" class=\"form-control\" placeholder=\"First name\" value='$perreq->resicence_district' readonly>
                        
                    </div>
                </div>
                <div class=\"form-row\">
                    <div class=\"form-group col-md-3\">
                        <label for=\"res_phone\">Residence Phone No</label>
                        <input type=\"text\" class=\"form-control\" name=\"res_phone\" value='$perreq->residence_phone_no' readonly id=\"res_phone\" placeholder=\"Residence Phone No\">
                    </div>
                </div>
                <div class=\"form-row\">
                    <div class=\"form-group col-md-3\">
                        <label for=\"designation\">Designation</label>
                        <input type=\"text\" class=\"form-control\" name=\"designation\" value='$perreq->designation' readonly id=\"designation\" placeholder=\"Designation\">
                    </div>
                </div>

                <div class=\"form-row\">
                    <div class=\"form-group col-md-3\">
                        <label for=\"inputOffice_1\">Office Address</label>
                        <input type=\"text\" class=\"form-control\" name=\"Office_address1\" value='$perreq->official_address_1' readonly id=\"inputOffice_1\" placeholder=\"Address 1\">
                    </div>
                    <div class=\"form-group col-md-3\">
                        <label for=\"inputOOffice_2\">Office Address</label>
                        <input type=\"text\" class=\"form-control\" name=\"Office_address2\" value='$perreq->official_address_2' readonly id=\"inputOOffice_2\" placeholder=\"Address 2\">
                    </div>

                    <div class=\"form-group col-md-3\">
                        <label for=\"Office_city\">City</label>
                              <input type=\"text\" class=\"form-control\" value='$perreq->official_city' readonly placeholder=\"First name\">
                        
                    </div>
                    <div class=\"form-group col-md-3\">
                        <label for=\"Office_district\">District</label>
                              <input type=\"text\" class=\"form-control\" value='$perreq->official_district' readonly placeholder=\"First name\">
                        
                    </div>
                </div>
                <div class=\"form-group col-md-6\">
                    <label for=\"country\">Country</label>
                          <input type=\"text\" class=\"form-control\" value='$perreq->country' readonly placeholder=\"First name\">
                    
                </div>
                <div class=\"form-row\">
                    <div class=\"form-group col-md-6\">
                        <label for=\"enrolment\">Year of Enrolment at PIM</label>
                        <input type=\"text\" class=\"form-control\" name=\"enrolment\" value='$perreq->enrolement_year_pim' readonly id=\"enrolment\" placeholder=\"Year of Enrolment\">
                    </div>
                    <div class=\"form-group col-md-6\">
                        <label for=\"completion\">Year of Completion at PIM</label>
                        <input type=\"text\" class=\"form-control\" name=\"completion\" value='$perreq->completion_year_pim' readonly  id=\"completion\" placeholder=\"Year of Completion\">
                    </div>
                </div>
                <div class=\"form-row\">
                    <div class=\"form-group col-md-6\">
                        <label for=\"graduation\">Year of Graduation </label>
                        <input type=\"text\" class=\"form-control\" name=\"graduation\" value='$perreq->year_of_graduation' readonly id=\"graduation\" placeholder=\"Year of Graduation\">
                    </div>
                    <div class=\"form-group col-md-6\">
                        <label for=\"student_no\">PIM Student No</label>
                        <input type=\"text\" class=\"form-control\" name=\"student_no\" value='$perreq->pim_student_no' readonly id=\"student_no\" placeholder=\"PIM Student No\">
                    </div>
                </div>
                <div class=\"form-row\">
                    <div class=\"form-group col-md-6\">
                        <label for=\"inputState\">Speciality</label>
                              <input type=\"text\" class=\"form-control\" placeholder=\"First name\" value='$perreq->speciality' readonly>
                    </div>
                    <div class=\"form-group col-md-6\">
                        <label for=\"inputState\">Experienced Industries</label>
                              <input type=\"text\" class=\"form-control\" placeholder=\"First name\" value='$perreq->experienced_industries' readonly>
                    </div>

                </div>
                <div class='form-row'>
                <div class=\"col-md-12\">
                                <h1>Payment Image </h1>
                                <img style=\"width: 300px; margin-top: 2%\" src='http://localhost/PIMA-Membership-Portal/uploads/$perreq->payment_image'>

                            </div>
                </div>
                <div class='form-row'>
                <div class='col-md-12 text-center'>
                <button  type=\"submit\" class=\"btn btn-success\">Register Member</button>
                </div>
                </div>
                </div>
                            ";

                                }
                                ?>
                            </form>
                            <div class="col-md-4 ">
                                <div class="col-md-12">
                                    <img style="width: 300px; margin-top: 2%" src="<?php echo base_url();?>uploads/<?php echo $perreq->member_image?>">

                                </div>
                            </div>


                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<!-- Sticky Footer Start-->
<?php
$this->load->view('footer');
?>
<!--Sticky Footer Ens-->

</div>
<!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?php echo base_url();?>users/logout"><?php if($this->session->userdata('logged_in')):?>Logout<?php endif;?></a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url();?>assets/assets1/vendor/jquery/jquery.min.js"></script>
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 10000);
</script>
<script src="<?php echo base_url();?>assets/assets1/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url();?>assets/assets1/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Page level plugin JavaScript-->
<script src="<?php echo base_url();?>assets/assets1/vendor/chart.js/Chart.min.js"></script>
<script src="<?php echo base_url();?>assets/assets1/vendor/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>assets/assets1/vendor/datatables/dataTables.bootstrap4.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url();?>assets/assets1/js/sb-admin.min.js"></script>

<!-- Demo scripts for this page-->
<script src="<?php echo base_url();?>assets/assets1/js/demo/datatables-demo.js"></script>
<script src="<?php echo base_url();?>assets/assets1/js/demo/chart-area-demo.js"></script>
<script src="<?php echo base_url();?>assets/assets1/js/demo/image.js"></script>

</body>

</html>




