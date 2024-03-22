<?php
/*参数说明:
        $pageSize  每页显示数
        $curPage 当前页（就是是通过GET方式传来的页数）
        $countSql SQL语句
        $pagePara URL后面跟的参数(也可以是空的)！ 
		调用函数reterPageStrSam($pageSize,$curPage,$countSql,$pagePara)，并按参数说明中的要求传入参数，就OK了！
*/
function reterPageStrSam($pageSize, $curPage, $countSql, $pagePara, $pageid, $conn){ 
  // 确保数据库连接不为空
  if (!$conn) {
      die("Database connection is empty");
  }

  // 设置数据库连接的字符集
  mysqli_set_charset($conn, 'utf8');

  // 执行查询
  $result = mysqli_query($conn, $countSql);
  if (!$result) {
      die("Query failed: " . mysqli_error($conn));
  }
  $rsCount = mysqli_num_rows($result);
  $pageCount = ceil($rsCount / $pageSize);
		
         if (!isset($curPage)) $curPage=1;
         if($curPage<=1) $curPage=1;
		  if(empty($curPage)) $curPage=1;

         if($curPage>=$pageCount) $curPage=$pageCount;
         $rsStart=(int)($curPage-1)*$pageSize;
		 if($rsStart<0)
		 {
		 	$rsStart = 0;
		 }
		if($curPage==0) $curPage=1;
         $pageStr=outPageListSam($pageCount,$curPage,$pagePara,$pageid);
         $outStr=$rsStart."||". $pageCount."||".$pageStr."||".$rsCount;
         return $outStr;
}
function outPageListSam($pageCount,$curPage,$pagePara,$pageid){ 
         $pageListNum=10;
         $step=5;
         $pageStr=""; 
         $prePage=$curPage-1;
         $nextPage=$curPage+1; 
         $pageFromNum=$curPage-$step;
         $pageToNum=$curPage+$step;
 	if($pageCount<$step){
          $pageFromNum=1;
          $pageToNum=$pageCount;
 	}else if($pageCount<$pageListNum){
          $pageFromNum=1;
          $pageToNum=$pageCount;
 	} else if ($pageToNum>$pageCount){ 
          $pageToNum=$pageCount;
             if(($pageToNum-$pageFromNum)<$pageListNum){
                      $pageFromNum=$pageToNum-$pageListNum+1;
             }
	}else{
            if($pageFromNum<1){
                       $pageFromNum=1;
                       $pageToNum=$curPage+$step-1;
            }
}
 /*开始输出 */
 $pageStr.=" 
    <li><a>Total".$pageCount."Pages</a></li>";
  $curPage!=1?$pageStr.="<li><a href=?curPage=1&$pagePara&$pageid>First Page</a></li>
  <li><a href=?curPage=1&$pagePara&$pageid>Previous Page</a></li>":$pageStr.="<li>
  <a href='javascript:void(0);'>First Page</a></li><li><a href='javascript:void(0);'>Previous Page</a></li>";
 for($i=$pageFromNum;$i<=$pageToNum;$i++){
	$curPage==$i ? $pageStr.="<li class='active'><a>$i</a></li>" : 
	$pageStr.="<li><a href=?curPage=$i&$pagePara&$pageid>$i</a></li>";
  }  
	$curPage!=$pageCount ? $pageStr.="<li><a href=?curPage=$nextPage&$pagePara&$pageid>Next Page</a></li>
  <li><a href=?curPage=$pageCount&$pagePara&$pageid>Last Page</a></li>" : 
	$pageStr.="<li><a href='javascript:void(0);'>Next Page</a></li><li><a href='javascript:void(0);'>Last Page</a></li>";
 $pageStr.="";

 /*输出分页结束 */ 
 return $pageStr;
}
?>