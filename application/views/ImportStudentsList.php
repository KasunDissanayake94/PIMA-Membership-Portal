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
                <li class="breadcrumb-item active">Import Student List</li>
            </ol>



            <!-- Area Chart Example-->
            <div class="card mb-3">

                <div class="card-body">

                    <?php echo form_open_multipart("adminController/printExcelSheet?form_id=".$form_id."&event_id=".$event_id."");?>
                    <?php echo $form_name;?>
                    <?php echo ' File'?>
                    <button type="submit" class="btn btn-warning btn-xs" data-title="Download" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip">Download Example Excel File <i class="fas fa-download"></i>
                    </button>
                    <?php echo form_close();?>

                    <hr>



                    <form method="post" id="import_form" enctype="multipart/form-data">
                        <p><label>Select Excel File to Upload</label>

                            <BR>
                            <input type="file" name="file" id="file"  required accept=".xls, .xlsx" /></p>
                        <input type="text" readonly hidden name="form_id" value=<?php echo $form_id;?> />
                        <input type="text" readonly hidden name="event_id" value=<?php echo $event_id;?> />
                        <br />
                        <input type="submit" id="button1" name="import" value="Import" onclick="enableButton2()" class="btn btn-info" />
                    </form>
                    <br>
                    <br>
                    <?php
                    ?>
                    <div class="alert alert-dismissible alert-danger">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Check Duplicates !!</strong> <a href="#" class="alert-link">Click Manage Duplicates</a> to check Duplicates.
                    </div>
                    <br>
                    <form action="<?php echo base_url();?>adminController/check_duplicates" method="POST">
                    <button type="submit" class="btn btn-danger" id="button2" value="button 2" disabled>Manage Duplicates</button>
                    </form>
                    <br />
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
    $(document).ready(function(){

        load_data();

        function load_data()
        {

        }

        $('#import_form').on('submit', function(event){
            event.preventDefault();
            $.ajax({
                url:"<?php echo base_url(); ?>adminController/import",
                method:"POST",
                data:new FormData(this),
                contentType:false,
                cache:false,
                processData:false,
                success:function(data){
                    $('#file').val('');
                    alert(data);
                }
            })
        });

    });
</script>
<script>
    function enableButton2() {
        document.getElementById("button2").disabled = false;
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




