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
                <li class="breadcrumb-item active">Select The Questionnaire</li>
            </ol>



            <!-- Area Chart Example-->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-chart-area"></i>
                    Select Questionnaire</div>
                <div class="card-body">








<div class="container">
<h4><?php echo $this->session->flashdata('noOptions');?></h4>
<h4><?php echo $this->session->flashdata('newoptionnotsaved');?></h4>
    <!-- show the current form coums just created -->
    <?php echo form_open_multipart('newformquestion/saveFormFieldNameAndType');?>
   
    
  <h1><label>Add New Fields To The Questionnaire</label> <br></h1>
  <!-- change the existing field's options -->
  

    <?php $itemsInTheRow = 0; ?>
    <?php foreach($currentKeyNames as $item ){?>  
        
        <?php if(($itemsInTheRow % 7)==0 ){?>
            <?php echo "\n";?>

        <?php }?>
     
        <label class="checkbox-inline"><?php echo $item->name;?></label><input  type="checkbox" name="checkboxarr[]" value="<?php echo $item->id;?>" />
        &nbsp; &nbsp; &nbsp;  &nbsp; 
        <?php $itemsInTheRow++;?>
    
    <?php }?>
   
   
    <div id="newElement"></div>
   
	 
       
<input type="text" name="form_id" value="<?php echo $form_id?>" hidden> 
<input type="text" name="new_field_count" id="inputField" hidden > 




 <input class="btn btn-primary" type="submit" name="formSubmit" value="SAVE" />	

	<?php echo form_close();?><br>

   
    <br>
   


<div class="row-fluid">
    <div class="span12">
        <div style="overflow:hidden;width:90%;">
            <div style="display:inline-block;width:100px">
			
				<form method="" action="<?php  echo base_url(); ?>newformquestion/changeOptionView/<?php echo $form_id?>">
					<button class="btn btn-success" id="submit-buttons" type="submit" ​​​​​>Change Fields</button>
				</form>
			</div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            <div style="display:inline-block;width:100px">
			<button class="btn btn-primary" id="addBtn">Add More</button>
			</div>

            <div style="display:inline-block;width:100px">
			<input class="btn btn-primary" type="button" value="Remove Last Field" onclick="removeDiv()"> 
			</div>
           
        </div>
    </div>
</div>


</div>

<p>
 <span id="changed"></span>
</p>

<p>
  <div id="testing"></div>
</p>
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





<script type="text/javascript">
    


var newElement = document.querySelector('#newElement');
var x = document.querySelector('#addBtn');
var count = 0; 
var newFieldCount = 0;
var currentField = 0;
var initialDropNum = 0;

x.addEventListener('click',function(){
  
    currentField = newFieldCount;
    
	var container = document.createElement("div");
	container.innerHTML = 'Name: <input class="form-control" type="text" name="oparr['+count+']['+0+']" value=""  required  placeholder="Enter field name"><br>'+
    ' Type: <select name="oparr['+count+']['+1+']" class="form-control" id="enterType'+newFieldCount+'" onchange="changeType('+currentField+','+initialDropNum+')" >'+
    ' <option  value="textbox" selected >textbox</option><option value="dropdown">dropdown</option><option value="checkbox">checkbox</option></select><br>'+
    '<div id="div'+newFieldCount+'"> </div><hr style="width: 100%; color: black; height: 1px; background-color:black;" />'
	;
	document.getElementById("newElement").appendChild(container); 

    count++;
    newFieldCount++;
    // document.getElementById('inputField').value = count;
})





// get the value if selectd the dropdown
var changedText = document.getElementById('changed');
function listQ(){

    changedText.textContent = this.value;
}
document.getElementById("list").onchange = listQ;





// when the drop down is clicked, do something realated to type selected
function changeType(currentField,initialDropNum) {
    initialDropNum++;
    var divId = 'div'+ currentField.toString();
  
    var textType = 'enterType' +  currentField.toString();
    if(document.getElementById(textType).value == 'dropdown' || 'checkbox'){
        var container = document.createElement("div");
		container.innerHTML = '<input class="form-control" type="text" value=""  placeholder="Enter field options" name="oparr['+currentField+'][]" ><span> </span><input class="btn btn-primary" type="button" value="+" onclick="changeType('+currentField+','+initialDropNum+')"><br>'
		document.getElementById(divId).appendChild(container); 
		// -------
        // document.getElementById(divId).innerHTML += '<input class="form-control" type="text" value="'+initialDropNum+'" name="oparr['+currentField+'][]" ><span> </span><input class="btn btn-primary" type="button" value="+" onclick="changeType('+currentField+','+initialDropNum+')"><br>';
    
    }else{
        document.getElementById(divId).textContent = "";
    };
    // document.getElementById(divId).innerHTML += 'OPTIONS <input type="text" >';
    // var x = document.getElementByID(divId).textContent = "lsdjfsdl";


}
function removeDiv(){
	var todoList=document.getElementById("newElement")
	todoList.removeChild(todoList.lastElementChild);
}



</script>

</body>
</html>
