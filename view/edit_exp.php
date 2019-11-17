<div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Expense</h4>
        </div>
        <div class="modal-body">
          
          <form action="index2.php?action=expense" method="post">
            <input type="text" name="id" hidden="true" value="<?=$_GET['eid']?>">
            <input class="form-control" type="date"  name="date"><br>

            <input class="form-control" type="text" name="e_name" value="<?php echo $obj->e_name; ?>"><br>
            
            <input class="form-control" type="text" name="e_detail" value="<?php echo $obj->e_detail; ?>"><br>
            
            <input class="form-control" type="number" name="e_amount" value="<?php echo $obj->e_amount; ?>"><br>

            <input type="submit" name="edit_exp" class="btn btn-danger">

          </form>


        </div>
      
      </div>
      