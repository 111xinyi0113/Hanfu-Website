<?php
include("../conn/conn.php");
$id = !empty($_GET['id']) ? intval($_GET['id']) : '';
$sql=mysqli_query($conn,"select * from usermember where id=".$id."");
$info=mysqli_fetch_array($sql);
if($info['dongjie']==0)
   {
     mysqli_query($conn,"update usermember set dongjie=1 where id='".$id."'");
   }
 else
  {
     mysqli_query($conn,"update usermember set dongjie=0 where id='".$id."'"); 
  }
 header("location:useredit.php?id=".$id."");   
?>