<?
	include "main_top.php";
	include "common.php";
?>
<!-------------------------------------------------------------------------------------------->	
<!-- 시작 : 다른 웹페이지 삽입할 부분                                                       -->
<!-------------------------------------------------------------------------------------------->	

			<!--  현재 페이지 자바스크립  -------------------------------------------->
			<script language = "javascript">
			function SearchID() 
			{
				var uname = form2.name.value;
				var email = form2.email.value;
				if (form2.name.value == "") {
					alert("이름을 입력해 주십시오.");
					form2.name.focus();
					return;
				}
				if (form2.email.value == "") {
					alert("E-Mail을 입력해 주십시오.");
					form2.email.focus();
					return;
				}
				window.open("member_searchid.php?name="+uname+"&email="+email, "", "width=300, height=210, top=100, left=100, scrollbars=no, status=no");
				form2.reset();
			}
			function SearchPWD() 
			{
				var userid = form3.userid.value;
				var uname = form3.name.value;
				var email = form3.email.value;
				if (form3.userid.value == "") {
					alert("아이디를 입력해 주십시오.");
					form3.userid.focus();
					return;
				}
				if (form3.name.value == "") {
					alert("이름을 입력해 주십시오.");
					form3.name.focus();
					return;
				}
				if (form3.email.value == "") {
					alert("E-Mail을 입력해 주십시오.");
					form3.email.focus();
					return;
				}
				window.open("member_searchpw.php?userid="+userid+"&name="+uname+"&email="+email, "", "width=300, height=210, top=100, left=100, scrollbars=no, status=no");
				form3.reset();
			}
			</script>

			<table border="0" cellpadding="0" cellspacing="0" width="747">
				<tr><td height="13"></td></tr>
				<tr>
					<td height="30" align="center">
						<p><img src="images/login_title.gif" width="747" height="30" border="0"></p>
					</td>
				</tr>
				<tr><td height="47"></td></tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="747">
				<tr>
					<td width="747" align="center" valign="top">
						<table border="0" cellpadding="0" cellspacing="8" width="523" bgcolor="E9E9E9">
							<tr>
								<td height="260" align="center" bgcolor="white">
									<table border="0" cellpadding="0" cellspacing="0">
										<tr>
											<td width="110" align="center">
												<p><img src="images/login_idpw.gif" width="110" height="85" border="0"></p>
											</td>
											<td width="320">
												<table border="0" cellpadding="0" cellspacing="0" width="320">
													<tr>
														<td height="35">
															<p style="padding-left:10px;"><img src="images/login_text4.gif" border="0"></p>
														</td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
									<table border="0" cellpadding="0" cellspacing="0" width="512">
										<tr><td height="10"></td></tr>
										<tr><td height="2" bgcolor="E9E9E9"></td></tr>
										<tr><td height="10"></td></tr>
									</table>
									<table border="0" cellpadding="0" cellspacing="0" width="512">
										<tr>
											<td height="87" align="center" valign="top">
												<table border="0" cellpadding="0" cellspacing="0" width="255">
													<tr> 
														<td>
															<img src="images/login_text21.gif" width="225" height="39" border="0">
														</td>
													</tr>
													<tr> 
														<td height="26" align="center" valign="bottom">
															<!-- 시작 : form2 ------>
															<FORM NAME="form2" METHOD="post">
															<table border="0" cellpadding="0" cellspacing="0">
																<tr> 
																	<td width="50" height="25">이름</td>
																	<td><input type="text" name="name" size="15" class="cmfont1"></td>
																	<td width="60" rowspan="2" align="center"><a href="javascript:SearchID()"><img src="images/b_ok.gif" width="50" height="39" vspace="5" border="0" align="absmiddle"></a></td>
																</tr>
																<tr> 
 																	<td height="25">E-Mail</td>
																	<td><input type="text" name="email" size="15" maxlength="40" class="cmfont1"></td>
																</tr>
															</table>
															</FORM>
															<!-- 끝 : form2 ------>
														</td>
													</tr>
												</table>
											</td>
											<td width="2" bgcolor="E9E9E9"></td>
											<td align="center" valign="top">
												<table border="0" cellpadding="0" cellspacing="0" width="255">
													<tr>
														<td><img src="images/login_text22.gif" width="225" height="39" border="0"></td>
													</tr>
													<tr>
														<td height="26" align="center" valign="bottom">
															<!-- 시작 : form3 ------>
															<FORM NAME="form3" METHOD="post">
															<table border="0" cellpadding="0" cellspacing="0">
																<tr> 
																	<td width="50" height="25">아이디</td>
																	<td><input type="text" name="userid" size="15" class="cmfont1"></td>
																	<td width="60" rowspan="3" align="right" valign="top"><A HREF="javascript:SearchPWD()"><img src="images/b_ok.gif" width="50" height="39" vspace="5" border="0" align="absmiddle"></A></td>
																</tr>
																<tr> 
																	<td height="25">이름</td>
																	<td><input type="text" name="name" size="15" class="cmfont1"></td>
																</tr>
																<tr>
																	<td height="25">E-Mail</td>
																	<td><input type="text" name="email" size="15" maxlength="40" class="cmfont1"></td>
																</tr>
															</table>
															</FORM>
															<!-- 끝 : form3 ------>
														</td>
													</tr>
												</table>												
											</td>
										</tr>
									</table>							  
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>


<!-------------------------------------------------------------------------------------------->	
<!-- 끝 : 다른 웹페이지 삽입할 부분                                                         -->
<!-------------------------------------------------------------------------------------------->	

<?
	include "main_bottom.php";
?>