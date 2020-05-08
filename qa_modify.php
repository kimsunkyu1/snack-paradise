<?
	include "main_top.php";
	include "common.php";

	$no=$_REQUEST['no'];
	
	$query="select * from qa where no14 = $no";
	$result = mysqli_query($db,$query);
	if(!$result) exit("에러:$query");

	$row = mysqli_fetch_array($result);

	$title=stripslashes($row['title14']); 
	$contents=stripslashes($row['contents14']); 
?>
<!-------------------------------------------------------------------------------------------->	
<!-- 시작 : 다른 웹페이지 삽입할 부분                                                       -->
<!-------------------------------------------------------------------------------------------->	

			<!--  현재 페이지 자바스크립  -------------------------------------------->
			<script Language="Javascript">

			function Check_Value() {
				if (!form2.title.value) {
					alert('글제목을 입력하여 주십시요');
					form1.title.focus();
					return;    		
				}
				if (!form2.name.value) {
					alert('이름을 입력하여 주십시요');
					form2.name.focus();
					return;    		
				}
			  if (!form2.passwd.value) {
					alert('암호를 입력하여 주십시요');
					form2.password.focus();
					return;    		
				}
				form2.submit();
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

				<!--  form2 시작 -->
				<form name = "form2" method = "post" action = "qa_update.php">
				<input type="hidden" name="page" value="<?=$page;?>">
				<input type="hidden" name="sel1"  value="<?=$sel1;?>">
				<input type="hidden" name="text1" value="<?=$text1;?>">
				<input type="hidden" name="no" value="<?=$no;?>">

				<tr><td colspan="2" height="2"></td></tr>
				<tr>
					<td width="104" height="25" align="center" bgcolor="ECEFF4" class="cmfont">제목</td>
					<td width="586">
						&nbsp;&nbsp;<input type="text" name="title" maxlength="50" size="70" class="cmfont1" value="<?=$title;?>">
					</td>
				</tr>
				<tr><td colspan="2" height="2"></td></tr>
				<tr><td colspan="2" background="images/ln1.gif"></td></tr>
				<tr><td colspan="2" height="2"></td></tr>
				<tr>
					<td width="104" height="25" align="center" bgcolor="ECEFF4" class="cmfont">작성자</td>
					<td width="586">
						&nbsp;&nbsp;<input type="text" name="name" value="<?=$row['name14'];?>" size="15" class="cmfont1"><br>
					</td>
				</tr>
				<tr><td colspan="2" height="2"></td></tr>
				<tr><td colspan="2" background="images/ln1.gif"></td></tr>
				<tr><td colspan="2" height="2"></td></tr>
				<tr>
					<td width="104" height="25" align="center" bgcolor="ECEFF4" class="cmfont">Password</td>
					<td width="586">
						&nbsp;&nbsp;<input type="password" name="passwd" value="<?=$row['passwd14'];?>" size="10" class="cmfont1"><br>
					</td>
				</tr>
				<tr><td colspan="2" height="2"></td></tr>
				<tr><td colspan="2" background="images/ln1.gif"></td></tr>
				<tr><td colspan="2" height="2"></td></tr>
				<tr>
					<td width="104" height="25" align="center" bgcolor="ECEFF4" class="cmfont">E-Mail</td>
					<td width="586">
						&nbsp;&nbsp;<input type="text" name="email" value="<?=$row['email14'];?>" size="30" class="cmfont1"><br>
					</td>
				</tr>
				<tr><td colspan="2" height="2"></td></tr>
				<tr><td colspan="2" background="images/ln1.gif"></td></tr>
				<tr><td colspan="2" height="2"></td></tr>
				<tr>
					<td width="104" height="25" align="center" bgcolor="ECEFF4" class="cmfont">형식</td>
					
					
					<td width="586" class="cmfont">
						<?
							if($row['ishtml14'] == 0) {
								echo("&nbsp;&nbsp;<input type='radio' name='ishtml' value='0' checked>Text <input type='radio' name='ishtml' value='1'>Html");
							}
							else {
								echo("&nbsp;&nbsp;<input type='radio' name='ishtml' value='0'>Text <input type='radio' name='ishtml' value='1' checked>Html");
							}
						?>
					</td>
				</tr>
				<tr><td colspan="2" height="2"></td></tr>
				<tr><td colspan="2" background="images/ln1.gif"></td></tr>
				<tr><td colspan="2" height="2"></td></tr>
				<tr>
					<td width="104" height="25" align="center" bgcolor="ECEFF4" class="cmfont">내용</td>
					<td width="586">
						&nbsp;&nbsp;<textarea name="content" rows="20" cols="70" class="cmfont1" align="left"><?=$contents;?></textarea>
					</td>
				</tr>
				<tr><td colspan="2" height="2"></td></tr>
				</form>
				<!--  form2 끝 -->
			</table>

			<table border="0" cellpadding="0" cellspacing="0" width="690">
				<tr><td height="3" bgcolor="8B9CBF"></td></tr>
				<tr><td height="5" bgcolor="white"></td></tr>
			</table>

			<table border="0" cellpadding="0" cellspacing="0" width="690">
				<tr>
					<td align="right">
							<a href="javascript:Check_Value()"><img src="images/b_save.gif" border="0"></a>&nbsp;
							<a href="javascript:history.back()"><img src="images/b_list.gif" border="0"></a>
					</td>
					<td width="50"></td>
				</tr>
			</table>

<!-------------------------------------------------------------------------------------------->	
<!-- 끝 : 다른 웹페이지 삽입할 부분                                                         -->
<!-------------------------------------------------------------------------------------------->	

<?
	include "main_bottom.php";
?>