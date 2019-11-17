<?php
session_start();

if(empty($_SESSION["id"]))
{
	include("model/User.php");
	$obj = new User();
	if(isset($_GET['action']))
	{
		if($_GET['action']=="reset")
		{
			include("view/reset.php");
			if(isset($_POST['reset-password']))
			{
				$token=bin2hex(random_bytes(8));
				$obj->reset($_POST['email'],$token,date("Y-m-d,h-i-s"));
			}

		}

		else if($_GET['action']=="new_password")
		{
			include("view/new_password.php");
			if(isset($_POST['check']))
			{
				$id=$obj->check($_POST['email'],$_POST['token'],date("Y-m-d,h-i-s"));
				if(!empty($id)){
					header("location:index.php?action=new_password&v=$id");
				}
			}
			else if(isset($_POST['replace']))
			{
			$obj->change_password($_POST['id'],$_POST['password']);
			header("location:index.php");
			}

		}
	} 
	else
	{
		include("view/login.php");
		if(isset($_POST['login']))
		{
			$obj->login($_POST['username'],$_POST['password']);
			header("location:index.php");
		}
	}
}//end
else
{
	include("model/Username.php");
	$obj = new Username($_SESSION["id"]);

	if(!isset($_GET["action"]))
	{
		$obj->detail();
		require_once("view/consumer.php");
	}
	else if($_GET["action"]=="consumer")
	{

		if(isset($_POST['edit']))
		{
			$obj->edit_name($_POST['name'],$_POST['id']);
			
		}
		
		else if(isset($_POST['add']))
		{
			$obj->add_name($_POST['name'],$_SESSION['id']);
			
		}
			
		$obj->detail();
		require_once("view/consumer.php");
	}
	else if($_GET["action"]=="delete_name")
	{
		$obj->delete_name($_GET["id"]);
		$obj->detail();
		require_once("view/consumer.php");

	}
	else if($_GET["action"]=="expense_sheet")
	{
		header("location:index2.php?id=".$_GET['id']."&name=".$_GET['name']."");
	}

	else if($_GET["action"]=="popup")
	{
		
		include("view/edit_name.php");
	}

	else if($_GET["action"]=="d")
	{
		session_destroy();header("location:index.php");
	}
}
?>