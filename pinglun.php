<?php
include_once("top.php");
?>
<!-- 顶部 --> 

<style>
	#middle {
    width: 80%; /* Adjust the width as needed */
    margin: 20px auto; /* This will add margin on the top and bottom, and auto on the left and right */
    background-color: #ffffff; /* Background color for the content area */
    padding: 20px; /* Padding inside the content area */
    box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1); /* Optional: Adds a subtle shadow around the content area */
}

.right_cont {
    margin-top: 20px; /* Adjust the margin at the top of the content */
}

.table {
    width: 100%; /* Table width is 100% of its parent */
    margin-top: 10px; /* Space above the table */
}

.table-bordered {
    border-collapse: collapse;
    border: 1px solid #dee2e6;
}

.table-bordered td, .table-bordered th {
    border: 1px solid #dee2e6;
    padding: 8px;
}

/* Add responsive design for smaller screens */
@media (max-width: 768px) {
    #middle {
        width: 95%; /* Increase the width on smaller screens */
    }
}

@media (max-width: 480px) {
    #middle {
        margin: 10px auto; /* Decrease the margin on very small screens */
    }
}
</style>
<div id="middle">
    
     <div class="right"  id="mainFrame">
     <div class="right_cont">
   <div class="title_right"><strong>   Message Center</strong></div>
   <?php
   $sql=mysqli_query($conn,"select count(*) as total from pinglun");
	   $info=mysqli_fetch_array($sql);
	   $total=$info['total'];
	   if($total==0)
	   {
	   ?>
   <table width="100%" cellPadding="6" class="table table-bordered">
  <tr><td>No content at the moment.</td></tr></table>
   <?php
   }
  else
  {
			$pagesize=20;
		   if ($total<=$pagesize){
		      $pagecount=1;
			} 
			if(($total%$pagesize)!=0){
			   $pagecount=intval($total/$pagesize)+1;
			
			}else{
			   $pagecount=$total/$pagesize;
			
			}
			$page = !empty($_GET['page']) ? trim($_GET['page']) : '';
			if(($page)==""){
			    $page=1;
			
			}else{
			    $page=intval($_GET['page']);
			
			}
             $sql1=mysqli_query($conn,"select * from pinglun order by id desc limit ".($page-1)*$pagesize.",$pagesize ");
             while($info1=mysqli_fetch_array($sql1))
		     {
		  ?>
   <table width="750" border="0" cellpadding="0" cellspacing="0"  bgcolor="#ffffff" class="table table-bordered">
        <tr>
          <td height="30" bgcolor="#ffffff">&nbsp;&nbsp;Commenter: <?php 
		     $spid=$info1['userid'];
			 $sql3=mysqli_query($conn,"select name from usermember where id=".$spid."");
			 $info3=mysqli_fetch_array($sql3);
			 echo $info3['name'];
			
		  ?>&nbsp;&nbsp;Evaluate Product: <?php 
		     $spid=$info1['spid'];
			 $sql2=mysqli_query($conn,"select mingcheng from shangpin where id=".$spid."");
			 $info2=mysqli_fetch_array($sql2);
			 echo $info2['mingcheng'];
		  ?>&nbsp;&nbsp;Publication Date: <?php echo $info1['addtime'];?></td>
          <td width="15%" align="center" bgcolor="#ffffff"> 
            <a href="?id=<?=$info1['id']?>&action=del" onClick="return confirm('Are you sure you want to delete?')">Delete</a>
        </td>
        </tr>
        <tr>
          <td colspan="2">
          <div style="margin:10px;">
          <?php echo $info1['content'];?>
          </div>
          </td>
        </tr>
      </table>
<?php
	}
?>   
<table width="550" height="25" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td align="center">Total&nbsp;
                  <?php
		   echo $total;
		  ?>
&nbsp;messages.&nbsp;Displaying&nbsp;<?php echo $pagesize;?>&nbsp;messages per page.&nbsp;Page&nbsp;<?php echo $page;?>&nbsp;of&nbsp;
<?php echo $pagecount; ?>&nbsp;
        <a href="?page=1" title="First Page">First Page</a> <?php if($page>=2){?>
            <a href="?page=<?php echo $page-1;?>" title="Previous Page">Previous Page</a><?php } ?> 
            <?php if($page+1<=$pagecount){?>
                <a href="?page=<?php echo $page+1;?>" title="Next Page">Next Page</a><?php }?> 
                <a href="?page=<?php echo $pagecount;?>" title="Last Page">Last Page</a>
          </td>
        </tr>
      </table><?php
	}
?> 
     </div>     
     </div>
    </div>
    
<!-- 底部 -->
<?php

$action = !empty($_GET['action']) ? trim($_GET['action']) : '';
if($action == 'del')
{
	$id = !empty($_GET['id']) ? intval($_GET['id']) : '';
	mysqli_query($conn,"delete from pinglun where id='".$id."'");
	echo "<script>alert('Delete successfully!');location.href='pinglun.php';</script>";
}

?>
</body>
</html>