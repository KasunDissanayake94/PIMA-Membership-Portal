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

        <?php
        foreach($event_det as $row)
        {
            $event_id = $row->id;
            $event_title = $row->title;
            $event_date = $row->date;
            $event_venue = $row->venue;
        }
        ?>

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#"><?php echo $event_title?></a>
                </li>
                <li class="breadcrumb-item active">Participants</li>
            </ol>

            <form id="demoForm" action="<?php echo base_url();?>adminController/createMainGroup?event_id=<?php echo $event_id?>" method="POST">
            <div class="form-group row">
                <div class="col-3">
                    <label><input type="checkbox" class="select-all"> Select all students</label>
                </div>
                <div class="col-6">
                </div>
                <div class="col-3">
                    <button type="button" class="btn btn-dark btn-block" data-toggle="modal" data-target="#exampleModalLong">Create Group</button>
            </div>

                <!-- create group modal -->
                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Create group</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <div class="jumbotron">
                        <label><b>New Group</b></label>
                        <div class="form-group">
                            <label>Group Title:</label>
                            <input type="text" name="title" class="form-control" id="grouptitle">
                        </div>
                        <div class="form-group">
                            <label>Tele Marketing Executive:</label>
                            <select name="tme" class="form-control" id="sel1">
                            <?php
                                foreach($TLEs->result() as $row)
                                {
                                    echo "<option value=\"$row->id\">$row->first_name $row->last_name</option>";
                                }
                            ?>
                            </select>
                        </div>
                        <input type="submit" name="newgroup" value="Create group" class="btn btn-outline-secondary btn-block">
                    </div>
                    <label><b>Add to existing group</b></label>
                    <div class="form-group">
                        <label>Select Group:</label>
                        <select name="group_id" class="form-control" id="sel1">
                            <?php
                                foreach($main_groups->result() as $row)
                                {
                                    echo "<option value=\"$row->id\">$row->title</option>";
                                }
                            ?>
                            </select>
                        <?php
                            // foreach($main_groups->result() as $row)
                            // { 
                            //     echo"
                            //     <ul class=\"list-group list-group-flush\">
                            //     <li class=\"list-group-item d-flex justify-content-between align-items-center\">$row->title
                            //     <input type=\"radio\" name=\"group_id\" value=\"$row->id\">
                            //     </li>
                            //     </ul>";
                            // }
                        ?>
                    </div>
                    <input type="submit" name="submittwo" value="Add to selected group" formaction="<?php echo base_url();?>adminController/addToExistingGroup?event_id=<?php echo $event_id?>" class="btn btn-outline-dark btn-block" >
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <hr>

            <!-- student table -->

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                            <tr>
                                <th>Full name</th>
                                <th>Email</th>
                                <th>Telephone</th>
                                <th>Select</th>
                            </tr>
                    </thead>
                    <?php

                    if($participants->num_rows() >0)
                    {
                        foreach($participants->result() as $row)
                        {
                            echo "
                            <tr>
                                <td>$row->first_name $row->last_name</td>
                                <td>$row->email</td>
                                <td>$row->mobile_number</td>
                                ";
                            if(empty($row->group_id))
                            {
                                echo "
                                <td><input type=\"checkbox\" name=\"student_id[]\" value=\"$row->id\" class=\"list-item-checkbox\"></td>
                            </tr>
                                ";
                            }
                            else
                            {
                                echo "
                                <td>allocated</td>
                            </tr>
                                ";
                            }
                        }
                    }

                    ?>
                </table>
            </div>
            </form>

            <!-- Area Chart Example-->
            
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
$('.select-all').click(function(e){
  var checked = e.currentTarget.checked;
  $('.list-item-checkbox').prop('checked', checked);
  countChecked((checked) ? 20 : 0);
});

var lastChecked = null;
$('.list-item-checkbox').click(function(e){
  var selectAllChecked = $('.select-all:checked').length ? true : false;
  console.log(selectAllChecked)

  if (selectAllChecked) {
    var itemsTotal = $('.list-item-checkbox').length;
    var uncheckedItemsTotal = itemsTotal - checkedItemsTotal();
    var selected = 20 - uncheckedItemsTotal;
    countChecked(selected);
  } else {
    countChecked();
  }

  if(!lastChecked) {
    lastChecked = this;
    return;
  }  

  if(e.shiftKey) {
    var from = $('.list-item-checkbox').index(this);
    var to = $('.list-item-checkbox').index(lastChecked);

    var start = Math.min(from, to);
    var end = Math.max(from, to) + 1;

    $('.list-item-checkbox').slice(start, end)
      .filter(':not(:disabled)')
      .prop('checked', lastChecked.checked);
    countChecked();
  }
  lastChecked = this;

  if(e.altKey){

    $('.list-item-checkbox')
      .filter(':not(:disabled)')
      .each(function () {
      var $checkbox = $(this);
      $checkbox.prop('checked', !$checkbox.is(':checked'));
      countChecked();

    });
  }  

});
function countChecked(number){
  number = number ? number : checkedItemsTotal();
  $('#counter-selected').html(number);
}

function checkedItemsTotal(){
  return $('.list-item-checkbox:checked').length;
}
</script>

<script>
$(document).ready(function(){
    $("button").click(function(){
		if ($('input:checkbox').filter(':checked').length < 1){
        alert("Select atleast one student to create a group");
		return false;
		}
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




