<html>
<body>
<form action="" method="post">
	<table border="1" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td colspan="2" align="center"  bgColor="#999999">用户登录表单</td>
		</tr>
		<tr>
			<td>用户名：</td>
			<td><input name="username" type="text"></td>
		</tr>
		<tr>
			<td>密码：</td>
			<td><input name="password" type="password" size="21"></td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<input type="submit" name="submit" value="登录">
				<input type="reset" name="submit2" value="重置">
			</td>
		</tr>
	</table>
</form>
</body>
</html>
<?php
	if(isset($_POST['submit']))
	{
		$username=$_POST['username'];
		$password=$_POST['password'];
		if($username=="admin"&&$password=="123456")
		{
			echo "<script>alert('登录成功');</script>";
		}
		else
		{
			echo "<script>alert('登录失败');</script>";
		}
	}
?>
