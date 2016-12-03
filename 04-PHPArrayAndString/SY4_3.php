<html>
<head>
	<title>注册页面</title>
	<style type="text/css">
	<!--
	.STYLE1{font-size: 14px; color:red;}
	-->
	div{
		text-align:center;
		font-size:24px;
		color:#0000FF;
	}
	table{
		margin:0 auto;
	}
	</style>
</head>
<body>
<form name="fr1" method="post" action="">
	<div>用户注册</div>
	<table border="1" width=480>
		<tr>
			<td width=80>用户名：</td>
			<td><input type="text" name="ID">
			<td class="STYLE1">* 6～12个字符(数字，字母和下划线)</td>
		</tr>
		<tr>
			<td>密码：</td>
			<td><input type="password" name="PWD" size="21"></td>
			<td class="STYLE1">* 6～20个数字</td>
		</tr>
		<tr>
			<td>出生日期：</td>
			<td><input type="text" name="BIRTHDAY"></td>
			<td class="STYLE1">* 有效的日期</td>
		</tr>
		<tr>
			<td>邮箱：</td>
			<td><input type="text" name="EMAIL"></td>
			<td class="STYLE1">* 有效的邮件地址</td>
		</tr>
		<tr>
			<td colspan="3" align="center">
				<input type="submit" name="GO" value="注册">&nbsp;&nbsp;&nbsp;
				<input type="reset" name="NO" value="取消">
			</td>
		</tr>
	</table>
</form>
</body>
</html>
<?php
if(isset($_POST['GO']))
{
	$id=$_POST['ID'];
	$pwd=$_POST['PWD'];
	$birthday=$_POST['BIRTHDAY'];
	$Email=$_POST['EMAIL'];
	$checkid=preg_match('/^\w{6,12}$/',$id);			//检查是否为6～12个字符
	$checkpwd=preg_match('/^\d{6,20}$/',$pwd);			//检查是否为6～20个数字
	//检查是否是有效的日期
	$checkbirthday=preg_match('/^\d{4}-(0?\d|1?[012])-(0?\d|[12]\d|3[01])$/',$birthday);		
	//检查Email地址的合法性
	$checkEmail=preg_match('/^[a-zA-Z0-9_\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/',$Email);
	if(!$checkid)
		echo "<script>alert('用户名格式错误！')</script>";
	elseif(!$checkpwd)
		echo "<script>alert('密码格式错误！')</script>";
	elseif(!$checkbirthday)
		echo "<script>alert('出生日期格式错误！')</script>";
	elseif(!$checkEmail)
		echo "<script>alert('Email格式错误！')</script>";
	else
		echo "注册成功！";
}
?>
