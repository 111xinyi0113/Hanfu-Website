<?php
include_once("top.php");
include_once("conn/page.php");
?>
<link href="css/center.css" rel='stylesheet' type='text/css' />
<link href="css/pages.css" rel='stylesheet' type='text/css' />
<div class="main-content">
	<div class="container">
    	
		<h3 class="tittle bottom"><i class="glyphicon glyphicon-globe"></i>Product Search</h3>
		<div class="grid">
			<?php
			$sqlwhere="";
			$countSql="select id from shangpin where 1=1 $sqlwhere ";//sql语句
			$keywords=urlencode($keywords);
			$KeyWord = "typeid=$typeid&keywords=$keywords";
			$pageSize="12"; //每页显示数
			$curPage= !empty($_GET['curPage']) ? intval($_GET['curPage']) :0;//通过GET传来的当前页数
			$urlPara= $KeyWord;//这是URL后面跟的参数，也就是问号传值
		    $pageid="";
			$pageOutStr=reterPageStrSam($pageSize,$curPage,$countSql,$urlPara,$pageid,$conn);
			$pageOutStrArr=explode("||",$pageOutStr);
			$rsStart=$pageOutStrArr[0];//limit 后的第一个参数
			$pageStr=$pageOutStrArr[2];//limit 后的第二个参数
			$pageCount=$pageOutStrArr[1];//总页数
			$sql = mysqli_query($conn,"select *  from shangpin where 1=1 $sqlwhere order by cishu desc limit $rsStart, $pageSize");
			while($row=mysqli_fetch_array($sql))
			{
			?>
			<div class="col-md-4 m-b">
				<a href="shopshow.php?id=<?php echo $row['id'];?>">
                	<figure class="effect-layla">
						<img src="<?php echo __BASE__;?>/upimages/<?php echo $row["tupian"];?>" alt="">

					</figure>
				</a>
				<div class="m-b-text">
					<a href="shopshow.php?id=<?php echo $row['id'];?>" class="wd"><?php echo $row['mingcheng'];?></a>
					<a class="read" href="shopshow.php?id=<?php echo $row['id'];?>&typeid=<?php echo $row['typeid'];?>">View Details</a> 
					<a class="order" href="addgouwuche.php?id=<?php echo $row['id'];?>">Add to Cart</a>
				</div>
			</div><input type="hidden" value="<?=$urlPara?>" name="url"><input type="hidden" value="<?=$curPage?>" name="curPage">
            <?php
                }
			?>
            <div class="clearfix"></div>
            <div class="pages">
				<ul class="pagination">
					 <?=$pageStr?>
				</ul>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
