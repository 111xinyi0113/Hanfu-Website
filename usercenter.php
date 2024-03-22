<?php
include_once("sessionuser.php");
include_once("top.php");
?>
<?php
	$act = !empty($_GET['act']) ? trim($_GET['act']) : '';
	if($act == 'edit')
	{
		$tel = !empty($_POST['tel']) ? trim($_POST['tel']) : '';
		$truename = !empty($_POST['truename']) ? trim($_POST['truename']) : '';
		$dizhi = !empty($_POST['dizhi']) ? trim($_POST['dizhi']) : '';
		$email = !empty($_POST['email']) ? trim($_POST['email']) : '';
		mysqli_query($conn, "update usermember set email='$email',truename='$truename',tel='$tel',dizhi='$dizhi'");
		echo "<script>alert('Modification Successful!');location.href='usercenter.php';</script>";
	}
	$sql=mysqli_query($conn, "select * from usermember where name='".$_SESSION['username']."'");
	$row=mysqli_fetch_array($sql);
?>
<link href="css/page.css" rel='stylesheet' type='text/css' />
<script language="javascript">
function check(){
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
				<li><span class="glyphicon glyphicon-home"></span> User Center</li>
				<li></li>
			</ul>
			<div class="panel panel-default">
				<div class="panel-body">
				
                <center><h3>User Information</h3></center>
                
                <form class="form-horizontal" method="post" role="form" name="form1"  action="?act=edit" onSubmit="return check();">
                    <div class="form-group">
                        <label for="firstname" class="col-sm-2 control-label">User Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="usernc" id="usernc" placeholder="Username cannot be modified" value="<?php echo $row['name'];?>"  readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="firstname" class="col-sm-2 control-label">E-Mail</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="email" id="email" placeholder="Please enter your email" value="<?php echo $row['email'];?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">Phone Number</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="tel" id="tel" placeholder="Please enter your phone number" value="<?php echo $row['tel'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">Nickname</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="truename" id="truename" placeholder="Please enter your nickname" value="<?php echo $row['truename'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">Shipping Address</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="dizhi" id="dizhi" placeholder="Please enter the address" value="<?php echo $row['dizhi'];?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Submit</button>
                        </div>
                    </div>
                </form>
				</div>
			</div>
		</div>
<?php
include_once("left.php");
?>
	</div>
</div>
