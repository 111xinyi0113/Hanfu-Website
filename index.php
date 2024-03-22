<?php
 include_once("top.php");
?>



<head>
	<link href="css/center.css" rel='stylesheet' type='text/css' />
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<style>


        /* 定义外层容器样式 */
        .shell {
            width: 60vw;
            perspective: 1000px;
            /* 透视效果，观察者与z=0平面的距离 */
            transform-origin: center;
            /* 变形原点为中心 */
			position: relative; /* 相对定位 */
			width: 60vw; /* 宽度占视口宽度的60% */
			max-width: 80%; /* 最大宽度为100% */
			margin-top: 150px; /* 顶部外边距 */
			margin-bottom: 450px; /* 底部外边距 */
			margin-left: auto; /* 左边自动外边距 */
			margin-right: auto; /* 右边自动外边距 */
		}

        /* 定义内容容器样式 */
        .content {
            display: flex;
            /* 设置为弹性盒子布局 */
            justify-content: center;
            /* 主轴居中对齐 */
            align-items: center;
            /* 交叉轴居中对齐 */
            position: absolute;
            /* 绝对定位 */
            width: 100%;
            /* 宽度100% */
            height: 100%;
            /* 高度100% */
            transform-origin: center;
            /* 变形原点为中心 */
            transform-style: preserve-3d;
            /* 保持3D变换 */
            transform: translateZ(-30vw) rotateY(0);
            /* 变换：沿z轴平移-30vw，绕y轴旋转0度 */
            animation: carousel 9s infinite cubic-bezier(0.77, 0, 0.175, 1) forwards;
            /* 动画：名称为carousel，持续时间9秒，无限循环，缓动函数为cubic-bezier(0.77, 0, 0.175, 1)，动画结束后保持最后状态 */
        }

        /* 定义项目样式 */
        .item {
            position: absolute;
            /* 绝对定位 */
            width: 60vw;
            /* 宽度占视口宽度的60% */
            height: 40vw;
            /* 高度占视口高度的40% */
            max-width: 380px;
            /* 最大宽度为380像素 */
            max-height: 250px;
            /* 最大高度为250像素 */
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);
            /* 设置阴影 */
            border-radius: 6px;
            /* 边框圆角半径为6像素 */
            background-size: cover;
            /* 背景图片等比例缩放并覆盖整个容器 */
            -webkit-box-reflect: below 25px -webkit-linear-gradient(transparent 50%, rgba(255, 255, 255, 0.3));
            /* 创建倒影效果 */
        }

        /* 第一个项目样式 */
        .item:nth-child(1) {
            background-image: url(../images/1.jpg);
            /* 背景图片为01.jpg */
            transform: rotateY(0) translateZ(35vw);
            /* 变换：绕y轴旋转0度，沿z轴平移35vw */
        }

        /* 第二个项目样式 */
        .item:nth-child(2) {
            background-image: url(../images/2.jpg);
            /* 背景图片为02.jpg */
            transform: rotateY(120deg) translateZ(35vw);
            /* 变换：绕y轴旋转120度，沿z轴平移35vw */
        }

        /* 第三个项目样式 */
        .item:nth-child(3) {
            background-image: url(../images/3.jpg);
            /* 背景图片为03.jpg */
            transform: rotateY(240deg) translateZ(35vw);
            /* 变换：绕y轴旋转240度，沿z轴平移35vw */
        }

        /* 定义动画 */
        @keyframes carousel {

            0%,
            17.5% {
                transform: translateZ(-35vw) rotateY(0);
                /* 变换：沿z轴平移-35vw，绕y轴旋转0度 */
            }

            27.5%,
            45% {
                transform: translateZ(-35vw) rotateY(-120deg);
                /* 变换：沿z轴平移-35vw，绕y轴旋转-120度 */
            }

            55%,
            72.5% {
                transform: translateZ(-35vw) rotateY(-240deg);
                /* 变换：沿z轴平移-35vw，绕y轴旋转-240度 */
            }

            82.5%,
            100% {
                transform: translateZ(-35vw) rotateY(-360deg);
                /* 变换：沿z轴平移-35vw，绕y轴旋转-360度 */
            }
        }
    </style>
</head> 


<body>
<!--轮播图-->
<div class="shell">
        <div class="content">
            <div class="item"></div>
            <div class="item"></div>
            <div class="item"></div>
        </div>
    </div> 




<!--主体-->
<div class="main-content margin-2">
	<div class="container">
		<h3 class="tittle bottom"><i class="glyphicon glyphicon-globe"></i><a href="shops.php" class="text-muted pull-right">More &gt;</a></h3>
		<div class="grid">
			<?php
				$sql = mysqli_query($conn, "SELECT * FROM shangpin WHERE tuijian=1 ORDER BY id DESC LIMIT 0,6");
				while($row=mysqli_fetch_array($sql))
				{
			?>
			<div class="col-md-4 m-b">
				<a href="shopshow.php?id=<?php echo $row['id'];?>">
                	<figure class="effect-layla">
						<img src="<?php echo __BASE__;?>/upimages/<?php echo $row["tupian"];?>" />
						
					</figure>
				</a>
				<div class="m-b-text">
					<h4>Price: <?php echo $row['huiyuanjia'];?></h4>

					<a href="shopshow.php?id=<?php echo $row['id'];?>" class="wd"><?php echo $row['mingcheng'];?></a>
                    <a class="order" href="addgouwuche.php?id=<?php echo $row['id'];?>">Add to Cart</a> 
                    <a class="read" href="shopshow.php?id=<?php echo $row['id'];?>&typeid=<?php echo $row['typeid'];?>">Details</a> 
					
				</div>
			</div>
            <?php
                }
			?>
			<div class="clearfix"></div>
		</div>
	</div>
</div>


</body>