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
                <li class="breadcrumb-item active">Add Student</li>
            </ol>



            <!-- Area Chart Example-->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-chart-area"></i>
                    Add Student Form</div>
                <div class="card-body">
                    <form action="<?php echo base_url();?>adminController/addStudentManually" method="POST">

                        <?php if($this->session->flashdata('success')):  ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $this->session->flashdata('success');?>
                            </div>
                        <?php endif;?>

                        <?php if($this->session->flashdata('failed')):  ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $this->session->flashdata('failed');?>
                            </div>
                        <?php endif;?>


                        <h4 class="text-center"><?php echo $form_name?></h4>




                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-label-group">
                                                <input type="text" id="first_name" name="first_name" class="form-control" placeholder="First Name" >
                                                <label for="first_name">First Name</label>
                                            </div>
                                        </div>
                                    </div>
                                    <br><div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-label-group">
                                                <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last Name" >
                                                <label for="last_name">Last Name</label>
                                            </div>
                                        </div>
                                    </div>
                                    <br><div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-label-group">
                                                <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" >
                                                <label for="inputEmail">Email</label>
                                            </div>
                                        </div>
                                    </div>
                                    <br><div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-label-group">
                                                <input type="text" id="mob_number" name="mob_number" max="10" min="10" class="form-control" placeholder="Mobile Number" >
                                                <label for="mob_number">Mobile Number</label>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-label-group">
                                                <input type="text" id="res_number" name="res_number" max="10" min="10" class="form-control" placeholder="Residence Number" >
                                                <label for="res_number">Residence Number</label>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-label-group">
                                                <input type="text" id="address" name="address" class="form-control" placeholder="Address" >
                                                <label for="address">Address</label>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="text" id="address" hidden readonly value="<?php echo $form_id; ?>" name="form_id" class="form-control" placeholder="Form ID" >
                                    <input type="text" id="event_id" hidden readonly value="<?php echo $event_id; ?>" name="event_id" class="form-control" placeholder="Event ID" >

                                    <br>

                                    <?php if($form_field_result){ ?>
                                        <?php foreach($form_field_result as $field){?>
                                            <?php if($field->title == 'textbox'){

                                            echo '<div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-label-group">
                                                    <input type="text" id='.strtolower(str_replace(" ","_",$field->name)).' name='.strtolower(str_replace(" ","_",$field->name)).' class="form-control" placeholder="Email address" required="required">
                                                    <label for='.strtolower(str_replace(" ","_",$field->name)).'>'.$field->name.'</label>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <br>';

                                            }else if($field->title == 'dropdown'){
                                                echo '<div class="form-row">
                                            <div class="col-md-6">
                                              <label for="inputState">'.$field->name.'</label>
                                              <select id="inputState" class="form-control" name='.strtolower(str_replace(" ","_",$field->name)).'>';
                                                $myArray = explode('_',substr($field->options, 0, -1));
                                                foreach($myArray as $option ){
                                                    echo '<option value='.$option.'>'.$option.'</option>';
                                                }
                                                echo '
                                              </select>
                                            </div>
                                        </div>';

                                            }else if($field->title == 'checkbox'){
                                                echo '<div class="form-row">
                                            <div class="col-md-6">
                                            <label for="inputState">'.$field->name.'</label>
                                                <div class="form-check">';

                                                $myArray = explode('_',substr($field->options, 0, -1));

                                                foreach($myArray as $option ){
                                                    echo '<input class="form-check-input" type="checkbox" name='.strtolower(str_replace(" ","_",$field->name))."[]".' value="'.$option.'" id="'.$option.'">
                                                  <label class="form-check-label" for="'.$option.'">
                                                    '.$option.'
                                                  </label><br>';
                                                }

                                                echo '
                                                </div>
                                                
                                            </div>
                                        </div>';

                                            }else if($field->title == 'label'){
                                                echo '<div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-label-group">
                                                    <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required="required">
                                                    <label for="inputEmail">'.$field->name.'</label>
                                                </div>
                                            </div>
                                        </div>';

                                            }else if($field->title == 'fieldset'){
                                                echo '<div class="form-row">
                                            <div class="col-md-6">
                                                <fieldset class="form-group">                                                    
                                                    <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2">
                                                        Option two can be something else and selecting it will deselect option one
                                                      </label>
                                                    </div>               
                                                  </fieldset>
                                            </div>
                                        </div>';

                                            }
                                            ?>



                                        <?php }?>


                                    <?php }?>



                                </div>


                                <button class="btn btn-primary btn-block" type="submit" value="upload">Submit</button>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <img src="<?php echo base_url();?>assets/img/user.png">
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




