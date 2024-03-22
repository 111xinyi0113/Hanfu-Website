<?php
	include_once("top.php");
?>
<?php
	$act = !empty($_GET['act']) ? trim($_GET['act']) : '';
	if($act == 'add')
	{
		$name = !empty($_POST['usernc']) ? trim($_POST['usernc']) : '';
		$pwd = !empty($_POST['p2']) ? md5(md5(trim($_POST['p2']))) : '';
		$email = !empty($_POST['email']) ? trim($_POST['email']) : '';
		$truename = !empty($_POST['truename']) ? trim($_POST['truename']) : '';
		$dizhi = !empty($_POST['dizhi']) ? trim($_POST['dizhi']) : '';
		$tel = !empty($_POST['tel']) ? trim($_POST['tel']) : '';
		$dongjie=0;
		$sql4=mysqli_query($conn,"select * from usermember where name='".$name."'");
		$getcount=@mysqli_num_rows($sql4);
		if($getcount>0){
			echo "<script language='javascript'>alert('Username already exists, please choose another username!');history.back();</script>";
		}
		else
		{
			mysqli_query($conn,"insert into usermember (name,pwd,dongjie,email,truename,tel,dizhi) values ('$name','$pwd','$dongjie','$email','$truename','$tel','$dizhi')");
			$_SESSION['username'] = $name;
			echo "<script>alert('Congratulations, you have successfully registered!');window.location='usercenter.php';</script>";
		}
	}
?>
<link href="css/page.css" rel='stylesheet' type='text/css' />
<script type="text/javascript" src="js/checkuser.js"></script>
<script language="javascript">
function checkuser11(){
get(document.getElementById("usernc").value);
}

</script>
<script language="javascript">
function check(){   
    if(document.getElementById("usernc").value==""){
		alert("Please enter your username");
		return false;
		}
	if(document.getElementById("p1").value==""){
		alert("Please enter your password");
		return false;
	}
	if(document.getElementById("p2").value==""){
		alert("Please enter your password again");
		return false;
	}
	if(document.getElementById("p1").value!=document.getElementById("p2").value){
		alert("The passwords entered twice do not match");
		return false;
	}
	if(document.getElementById("email").value==""){
		alert("Please enter your email");
		return false;}
	if(document.getElementById("truename").value==""){
		alert("Please enter your name");
		return false;}
	if(document.getElementById("dizhi").value==""){
		alert("Please enter your shipping address");
		return false;}
	var mobile=document.getElementById("tel").value;
		if(mobile.length==0) 
       { 
          alert('Please enter your phone number!'); 
          return false; 
       }     
}
</script>
<div class="height2"></div>
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<ul class="breadcrumb">
				<li><span class="glyphicon glyphicon-home"></span> <a href="reg.php"> User Registration</a></li>
			</ul>
			<div class="panel panel-default">
				<div class="panel-body">
				
                <center><h3>User Registration</h3></center>
                
                <form class="form-horizontal" method="post" role="form" name="form1"  action="?act=add" onSubmit="return check();">
                    <div class="form-group">
                        <label for="firstname" class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="usernc" id="usernc" placeholder="Please enter your username" onchange="checkuser11();"><span id="usercheck" style="color:red;"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" name="p1" id="p1" placeholder="Please enter your password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">Confirm Password</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" name="p2" id="p2" placeholder="Please enter your password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="firstname" class="col-sm-2 control-label">E-mail</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="email" id="email" placeholder="Please enter your email">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">Phone Number</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="tel" id="tel" placeholder="Please enter your phone number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">Nickname</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="truename" id="truename" placeholder="Please enter your nickname">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">Shipping Address</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="dizhi" id="dizhi" placeholder="Please enter your shipping address">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">      Register</button>
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

