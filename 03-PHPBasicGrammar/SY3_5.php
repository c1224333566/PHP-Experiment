<?php
//定义排序函数my_sort()
function my_sort($array) {
	for ($i = 0; $i < count($array); $i++) {
		for ($j = $i + 1; $j < count($array); $j++) {
			if ($array[$i] > $array[$j]) {
				$tmp = $array[$j];
				$array[$j] = $array[$i];
				$array[$i] = $tmp;
			}
		}
	}
	return $array;
	//返回排序后的数组
}

echo "请输入需要排序的数据:<br/>";
echo "<form method=post>";
//新建表单
for ($i = 1; $i < 6; $i++)//循环生成文本框
{
	//文本框的名字是数组名
	echo "<input type='text' name='stu[]' size='5'>";
	if ($i < 5)
		echo "-";
}
echo "<input type='submit' name='bt' value='提交'>";
echo "</form>";
if (isset($_POST['bt']))//检查提交按钮是否按下
{
	$stu = $_POST['stu'];
	$arr_stu = my_sort($stu);
	//调用排序函数my_sort()
	echo "排序后的数据如下所示：<br/>";
	while (list($key, $value) = each($arr_stu))//使用while循环遍历数组
	{
		echo $value . "<br/>";
		//输出排序后的值
	}
}
?>
