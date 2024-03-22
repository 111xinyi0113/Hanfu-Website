<?php
include("conn/conn.php");
while(list($name,$value)=each($_POST))
  {
    mysqli_query($conn,"delete from usermember where id=".$value.""); 
	mysqli_query($conn,"delete from pinglun where userid=".$value."");
	mysqli_query($conn,"delete from leaveword where userid=".$value."");
  }
header("location:edituser.php");
?>