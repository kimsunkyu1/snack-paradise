<?
	include "main_top.php";
	include "common.php";

	$cookie_no=$_COOKIE['cookie_no'];

	$no=$_REQUEST['no'];

	$sel1 = $_REQUEST['sel1'];
	$text1 = $_REQUEST['text1'];
	$page = $_REQUEST['page'];

	$query="select * from qa where no14=$no;";
	$result = mysqli_query($db,$query);
	if(!$result) exit("에러:$query");
	$row = mysqli_fetch_array($result);

	$row['count14']++;
	$query="update qa set count14='$row[count14]' where no14=$no;";
	$result = mysqli_query($db,$query);
	if(!$result) exit("에러:$query");


	$title=stripslashes($row['title14']); 
	$contents=stripslashes($row['contents14']); 
?>
<!-------------------------------------------------------------------------------------------->	
<!-- 시작 : 다른 웹페이지 삽입할 부분                                                       -->
<!-------------------------------------------------------------------------------------------->	

			<!--  현재 페이지 자바스크립  -------------------------------------------->
			<script Language="Javascript">

				function Go_Reply()	{
					form2.action="qa_reply.php";
					form2.submit();
				}

				function Check_Modify()	{
					if (form2.passwd.value)
					{
							form2.action="qa_pwcheck.php";
							form2.submit();
					}
					else
					{
						alert('암호를 입력하세요.');
						form2.passwd.focus();
					}
					return;
				}

				function Check_Delete()	{
					if (form2.passwd.value)
					{
							form2.action="qa_delete.php";
							form2.submit();
					}
					else
					{
						alert('암호를 입력하세요.');
						form2.passwd.focus();
					}
					return;
				}
			</script>

			<table border="0" cellpadding="0" cellspacing="0" width="747">
				<tr><td height="13"></td></tr>
				<tr>
					<td height="30"><img src="images/qa_title.gif" width="746" height="30" border="0"></td>
				</tr>
				<tr><td height="13"></td></tr>
			</table>

			<table border="0" cellpadding="0" cellspacing="0" width="690">
				<tr>
					<td><img src="images/qa_title1.gif" border="0"></td>
				</tr>
				<tr><td height="10"></td></tr>
			</table>

			<table border="0" cellpadding="0" cellspacing="0" width="690">
				<tr><td colspan="5" height="3" bgcolor="8B9CBF"></td></tr>
				<tr><td colspan="2" height="2"></td></tr>
				<tr>
					<td width="104" height="25" align="center" bgcolor="ECEFF4" class="cmfont">제목</td>
					<td width="586" class="cmfont">&nbsp;&nbsp;<?=$title?></td>
				</tr>
				<tr><td colspan="2" height="2"></td></tr>
				<tr><td colspan="2" background="images/ln1.gif"></td></tr>
				<tr><td colspan="2" height="2"></td></tr>
				<tr>
					<td width="104" height="25" align="center" bgcolor="ECEFF4" class="cmfont">작성자</td>
					<td width="586" class="cmfont">&nbsp;&nbsp;<a href="#"><?=$row['name14']?></a></td>
				</tr>
				<tr><td colspan="2" height="2"></td></tr>
				<tr><td colspan="2" background="images/ln1.gif"></td></tr>
				<tr><td colspan="2" height="2"></td></tr>
				<tr>
					<td width="104" height="25" align="center" bgcolor="ECEFF4" class="cmfont">날짜</td>
					<td width="586" class="cmfont">&nbsp;&nbsp;<?=$row['writeday14']?></td>
				</tr>
				<tr><td colspan="2" height="2"></td></tr>
				<tr><td colspan="2" background="images/ln1.gif"></td></tr>
				<tr><td colspan="2" height="2"></td></tr>
				<tr>
					<td width="104" height="25" align="center" bgcolor="ECEFF4" class="cmfont">조회</td>
					<td width="586" class="cmfont">&nbsp;&nbsp;<?=$row['count14']?></td>
				</tr>
				<tr><td colspan="2" height="2"></td></tr>
				<tr><td colspan="2" background="images/ln1.gif"></td></tr>
				<tr><td colspan="2" height="2"></td></tr>
				<tr>
					<td width="104" height="25" align="center" bgcolor="ECEFF4" class="cmfont">내용</td>
					<td width="586" class="cmfont">
						<p style="padding-left:5px;padding-top:5px;padding-right:5px;padding-bottom:5px;"><?=$contents?></p>
					</td>
				</tr>
				<tr><td colspan="2" height="2"></td></tr>
			</table>

			<table border="0" cellpadding="0" cellspacing="0" width="690">
				<tr><td height="3" bgcolor="8B9CBF"></td></tr>
				<tr><td height="5" bgcolor="white"></td></tr>
			</table>

			<table border="0" cellpadding="0" cellspacing="0" width="690">
				<!--  form2 시작 -->
				<form name = "form2" method = "post" action="qa.php">
				<input type="hidden" name="page" value="1">
				<input type="hidden" name="sel1"  value="1">
				<input type="hidden" name="text1" value="">
				<input type="hidden" name="no" value="<?=$no;?>">

				<tr>
					<?
					if($cookie_no) {
						echo("<td>
							&nbsp;Password : <input type='password' name='passwd' size='10' maxlength='20' value='' class='cmfont1'>			
						</td>
						<td align='right'>
								<a href='javascript:Go_Reply();'><img src='images/b_reply.gif' border='0'></a>&nbsp;
								<a href='javascript:Check_Modify();'><img src='images/b_modify.gif' border='0'></a>&nbsp;
								<a href='javascript:Check_Delete();'><img src='images/b_delete.gif' border='0'></a>&nbsp;
								<a href='qa.php?page=$page&sel1=$sel1&text1=$text'> <img src='images/b_list.gif' border='0'></a>&nbsp;
						</td>");
						}
					?>
				</tr>
				</form>
				<!--  form2 끝 -->
			</table>

<!-------------------------------------------------------------------------------------------->	
<!-- 끝 : 다른 웹페이지 삽입할 부분                                                         -->
<!-------------------------------------------------------------------------------------------->	
<?
	include "main_bottom.php";
?>