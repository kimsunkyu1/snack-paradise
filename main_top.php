<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?

	$cookie_no=$_COOKIE['cookie_no'];
	$cookie_name=$_COOKIE['cookie_name'];

?>
<html>
<head>
<title>인덕닷컴 쇼핑몰</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link href="include/font.css" rel="stylesheet" type="text/css">
<script language="Javascript" src="include/common.js"></script>
</head>

<body style="margin:0">
<center>

<table width="959" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr> 
		<td>
			<!--  상단 왼쪽 로고  -------------------------------------------->
			<table border="0" cellspacing="0" cellpadding="0" width="182">
				<tr>
					<td><a href="index.html"><img src="images/top_logo.gif" width="182" height="30" border="0"></a></td>
				</tr>
			</table>
		</td>
		<td align="right" valign="bottom">
			<!--  상단메뉴 Home/로그인/회원가입/장바구니/주문배송조회/즐겨찾기추가  ---->	
			<table border="0" cellspacing="0" cellpadding="0">
				<tr>
					<?
						if(!$cookie_no)
						{
							echo("<td width='959' align='center'><font color='white'>&nbsp <b>환영합니다 ! &nbsp;&nbsp 고객님.</b></font></td>");
						}
						else
						{
							echo("<td width='181' align='center'><font color='#666666'>&nbsp <b>환영합니다 ! &nbsp;&nbsp $cookie_name </b></font></td>");
						}
					?>
				</tr>
			</table>
		</td>
	</tr>
</table>

<!--  메인 이미지 --------------------------------------------------->
<table width="959" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr>
		<td><a href="index.html"><img src="images/mt.jpg" width="959" height="175" border="0"></a></td>
	</tr>
</table>

<!--  Category 메뉴 : 가로형인 경우  --------------------------------------
<table width="959" height="25" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr>
		<td align="left" bgcolor="#F7F7F7">
			<table border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td><a href="product.html?no=1"><img src="images/main_menu01_off.gif" width="96" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td>
					<td><a href="product.html?no=2"><img src="images/main_menu02_off.gif" width="96" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td>
					<td><a href="product.html?no=3"><img src="images/main_menu03_off.gif" width="96" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td>
					<td><a href="product.html?no=4"><img src="images/main_menu04_off.gif" width="96" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td>
					<td><a href="product.html?no=5"><img src="images/main_menu05_off.gif" width="96" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td>
					<td><a href="product.html?no=6"><img src="images/main_menu06_off.gif" width="96" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td>
					<td><a href="product.html?no=7"><img src="images/main_menu07_off.gif" width="96" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td>
					<td><a href="product.html?no=8"><img src="images/main_menu08_off.gif" width="96" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td>
					<td><a href="product.html?no=9"><img src="images/main_menu09_off.gif" width="96" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td>
					<td><a href="product.html?no=10"><img src="images/main_menu10_off.gif" width="96" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
------------------------------------------------------------------------>

<!-- 상품 검색 ------------------------------------->




<table width="959" height="20" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="red">
	<tr height="10"></tr>
	<tr>
		<td style="font-size:9pt;color:#666666;font-family:돋움;padding-left:5px;"></td>

		<td align="right" style="font-size:9pt;color:white;font-family:돋움;"><b>상품검색 ▶&nbsp</b></td>
		<!-- form1 시작 -->
		<form name="form1" method="post" action="product_search.php">
		<?//<td width="135">?>
		<td width="135" height="20">
			<input type="text" name="findtext" maxlength="40" size="20" class="cmfont1">
		</td>
		</form>
		<!-- form1 끝 -->
		<td width="0" align="left"><a href="javascript:Search()">&nbsp<img src="images/i_search1.gif" border="0"></a></td>
	</tr>

