<?php
session_start();
$username=@$_SESSION['username'];
$password=@$_SESSION['password'];
if($username)
{
	echo $username.",请回答以下题目：<br/>";
?>
	<form method="post" action="">
	<div>1. 农夫有17只羊，除了9只以外都病死了，农夫还剩几只羊？<br/>
	<input type="radio" name="q1" value="1">17
	<input type="radio" name="q1" value="2">9
	<input type="radio" name="q1" value="3">8</div><br/>
	<div>2. 大月有31天，小月有30天，那么一年中几个月有28天？<br/>
	<input type="radio" name="q2" value="1">1个
	<input type="radio" name="q2" value="2">4年一个
	<input type="radio" name="q2" value="3">12个</div><br/>
	<div>3. 小明的妈妈有三个小孩，老大叫大毛，老二叫二毛，老三叫什么？<br/>
	<input type="radio" name="q3" value="1">三毛
	<input type="radio" name="q3" value="2">小明
	<input type="radio" name="q3" value="3">不知道</div><br/>
	<div>4. 英国有没有七月四日(美国独立纪念日)？<br/>
	<input type="radio" name="q4" value="1">有
	<input type="radio" name="q4" value="2">没有
	<input type="radio" name="q4" value="3">不知道</div><br/>
	<div>5. 医生给你3个药丸，要你每30分钟吃1个，这些药丸多久后会被吃完？<br/>
	<input type="radio" name="q5" value="1">90分钟
	<input type="radio" name="q5" value="2">60分钟
	<input type="radio" name="q5" value="3">30分钟</div><br/>
	<input type="submit" value="提交" name="submit">
	</form>
<?php
	if(isset($_POST['submit']))
	{
		$q1=@$_POST['q1'];
		$q2=@$_POST['q2'];
		$q3=@$_POST['q3'];
		$q4=@$_POST['q4'];
		$q5=@$_POST['q5'];
		$i=0;
		if($q1=="1")
			$i++;
		if($q2=="3")
			$i++;
		if($q3=="2")
			$i++;
		if($q4=="1")
			$i++;
		if($q5=="2")
			$i++;
		$_SESSION['QA_points']=$i*20;			//使用Session将答题所得分数传到其他页面
		echo "<script>alert('您一共答对".$i."道题，得到".($i*20)."分');";
		echo "if(confirm('返回继续答题？'))";
		echo "window.location='SY7_1_QA.php';";
		echo "else ";
		//使用GET方式提交本页面的用户信息
		echo "window.location='SY7_1_main.php?username=$username&password=$password';";
		echo "</script>";
	}
}
else
	echo "您尚未登录，无权访问本页";
?>
