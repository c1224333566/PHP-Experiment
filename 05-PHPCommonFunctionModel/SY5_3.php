<html>
<head>
	<title>计算年龄</title>
</head>
<body>
<form method="post" action="">
	请输入您的出生日期：
	<input type="text" name="year" size="4">年
	<input type="text" name="month" size="4">月
	<input type="text" name="day" size="4">日
	<input type="submit" name="submit" value="提交">
</form>
</body>
</html>
<?php
date_default_timezone_set('PRC');							//设置时区
if(isset($_POST['submit']))
{
	$year=$_POST['year'];									//年份
	$month=$_POST['month'];									//月份
	$day=$_POST['day'];										//天数
	if(@checkdate($month,$day,$year))						//检测日期是否有效
	{	
		echo "您的年龄为：".(date('Y',time())-$year);		//计算年龄
		$array=getdate(strtotime("$year-$month-$day"));		//使用getdate函数得到指定日期的信息
		echo "<br/>出生时是".$array['weekday'];				//输出星期值
	}
	else
	{
		echo "<script>alert('无效的日期！');</script>";
	}
}
?>
