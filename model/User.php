<?php

Class User{

	public function login($username,$password){

		$con = mysqli_connect("localhost","root","","expense");
		$qry="select uid from user where email='".$username."' and "."password='".$password."'";
		echo $qry;
		$result=mysqli_query($con,$qry);

		if(mysqli_num_rows($result)){
			while($row=mysqli_fetch_assoc($result)){
				$_SESSION['id']=$row["uid"];
				return $_SESSION['id'];
			}
			
		}
	}

	public function reset($username,$token,$date){
		echo $token;
		$con = mysqli_connect("localhost","root","","expense");
		$qry="update user set token='".$token."',t_date='".$date."' where email = '".$username."'";
		echo $qry;
		$result=mysqli_query($con,$qry);

	}

	public function check($username,$token,$date){
		echo $token;
		$con = mysqli_connect("localhost","root","","expense");
		$qry="select uid from user where email='".$username."' and token='".$token."' and t_date<(select DATE_ADD('".$date."', INTERVAL 15 MINUTE))";
		echo $qry;
		$result=mysqli_query($con,$qry);
		$data=mysqli_fetch_assoc($result);

		return $data['uid'];

	}
	public function change_password($id,$password){
		
		$con = mysqli_connect("localhost","root","","expense");
		$qry="update user set password='".$password."' where uid = '".$id."'";
		echo $qry;
		$result=mysqli_query($con,$qry);

	}
}


?>