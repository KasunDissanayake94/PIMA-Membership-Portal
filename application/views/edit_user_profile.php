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
                <li class="breadcrumb-item active">Edit Profile</li>
            </ol>



            <!-- Area Chart Example-->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-chart-area"></i>
                    Edit Profile Form</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                    <form action="<?php echo base_url();?>users/editUserProfile" method="POST">

                        <?php if($this->session->flashdata('edit_success')):  ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $this->session->flashdata('edit_success');?>
                            </div>
                        <?php endif;?>

                        <?php if($this->session->flashdata('edit_failed')):  ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $this->session->flashdata('edit_failed');?>
                            </div>
                        <?php endif;?>

                        <?php
                        /* first we will make sure we have data to display. $users variable is actually the $data['users'] that we sent from the controller to the view... */
                        foreach ($instant_req as $perreq)
                        {
                            echo "
                                <div class=\"form-group\">
                                    <div class=\"form-row\">
                                        <div class=\"col-md-6\">
                                        
                                            <div class=\"form-label-group\">
                                                <input type=\"text\" readonly id=\"firstName\" value='$perreq->first_name' name=\"firstname\" class=\"form-control\" placeholder=\"First name\" required=\"required\" autofocus=\"autofocus\">
                                                <label for=\"firstName\">First name</label>
                                            </div>
                                        </div>
                                        <input type=\"text\" id=\"id\" name=\"id\" value='$perreq->id' class=\"form-control\" required=\"required\" hidden autofocus=\"autofocus\">

                                        <div class=\"col-md-6\">
                                            <div class=\"form-label-group\">
                                                <input type=\"text\" readonly id=\"lastName\" value='$perreq->last_name' name=\"lastname\" class=\"form-control\" placeholder=\"Last name\" required=\"required\">
                                                <label for=\"lastName\">Last name</label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class=\"form-group\">
                                    <div class=\"form-row\">
                                        <div class=\"col-md-6\">
                                            <div class=\"form-label-group\">
                                                <input type=\"email\" value='$perreq->email'  id=\"inputEmail\" name=\"email\" class=\"form-control\" placeholder=\"Email address\" required=\"required\">
                                                <label for=\"inputEmail\">Email address</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=\"form-group\">
                                    <div class=\"form-row\">
                                        <div class=\"col-md-6\">
                                            <div class=\"form-label-group\">
                                                <input type='text'  readonly value='$perreq->type' id='type' name=\"type\" class='form-control' placeholder='Type' required>
                                                <label for='type'>Type</label>
                                            </div>
                                        </div>
                                        <div class=\"col-md-6\">
                                            <div class=\"form-label-group\">
                                                <input type=\"text\" value='$perreq->contact_number' pattern=\"^\d{10}$\" name=\"contactnumber\" id=\"contactnumber\" class=\"form-control\" placeholder=\"Contact Number\" required=\"required\">
                                                <label for=\"contactnumber\">Contact Number</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=\"form-group\">
                                    <div class=\"form-row\">
                                        <div class=\"col-md-6\">
                                            <div class=\"form-label-group\">
                                                <input type=\"password\" name=\"password\" id=\"inputPassword\" class=\"form-control\" placeholder=\"Password\" required=\"required\">
                                                <label for=\"inputPassword\">Password</label>
                                            </div>
                                        </div>
                                        <div class=\"col-md-6\">
                                            <div class=\"form-label-group\">
                                                <input type=\"password\" name=\"confirmpassword\" id=\"confirmPassword\" class=\"form-control\" placeholder=\"Confirm password\" required=\"required\">
                                                <label for=\"confirmPassword\">Confirm password</label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <button class=\"btn btn-primary btn-block\" type=\"submit\" value=\"upload\">Edit User</button>
                            </div>
                            ";

                        }
                        ?>
                    </form>
                            <div class="col-md-4 ">
                                <div class="col-md-12">
                                    <?php if($this->session->flashdata('image_upload_success')):  ?>
                                        <div class="alert alert-success" role="alert">
                                            <?php echo $this->session->flashdata('image_upload_success');?>
                                        </div>
                                    <?php endif;?>

                                    <?php if($this->session->flashdata('image_upload_failed')):  ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo $this->session->flashdata('image_upload_failed');?>
                                        </div>
                                    <?php endif;?>
                                    <form action="<?php echo base_url();?>users/changeImage?image=<?php echo $perreq->imgUrl?>" method="POST">
                                        <div class="form-group text-center">
                                            <img id='img-upload'style="width: 300px; margin-top: 2%" src="<?php echo base_url();?>assets/img/profileImages/<?php echo $perreq->imgUrl?>">
                                            <br>
                                            <br>
                                            <button type="submit" class="btn btn-outline-primary text-center">
                                                Upload Image</button>

                                        </div>
                                    </form>
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




