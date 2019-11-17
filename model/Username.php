<?php  

Class Username{
	public $id;
	public $num;
	public $c_name;
	public $uid;
	public $cid;

	public $expense;
	public $income;
	public $balance;

	public $e_amount;

	public $demo;

	public function __construct($uid){
		$this->id=$uid;
	}

	public function detail(){
		
		$this->get_exp();
		

		$con = mysqli_connect("localhost","root","","expense");
		$qry = "select u.uid,u.cid,u.c_name,e.amount from username u left join (SELECT cid,sum(e_amount) amount from expense GROUP by cid) e on e.cid=u.cid where uid='".$this->id."'";
		//echo $qry;
		$run = mysqli_query($con,$qry);

		if($this->num=mysqli_num_rows($run)){
			while($row=mysqli_fetch_assoc($run)){

				$this->uid[] = $row["uid"];
				$this->cid[] = $row["cid"];
				$this->c_name[] = $row["c_name"];
				$this->e_amount[] = $row["amount"];

			}


		}

		
	}


	public function get_exp(){
		$con = mysqli_connect("localhost","root","","expense");
		$qry = "select SUM(e_amount) amount from expense e join (select ur.cid from username ur join user u on u.uid=ur.uid where u.uid='".$this->id."') u where e_amount<0 and u.cid=e.cid";
		//echo $qry;
		$run = mysqli_query($con,$qry);
		$row=mysqli_fetch_assoc($run);
		$this->expense = $row['amount'];


		$qry = "select SUM(e_amount) amount from expense e join (select ur.cid from username ur join user u on u.uid=ur.uid where u.uid='".$this->id."') u where e_amount>0 and u.cid=e.cid";
		//echo $qry;
		$run = mysqli_query($con,$qry);
		$row=mysqli_fetch_assoc($run);
		$this->income = $row['amount'];


		$this->balance=$this->income+$this->expense;
	}


	public function add_name($name,$id){

		$con = mysqli_connect("localhost","root","","expense");
		$qry = "insert into username(c_name,uid) values ('".$name."','".$id."')";
		$run = mysqli_query($con,$qry);

	}
	public function edit_name($name,$id){

		$con = mysqli_connect("localhost","root","","expense");
		$qry = "update username set c_name='".$name."' where cid='".$id."'";
		$run = mysqli_query($con,$qry);

	}

	public function delete_name($id){
		$con = mysqli_connect("localhost","root","","expense");

		$qry = "delete from expense where cid='".$id."'";
		$run = mysqli_query($con,$qry);	
		
		$qry = "delete from username where cid='".$id."'";
		$run = mysqli_query($con,$qry);	
	}
}



?>