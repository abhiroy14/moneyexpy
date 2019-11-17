<?php 


Class Expense{

	public $num;
	public $eid;
	public $cid;
	public $e_name;
	public $e_amount;
	public $e_detail;
	public $date;
	public $username;
	public $expense;
	public $income;
	public $balance;

	public function __construct($id){
		$this->cid=$id;
		//echo $this->cid;
	}

	public function get_exp(){
		$con = mysqli_connect("localhost","root","","expense");
		$qry = "select SUM(e_amount) amount from expense where e_amount<0 and cid='".$this->cid."'";
		//echo $qry;
		$run = mysqli_query($con,$qry);
		$row=mysqli_fetch_assoc($run);
		$this->expense = $row['amount'];


		$qry = "select SUM(e_amount) amount from expense where e_amount>0 and cid='".$this->cid."'";
		//echo $qry;
		$run = mysqli_query($con,$qry);
		$row=mysqli_fetch_assoc($run);
		$this->income = $row['amount'];


		$this->balance=$this->income+$this->expense;
	}

	public function get_name(){
		$con = mysqli_connect("localhost","root","","expense");
		$qry = "select c_name from username where cid='".$this->cid."'";
		//echo $qry;
		$run = mysqli_query($con,$qry);
		if($this->num=mysqli_num_rows($run)){
			while($row=mysqli_fetch_assoc($run)){
				$this->username = $row["c_name"];
			}
		}
	}


	public function detail(){

		$this->get_exp();

		$con = mysqli_connect("localhost","root","","expense");
		$qry = "select * from expense where cid='".$this->cid."' order by date DESC";
		//echo $qry;
		$run = mysqli_query($con,$qry);

		if($this->num=mysqli_num_rows($run)){
			while($row=mysqli_fetch_assoc($run)){
				$this->eid[] = $row["eid"];
				
				$this->e_name[] = $row["e_name"];
				$this->e_amount[] = $row["e_amount"];
				$this->e_detail[] = $row["e_detail"];
				$this->date[] = $row["date"];


			}
		}	
	}

	public function get_detail($eid){

		$con = mysqli_connect("localhost","root","","expense");
		$qry = "select * from expense where eid='".$eid."'";
		//echo $qry;
		$run = mysqli_query($con,$qry);

		if($this->num=mysqli_num_rows($run)){
			$row=mysqli_fetch_assoc($run);
				$this->eid = $row["eid"];
				
				$this->e_name = $row["e_name"];
				$this->e_amount = $row["e_amount"];
				$this->e_detail = $row["e_detail"];
				$this->date = $row["date"];


			
		}	
	}


	public function add_exp($id,$name,$amount,$detail,$date){

		$con = mysqli_connect("localhost","root","","expense");
		$qry = "insert into expense(cid,e_amount,e_name,e_detail,date) values ('".$id."','".$amount."','".$name."','".$detail."','".$date."')";
		//echo $qry;
		$run = mysqli_query($con,$qry);

	}

	public function edit_exp($id,$name,$amount,$detail,$date){
		
		$con = mysqli_connect("localhost","root","","expense");
		$qry = "update expense set e_amount='".$amount."',e_name='".$name."',e_detail='".$detail."',date='".$date."' where eid='".$id."'";
		//echo $qry;
		$run = mysqli_query($con,$qry);

	}


	public function delete_exp($id){
		$con = mysqli_connect("localhost","root","","expense");
		$qry = "delete from expense where eid='".$id."'";
		$run = mysqli_query($con,$qry);	
	}



}

 ?>