<?php  
$ysk = !empty($_POST['ysk']) ? trim($_POST['ysk']) : '&nbsp;';
$yfh = !empty($_POST['yfh']) ? trim($_POST['yfh']) : '&nbsp;';
$ysh = !empty($_POST['ysh']) ? trim($_POST['ysh']) : '&nbsp;';
 $id = !empty($_GET['id']) ? intval($_GET['id']) : '';
$zt="";
if($ysk!="&nbsp;"){
   $zt.=$ysk;
 }
if($yfh!="&nbsp;"){
   $zt.=$yfh;
 }
 if($ysh!="&nbsp;"){
   $zt.=$ysh;
 }
 if(($ysk=="&nbsp;")&&($yfh=="&nbsp;")&&($ysh=="&nbsp;")){
    echo "<script>alert('Please select a processing status!');history.back();</script>";
	exit;
  }
 include("../conn/conn.php");
 $sql3=mysqli_query($conn,"select * from dingdan where id='".$id."'");
 $info3=mysqli_fetch_array($sql3);
 if(trim($info3['zt'])=="Payment Received")
 {
 $sql=mysqli_query($conn,"select * from dingdan where id='".$id."'");
 $info=mysqli_fetch_array($sql);
 $array=explode("@",$info['spc']);
 $arraysl=explode("@",$info['slc']);
 for($i=0;$i<count($array);$i++){
	 $id=$array[$i];
     $num=$arraysl[$i];
      mysqli_query($conn,"update shangpin set cishu=cishu+'".$num."' ,shuliang=shuliang-'".$num."' where id='".$id."'");
    }
  } $id = !empty($_GET['id']) ? intval($_GET['id']) : '';
 mysqli_query($conn,"update dingdan set zt='".$zt."' where id=".$id);
 header("location:dingdanedit.php?id=".$id);
?>