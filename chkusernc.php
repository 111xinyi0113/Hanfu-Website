<?php
include("conn/conn.php");
$nc = !empty($_GET['nc']) ? trim($_GET['nc']) : '';
if($nc=="")
	  {
	    echo "Please enter a username!";
	  
	  }
	  else
	  {
	    $sql=mysqli_query($conn, "select * from usermember where name='".$nc."'");  
	    $info=mysqli_fetch_array($sql);
		if($info==true)
		{
		  echo "Sorry, this username is already taken!";
		}
		else
		{
		   echo "Congratulations, this username is available!";
		} 
	  }
 exit;	  
?>