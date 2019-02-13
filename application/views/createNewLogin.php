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
                <li class="breadcrumb-item active">Assign New User Role</li>
            </ol>



            <!-- Area Chart Example-->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-chart-area"></i>
                    Assign New User Role Form</div>
                <div class="card-body">
                    <form action="<?php echo base_url();?>adminController/assignNewUser" method="POST">

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
                            echo "<div class=\"row\">
                            <div class=\"col-md-8\">
                                <div class=\"form-group\">
                                    <div class=\"form-row\">
                                        <div class=\"col-md-6\">
                                        
                                            <div class=\"form-label-group\">
                                                <input type=\"text\"  id=\"firstName\" disabled value='$perreq->first_name' name=\"firstName\" class=\"form-control\" placeholder=\"First name\" required=\"required\" autofocus=\"autofocus\">
                                                <label for=\"firstName\">First name</label>
                                            </div>
                                        </div>
                                        <input type=\"text\" id=\"id\" readonly name=\"uid\" value='$perreq->id' class=\"form-control\" required=\"required\" hidden autofocus=\"autofocus\">

                                        <div class=\"col-md-6\">
                                            <div class=\"form-label-group\">
                                                <input type=\"text\" disabled id=\"lastName\" value='$perreq->last_name' name=\"lastName\" class=\"form-control\" placeholder=\"Last name\" required=\"required\">
                                                <label for=\"lastName\">Last name</label>
                                            </div>
                                        </div>
                                        

                                    </div>
                                </div>
                                <div class=\"form-group\">
                                    <div class=\"form-row\">
                                        <div class=\"col-md-6\">
                                            <div class=\"form-label-group\">
                                                <input type=\"email\" disabled value='$perreq->email' id=\"inputEmail\"  name=\"email\" class=\"form-control\" placeholder=\"Email address\" required=\"required\">
                                                <label for=\"inputEmail\">Email address</label>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class=\"form-group\">
                                    <div class=\"form-row\">
                                        <div class=\"col-md-6\">
                                            <div class=\"form-label-group\">
                                                <select id=\"inputState\" readonly name=\"userType\"class=\"form-control\">
                                                    <option value='$perreq->type'>$perreq->type</option>                                          
                                                </select>
                                            </div>
                                        </div>
                                        <div class=\"col-md-6\">
                                            <div class=\"form-label-group\">
                                                <input type=\"text\"disabled value='$perreq->contact_number' name=\"contactNumber\" id=\"contactnumber\" class=\"form-control\" placeholder=\"Contact Number\" required=\"required\">
                                                <label for=\"contactnumber\">Contact Number</label>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <div class=\"form-group row\">
    <label for=\"username\" class=\"col-sm-2 col-form-label\">Login User Name</label>
    <div class=\"col-md-8\">
    
      <input type=\"text\" class=\"form-control\" name='username' id=\"username\" readonly value='$perreq->type$perreq->id' onkeyup=\"check_if_exists();\">
    
    </div>
    <div class=\"col-md-2\" id=\"msg\"></div>
    <label for=\"password\" class=\"col-sm-2 col-form-label\">Password</label>
    <div class=\"col-md-8\">
      <input type=\"password\" class=\"form-control\" name='password' id=\"password\" required placeholder=\"Type Password\">
    </div>
    <div class=\"col-md-2\" ></div>
    
    <label for=\"confirmpassword\" class=\"col-sm-2 col-form-label\">Confirm Password</label>
    <div class=\"col-md-8\">    
    <br>
      <input type=\"password\" class=\"form-control\" name='confirmpassword' id=\"confirmpassword\" required placeholder=\"ReEnter your Password\" onkeyup=\"password_match();\">
    </div>
    <div class=\"col-md-2\" id=\"passwordText\"></div>
    
  </div>
  
                                                         
                                <button class=\"btn btn-primary btn-block\" id='assignBtn' type=\"submit\" value=\"upload\">Assign User Role</button>
                            </div>
                            <div class=\"col-md-4\">
                                <div class=\"col-md-12\">
                                    <img style='max-width: 100%' src='".base_url()."assets/img/profileImages/'>
                                    
                                    <!--                                <div class=\"form-group\">-->
                                    <!--                                    <img id='img-upload' style=\"margin: 5%\" src=\"--><?php //echo base_url();?><!--assets/img/user.jpg\"/>-->
                                    <!--                                    <div class=\"input-group\">-->
                                    <!--                                            <span class=\"input-group-btn\">-->
                                    <!--                                                <span class=\"btn btn-default btn-file\">-->
                                    <!--                                                    <button class=\"btn btn-info btn-block\" type=\"submit\">Upload Image</button>-->
                                    <!--                                                    <br>--><?php //echo form_open_multipart('upload/do_upload');?>
                                    <!--                                                    <input type=\"file\" id=\"imgInp\" name=\"imageurl\">-->
                                    <!--                                                </span>-->
                                    <!--                                            </span>-->
                                    <!--                                        <input style=\"margin-top: 2%\" type=\"text\" class=\"form-control\" readonly value=\"user.jpg\">-->
                                    <!--                                    </div>-->
                                    <!---->
                                    <!--                                </div>-->
                                </div>
                            </div>
                        </div>";

                        }
                        ?>


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
<script>
    function check_if_exists() {


        var username = $("#username").val();

        $.ajax(
            {
                type:"post",
                url: "<?php echo base_url(); ?>index.php/adminController/filename_exists",
                data:{ username:username},
                success:function(response)
                {
                    if (response == true)
                    {
                        $('#msg').html('<span style="color: green;">Acceptable Username</span>');
                        $("#assignBtn").attr("disabled", false);
                    }
                    else
                    {
                        $('#msg').html('<span style="color:red;">Sorry, that username is taken. Try another?</span>');
                        $("#assignBtn").attr("disabled", true);
                    }
                }
            });
    }
    function password_match() {
        var password = $("#password").val();
        var confirmpassword = $("#confirmpassword").val();
        if(password != confirmpassword){
            $('#passwordText').html('<span style="color:red;">Password Mismatch</span>');
        }else{
            $('#passwordText').html('<span style="color:lawngreen;">Password Matched</span>');
        }


    }
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




