<?php
include_once("top.php");
?>
<div id="middle">
     <?php
include_once("left.php");
?>
     <div class="right"  id="mainFrame">
     <div class="right_cont">
   <div class="title_right"><strong>Add products</strong></div>
      <table width="100%" border="0" cellpadding="6" cellspacing="0" bgcolor="#BCE8B5" class="table table-bordered">
	<script language="javascript">
	function chkinput()
	{
	  if(document.form1.mingcheng.value==""){
		alert("Please enter the name of the clothing item");
		document.form1.mingcheng.focus();
		return false;}
		if(document.form1.huiyuanjia.value==""){
		alert("Please enter the original price of the dress");
		document.form1.huiyuanjia.focus();
		return false;}
		if(document.form1.shichangjia.value==""){
		alert("Please enter the current price of the clothing item");
		document.form1.shichangjia.focus();
		return false;}
		if(document.form1.xinghao.value==""){
		alert("Please enter the clothing item ID");
		document.form1.xinghao.focus();
		return false;}
		
	  if(document.form1.shuliang.value==""){
		alert("Please input inventory");
		document.form1.shuliang.focus();
		return false;}
		
	}
    </script>
     <form name="form1" enctype="multipart/form-data" method="post" action="?action=update" onSubmit="return chkinput();">
     <tr bgcolor="#FFFFFF">
              <td height="25" colspan="2" align="center" bgcolor="#b48c94"><strong>
                
              Add Product</strong></td>
          </tr>
	  <tr>
        <td width="129" height="35" align="right">Name: </td>
        <td width="618"><input type="text" name="mingcheng" size="25" class="span1-1" style="width:50%;"></td>
      </tr>
      <tr>
        <td height="35" align="right">Price: </td>
        <td height="25">Original Price: <input type="text" name="shichangjia" size="10" class="span1-1" >
          ¥&nbsp;&nbsp;Current Price: <input type="text" name="huiyuanjia" size="10" class="span1-1">
          ¥</td>
      </tr>
      <tr>
        <td height="35" align="right">Category: </td>
        <td height="25">
           <?php
			$sql=mysqli_query($conn, "select * from fenlei order by id desc");
			$info=mysqli_fetch_array($sql);
			if($info==false)
			{
			  echo "Please add clothing type first!";
			}
			else
			{
			?>
            <select name="typeid" class="span1-1">
			<?php
			do
			{
			?>
              <option value=<?php echo $info['id'];?>><?php echo $info['fenleiname'];?></option>
			<?php
			}
			while($info=mysqli_fetch_array($sql));
			?>  
            </select>
            <?php
		     }
		    ?>
        </td>
      </tr>
      <tr>
        <td height="35" align="right">Product ID: </td>
        <td height="25"><input type="text" name="xinghao" class="span1-1" size="20"></td>
      </tr>
      <tr>
        <td height="35" align="right">Recommended: </td>
        <td height="25">
          <select name="tuijian" class="span1-1" >
            <option selected value=1>Yes</option>
            <option value=0>No</option>
          </select>
     
      </td>
      </tr>
      <tr>
        <td height="35" align="right">Inventory: </td>
        <td height="25"><input type="text" name="shuliang" class="span1-1" size="20"></td>
      </tr>
      <tr>
        <td height="35" align="right">Picture: </td>
        <td height="25">
		<input type="file" name="img" class="span1-1" size="30"></td>
      </tr>
      <tr>
        <td height="80" align="right">Clothing Details Description: </td>
        <td><div style="margin:10px;">
		<script type="text/javascript" charset="utf-8" src="../ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="../ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="../ueditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript">
$(function(){
	$("#submitBtn").click(function(){
		$("#content").val(UE.getEditor('editor').getContent());
		$("#form1").submit();
	});

	var ue = UE.getEditor('editor');
});
</script>
			  <script id="editor" type="text/plain" style="width:100%;height:200px;"></script>
				<textarea name="content" id="content" style="display:none;"></textarea></div>
        </td>
      </tr>
      <tr>
        <td height="25" colspan="2"><input type="submit" id="submitBtn" value="Submit" class="btn btn-info " style="width:80px;">
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
		if(is_numeric($_POST['shichangjia'])==false || is_numeric($_POST['huiyuanjia'])==false)
	 {
	   echo "<script>alert('Price can only be numeric!');history.back();</script>";
	   exit;
	 }
	if(is_numeric($_POST['shuliang'])==false)
	 {
	   echo "<script>alert('Quantity can only be numeric!');history.back();</script>";
	   exit;
	 }
	$mingcheng=$_POST['mingcheng'];
	$shichangjia=$_POST['shichangjia'];
	$huiyuanjia=$_POST['huiyuanjia'];
	$typeid=$_POST['typeid'];
	$xinghao=$_POST['xinghao'];
	$tuijian=$_POST['tuijian'];
	$shuliang=$_POST['shuliang'];
	if(!empty($_FILES['img']['name'])){
			$file = $_FILES['img'];//得到传输的数据
			//得到文件名称
			
			$name = $file['name'];
			$type = strtolower(substr($name,strrpos($name,'.')+1)); //得到文件类型，并且都转化成小写
			
			//判断是否是通过HTTP POST上传的
			$upload_path = ROOT_PATH.'../upimages/'; //上传文件的存放路径
			
			//开始移动文件到相应的文件夹
			$mu=mt_rand(1,10000000);
			if(move_uploaded_file($file['tmp_name'],$upload_path.$mu.".".$type)){
			  $fileName =$mu.".".$type;
			 
			}else{
			  //echo "Failed!";
			}
		}
		else
		{
			$fileName="";
			}
	$jianjie=$_POST['content'];
	$addtime=date("Y-m-j");
	mysqli_query($conn, "insert into shangpin(mingcheng,jianjie,addtime,xinghao,tupian,typeid,shichangjia,huiyuanjia,tuijian,shuliang,cishu)values('$mingcheng','$jianjie','$addtime','$xinghao','$fileName','$typeid','$shichangjia','$huiyuanjia','$tuijian','$shuliang','0')");
	echo "<script>alert('Product".$mingcheng."Add successfully!');window.location.href='addgoods.php';</script>";
}
include_once("foot.php");
?>
</body>
</html>