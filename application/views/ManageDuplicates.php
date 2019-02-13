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
                <li class="breadcrumb-item active">Manage Duplicates</li>
            </ol>



            <!-- Area Chart Example-->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-chart-area"></i>
                    Manage Duplicates Form</div>
                <div class="card-body">
                    <form action="<?php echo base_url();?>adminController/manageDulpicates" method="POST">

                        <input type="hidden"
                               id="str_var"
                               name="str_var"
                               hidden
                               value="<?php print base64_encode(serialize(($_SESSION['duplicate_additional_data']))) ?>">


                        <div class="row">
                            <div class="table-responsive col-md-6">
                                <legend>Newly Inserted Fields</legend>
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">First Name</th>
                                        <th scope="col"></th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col"></th>
                                        <th scope="col">Email</th>
                                        <th scope="col"></th>
                                        <th scope="col">Address</th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    for($i = 0 ; $i < count($_SESSION['duplicate']) ; $i++){


                                        echo '<tr class="table-active">
                                        <td>'.($_SESSION['duplicate'][$i][0]['New'][0]['first_name']).'</td>
                                        <td><input type="checkbox" id="'.$_SESSION['duplicate'][$i][0]['New'][0]['id'].'new_first_name" onclick=first_name_check('.$_SESSION['duplicate'][$i][0]['New'][0]['id'].',1); name="'.$_SESSION['duplicate'][$i][0]['New'][0]['id'].'real_array_first_name[]" value='.($_SESSION['duplicate'][$i][0]['New'][0]['first_name']).' />&nbsp;</td>
                                        <td>'.($_SESSION['duplicate'][$i][0]['New'][0]['last_name']).'</td>
                                        <td><input type="checkbox" id="'.$_SESSION['duplicate'][$i][0]['New'][0]['id'].'new_last_name" onclick=last_name_check('.$_SESSION['duplicate'][$i][0]['New'][0]['id'].',1); name="'.$_SESSION['duplicate'][$i][0]['New'][0]['id'].'real_array_last_name[]" value='.($_SESSION['duplicate'][$i][0]['New'][0]['last_name']).' />&nbsp;</td>
                                        <td>'.($_SESSION['duplicate'][$i][0]['New'][0]['email']).'</td>
                                        <td><input type="checkbox" id="'.$_SESSION['duplicate'][$i][0]['New'][0]['id'].'new_email" onclick=email_check('.$_SESSION['duplicate'][$i][0]['New'][0]['id'].',1); name="'.$_SESSION['duplicate'][$i][0]['New'][0]['id'].'real_array_email[]" value='.($_SESSION['duplicate'][$i][0]['New'][0]['email']).' />&nbsp;</td>
                                        <td>'.($_SESSION['duplicate'][$i][0]['New'][0]['address']).'</td>
                                        <td><input type="checkbox" id="'.$_SESSION['duplicate'][$i][0]['New'][0]['id'].'new_address" onclick=address_check('.$_SESSION['duplicate'][$i][0]['New'][0]['id'].',1); name="'.$_SESSION['duplicate'][$i][0]['New'][0]['id'].'real_array_address[]" value='.($_SESSION['duplicate'][$i][0]['New'][0]['address']).' />&nbsp;</td>
                                    </tr>';
                                    }
                                    ?>

                                    </tbody>
                                </table>
                            </div>
                            <div class="table-responsive col-md-6">
                                <legend>Already Inserted Fields</legend>
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">First Name</th>
                                        <th scope="col"></th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col"></th>
                                        <th scope="col">Email</th>
                                        <th scope="col"></th>
                                        <th scope="col">Address</th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    for($i = 0 ; $i < count($_SESSION['duplicate']) ; $i++){

                                        echo '<tr class="table-active">
                                        <td>'.($_SESSION['duplicate'][$i][0]['Old'][0]->id).'</td>
                                        <td hidden><input hidden readonly  type="checkbox" value='.($_SESSION['duplicate'][$i][0]['Old'][0]->id).' name="duplicates_id[]" checked/>&nbsp;</td>
                                        <td>'.($_SESSION['duplicate'][$i][0]['Old'][0]->first_name).'</td>
                                        <td><input type="checkbox" onclick=first_name_check('.$_SESSION['duplicate'][$i][0]['Old'][0]->id.',2); id="'.$_SESSION['duplicate'][$i][0]['Old'][0]->id.'old_first_name" name="'.$_SESSION['duplicate'][$i][0]['Old'][0]->id.'real_array_first_name[]" value='.($_SESSION['duplicate'][$i][0]['Old'][0]->first_name).' />&nbsp;</td>
                                        <td>'.($_SESSION['duplicate'][$i][0]['Old'][0]->last_name).'</td>
                                        <td><input type="checkbox" onclick=last_name_check('.$_SESSION['duplicate'][$i][0]['Old'][0]->id.',2); id="'.$_SESSION['duplicate'][$i][0]['Old'][0]->id.'old_last_name" name="'.$_SESSION['duplicate'][$i][0]['Old'][0]->id.'real_array_last_name[]" value='.($_SESSION['duplicate'][$i][0]['Old'][0]->last_name).' />&nbsp;</td>
                                        <td>'.($_SESSION['duplicate'][$i][0]['Old'][0]->email).'</td>
                                        <td><input type="checkbox" onclick=email_check('.$_SESSION['duplicate'][$i][0]['Old'][0]->id.',2); id="'.$_SESSION['duplicate'][$i][0]['Old'][0]->id.'old_email" name="'.$_SESSION['duplicate'][$i][0]['Old'][0]->id.'real_array_email[]" value='.($_SESSION['duplicate'][$i][0]['Old'][0]->email).' />&nbsp;</td>
                                        <td>'.($_SESSION['duplicate'][$i][0]['Old'][0]->address).'</td>
                                        <td><input type="checkbox" onclick=address_check('.$_SESSION['duplicate'][$i][0]['Old'][0]->id.',2); id="'.$_SESSION['duplicate'][$i][0]['Old'][0]->id.'old_address" name="'.$_SESSION['duplicate'][$i][0]['Old'][0]->id.'real_array_address[]" value='.($_SESSION['duplicate'][$i][0]['Old'][0]->address).' />&nbsp;</td>
                                        
                                    </tr>';
                                    }
                                    ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>
                        <br>
                        <button type="submit" class="btn btn-outline-success text-center">Submit Result</button>
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



