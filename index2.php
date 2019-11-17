<?php

session_start();

if(empty($_SESSION["id"])){
	
	include("view/login.php");

	if(isset($_POST["login"]))
	{
		
		include("model/User.php");
		$obj = new User();
		$_SESSION["id"]=$obj->login($_POST["username"],$_POST["password"]);
		header("location:index.php?action=consumer");
	}

}
else
{
	if(isset($_GET['id'])){$_SESSION['cid']=$_GET['id'];}

	include("model/Expense.php");
	$obj = new Expense($_SESSION['cid']);
	$obj->get_name();

	if(!isset($_GET["action"]))
	{
		$obj->detail();
		require_once("view/expense.php");
	}

	else if($_GET["action"]=="expense")
	{

		if(isset($_POST['edit_exp']))
		{
			$obj->edit_exp($_POST['id'],$_POST['e_name'],$_POST['e_amount'],$_POST['e_detail'],$_POST['date']);
			
		}
		
		else if(isset($_POST['add_exp']))
		{
			$obj->add_exp($_POST['id'],$_POST['e_name'],$_POST['e_amount'],$_POST['e_detail'],$_POST['date']);
			
		}

		$obj->detail();
		require_once("view/expense.php");
	}

	else if($_GET['action']=="popup")
	{

		$obj->get_detail($_GET['eid']);
		include("view/edit_exp.php");
	}

	else if($_GET["action"]=="delete_exp")
	{
		$obj->delete_exp($_GET["eid"]);
		$obj->detail();
		require_once("view/expense.php");

	}



	else if($_GET["action"]=="expense_sheet")
	{
		header("location:index2.php?id=".$_GET['id']."&name=".$_GET['name']."");
	}

	else if($_GET["action"]=="popup"){include("view/edit_name.php");}

	else if($_GET["action"]=="d"){session_destroy();header("location:index.php");}

	

}

?>