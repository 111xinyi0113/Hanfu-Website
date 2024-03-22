<?php
include_once("sessionuser.php");
include_once("top.php");

?>
<?php
	$act = !empty($_GET['act']) ? trim($_GET['act']) : '';
	if($act == 'add')
	{
		$sql=mysqli_query($conn, "select * from usermember where name='".$_SESSION['username']."'");
		$row=mysqli_fetch_array($sql);
		$dingdanhao=date("YmjHis").$row['id'];
		$spc=$_SESSION['producelist'];
		$slc= $_SESSION['quatity'];
		$shouhuoren= !empty($_POST['truename']) ? trim($_POST['truename']) : '';
		$sex= !empty($_POST['sex']) ? trim($_POST['sex']) : '';
		$dizhi = !empty($_POST['dizhi']) ? trim($_POST['dizhi']) : '';
		$youbian = !empty($_POST['yb']) ? trim($_POST['yb']) : '';
		$tel = !empty($_POST['tel']) ? trim($_POST['tel']) : '';
		$email = !empty($_POST['email']) ? trim($_POST['email']) : '';
		$shff = !empty($_POST['shff']) ? trim($_POST['shff']) : '';
		$zfff = !empty($_POST['zfff']) ? trim($_POST['zfff']) : '';
		$leaveword = !empty($_POST['ly']) ? trim($_POST['ly']) : '';
 		$xiadanren=$_SESSION['username'];
 		$zt="No action taken";
 		$total=$_SESSION['total'];
		 mysqli_query($conn, "insert into dingdan(dingdanhao,spc,slc,shouhuoren,sex,dizhi,tel,email,zfff,leaveword,xiadanren,zt,total) values ('$dingdanhao','$spc','$slc','$shouhuoren','$sex','$dizhi','$tel','$email','$zfff','$leaveword','$xiadanren','$zt','$total')"); 
		 header("location:gouwu2.php?dingdanhao=$dingdanhao");
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
		alert("Please enter your delivery address");
		return false;}
	if(document.getElementById("tsda").value==""){
		alert("Please enter the password hint answer");
		return false;}
	var mobile=document.getElementById("tel").value;
		if(mobile.length==0) 
       { 
          alert('Please enter your phone number!'); 
          return false; 
       }     
       if(mobile.length!=11) 
       { 
           alert('Please enter a valid phone number!');
           return false; 
       } 
        
       var myreg = /^(((13[0-9]{1})|(14[0-9]{1})|(15[0-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
       if(!myreg.test(mobile)) 
       { 
           alert('Please enter a valid phone number!');
           return false; 
       }
}

</script>
<div class="height2"></div>
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<ul class="breadcrumb">
				<li><span class="glyphicon glyphicon-home"></span> <a href="/"> Home</a></li>
				<li>Fill in the delivery information</li>
			</ul>
			<div class="panel panel-default">
				<div class="panel-body">
				<div class="height2"></div>
                <center><h3>Fill in the delivery information</h3></center>
                <div class="height2"></div>
                <form class="form-horizontal" method="post" role="form" name="form1"  action="?act=add" onSubmit="return check();">
                    <div class="form-group">
                        <label for="firstname" class="col-sm-2 control-label">Recipient's Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="truename" id="truename" placeholder="Recipient's Name" value="<?php echo $row['truename'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">Gender</label>
                        <div class="col-sm-10">
                            <select name="sex" class="form-control">
                              <option selected value="Male">Male</option>
                              <option value="Female">Female</option>
                              <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">Phone Number</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="tel" id="tel" placeholder="Please enter your phone number" value="<?php echo $row['tel'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="firstname" class="col-sm-2 control-label">E-mail</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="email" id="email" placeholder="Enter E-mail" value="<?php echo $row['email'];?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">Delivery Address</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="dizhi" id="dizhi" placeholder="Please enter the address" value="<?php echo $row['dizhi'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">Payment Method</label>
                        <div class="col-sm-10">
                            <select name="zfff" class="form-control">
                              
                              <option value="PayPal">PayPal</option>
                             
                              <option value="Card">Card</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">Leave a Message</label>
                        <div class="col-sm-10">
                            <textarea name="ly" cols="70" rows="5" class="form-control"></textarea>
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


<?php
 $dingdanhao = !empty($_GET['dingdanhao']) ? trim($_GET['dingdanhao']) : '';
 if($dingdanhao!="")
  {  $dd=$dingdanhao;
	if(!session_id()) session_start();
	$array=explode("@",$_SESSION['producelist']);
	 $sum=count($array)*20+260;
    echo "<script>alert('订购成功！');location.href='showorder.php?dd='+'".$dd."';</script>";
  }
?>