</table>




		<table width="959" height="40" border="0" cellspacing="0" cellpadding="0" bgcolor="red">
				<tr>
					<td align="center">
					<a href="index.html"><b><font color="white" size="2pt" face="굴림체">홈페이지</font></b></a>&nbsp&nbsp<font color="white">|</font>
				

				<?
				if(!$cookie_no)
				{
					echo("

					<a href='member_login.php'><b><font color='white' size='2pt' face='굴림체'>로그인</font></b></a>&nbsp&nbsp<font color='white'>|</font>


					<a href='member_agree.php'><b><font color='white' size='2pt' face='굴림체'>회원가입</font></b></a>&nbsp&nbsp<font color='white'>|</font>");
				}
				else
				{
					echo("

					<a href='member_logout.php'><b><font color='white' size='2pt' face='굴림체'>로그아웃</font></b></a>&nbsp&nbsp<font color='white'>|</font>


					<a href='member_edit.php'><b><font color='white' size='2pt' face='굴림체'>개인정보수정</font></b></a>&nbsp&nbsp<font color='white'>|</font>");
				}
				?>


					<a href="cart.php"><b><font color="white" size="2pt" face="굴림체">장바구니</font></b></a>&nbsp&nbsp<font color="white">|</font>

					<a href="jumun_login.php"><b><font color="white" size="2pt" face="굴림체">주문조회</font></b></a>&nbsp&nbsp<font color="white">|</font>

					<a href="qa.php"><b><font color="white" size="2pt" face="굴림체">고객문의</font></b></a>&nbsp&nbsp<font color="white">|</font>
					
					<a href="faq.php"><b><font color="white" size="2pt" face="굴림체">자주묻는질문</font></b></a>&nbsp&nbsp</td>
				</tr>
				
			</table>







<table width="959" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr><td height="10" colspan="2"></td></tr>
	<tr>
		<td height="100%" valign="top">
			<!--  화면 좌측메뉴 시작 (main_left) ------------------------------->
			<table width="181" border="0" cellspacing="0" cellpadding="0">
				<tr> 
					<td valign="top"> 
						<!--  Category 메뉴 : 세로인 경우 -------------------------------->
						<table width="177"  border="0" cellpadding="2" cellspacing="1" bgcolor="#afafaf">
							
							<tr><td height="30" bgcolor="#f0f0f0" align="center" style="font-size:12pt;color:#333333"><b><img src="images/category.JPG" width="176" height="65" border="0"></b></td></tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="product.php?menu=1"><img src="images/m1_off.JPG" width="176" height="40" border="0"  onmouseover="this.src='images/m1_on.JPG'" onmouseout="this.src='images/m1_off.JPG'"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="product.php?menu=2"><img src="images/m2_off.JPG" width="176" height="40" border="0"  onmouseover="this.src='images/m2_on.JPG'" onmouseout="this.src='images/m2_off.JPG'"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="product.php?menu=3"><img src="images/m3_off.JPG" width="176" height="40" border="0"  onmouseover="this.src='images/m3_on.JPG'" onmouseout="this.src='images/m3_off.JPG'"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="product.php?menu=4"><img src="images/m4_off.JPG" width="176" height="40" border="0"  onmouseover="this.src='images/m4_on.JPG'" onmouseout="this.src='images/m4_off.JPG'"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="product.php?menu=5"><img src="images/m5_off.JPG" width="176" height="42" border="0"  onmouseover="this.src='images/m5_on.JPG'" onmouseout="this.src='images/m5_off.JPG'"></a></td></tr>
									</table>
								</td>
							</tr>
							
						</table>
					</td>
				</tr>
				<tr><td height="10"></td></tr>

				<tr> 
					<td> 
						<!--  Custom Service 메뉴(QA, FAQ...) -->
						<table width="177"  border="0" cellpadding="2" cellspacing="1" bgcolor="#afafaf">
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td style="text-align: center;">
												<h2 style="background-color: #777;color:white;padding-top: 5px;padding-bottom: 5px;">고객센터</h2>
												<h2>02-000-0000</h2>
												<h2>010-0000-0000</h2>
											</td>
										</tr>
										<tr>
											<td style="text-align: center;">
												<h2 style="background-color: #777;color:white;padding-top: 5px;padding-bottom: 5px;">무통장 입금계좌</h2>
												<h2>국민(000000-00-000000)</h2>
												<h2>신한(000-00000-000-000)</h2>
												<h2>우리(000-0000-0000-000)</h2>
												<h2>하나(00000-000-000-000)</h2>
												<h2>예금주 : 김선규</h2>
											</td>
										</tr>
										<tr>
											<td style="text-align: center;">
												<h2 style="background-color: #777;color:white;padding-top: 5px;padding-bottom: 5px;">당일출고 안내</h2>
												<h2><color style="color:red";>PM 4시</color> 주문건까지 당일배송 해드립니다.</h2>
												<color style="color:#777";><h3>-묶음, 변경은 전화문의-</h3>
												<h3>-일부품목 익일발송-</h3></color>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<!--  화면 좌측메뉴 끝 (main_left) --------------------------------->
		</td>
		<td width="10"></td>
		<td valign="top">