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
                <li class="breadcrumb-item active">Assign User Access</li>
            </ol>



            <!-- Area Chart Example-->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-chart-area"></i>
                    Assign User Role Form</div>
                <div class="card-body">

                    <?php if($this->session->flashdata('register_success')):  ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $this->session->flashdata('register_success');?>
                        </div>
                    <?php endif;?>

                    <?php if($this->session->flashdata('register_failed')):  ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $this->session->flashdata('register_failed');?>
                        </div>
                    <?php endif;?>
                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="POST" class="form-inline my-2 my-lg-0">
                                <input class="form-control mr-sm-2" type="text" name="search_name" id="search_name" placeholder="Search by User Name" aria-label="Search">
                                <input class="form-control mr-sm-2" type="text" name="search_designation" id="search_designation" placeholder="Search by User Type" aria-label="Search">
                            </form>
                            <br />
                            <div id="result"></div>


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
<script>
    $(document).ready(function(){
        var search_name='';
        var search_designation='';
        var search_mobile='';
        load_data();
        function load_data()
        {
            $.ajax({
                url:"<?php echo base_url(); ?>userSearch/fetch1",
                method:"POST",
                data:{data1:search_name,data2:search_designation,data3:search_mobile},
                success:function(data){
                    $('#result').html(data);
                }
            })
        }


        $('#search_name').keyup(function(){
            search_name = $(this).val();
            load_data()

        });
        $('#search_designation').keyup(function(){
            search_designation = $(this).val();
            load_data()
        });
        $('#search_mobilenumber').keyup(function(){
            search_mobile = $(this).val();
            load_data()
        });
    });
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




