<?php
echo "请输入学号:<br/>";
echo "<form method=post>";
//新建表单
for ($i = 1; $i < 6; $i++)//循环生成文本框
{
	//文本框的名字是数组名
	echo "<input type='text' name='stu[]' size='6'>";
	if ($i < 5)
		echo "-";
}
echo "<input type='submit' name='bt' value='提交'>";
echo "</form>";
if (isset($_POST['bt']))//检查提交按钮是否按下
{
	$k = 0;
	$jsj = array();
	$stu = $_POST['stu'];
	//将所有文本框的值赋给数组$stu
	for ($i = 0; $i < count($stu); $i++)
		for ($j = $i + 1; $j < count($stu); $j++) {
			if (strcmp($stu[$i], $stu[$j]) == 0)
				array_splice($stu, $j, 1);
			//将数组中重复的值删除
		}
	$str = implode(",", $stu);
	//使用逗号作为连接符将数组转化为字符串
	echo "所有的学生学号如下：<br/>";
	echo $str . "<br/>";
	foreach ($stu as $value) {
		if (strstr($value, "0811"))//查找包含“0811”的学号
		{
			$string = str_replace("0811", "0810", $value);
			$jsj[$k] = $string;
			//将修改后的计算机专业学生学号赋给数组$jsj
			$k++;
		}
	}
	echo "计算机专业的学号如下：<br/>";
	echo implode(",", $jsj);
}
?>
