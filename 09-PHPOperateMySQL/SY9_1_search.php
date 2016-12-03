<?php
$conn=mysqli_connect("localhost","root","") or die('连接失败');	//连接服务器
mysqli_select_db($conn,"YGGL") or die('连接数据库失败');			//选择数据库
mysqli_query($conn,"SET NAMES 'utf8'");								//设置字符集
$Number=@$_GET['Number'];   		  							//获取编号
$Name=@$_GET['Name'];       		 	 						//获取姓名
$Depart=@$_GET['Depart'];           							//获取部门名
//生成查询语句的getsql函数
function getsql($Num,$Na,$Dep)
{
	$sql="select * from Employees where ";
	$note=0;
	if($Num)
	{
		//如果填写了编号则在where子句后设置查询条件
   		$sql.="EmployeeID like '%$Num%'";		
   		$note=1;
	}
	if($Na)
	{  	
		//如果填写了姓名则在$sql后连接查询条件
		if($note==1)	
			$sql.=" and Name like '%$Na%'";
	  	else
	   		$sql.="Name like '%$Na%'";
	  	$note=1;
	}
	if($Dep&&($Dep!="所有部门"))
	{	 
		 if($note==1)  
			$sql.=" and DepartmentID=(select DepartmentID from Departments 
								where DepartmentName='$Dep')";
		 else
		 {
	   		$sql.="DepartmentID=(select DepartmentID from Departments 
								where DepartmentName='$Dep')";
	   		$note=1;
		 }
	}
	if($note==0)  
	{  
		//如果什么条件都没设则查询所有记录
		$sql="select * from Employees"; 
	}
	return $sql;								//返回SQL语句
}
$sql=getsql($Number,$Name,$Depart);				//得到查询语句
$result=mysqli_query($conn,$sql);
$total=mysqli_num_rows($result);
$page=isset($_GET['page'])?$_GET['page']:1;	 	//获取地址栏中page的值，不存在则设为1
$num=5;                                      	//每页显示5条记录
$url='SY9_1_yg.php';						 	//本页URL
//页码计算
$pagenum=ceil($total/$num);						//获得总页数，也是最后一页
$page=min($pagenum,$page);						//获得首页
$prepg=$page-1;									//上一页
$nextpg=($page==$pagenum? 0: $page+1);		 	//下一页
$new_sql=$sql." limit ".($page-1)*$num.",".$num;		//查找$num条记录的查询语句
$new_result=mysqli_query($conn,$new_sql);
if($new_row=mysqli_fetch_array($new_result))
{   
	//若有查询结果，则以表格形式输出员工信息
	echo "<br><center><font size=5 face=楷体_GB2312 color=#0000FF>
		员工信息查询结果</font></center>";
	echo "<table width=500 border=1 align=center cellpadding=0 cellspacing=0 class=STYLE1>";
    	echo "<tr bgcolor=#CCCCCC><td>编号</td>";
    	echo "<td>姓名</td>";
    	echo "<td>学历</td>";
    	echo "<td>性别</td>";
    	echo "<td>出生日期</td>";
    	echo "<td>所在部门</td></tr>";
	do
	{
		list($number,$name,$edu,$birthday,$sex,$workyear,$phone,$add,$depid)=$new_row;
		//查找部门名称的SQL语句
		$d_sql="select DepartmentName from Departments where DepartmentID=$depid";
		$d_result=mysqli_query($conn,$d_sql);
		$d_row=mysqli_fetch_row($d_result);
     	echo "<tr><td>$number</td>";			//输出编号
      	echo "<td>$name</td>";					//输出姓名
      	echo "<td>$edu</td>";					//输出学历
		if($sex=='1')
		  	echo "<td>男</td>";
		else 
		  	echo "<td>女</td>"; 
	  	$timeTemp=strtotime($birthday);     	//将日期时间解析为 UNIX 时间戳
	  	$date=date("Y-n-j",$timeTemp); 			//用date函数将时间转换为“年-月-日”形式
	  	echo "<td>$date</td>";					//输出出生日期
      	echo "<td>$d_row[0]</td>";				//输出所在部门的名称
      	echo "</tr>";  
	}while($new_row=mysqli_fetch_array($new_result));
   	echo "</table>";
   	//开始分页导航条代码
	$pagenav="";
	if($prepg) 
		$pagenav.="<a href='$url?page=$prepg&Number=$Number&Name=$Name&Depart=$Depart'>
				上一页</a> ";  
	for($i=1;$i<=$pagenum;$i++)
	{
		if($page==$i) 	$pagenav.=$i." ";
		else 
		$pagenav.=" <a href='$url?page=$i&Number=$Number&Name=$Name&Depart=$Depart'>
				 $i</a> "; 
	}
	if($nextpg) 
	$pagenav.=" <a href='$url?page=$nextpg&Number=$Number&Name=$Name&Depart=$Depart'>
			下一页</a>"; 
	$pagenav.="共(".$pagenum.")页";
	//输出分页导航
	echo "<br/><div align=center class=STYLE1><b>".$pagenav."</b></div>";	   
}
else
   	echo "<script>alert('无记录!');location.href='SY9_1_yg.php';</script>";
?>
