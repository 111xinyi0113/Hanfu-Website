<?php
include_once("top.php");
?>
<?php
	$act = !empty($_GET['act']) ? trim($_GET['act']) : '';
	if($act == 'login')
	{
		$name = !empty($_POST['usernc']) ? trim($_POST['usernc']) : '';
		$pwd = !empty($_POST['p1']) ? md5(md5(trim($_POST['p1']))) : '';
		$sql=mysqli_query($conn, "select * from usermember where name='".$name."'");
		$row=mysqli_fetch_array($sql);
		 if($row==false){
			  echo "<script language='javascript'>alert('User does not exist!');history.back();</script>";
			  exit;
		   }
		  else{
			  if($row['dongjie']==1){
				   echo "<script language='javascript'>alert('This user has been frozen!');history.back();</script>";
				   exit;
				}
			  //echo $pwd;
			  //echo "<br>";
			  //echo $row['pwd'];
			 // die;
			  if($row['pwd']==$pwd)
				{
				   $_SESSION['username']=$row['name'];
				   echo "<script>alert('Login successful!');location.href='usercenter.php';</script>";
				}
			  else {
				 echo "<script language='javascript'>alert('Incorrect password entered!');history.back();</script>";
				 exit;
			   }
	
		  } 
	}
?>
<link href="css/page.css" rel='stylesheet' type='text/css' />
<script language="javascript">
function check(){
	if(document.getElementById("usernc").value==""){
		alert("Please enter your account");
		return false;
		}
	if(document.getElementById("p1").value==""){
		alert("Please enter your password");
		return false;
	}
}
</script>
<div class="height2"></div>
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<ul class="breadcrumb">
				<li><span class="glyphicon glyphicon-home"></span> User Login</li>
				
			</ul>
			<div class="panel panel-default">
				<div class="panel-body">
				<div class="height2"></div>
                <center><h3>User Login</h3></center>
                <div class="height2"></div>
                <form class="form-horizontal" method="post" role="form" name="form1"  action="?act=login" onSubmit="return check();">
                    <div class="form-group">
                        <label for="firstname" class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="usernc" id="usernc" placeholder="Please enter your username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" name="p1" id="p1" placeholder="Please enter your password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Log In</button>
                        </div>
                    </div>
                </form>
				</div>
			</div>
		</div>
<?php

?>
	</div>
</div>

