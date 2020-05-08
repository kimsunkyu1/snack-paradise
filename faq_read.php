
<?
	include "main_top.php";
	include "common.php";

	$no = $_REQUEST['no'];

	$query="select * from faq where no14 = $no;";   
	$result = mysqli_query($db,$query);
	if(!$result) exit("에러:$query");
	$row = mysqli_fetch_array($result);
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

			<table border="0" cellpadding="0" cellspacing="0" width="690">
				<tr><td colspan="5" height="3" bgcolor="#FFCC00"></td></tr>
				<tr><td colspan="2" height="2"></td></tr>
				<tr>
					<td width="104" height="25" align="center" bgcolor="#FFF5D0" class="cmfont">제목</td>
					<td width="586" class="cmfont">&nbsp;&nbsp;<?=$row['title14'];?></td>
				</tr>
				<tr><td colspan="2" height="2"></td></tr>
				<tr><td colspan="2" background="images/line_dot.gif"></td></tr>
				<tr><td colspan="2" height="2"></td></tr>
				<tr>
					<td width="104" height="25" align="center" bgcolor="#FFF5D0" class="cmfont">내용</td>
					<td width="586" height="50" class="cmfont">
						<p style="padding-left:5px;padding-top:5px;padding-right:5px;padding-bottom:5px;"><?=$row['contents14'];?></p>
					</td>
				</tr>
				<tr><td colspan="2" height="2"></td></tr>
			</table>

			<table border="0" cellpadding="0" cellspacing="0" width="690">
				<tr><td height="3" bgcolor="#FFCC00"></td></tr>
				<tr><td height="5" bgcolor="white"></td></tr>
			</table>

			<table border="0" cellpadding="0" cellspacing="0" width="690">
				<tr>
					<td align="right">
						<a href="javascript:history.back()"><img src="images/b_list.gif" border="0"></a>&nbsp;
					</td>
				</tr>
			</table>

<!-------------------------------------------------------------------------------------------->	
<!-- 끝 : 다른 웹페이지 삽입할 부분                                                         -->
<!-------------------------------------------------------------------------------------------->	

<?
	include "main_bottom.php";
?>