<?php
include_once("top.php");
?>
<script type="text/javascript"> 
function check(){   
        if(document.form1.title.value==""){
		alert("Please enter the title");
		document.form1.title.focus();
		return false;}
}
</script> 
<div id="middle">
     <?php
include_once("left.php");
?>
     <div class="right"  id="mainFrame">
     <div class="right_cont">
   <div class="title_right"><strong>Add News</strong></div>
   <table width="100%" border="0" cellpadding="6" cellspacing="0" bgcolor="#BCE8B5" class="table table-bordered">
             <form name="form1" method="post" action="?action=update" onSubmit="return check(this)">
			<tr bgcolor="#FFFFFF">
              <td height="25" colspan="2" align="center" bgcolor="#ffffff"><strong>
                
              Add News</strong></td>
              </tr> <tr bgcolor="#FFFFFF">
              <td width="180" height="35" align="right"><b>Title: </b> </td>
             
              <td><input name="title" type="text" class="span1-1" style="width:50%"/></td>
            </tr> 
             <tr bgcolor="#FFFFFF">
              <td width="180" height="35" align="right"><b>Details: </b> </td>
             
              <td>
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
				<textarea name="content" id="content" style="display:none;"></textarea></td>
            </tr> 
            <tr bgcolor="#FFFFFF">
              <td align="right"> </td>
             
              <td><input type="submit" id="submitBtn" value="Submit" class="btn btn-info " style="width:80px;"></td>
            </tr></form>
          </table>
     </div>     
     </div>
    </div>
    
<!-- 底部 -->
<?php
$action = !empty($_GET['action']) ? trim($_GET['action']) : '';
if($action == 'update')
{
	$title = !empty($_POST['title']) ? trim($_POST['title']) : '';
	$content = !empty($_POST['content']) ? $_POST['content'] : '';
	mysqli_query($conn,"insert into news(title,content) values('$title','$content')");
	echo "<script>alert('Add Successfully!');location.href='news.php';</script>";
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