<script type="text/javascript">

//    $(document).ready(function(){
//        $('input[name="new_first_name"]').click(function(){
//            if($(this).prop("checked") == true){
//                alert("Checkbox is checked.");
//            }
//            else if($(this).prop("checked") == false){
//                alert("Checkbox is unchecked.");
//            }
//        });
//    });
    function first_name_check(id,type) {
        if(type == 2){
            //Old One
            f_id = id+'new_first_name';
            if($('#'+f_id).is(':checked') == true){
                $('#'+id+'old_first_name').prop("checked", false);
            }else{
            }
        }else{
            //New One
            f_id = id+'old_first_name';
            if($('#'+f_id).is(':checked') == true){
                $('#'+id+'new_first_name').prop("checked", false);
            }else{
            }
        }

    }
function last_name_check(id,type) {
    if(type == 2){
        //Old One
        f_id = id+'new_last_name';
        if($('#'+f_id).is(':checked') == true){
            $('#'+id+'old_last_name').prop("checked", false);
        }else{
        }
    }else{
        //New One
        f_id = id+'old_last_name';
        if($('#'+f_id).is(':checked') == true){
            $('#'+id+'new_last_name').prop("checked", false);
        }else{
        }
    }

}
function email_check(id,type) {
    if(type == 2){
        //Old One
        f_id = id+'new_email';
        if($('#'+f_id).is(':checked') == true){
            $('#'+id+'old_email').prop("checked", false);
        }else{
        }
    }else{
        //New One
        f_id = id+'old_email';
        if($('#'+f_id).is(':checked') == true){
            $('#'+id+'new_email').prop("checked", false);
        }else{
        }
    }

}
function address_check(id,type) {
    if(type == 2){
        //Old One
        f_id = id+'new_address';
        if($('#'+f_id).is(':checked') == true){
            $('#'+id+'old_address').prop("checked", false);
        }else{
        }
    }else{
        //New One
        f_id = id+'old_address';
        if($('#'+f_id).is(':checked') == true){
            $('#'+id+'new_address').prop("checked", false);
        }else{
        }
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




