<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?
	include "../common.php";
	$page = $_REQUEST['page'];
?>
<html>
<head>
<title>쇼핑몰 홈페이지</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="include/font.css">
<script language="JavaScript" src="include/common.js"></script>
<script>
	function go_new()
	{
		location.href="faq_new.php";
	}
</script>
</head>

<body style="margin:0">

<center>
<br>
<script> document.write(menu());</script>

<table width="600" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td align="left"  height="50" valign="bottom">&nbsp 자료수 : <font color="#FF0000">2</font></td>
		<td align="right" height="50" valign="bottom">
			<input type="button" value="신규입력" onclick="javascript:go_new();"> &nbsp
		</td>
	</tr>
	<tr><td height="5" colspan="2"></td></tr>
</table>

<table width="600" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr bgcolor="#CCCCCC" height="20"> 
		<td width="50"  align="center"><font color="#142712">번호</font></td>
		<td width="450" align="center"><font color="#142712">제목</font></td>
		<td width="100" align="center"><font color="#142712">수정/삭제</font></td>
	</tr>
	<?
		$query="select * from faq";   
		$result = mysqli_query($db,$query);
		if(!$result) exit("에러:$query");
		$count=mysqli_num_rows($result); 

		if(!$page) $page=1;
		$pages = ceil($count/$page_line);
		$first = 1;
		if($count>0) $first = $page_line*($page-1);
		$page_last=$count-$first;
		if ($page_last>$page_line) $page_last=$page_line;
		if ($count>0) mysqli_data_seek($result,$first);

		for ($i=0;  $i<$page_last;  $i++)
		{
			$row = mysqli_fetch_array($result);
			echo("<tr bgcolor='#F2F2F2' height='20'>	
				<td width='50'  align='center'>$row[no14]</td>
				<td width='450' align='left'>$row[title14]</td>
				<td width='100' align='center'>
					<a href='faq_edit.php?no=$row[no14]&page=$page'>수정</a>/
					<a href='faq_delete.php?no=$row[no14]&page=$page' onclick='javascript:return confirm('삭제할까요 ?');'>삭제</a>
				</td>
			</tr>");
		}
	?>
</table>
<?
	$blocks = ceil($pages/$page_block);
	$block = ceil($page/$page_block);
	$page_s = $page_block * ($block-1);
	$page_e = $page_block * $block;
	if($blocks <= $block) $page_e = $pages;

	echo("<table width='700' border='0' cellpadding='0' cellspacing='0'>
	<tr>
		<td height='30' class='cmfont' align='center'>");

	if ($block > 1)
	{
		$tmp = $page_s;
		echo("<a href='faq.php?page=$tmp'>
		<img src='images/i_prev.gif' align='absmiddle' border='0' >
		</a>&nbsp");
	}
	for($i=$page_s+1; $i<=$page_e; $i++)
	{
		if ($page == $i)
			echo("<font color='red'><b>$i</b></font>&nbsp");
		else
			echo("<a href='faq.php?page=$i'>[$i]</a>&nbsp");
	}
	if ($block < $blocks)
	{
		$tmp = $page_e+1;
		echo("&nbsp<a href='faq.php?page=$tmp'><img src='images/i_next.gif' align='absmiddle' border='0'></a>");
	}
	echo("</td></tr></table>");
?>

</center>


</body>
</html>