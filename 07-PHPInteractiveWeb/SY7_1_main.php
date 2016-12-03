<?php
session_start();
$username=@$_GET['username'];						//获取用户名
$password=@$_GET['password'];						//获取密码
//本函数用于获取文本文件中的用户数据
function loadinfo()
{
	$user_array=array();
	$filename='SY7_1.txt';							//用户信息文件
	$fp=fopen($filename,"r");						//打开文件
	$i=0;
	while($line=fgets($fp,1024))					
	{
		list($user,$pwd)=explode('|',$line);		//读取每行数据
		$user=trim($user);							//去掉首尾特殊符号
		$pwd=trim($pwd);						
		$user_array[$i]=array($user,$pwd);			//将数组组成一个二维数组
		$i++;
	}
	fclose($fp);
	return $user_array;								//返回一个数组
}
$user_array=loadinfo();								
if($username)										
{
	//判断用户输入的用户名和密码是否正确
	if(!in_array(array($username,$password),$user_array))
		echo "<script>alert('用户名或密码错误!');location='SY7_1_login.php';</script>";
	else
	{
		foreach($user_array AS $value)				//遍历数组
		{
			list($user,$pwd)=$value;
			if($user==$username&&$pwd==$password)
			{
				//使用Session将用户名和密码传到其他页面
				$_SESSION['username']=$username; 
				$_SESSION['password']=$password;
				echo "<div>您的用户名为：".$user."</div>";
				echo "<br/>";
				//得到EX7_1_QA.php中使用Session传来的值
				if($points=@$_SESSION['QA_points'])
				{
					echo "您刚刚答题得到了".$points."分<br/>";
					echo "<input type='button' value='继续答题' onclick=window.location='SY7_1_QA.php'>";
				}
				else
				{
					echo "您还没有答题记录<br/>";
					echo "<input type='button' value='开始答题' onclick=window.location='SY7_1_QA.php'>";
				}
			}
		}
	}
}
else
	echo "您尚未登录，无权访问本页";
?>
