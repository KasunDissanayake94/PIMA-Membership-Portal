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
                <li class="breadcrumb-item active">Create Form</li>
            </ol>



            <!-- Area Chart Example-->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-chart-area"></i>
                    Create Form</div>
                <div class="card-body">







<div class="container">
<h4><?php echo $this->session->flashdata('newoptionsaved');?></h4>
<h4><?php echo $this->session->flashdata('newoptionnotsaved');?></h4>

<p class="h2 font-weight-bold">TEXT FIELDS</p>
<div class="row">
<?php if(isset($textFields)){?>
<?php foreach($textFields as $item ){?>  
      
             <div class="col-md-3 font-weight-bold">
             <?php echo  $item->name; ?>
   
             </div>
   
    <?php }?>
<?php }else{?>
	<div class="alert alert-success  text-center">  No Existing TEXT Fields.....</div>
    <?php }?>
    </div>



    <!-- dropdown itms -->
    <p class="h2 font-weight-bold">DROPDOWN FIELDS</p>
  
    
<?php if(isset($dropdown)) {?>


    <?php $rowCount = 0; ?>
<?php foreach($dropdown as $item ){?>  
    <div class="row">
        <div class="col-md-3 font-weight-bold">
            <?php echo  $item->name; ?>
            <?php $form_element_id  = $item->id; ?>
            <?php $name=  $item->name; ?>
        </div>

        <div class="col-md-3 form-group font-weight-bold">
            <select name="#" class="form-control">          
                    <?php 
     
                    $x =  $item->options; 
                        $options=str_split($x);
                        $singleOption = "";
                        foreach($options as $k ){
                            if($k != '_'){
                                $singleOption .= $k;
                            }else{ ?>
                            
                                <option value=""><?php echo $singleOption;?></option>
                            <?php
                                $singleOption = "";
                            }
                        
                        }
                    ?>                  
            </select> 
        </div>
        <div class="col-md-3">
        <a href="<?php echo base_url() ?>newform/saveNewOptions/<?php echo $form_element_id?>/<?php echo $name;?>/<?php echo $form_id;?>" class="btn btn-success">ADD MORE </a>
        </div>
    </div>

    <?php }?><br>



<?php }else{?>
	<div class="alert alert-success  text-center">  No Existing Drop Down Fields.....</div>
    <?php }?>


 <!-- ------------------------------------------ -->

    <!-- checkbox itms -->
    <p class="h2 font-weight-bold">CHECK BOXES</p>
    
<?php if(isset($checkbox)){?>


    <?php $rowCount = 0; ?>
<?php foreach($checkbox as $item ){?>  
    <div class="row">
        <div class="col-md-3 font-weight-bold">
            <?php echo  $item->name; ?>
            <?php $name=  $item->name; ?>
            <?php  $form_element_id  = $item->id; ?>
          
        </div>

        <div class="col-md-3 form-group font-weight-bold">
            <select name="#" class="form-control">          
                    <?php 
       
                    $x =  $item->options; 
                        $options=str_split($x);
                        $singleOption = "";
                        foreach($options as $k ){
                            if($k != '_'){
                                $singleOption .= $k;
                            }else{ ?>
                            
                                <option value=""><?php echo $singleOption;?></option>
                            <?php
                                $singleOption = "";
                            }
                        
                        }
                    ?>                  
            </select> 
        </div>
        <div class="col-md-3">
    
        <a href="<?php echo base_url() ?>newform/saveNewOptions/<?php echo $form_element_id?>/<?php echo $name;?>/<?php echo $form_id;?>" class="btn btn-success">ADD MORE </a>
        </div>
    </div>

    <?php }?><br>



<?php }else{?>
	<div class="alert alert-success  text-center">  No Existing Check Box Fields.....</div>
    <?php }?>
    <a href="<?php echo base_url() ?>newform/select_form/<?php echo $form_id;?>" class="btn btn-primary">BACK</a>
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


<script type="text/javascript">







</script>
</html>
