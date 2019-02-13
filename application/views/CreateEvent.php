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
                <li class="breadcrumb-item active">Create Event</li>
            </ol>



            <!-- Area Chart Example-->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-chart-area"></i>
                    Create Event Form</div>
                <div class="card-body">
                    <form action="<?php echo base_url();?>adminController/createNewEvent" method="POST">

                        <?php if($this->session->flashdata('add_success')):  ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $this->session->flashdata('add_success');?>
                            </div>
                        <?php endif;?>

                        <?php if($this->session->flashdata('add_failed')):  ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $this->session->flashdata('add_failed');?>
                            </div>
                        <?php endif;?>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="form-label-group">
                                                <input type="text" id="name" name="name" class="form-control" placeholder="Event Name" required="required" autofocus="autofocus">
                                                <label for="name">Event Name</label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="form-label-group">
                                                <input type="date" id="date" name="date" class="form-control" placeholder="Event Date" required="required">
                                                <label for="date">Event Date</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="form-label-group">
                                                <input type="venue" id="venue" name="venue" class="form-control" placeholder="Email Venue" required="required">
                                                <label for="venue">Event Venue</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputState">Choose A Form</label>
                                            <select id="inputState" name="file_name" class="form-control">
                                                <?php
                                                foreach ($forms_for_event as $form){
                                                    echo '<option value='.$form->id.'>'.$form->title.'</option>';
                                                }

                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <button class="btn btn-primary btn-block" type="submit" value="upload">Add Event</button>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-6">
                                    <img src="<?php echo base_url();?>assets/img/event.png">
                                    <!--                                <div class="form-group">-->
                                    <!--                                    <img id='img-upload' style="margin: 5%" src="--><?php //echo base_url();?><!--assets/img/user.jpg"/>-->
                                    <!--                                    <div class="input-group">-->
                                    <!--                                            <span class="input-group-btn">-->
                                    <!--                                                <span class="btn btn-default btn-file">-->
                                    <!--                                                    <button class="btn btn-info btn-block" type="submit">Upload Image</button>-->
                                    <!--                                                    <br>--><?php //echo form_open_multipart('upload/do_upload');?>
                                    <!--                                                    <input type="file" id="imgInp" name="imageurl">-->
                                    <!--                                                </span>-->
                                    <!--                                            </span>-->
                                    <!--                                        <input style="margin-top: 2%" type="text" class="form-control" readonly value="user.jpg">-->
                                    <!--                                    </div>-->
                                    <!---->
                                    <!--                                </div>-->
                                </div>
                            </div>
                        </div>
                    </form>

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




