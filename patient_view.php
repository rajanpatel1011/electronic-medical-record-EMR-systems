<!DOCTYPE html><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" id="font-awesome-style-css" href="http://phpflow.com/code/css/bootstrap3.min.css" type="text/css" media="all">
<link rel="stylesheet" type="text/css" href="layout.css">
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.1.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css"/>
	 
<script type="text/javascript" src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$( document ).ready(function() {
$('#patient_grid').DataTable({
				 "bProcessing": true,
         "serverSide": true,
         "ajax":{
            url :"response.php", // json datasource
            type: "post",  // type of method  ,GET/POST/DELETE
            error: function(){
              $("#employee_grid_processing").css("display","none");
            }
          }
        });   
});
</script>
</head><body>
	<div class="container">
      <div class="">
        <div class="">
<table id="patient_grid" class="display" width="90%" cellspacing="0">
 <thead> <tr>
        <td width="20" height="30" bgcolor="#CCCCCC"><strong><center>Patient id</center></strong></td>
    <td width="90" bgcolor="#CCCCCC"><strong><center>Name</center></strong></td>
    <td width="7" bgcolor="#CCCCCC"><strong><center>Sex</center></strong></td>
    <td width="20" bgcolor="#CCCCCC"><strong><center>Category</center></strong></td>
    <td width="50" bgcolor="#CCCCCC"><strong><center>Admission Date</center></strong></td>
    <td width="50" bgcolor="#CCCCCC"><strong><center>Discharge date</center></strong></td>
    <td width="80" bgcolor="#CCCCCC"><strong><center>Address</center></strong></td>
    <td width="5" bgcolor="#CCCCCC"><strong><center>Age</center></strong></td>
    <td width="50" bgcolor="#CCCCCC"><strong><center>Email</center></strong></td>
  </tr></thead>

</table>
</div>
      </div>

    </div>
    
</body>
</html>