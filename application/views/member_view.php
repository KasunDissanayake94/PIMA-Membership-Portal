<!DOCTYPE html>
<html>

<head>
  <!-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" /> -->
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" />
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.1/css/buttons.bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="style.css" />
</head>
<style>
/* Styles go here */

/* Column Filter row at top of table  */
.datatable tfoot {
  display: table-header-group;
}

.datatable tfoot .filter-column {
  width: 100% !important;
}
</style>



<body>
  <div class="container-fluid">
    <table class="datatable table table-hover table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>First Name</th>
      <th>Name In Full</th>
      <th>Mobile 1</th>
      <th>Mobile 2</th>
          <th>Address</th>
      <th>Official Email</th>

        </tr>
      </thead>
      <tfoot>
        <tr>
          <th></th>
          <th>
            <input type="text" class="form-control input-sm filter-column">
          </th>
          <th>
            <input type="text" class="form-control input-sm filter-column" />
          </th>
      <th>
            <input type="text" class="form-control input-sm filter-column">
          </th>
          <th>
            <input type="text" class="form-control input-sm filter-column" />
          </th>

      <th>
            <input type="text" class="form-control input-sm filter-column">
          </th>
          <th>
            <input type="text" class="form-control input-sm filter-column" />
          </th>


        </tr>
      </tfoot>
      <tbody>
    <?php foreach($userdata as $k){?>
        <tr>
          <td><?php echo $k->id;?></td>
          <td><?php echo $k->first_name;?></td>
      <td><?php echo $k->name_in_full;?></td>
          <td><?php echo $k->mobile_1;?></td>
      <td><?php echo $k->mobile_2;?></td>
          <td><?php echo $k->residence_address_1;?></td>
      <td><?php echo $k->official_email;?></td>
         
        </tr>
    <?php }?>
        
      </tbody>
    </table>
  </div>
  
  <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="//cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
  <!-- Responsive extension -->
  <script src="https://cdn.datatables.net/responsive/2.1.0/js/responsive.bootstrap.min.js"></script>
  <!-- Buttons extension -->
  <script src="//cdn.datatables.net/buttons/1.2.1/js/dataTables.buttons.min.js"></script>
  <script src="//cdn.datatables.net/buttons/1.2.1/js/buttons.bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
  <script src="//cdn.datatables.net/buttons/1.2.1/js/buttons.html5.min.js"></script>
  
  <script src="script.js"></script>


  <script>
 // Code goes here

var dataTable = $('.datatable').DataTable({
  buttons: [
    {
      extend: 'excel',
      text: 'Export to Excel',
      className: 'btn-sm btn-flat',
    },
  ],
  dom: "<'row'<'col-md-3'l><'col-md-6 text-center'B><'col-md-3'f>>" +
         "<'row'<'col-md-12'tr>>" +
         "<'row'<'col-md-5'i><'col-md-7'p>>",
  drawCallback: function(settings) {
    if (!$('.datatable').parent().hasClass('table-responsive')) {
      $('.datatable').wrap("<div class='table-responsive'></div>");
    }
  }
});

dataTable.columns().every(function() {
  var column = this;

  $('.filter-column', this.footer()).on('keyup change', function() {
    if (column.search() !== this.value) {
      column
        .search(this.value)
        .draw();
      this.focus();
    }
  });
}); 
  </script>
</body>

</html>
