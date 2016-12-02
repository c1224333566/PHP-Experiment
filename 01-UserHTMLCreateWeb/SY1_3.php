<html>
<head>
	<title>学生个人信息</title>
	<style type="text/css">
	<!--
		.STYLE1{font-size: 20px; font-family: "黑体"; color:blue;}
		.STYLE2{font-size: 15px; font-family: "幼圆";}
	-->
	</style>
</head>
<body>
<form name="form" method="post" action="">
	<table width="400" border="0" align="center" bgcolor="#CCFFCC">
    	<tr>
      		<td colspan="2" bgcolor="#999999"><div align="center" class="STYLE1">学生个人信息</div></td>
    	</tr>
    	<tr>
      		<td width="120" class="STYLE2">学号:</td>
      		<td><input name="XH" type="text" value="081101"></td>
    	</tr>
    	<tr>
      		<td class="STYLE2">姓名：</td>
      		<td><input name="XM" type="text" value="王林"></td>
    	</tr>
    	<tr>
      		<td class="STYLE2">性别：</td>
      		<td>
      			<input name="SEX" type="radio" value="男" checked="checked">男
        		<input name="SEX" type="radio" value="女">女
        	</td>
    	</tr>
    	<tr>
      		<td class="STYLE2">出生日期：</td>
      		<td><input name="Birthday" type="text" value="1989-05-06"></td>
    	</tr>
    	<tr>
      		<td class="STYLE2">所学专业：</td>
      		<td>
      			<select name="ZY">
          			<option>计算机</option>
          			<option>软件工程</option>
          			<option>信息管理</option>
        		</select>
        	</td>
    	</tr>
    	<tr>
      		<td class="STYLE2">所学课程：</td>
      		<td>
      			<select name="KC" size="3" multiple>
          			<option selected>计算机导论</option>
          			<option selected>数据结构</option>
          			<option>数据库原理</option>
          			<option>操作系统</option>
          			<option>计算机网络</option>
        		</select>
        	</td>
    	</tr>
    	<tr>
      		<td class="STYLE2">备注：</td>
      		<td><textarea name="BZ">团员</textarea></td>
    	</tr>
    	<tr>
      		<td class="STYLE2">兴趣：</td>
      		<td>
      			<input name="XQ" type="checkbox" value="听音乐" checked="checked" >听音乐
          		<input name="XQ" type="checkbox" value="看小说">看小说
          		<input name="XQ" type="checkbox" value="上网" checked="checked">上网
          	</td>
    	</tr>
    	<tr>
      		<td align="center" colspan="2">
      			<input type="submit" name="button1" value="提交">
      			<input type="reset" name="button2" value="重置">
      		</td>
    	</tr>
	</table>
</form>
</body>
</html>
