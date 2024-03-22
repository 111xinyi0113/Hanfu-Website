<?php
include_once("top.php");
$sql=mysqli_query($conn, "select * from admin where admin_name='".$_SESSION['sessionname']."'");
$info=mysqli_fetch_array($sql);
?>
<!-- 顶部 -->
<script type="text/javascript"> 
function check(){   
        if(document.form1.username.value==""){
		alert("Please enter the account");
		document.form1.username.focus();
		return false;}
	if(document.form1.password.value==""){
		alert("Please enter the password");
		document.form1.password.focus();
		return false;
	}
	if(document.form1.password2.value==""){
		alert("Please confirm the password");
		document.form1.password2.focus();
		return false;
	}
	if(document.form1.password.value!=document.form1.password2.value){
		alert("The passwords entered twice do not match");
		document.form1.password2.focus();
		return false;
	}
	
}
</script> 
<div id="middle">
     <?php
include_once("left.php");
?>
     <div class="right"  id="mainFrame">
     <div class="right_cont">
   <div class="title_right"><strong>Modify Administrator Information</strong></div>
   <table width="100%" border="0" cellpadding="6" cellspacing="0" bgcolor="#BCE8B5" class="table table-bordered">
             <form name="form1" method="post" action="?act=update" onSubmit="return check(this)">
			<tr bgcolor="#FFFFFF">
              <td height="25" colspan="2" align="center" bgcolor="#b48c94"><strong>Administrator Account Modification</strong></td>
              </tr> <tr bgcolor="#FFFFFF">
              <td width="180" height="35" align="right"><b>Admin: </b> </td>
             
              <td><input type="text" name="username" class="span1-1" value="<?php echo $info['admin_name'];?>" readonly></td>
            </tr> <tr bgcolor="#FFFFFF">
              <td height="35" align="right"><b>Password: </b> </td>
             
              <td><input type="password" name="password" class="span1-1"></td>
            </tr> <tr bgcolor="#FFFFFF">
              <td height="35" align="right"><b>Confirm Password: </b> </td>
             
              <td><input type="password" name="password2" class="span1-1"></td>
            </tr> <tr bgcolor="#FFFFFF">
              <td align="right"> </td>
             
              <td><input type="submit" value="Submit" class="btn btn-info " style="width:80px;" onClick="return confirm('Are you sure you want to modify?');"></td>
            </tr></form>
          </table>
     </div>     
     </div>
    </div>
    
<!-- 底部 -->
<?php
$act = !empty($_GET['act']) ? trim($_GET['act']) : '';
if($act == 'update')
{
	$username = !empty($_POST['username']) ? trim($_POST['username']) : '';
	$password2 = !empty($_POST['password2']) ? md5(trim($_POST['password2'])) : '';
	mysqli_query($conn, "update admin set admin_pwd='$password2'");
	echo "<script>alert('修改成功！');</script>";
}
include_once("foot.php");
?>
 <script>
!function(){
laydate.skin('molv');
laydate({elem: '#Calendar'});
}();
 
</script>
</body>
</html>