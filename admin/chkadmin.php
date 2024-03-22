<?php
session_start();
 class chkinput{
   var $admin_name;
   var $admin_pwd;


   function __construct($x, $y) {
    $this->admin_name = $x;
    $this->admin_pwd = $y;
}

  //  function chkinput($x,$y)
  //   {
  //    $this->admin_name=$x;
  //    $this->admin_pwd=$y;
  //   }

   function checkinput(){
     include("../conn/conn.php");
    // 防止SQL注入的安全措施
    $this->admin_name = mysqli_real_escape_string($conn, $this->admin_name);
    $this->admin_pwd = mysqli_real_escape_string($conn, $this->admin_pwd);

    $stmt = mysqli_prepare($conn, "SELECT * FROM admin WHERE admin_name = ?");
    mysqli_stmt_bind_param($stmt, 's', $this->admin_name);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (!$result) {
      echo "<script language='javascript'>alert('Database query failed: " . mysqli_error($conn) . "');history.back();</script>";
      exit;
    }

    $info = mysqli_fetch_array($result);

    if (!$info) {
      echo "<script language='javascript'>alert('This administrator does not exist!');history.back();</script>";
      exit;
  } else {
      if ($info['admin_pwd'] == $this->admin_pwd) {
          $_SESSION['sessionname'] = $info['admin_name'];
          $_SESSION['sessionid'] = $info['id'];
          header("location:default.php");
          exit;
      } else {
          echo "<script language='javascript'>alert('Wrong password!');history.back();</script>";
          exit;
      }
  }
}
}

    //  $sql=mysqli_query($conn, "select * from admin where admin_name='".$this->admin_name."'");
    //  mysqli_error($conn);
    //  $info=mysqli_fetch_array($sql);
    //  if($info==false)
    //    {
    //       echo "<script language='javascript'>alert('不存在此管理员！');history.back();</script>";
    //       exit;
    //    }
//       else
//        {
//           if($info['admin_pwd']==$this->admin_pwd){
// 			  $_SESSION['sessionname'] = $info['admin_name'];
// 				$_SESSION['sessionid'] = $info['id'];
//                header("location:default.php");
//             }
//           else
//            {
//              echo "<script language='javascript'>alert('密码输入错误！');history.back();</script>";
//              exit;
//            }

//       }    
//    }
//  }
if (isset($_POST['name']) && isset($_POST['pwd'])) {
  $obj = new chkinput(trim($_POST['name']), md5(trim($_POST['pwd'])));
  $obj->checkinput();
} else {
  echo "<script language='javascript'>alert('Please enter your username and password!');history.back();</script>";
  exit;
}

    // $obj=new chkinput(trim($_POST['name']),md5(trim($_POST['pwd'])));
    // $obj->checkinput();

?>