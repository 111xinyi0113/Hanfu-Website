<?php
include("conn/conn.php");

foreach ($_POST as $name => $value) {
    // 这里假设 $value 是 id，进行安全处理
    $value = intval($value);

    // 查询商品图片
    $sql = "SELECT tupian FROM shangpin WHERE id='$value'";
    $result = mysqli_query($conn, $sql);
    if ($result && $info = mysqli_fetch_array($result)) {
        if (!empty($info['tupian'])) {
            // 删除图片文件，注意 @ 不推荐使用，因为它抑制所有错误
            $imagePath = substr($info['tupian'], 6);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
    } else {
        // 错误处理
        // die('查询失败: ' . mysqli_error($conn));
    }

    // 删除相关订单
    $sql1 = "SELECT id, spc FROM dingdan";
    $result1 = mysqli_query($conn, $sql1);
    if ($result1) {
        while ($info1 = mysqli_fetch_array($result1)) {
            $array = explode("@", $info1['spc']);
            if (in_array($value, $array)) {
                mysqli_query($conn, "DELETE FROM dingdan WHERE id='" . $info1['id'] . "'");
            }
        }
    } else {
        // 错误处理
        // die('查询失败: ' . mysqli_error($conn));
    }

    // 删除商品和相关评论
    mysqli_query($conn, "DELETE FROM shangpin WHERE id='$value'");
    mysqli_query($conn, "DELETE FROM pinglun WHERE spid='$value'");
}

header("Location: editgoods.php");
?>
