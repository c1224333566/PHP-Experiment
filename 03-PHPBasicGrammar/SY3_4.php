<html>
	<body>
		<div>
			<font size="4" color="blue" face="黑体">计算累加和</font>
		</div>
		<form action="" method="post">
			1+2+...+
			<input type="text" name="num" size="5">
			<input type="submit" name="submit" value="计算">
		</form>
	</body>
</html>
<?php
if(isset($_POST['submit']))
{
	$num=$_POST['num'];
	$i=0;
	$sum=0;
	if($num<=2)
		echo "<script>alert('输入的数字必须大于2');</script>";
	else
	{
		while($i<=$num)
		{
			$sum=$sum+$i;
			$i++;
		}
		echo "<script>alert('1+2+...+$num=$sum');</script>";
	}
}
?>
