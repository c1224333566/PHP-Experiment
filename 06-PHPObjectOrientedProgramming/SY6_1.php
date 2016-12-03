<html>
<head>
	<title>学生管理类</title>
</head>
<body>
<form method="post">
	学号：<input type="text" name="number"><br/>	
	姓名：<input type="text" name="name"><br/>
	性别：<input type="radio" name="sex" value="男" checked="checked">男
	<input type="radio" name="sex" value="女">女<br/>
	<input type="submit" name="ok" value="显示">
</form>
</body>
</html>
<?php
class student
{
	private $number;
	private $name;
	private $sex;
	function show($XH,$XM,$XB)
	{
		$this->number=$XH;
		$this->name=$XM;
		$this->sex=$XB;
		echo "学号：".$this->number."<br/>";
		echo "姓名：".$this->name."<br/>";
		echo "性别：".$this->sex."<br/>";
	}
}
if(isset($_POST['ok']))
{
	$XH=$_POST['number'];
	$XM=$_POST['name'];
	$XB=$_POST['sex'];
	$stu=new student;
	$stu->show($XH,$XM,$XB);
}
?>
