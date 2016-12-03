<!DOCTYPE html>
<style type="text/css">
div{
	font-size:18px;
	color:#0000FF;
}
</style>
<form enctype="multipart/form-data" action="" method="post"> 
	<table border="0">
		<tr>
			<td bgcolor="#CCCCCC">
				<div>当前最流行的Web开发语言：</div>
			</td>
		</tr>
		<tr>
			<td>
				<input type="radio" name="vote" value="PHP">PHP
			</td>
		</tr>
		<tr>
			<td>
				<input type="radio" name="vote" value="ASP">ASP
			</td>
		</tr>
		<tr>
			<td>
				<input type="radio" name="vote" value="JSP">JSP
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" name="sub" value="请投票">
			</td>
		</tr>
	</table>
</form>
<?php
$votefile="SY5_1_vote.txt";						//用于计数的文本文件$votefile
if(!file_exists($votefile))				   		//判断文件是否存在
{
	$handle=fopen($votefile,"w+");				//不存在则创建该文件
	fwrite($handle,"0|0|0");					//将文件内容初始化
	fclose($handle);
}
if(isset($_POST['sub']))
{
	if(isset($_POST['vote']))					//判断用户是否投票
	{
		$vote=$_POST['vote'];					//接收投票值
		$handle=fopen($votefile,"r+");
		$votestr=fread($handle,filesize($votefile));	//读取文件内容到字符串$votestr
		fclose($handle);
		$votearray=explode("|", $votestr);		//将$votestr根据“|”分割
		echo "<h3>投票完毕！</h3>";
		if($vote=='PHP')
			$votearray[0]++;					//如果选择PHP，则数组第1个值加1
		echo "目前PHP的票数为：<font size=5 color=red>".$votearray[0]."</font><br/>";
		if($vote=='ASP')
			$votearray[1]++;					//如果选择ASP，则数组第2个值加1
		echo "目前ASP的票数为：<font size=5 color=red>".$votearray[1]."</font><br/>";
		if($vote=='JSP')
			$votearray[2]++;					//如果选择JSP，则数组第3个值加1
		echo "目前JSP的票数为：<font size=5 color=red>".$votearray[2]."</font><br/>";
		//计算总票数
		$sum=$votearray[0]+$votearray[1]+$votearray[2];
		echo "总票数为：<font size=5 color=red>".$sum."</font><br/>";
		$votestr2=implode("|",$votearray);		//将投票后的新数组用“|”连接成字符串$votestr2
		$handle=fopen($votefile,"w+");
		fwrite($handle,$votestr2);				//将新字符串写入文件$votefile
		fclose($handle);
	}		
	else
	{
		echo "<script>alert('未选择投票选项！')</script>";
	}
}
?>
