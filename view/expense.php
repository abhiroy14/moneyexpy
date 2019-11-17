<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
	<title>Expense Sheet</title>
</head>
<body>
  

  <a href="index.php" class="btn btn-primary">Back</a>
<br>
<div class="container">
    <div class="row">
   
    
        <div class="col-md-8 col-md-offset-1">

            <div class="panel panel-default panel-table">
              
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6" style="text-align: center;font-family: fantasy;font-size: x-large;">
                  	Expense Sheet of <?=$obj->username ?>
                    
                  </div>
                  <div class="col col-xs-6 text-right">
                  	
                    <a href="" class="btn btn-primary btn-default btn-rounded mb-4" data-toggle="modal" data-target="#myModal1">ADD</a>
                  </div>
                  <div class="col col-md-3 " ><label>Expense:</label><?=$obj->expense?></div>
                  <div class="col col-md-3" ><label>Income:</label><?=$obj->income?></div>
                  <div class="col col-md-3" ><label>Balance:</label><?=$obj->balance?></div>
                </div>
              </div>

              <div class="panel-body col-md-12">
                <table class="table table-hover table-list">
                  <tbody>

                  	<?php  
                    		for($i=0;$i<$obj->num;$i++){
                    	?>
                    	<tr>
                          
                          <td align="center" style="font-family: monospace;font-size: x-large;font-weight: 600;"><?=$obj->date[$i]?></td>

                          <td align="center" style="font-family: monospace;font-size: x-large;font-weight: 600;">
                          <?=$obj->e_name[$i]?></a>
                      		</td>
                      		<td align="center" style="font-family: monospace;font-size: x-large;font-weight: 600;"><?=$obj->e_amount[$i]?></td>

                          <td align="center" style="font-family: monospace;font-size: small;font-weight: 200;"><?=$obj->e_detail[$i]?></td>

                          <!--index2.php?cid=<?php echo $obj->cid[$i]; ?>-->
                            <td align="right">
                              <a href="" onclick="p_edit(<?=$obj->eid[$i]?>,
                                                        '<?=$obj->date[$i]?>',
                                                        '<?=$obj->e_name[$i]?>',
                                                        <?=$obj->e_amount[$i]?>,
                                                        '<?=$obj->e_detail[$i]?>')"

                                                          class="btn btn-default" data-toggle="modal" data-target="#myModal2"><em class="fa fa-pencil"></em></a>

                              <a href="index2.php?action=delete_exp&eid=<?php echo $obj->eid[$i]; ?>" onclick="return check_delete();" class="btn btn-danger"><em class="fa fa-trash"></em></a>
                            </td>
                            </tr>

                     <?php } ?>

                        </tbody>
                </table>
            
              </div>
              
            </div>

</div></div></div>

<script>

  function p_edit(id,date,name,amount,detail){

    
    document.getElementById('eid').value=id;
    document.getElementById('date').value=(date)date;
    document.getElementById('e_name').value=name;
    document.getElementById('e_amount').value=amount;
    document.getElementById('e_detail').value=detail;

    /*document.getElementById('date').placeholder=date;
    document.getElementById('e_name').placeholder=name;
    document.getElementById('e_amount').placeholder=amount;
    document.getElementById('e_detail').placeholder=detail;
*/

  }

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
</script>

<!-- ADD-->
<div class="container ">
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content col-md-6 col-md-offset-2">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Expense</h4>
        </div>
        <div class="modal-body">
        
          <form  action="index2.php?action=expense"  method="post">
            <input type="text" name="id" hidden="true" value="<?=$_SESSION['cid']?>">
          	<input class="form-control" type="date" name="date"><br>

          	<input class="form-control" type="text" name="e_name"  placeholder="food/fuel/chai/etc."><br>
            
            <input class="form-control" type="text" name="e_detail" placeholder="Extra-Note"><br>
            
            <input class="form-control" type="number" name="e_amount" placeholder="expense(eg: -200) / income(eg: 200)"><br>

          	<input type="submit"  name="add_exp" class="btn btn-danger">

          </form>


        </div>
      
      </div>
      
    </div>
  </div>
</div>
<!-- end-->


<!-- Edit-->
<div class="container ">
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content col-md-6 col-md-offset-2">
       <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Expense</h4>
        </div>
        <div class="modal-body">
          
          <form action="index2.php?action=expense" method="post">
            <input id="eid" type="text" name="id" hidden="true">
            <input id="date" class="form-control" type="date"  name="date"><br>

            <input id="e_name" class="form-control" type="text" name="e_name"><br>
            
            <input id="e_detail" class="form-control" type="text" name="e_detail" ><br>
            
            <input id="e_amount" class="form-control" type="number" name="e_amount" ><br>

            <input type="submit" name="edit_exp" class="btn btn-danger">

          </form>


        </div>
      
      </div>
       
    </div>
  </div>
</div>
<!-- end-->
</body>
</html>





