<?php
include_once("sessionuser.php");
include_once("top.php");
?>
<?php
	$act = !empty($_GET['act']) ? trim($_GET['act']) : '';
	if($act == 'edit')
	{
		$pwd = !empty($_POST['p2']) ? md5(md5(trim($_POST['p2']))) : '';
		if($pwd==""){
			echo "<script>alert('Password unchanged, please use the original password!');location.href='usercenter.php';</script>";
			}
		else
		{
			mysqli_query($conn, "update usermember set pwd='$pwd'");
			echo "<script>alert('Modification successful!');location.href='usercenter.php';</script>";
			}
	}
	$sql=mysqli_query($conn, "select * from usermember where name='".$_SESSION['username']."'");
	$row=mysqli_fetch_array($sql);
?>
<link href="css/page.css" rel='stylesheet' type='text/css' />
<script language="javascript">
function check(){
	if(document.getElementById("p1").value!=document.getElementById("p2").value){
		alert("The passwords entered twice do not match.");
		return false;
	}
}
</script>
<div class="height2"></div>
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<ul class="breadcrumb">
				<li><span class="glyphicon glyphicon-home"></span> User Center</li>
				
			</ul>
			<div class="panel panel-default">
				<div class="panel-body">
				<div class="height2"></div>
                <center><h3>User Password Modification</h3></center>
                <div class="height2"></div>
                <form class="form-horizontal" method="post" role="form" name="form1"  action="?act=edit" onSubmit="return check();">
                    <div class="form-group">
                        <label for="firstname" class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="usernc" id="usernc" placeholder="Username cannot be modified" value="<?php echo $row['name'];?>"  readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">User Password</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" name="p1" id="p1" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">Confirm Password</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" name="p2" id="p2" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Modify</button>
                        </div>
                    </div>
                </form>
				</div>
			</div>
		</div>

	</div>
</div>
