<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?
	include "common.php";

	$name = $_REQUEST['name'];
	$email = $_REQUEST['email'];

	$query="select uid14 from member where name14='$name' and email14='$email';";
	$result=mysqli_query($db,$query);
	if(!$result) exit("에러:$query");

	$count=mysqli_num_rows($result);
					
	$row=mysqli_fetch_array($result);
?>
<html>
<head>
<title>회원 ID 조회</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="include/font.css">

<body bgcolor="#FFFFFF" text="#000000"  marginwidth="0" marginheight="0">
<table border="0" width="300" cellspacing="0" cellpadding="0">
	<tr>
		<td  height="30" bgcolor="blue"><font color="white" size="3"><b>&nbsp;회원 ID 확인</b></font></td>
	</tr>
	<tr>
		<td  height="40"></td>
	</tr>
	<tr>
		<td height="50" valign="middle" align="center">
			<?
				if($count>0)
					echo("<font color='#666666'>문의하신 아이디는 <font color='red'>$row[uid14]</font> 입니다.</font>");
				else
					echo("<font color='#666666'>문의하신 아이디는 없습니다.</font>");
			?>
		</td>
	</tr>
	<tr>
		<td height="50" align="center">
			<a href="javascript:self.close();"><img src="images/b_ok1.gif" border="0"></a>
		</td>
	</tr>
</table>
	 
</body>
</html>