<?php
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
		$temp = 0;
		//中间变量初始化为0
		$stu = $_POST['stu'];
		//将所有文本框的值赋给数组$stu
		$num = count($stu);
		//计算数组$stu元素个数
		echo "您输入的数据有：<br/>";
		foreach ($stu as $score)//使用foreach循环遍历数组$stu
		{
			echo $score . "<br/>";
			//输出接收的值
		}
		for ($i = 0; $i < $num; $i++)
			for ($j = $i + 1; $j < $num; $j++) {
				if ($stu[$i] > $stu[$j])//判断大小，前者比后者大则交换位置
				{
					$temp = $stu[$i];
					$stu[$i] = $stu[$j];
					$stu[$j] = $temp;
				}
			}
		echo "排序后的数据如下所示：<br/>";
		while (list($key, $value) = each($stu))//使用while循环遍历数组
		{
			echo $value . "<br/>";
			//输出排序后的值
		}
}
?>
