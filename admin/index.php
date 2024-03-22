<?php
include_once("../conn/conn.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
    <title><?php echo $title;?>SilKRoad AttireForum Management System</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style/skin.css" />
</head>
<script language="javascript">
	  function chkinput(form){
	    if(form.name.value==""){
		  alert("Please enter your username");
		  form.name.select();
		  return(false);
		}
		if(form.pwd.value==""){
		  alert("Please enter your password");
		  form.pwd.select();
		  return(false);
		}
		return(true);
	  }
	</script>
    <body>
        <table width="40%">
          
                <!-- 主体右部分 -->
                <td id="right_cont">
                    <table height="100%">
                        <tr height="30%"><td colspan="3">&nbsp;</td></tr>
                        <tr>
                            <td width="30%" rowspan="5">&nbsp;</td>
                                <form name="form" method="post" action="chkadmin.php" onSubmit="return chkinput(this)">
                                    <table valign="top" width="100%">
                                        <tr><td colspan="2"><h4 style="letter-spacing:1px;font-size:35px;">SilKRoad AttireForum Management System</h4></td></tr>
                                        <tr><td>Admin: </td><td><input type="text" name="name" value="" id="name" /></td></tr>
                                        <tr><td>Password: </td><td><input type="password" name="pwd" value="" id="pwd" /></td></tr>
                                        <tr class="bt" align="center"><td>&nbsp;<input type="submit" value="Login" /></td><td align="left">&nbsp;
                                        <script language="javascript">
                                            function change()
                                            {
                                                var img =document.getElementById("yzm_num");
                                                img.src=img.src+'?';
                                            }
                                        </script></td></tr>
                                    </table>
                                </form>
                            </td>
                            <td rowspan="5">&nbsp;</td>
                        </tr>
                        <tr><td colspan="3">&nbsp;</td></tr>
                    </table>
                </td>
            </tr>
            
        </table>
    </body>
</html>