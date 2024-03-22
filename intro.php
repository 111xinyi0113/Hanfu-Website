<?php
session_start();
include_once("top.php");
include_once("conn/page.php");
?>
<style>

.content-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 20px; /* 方块之间的间隙 */
    justify-content: space-between; /* 两端对齐 */
    margin-left: 100px; /* 与屏幕边缘的距离 */
    margin-right: 100px;
    margin-top: 50px;
}

.category-title {
    width: 100%; /* 类别标题占满全宽 */
    text-align: center; /* 标题居中 */
    margin-bottom: 10px; /* 标题和内容块之间的间隙 */
}

.content-block {
    background: #DFE8E1; /* 方块背景色 */
    border-radius: 15px; /* 方块圆角 */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); /* 方块阴影 */
    padding: 20px; /* 内部间隙 */
    flex-basis: calc(33.333% - 20px); /* 三列布局，减去间隙 */
    flex-grow: 1; /* 允许块增长填满空间 */
    flex-shrink: 0; /* 防止块缩小 */
    margin-bottom: 20px; /* 方块与方块之间的竖直间距 */
}

@media (max-width: 768px) {
    .content-block {
        max-width: calc(50% - 20px); /* 两列布局，减去间隙 */
    }
}

@media (max-width: 480px) {
    .content-block {
        max-width: 100%; /* 单列布局 */
    }
}


</style>
<link href="css/page.css" rel='stylesheet' type='text/css' />
<div class="height2"></div>
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<ul class="breadcrumb">
				<li><span class="glyphicon glyphicon-home"></span> Hanfu Introduction</a></li>
			</ul>  
            <div class="list-group">
                <?php
                // 查询不同类别的内容
                $sql = "SELECT DISTINCT category FROM content";
                $categories = $conn->query($sql);

                if ($categories->num_rows > 0) {
                    echo '<div class="content-grid">';
                    while ($cat_row = $categories->fetch_assoc()) {
                        $category = $cat_row['category'];

                        // 输出每个类别的标题
                        echo "<div class='category-title'><h2>{$category}</h2></div>";

                        // 查询每个类别的具体内容
                        $content_sql = "SELECT title, description FROM content WHERE category='{$category}'";
                        $contents = $conn->query($content_sql);

                        if ($contents->num_rows > 0) {
                            // 输出该类别下的所有内容
                            while ($content_row = $contents->fetch_assoc()) {
                                echo "<div class='content-block'>";
                                echo "<h4>" . $content_row["title"] . "</h4>";
                                echo "<p>" . $content_row["description"] . "</p>";
                                echo "</div>"; // 结束内容块
                            }
                        }
                    }
                    echo '</div>'; // 结束内容网格
                }
                ?>
			</div> 
		</div>
        <?php
        include_once("left.php");
        ?>
	</div>
</div>







