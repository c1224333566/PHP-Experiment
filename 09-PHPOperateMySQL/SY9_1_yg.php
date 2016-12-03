<html>
<head>
	<title>员工信息查询</title>
	<meta charset="utf-8">
	<style type="text/css">
	<!--
		.STYLE1 {font-size: 15px; font-family: "幼圆";}
		.STYLE2 {font-size: 15px; font-family: "幼圆";color:"#800080";}
	-->
	</style>
</head>
<body bgcolor="D9DFAA">
<div align=center><font face="幼圆" size="5" color="#008000"><b>员工信息查询</b></font></div>
<form action="" method="get" style="margin:0">
<table width="500" border="1" align="center" cellpadding=0 cellspacing=0>
<tr>
	<td height="10" class="STYLE1" bgcolor="#CCCCCC">编号:</td>
	<td><input name="Number" size="13" type="text"></td>
	<td class="STYLE1" bgcolor="#CCCCCC">姓名:</td>
	<td><input type="text" size="13" name="Name"></td>
	<td class="STYLE1" bgcolor="#CCCCCC">部门:</td>
	<td><select name="Depart">
		<option>所有部门</option>
       	 <?php
       	 $conn=mysqli_connect("localhost","root","") or die('连接失败');	//连接服务器
		 mysqli_select_db($conn,"YGGL") or die('连接数据库失败');			//选择数据库
		 mysqli_query($conn,"SET NAMES 'utf8");								//设置字符集
		
       	 $sql="select * from Departments";
       	 $result=mysqli_query($conn,$sql);
       	 while($row=mysqli_fetch_array($result))
       	 {
       	 	echo "<option>".$row['DepartmentName']."</option>";			//输出部门名
       	 }
       	 ?>
    	 </select>
    </td>
	<td bgcolor="#CCCCCC" align="center">
		<input type="submit" name="Query" class="STYLE1" value="查询">
	</td>
</tr>
</table>
</form>
<?php
@include "SY9_1_search.php";											//包含SY9_1_search.php页面
?>
</body>
</html>
