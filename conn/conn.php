<?php
// 数据库配置信息
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'shoppingdb';

// 创建与数据库的连接
$conn = mysqli_connect($host, $username, $password, $database);

// 检查连接是否成功
if (!$conn) {
    die("Setting up database server connection failed: " . mysqli_connect_error());
}

// 设置字符集为utf8
if (!mysqli_set_charset($conn, "utf8")) {
    die("Setting character set failed: " . mysqli_error($conn));
}

// 设置数据库访问编码为utf8
if (!mysqli_query($conn, "SET NAMES utf8")) {
    die("Setting database access encoding failed: " . mysqli_error($conn));
}

$title = "SilKRoad AttireForum";

// 定义根目录路径
define('ROOT_PATH', str_replace('/conn/conn.php', '', str_replace('\\', '/', __FILE__)));

// 定义基础URL
define('__BASE__', 'http://localhost');

// 设置错误报告级别，不包括已废弃的警告
error_reporting(E_ALL & ~E_DEPRECATED);

// 接下来是你的代码逻辑...
?>
