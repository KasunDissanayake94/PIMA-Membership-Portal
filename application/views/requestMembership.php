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
                <li class="breadcrumb-item active">Membership Requests</li>
            </ol>



            <!-- Area Chart Example-->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-chart-area"></i>
                    Manage Requests</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr class="text-center">
                                <th scope="col">Membership ID</th>
                                <th scope="col">Title</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">NIC</th>
                                <th scope="col">See More</th>
                                <th scope="col">Delete Request</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            /* first we will make sure we have data to display. $users variable is actually the $data['users'] that we sent from the controller to the view... */
                            if($requests){
                                foreach ($requests as $perreq)
                                {
                                    echo "
                                                    <tr class=\"text-center\">

                        
                                <td>$perreq->id</td>
                                <td>$perreq->title</td>
                                <td>$perreq->name_in_full</td>
                                <td>$perreq->nic_no</td>
                                <td><a href='RegisterNewMember?user_id=$perreq->id'><button class=\"btn btn-primary btn-xs\" data-title=\"Delete\" data-toggle=\"modal\" data-target=\"#delete\" data-placement=\"top\" rel=\"tooltip\"><i class=\"fas fa-file-invoice\"></i>
</button></a></td>
<td><a class=\"dropdown-item\" href=\"#\" data-toggle=\"modal\" data-target='#RemoveRequestModal$perreq->id'><button class=\"btn btn-danger btn-xs\" data-title=\"Delete\" data-toggle=\"modal\" data-target=\"#delete\" data-placement=\"top\" rel=\"tooltip\"><i class=\"fas fa-trash\"></i>
</button></a></td>
                           </tr>                            
                           <!-- Remove Request Modal-->
<div class=\"modal fade\" id='RemoveRequestModal$perreq->id' tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\" id=\"exampleModalLabel\">Delete Request</h5>
                <button class=\"close\" type=\"button\" data-dismiss=\"modal\" aria-label=\"Close\">
                    <span aria-hidden=\"true\">×</span>
                </button>
            </div>
            <div class=\"modal-body\">Are you sure You want to Remove this Request??</div>
            <div class=\"modal-footer\">
                <button class=\"btn btn-secondary\" type=\"button\" data-dismiss=\"modal\">Cancel</button>
                <a class=\"btn btn-primary\" href=deleteRequest?user_id=$perreq->id>Remove</a>
            </div>
        </div>
    </div>
</div>

                        
                        ";

                                }
                            }


                            ?>

                            </tbody>
                        </table>
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
<!--Nav bar notification-->

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




