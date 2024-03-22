<?php
include_once("top.php");
$id = !empty($_GET['id']) ? intval($_GET['id']) : '';
?>
<div id="middle">
     <?php
include_once("left.php");
?>
     <div class="right"  id="mainFrame">
     <div class="right_cont">
   <div class="title_right"><strong>Ship</strong></div>
      <table width="100%" border="0" cellpadding="6" cellspacing="0" bgcolor="#cccccc" class="table table-bordered">
	<script language="javascript">
	function chkinput()
	{
	  if(document.form1.kuaidi.value==""){
		alert("Please enter the name of the courier company");
		document.form1.kuaidi.focus();
		return false;}
		if(document.form1.bianhao.value==""){
		alert("Please enter the courier tracking number");
		document.form1.bianhao.focus();
		return false;}
		
	}
    </script>
     <form name="form1" enctype="multipart/form-data" method="post" action="?action=update" onSubmit="return chkinput();">
     <input type="hidden" name="id" size="10" class="span1-1" value="<?php echo $id?>">
     <tr bgcolor="#FFFFFF">
              <td height="25" colspan="2" align="center" bgcolor="#cecece"><strong>
                
              Add Courier</strong></td>
          </tr>
	  <tr>
        <td width="129" height="35" align="right">Courier Name: </td>
        <td width="618"><input type="text" name="kuaidi" size="25" class="span1-1" style="width:50%;"></td>
      </tr>
      <tr>
        <td height="35" align="right">Courier Tracking Number: </td>
        <td height="25">
          <input type="text" name="bianhao" size="60" class="span1-1" style="width:50%;">
          </td>
      </tr>
      <tr>
        <td height="25" colspan="2"><input type="submit" value="Submit" class="btn btn-info " style="width:80px;">
          </td>
      </tr>
	  </form>
    </table>
     </div>     
     </div>
    </div>
    
<!-- 底部 -->
<?php
$action = !empty($_GET['action']) ? trim($_GET['action']) : '';
if($action == 'update')
{
	$id = !empty($_POST['id']) ? intval($_POST['id']) : '';
	$kuaidi = !empty($_POST['kuaidi']) ? trim($_POST['kuaidi']) : '';
	$bianhao = !empty($_POST['bianhao']) ? $_POST['bianhao'] : '';
	mysqli_query($conn,"update dingdan set kuaidi='$kuaidi',bianhao='$bianhao',zt='Shipped' where id=".$id);
	echo "<script>alert('Shipment successful!');location.href='dingdan.php';</script>";
}
include_once("foot.php");
?>
</body>
</html>