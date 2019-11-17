<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
	<title>Consumer List</title>
</head>
<body>

<a href="index.php" class="btn btn-primary btn-primary btn-rounded mb-4">RELOAD</a>
<a href="index.php?action=d" class="btn btn-primary btn-primary btn-rounded mb-4">logout</a>
<br>

<div class="container">
    <div class="row">
   
    
        <div class="col-md-5 col-md-offset-1">

            <div class="panel panel-default panel-table">
              
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6" style="text-align: center;font-family: fantasy;font-size: x-large;">
                  	Customer List
                    
                  </div>
                  <div class="col col-xs-6 text-right">
                  	
                    <a href="" class="btn btn-primary btn-default btn-rounded mb-4" data-toggle="modal" data-target="#myModal1">ADD</a>
                  </div>

                  <div class="col col-md-3 " ><label>Expense:</label><?=$obj->expense?></div>
                  <div class="col col-md-3" ><label>Income:</label><?=$obj->income?></div>
                  <div class="col col-md-3" ><label>Balance:</label><?=$obj->balance?></div>
                
                </div>
              </div>

              <div class="panel-body">
                <table class="table table-hover table-list">
                  <tbody>

                  	<?php  
                    		for($i=0;$i<$obj->num;$i++){
                    	?>
                    	<tr>
                          
                          <td align="center" style="font-family: monospace;font-size: x-large;font-weight: 600;">
                          <a href="index.php?action=expense_sheet&id=<?php echo $obj->cid[$i];?>&name=<?php echo $obj->c_name[$i]; ?>"><?=$obj->c_name[$i]?></a>
                      		</td>
                      		<td align="center" style="font-family: monospace;font-size: x-large;font-weight: 600;"><?=$obj->e_amount[$i]?></td>
                            <td align="right">
                            	
                          <a href="" onclick="edit_name(<?php echo $obj->cid[$i];?>,'<?php echo $obj->c_name[$i];?>')" class="btn btn-primary" data-toggle="modal" data-target="#myModal2"><em class="fa fa-pencil"></em></a>

                              <a href="index.php?action=delete_name&id=<?php echo $obj->cid[$i]; ?>" onclick="return check_delete();" class="btn btn-danger"><em class="fa fa-trash"></em></a>
                            </td>
                            </tr>

                     <?php } ?>

                        </tbody>
                </table>
            
              </div>
              
            </div>

</div></div></div>




<script>
	function check_delete(){
		var ans=confirm("Confirm to delete");
		if(ans==true){
			return true;
		}
		else{
			return false;
		}
			return false;

	}


  function edit_name(id,name){

    
    document.getElementById("p_name").placeholder=name;
    document.getElementById("p_id").value=id;


  }
</script>

 <!-- ADD NAME-->
<div class="container">
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Customer</h4>
        </div>
        <div class="modal-body">
          
          <form action="index.php?action=consumer" method="post">
          	
          	<input class="form-control" type="text" name="name" placeholder="xyz"><br>
          	<input type="submit" name="add" class="btn btn-danger">

          </form>


        </div>
      
      </div>
      
    </div>
  </div>
</div>

 <!-- END-->



 <!-- Edit Name-->
<div class="container">
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">demo</h4>
        </div>
        <div class="modal-body">
          
          <form action="index.php?action=consumer" method="post">
            
            <input id="p_name" class="form-control" type="text" name="name" ><br>
            <input id="p_id" class="form-control" type="hidden" name="id"><br>

            <input type="submit" name="edit" class="btn btn-danger">

          </form>


        </div>
      
      </div>
      
    </div>
  </div>
</div>

 <!-- END-->

</body>
</html>