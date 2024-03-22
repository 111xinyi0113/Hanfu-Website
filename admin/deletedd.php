<?php
$page = intval($_POST['page_id']);
include("conn/conn.php");

foreach($_POST as $value => $name) {  
    // 这里假设 $value 是您要删除的 dingdan 的 ID
    // 请确保您的表单字段名称对应于您的数据库字段
    $stmt = mysqli_prepare($conn, "DELETE FROM dingdan WHERE id = ?");
    mysqli_stmt_bind_param($stmt, 'i', $value); // 'i' 指定 $value 为 integer 类型
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

header("Location: lookdd.php?page=".$page);
?>
