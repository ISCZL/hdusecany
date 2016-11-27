<?php
session_start();

/*连接数据库*/
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mysqli";
$conn = new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
	die("连接失败");
}
/*定义编码*/
$conn->set_charset('utf-8');
$stmt = $conn->prepare("SELECT *FROM role WHERE user=? AND pwd=?");
/*绑定参数*/
$stmt->bind_param("ss",$stuid,$pwd);

// $stmt = $conn->prepare("SELECT *FROM role");
/*绑定结果*/
$stmt->bind_result($id,$user,$password,$per,$time);
/*所需参数*/
$stuid =   addslashes(htmlspecialchars($_POST['stuid'])); 
$pwd = md5(addslashes(htmlspecialchars($_POST['password'])));
/*执行SQL*/
$stmt->execute();
/*将结果保存在内存中*/
$stmt->store_result();
/*返回的条数*/
$count = $stmt->num_rows();
if(1==$count){
	echo"登陆成功";
}

/*取出结果*/


?>
