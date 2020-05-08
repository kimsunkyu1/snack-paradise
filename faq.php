
<?
	include "main_top.php";
	include "common.php";

	$page = $_REQUEST['page'];
?>



<!-------------------------------------------------------------------------------------------->	
<!-- 시작 : 다른 웹페이지 삽입할 부분                                                       -->
<!-------------------------------------------------------------------------------------------->	

			<table border="0" cellpadding="0" cellspacing="0" width="747">
				<tr><td height="13"></td></tr>
				<tr>
					<td height="30"><img src="images/faq_title.gif" width="746" height="30" border="0"></td>
				</tr>
				<tr><td height="13"></td></tr>
			</table>

			<table border="0" cellpadding="0" cellspacing="0" width="690">
				<tr>
					<td height="30"><img src="images/faq_title1.gif" border="0"></td>
				</tr>
			</table>

			<table border="0" cellpadding="0" cellspacing="0" width="690" class="cmfont">
				<tr><td colspan="2" height="3" bgcolor="#FFCC00"></td></tr>
				<tr bgcolor="#FFF5D0" >
					<td width="90" height="25" align="center">번호</td>
					<td align="center">제목</td>
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
					echo("<tr><td height='1' bgcolor='#DEDCDD'colspan='4'></td></tr>
					<tr height='25' bgcolor='#FFFFFF'>	
						<td width='90' align='center'><font color='#686868'>$row[no14]</font></td>	
						<td><a href='faq_read.php?no=$row[no14]'><font color='#686868'>$row[title14]</font></a></td>	
					</tr>");
				}
			?>
				<tr><td colspan="2" height="2" bgcolor="#FFCC00"></td></tr>
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

<!-------------------------------------------------------------------------------------------->	
<!-- 끝 : 다른 웹페이지 삽입할 부분                                                         -->
<!-------------------------------------------------------------------------------------------->	

<?
	include "main_bottom.php";
?>

