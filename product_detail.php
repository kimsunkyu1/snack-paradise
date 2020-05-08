<?
	include "main_top.php";
	include "common.php";
	$no=$_REQUEST['no'];

?>

<!-------------------------------------------------------------------------------------------->	
<!-- 시작 : 다른 웹페이지 삽입할 부분                                                       -->
<!-------------------------------------------------------------------------------------------->	

			<!--  현재 페이지 자바스크립  -------------------------------------------->
			<script language = "javascript">

			function Zoomimage(no) 
			{
				window.open("zoomimage.php?no="+no, "", "menubar=no, scrollbars=yes, width=560, height=640, top=30, left=50");
			}

			function check_form2(str) 
			{
				if (!form2.opts1.value) {
						alert("옵션1을 선택하십시요.");
						form2.opts1.focus();
						return;
				}
				if (!form2.opts2.value) {
						alert("옵션2를 선택하십시요.");
						form2.opts2.focus();
						return;
				}
				if (!form2.num.value) {
						alert("수량을 입력하십시요.");
						form2.num.focus();
						return;
				}
				if (str == "D") {
					form2.action = "cart_edit.php";
					form2.kind .value = "order";
					form2.submit();
				}
				else {
					form2.action = "cart_edit.php";
					form2.submit();
				}
			}

			</script>

			<table border="0" cellpadding="0" cellspacing="0" width="747">
				<tr><td height="13"></td></tr>
				<tr>
					<td height="30"><img src="images/product_title3.gif" width="746" height="30" border="0"></td>
				</tr>
				<tr><td height="10"></td></tr>
			</table>

			<?
				$query="select * from product where no14=$no;";
				$result = mysqli_query($db,$query);
				if(!$result) exit("에러:$query");

				$row = mysqli_fetch_array($result);

				$price = number_format($row['price14']);
				$dcprice = number_format( round($row['price14']*(100-$row['discount14'])/100, -1) );
			?>

			<!-- form2 시작  -->
			<form name="form2" method="post" action="">
			<input type="hidden" name="no" value="<?=$no?>">
			<input type="hidden" name="kind" value="insert">

			<table border="0" cellpadding="0" cellspacing="0" width="745">
				<tr>
					<td width="335" align="center" valign="top">
						<!-- 상품이미지 -->
						<table border="0" cellpadding="0" cellspacing="1" width="315" height="315" bgcolor="D4D0C8">
							<tr>
								<td bgcolor="white" align="center">
									<img src="product/<?=$row['image1']?>" width="315" height="315" border="0" align="absmiddle" ONCLICK="Zoomimage('<?=$no?>')" STYLE="cursor:hand">
								</td>
							</tr>
						</table>
					</td>
					<td width="410 " align="center" valign="top">
						<!-- 상품명 -->
						<table border="0" cellpadding="0" cellspacing="0" width="370" class="cmfont">
							<tr><td colspan="3" bgcolor="E8E7EA"></td></tr>
							<tr>
								<td width="80" height="45" style="padding-left:10px">
									<img src="images/i_dot1.gif" width="3" height="3" border="0" align="absmiddle">
									<font color="666666"><b>제품명</b></font>
								</td>
								<td width="1" bgcolor="E8E7EA"></td>
								<td style="padding-left:10px">
									<font color="282828"><?=$row['name14']?></font><br>
								<?
									if($row['icon_new14']==1)
										echo("<img src='images/i_new.gif' align='absmiddle' vspace='1'>");
									if($row['icon_hit14']==1)
										echo("<img src='images/i_hit.gif' align='absmiddle' vspace='1'>");
									if($row['icon_sale14']==1)
										echo("<img src='images/i_sale.gif' align='absmiddle' vspace='1'>");
								?>
								</td>
							</tr>
							<tr><td colspan="3" bgcolor="E8E7EA"></td></tr>
							<!-- 시중가 -->
							<tr>
								<td width="80" height="35" style="padding-left:10px">
									<img src="images/i_dot1.gif" width="3" height="3" border="0" align="absmiddle">
									<font color="666666"><b>소비자가</b></font>
								</td>
								<td width="1" bgcolor="E8E7EA"></td>
								<td width="289" style="padding-left:10px"><font color="666666"><?=$price?> 원</font></td>
							</tr>
							<tr><td colspan="3" bgcolor="E8E7EA"></td></tr>
							<!-- 판매가 -->
							<tr>
								<td width="80" height="35" style="padding-left:10px">
									<img src="images/i_dot1.gif" width="3" height="3" border="0" align="absmiddle">
								<?
								if($row['discount14'] == 0)
								{
								echo("<font color='666666'><b>판매가</b></font>
								</td>
								<td width='1' bgcolor='E8E7EA'></td>
								<td style='padding-left:10px'><font color='0288DD'><b>$price 원</b></font></td>");
								}
								else
								{
								echo("<font color='666666'><b>판매가</b></font>
								</td>
								<td width='1' bgcolor='E8E7EA'></td>
								<td style='padding-left:10px'><font color='0288DD'><b>$dcprice 원</b></font></td>");
								}
								?>
							</tr>
							<tr><td colspan="3" bgcolor="E8E7EA"></td></tr>
							<!-- 옵션 -->
							<?
								$query="select * from opts where opt_no14=$row[opt1];";
								$result = mysqli_query($db,$query);
								if(!$result) exit("에러:$query");

								$count = mysqli_num_rows($result);
						
							?>
							<tr>
								<td width="80" height="35" style="padding-left:10px">
									<img src="images/i_dot1.gif" width="3" height="3" border="0" align="absmiddle">
									<font color="666666"><b>옵션선택</b></font>
								</td>
								<td width="1" bgcolor="E8E7EA"></td>
								<td style="padding-left:10px">

									<select name="opts1" class="cmfont1">

										<option value="">옵션선택</option>
										<?
										for($i=0;$i<$count;$i++)
										{
											$row1 = mysqli_fetch_array($result);
											echo("<option value='$row1[no14]'>$row1[name14]</option>");
										}
										?>
										
									</select> &nbsp;


									<select name="opts2" class="cmfont1">
								
										<option value="">옵션2선택</option>
									<?
										$query="select * from opts where opt_no14=$row[opt2];";
										$result = mysqli_query($db,$query);
										if(!$result) exit("에러:$query");

										$count = mysqli_num_rows($result);

										mysqli_data_seek($result,0);

										for($i=0;$i<$count;$i++)
										{
												$row1 = mysqli_fetch_array($result);
												echo("<option value='$row1[no14]'>$row1[name14]</option>");
										}
										?>
									</select>
								</td>
							</tr>
							<tr><td colspan="3" bgcolor="E8E7EA"></td></tr>
							<!-- 수량 -->
							<tr>
								<td width="80" height="35" style="padding-left:10px">
									<img src="images/i_dot1.gif" width="3" height="3" border="0" align="absmiddle">
									<font color="666666"><b>수량</b></font>
								</td>
								<td width="1" bgcolor="E8E7EA"></td>
								<td style="padding-left:10px">
									<input type="text" name="num" value="1" size="3" maxlength="5" class="cmfont1"> <font color="666666">개</font>
								</td>
							</tr>
							<tr><td colspan="3" bgcolor="E8E7EA"></td></tr>
						</table>
						<table border="0" cellpadding="0" cellspacing="0" width="370" class="cmfont">
							<tr>
								<td height="70" align="center">
									<a href="javascript:check_form2('D')"><img src="images/b_order.gif" border="0" align="absmiddle"></a>&nbsp;&nbsp;&nbsp;
									<a href="javascript:check_form2('C')"><img src="images/b_cart.gif"  border="0" align="absmiddle"></a>
								</td>
							</tr>
						</table>
						<table border="0" cellpadding="0" cellspacing="0" width="370" class="cmfont">
							<tr>
								<td height="30" align="center">
									<img src="images/product_text1.gif" border="0" align="absmiddle">
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			</form>
			<!-- form2 끝  -->

			<table border="0" cellpadding="0" cellspacing="0" width="747">
				<tr><td height="22"></td></tr>
			</table>

			<!-- 상세설명 -->
			<table border="0" cellpadding="0" cellspacing="0" width="747">
				<tr><td height="13"></td></tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="746">
				<tr>
					<td height="30" align="center">
						<img src="images/product_title.gif" width="746" height="30" border="0">
					</td>
				</tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="746" style="font-size:9pt">
				<tr><td height="13"></td></tr>
				<tr>
					<td align="center" height="200" valign=top style="line-height:14pt">
						<br>
						<?=$row['contents14']?>
						<br>
						<br>
						<center>
						<img src="product/<?=$row['image1']?>" width="700" border="0" align="absmiddle">&nbsp
						<img src="product/<?=$row['image2']?>" width="700" border="0" align="absmiddle">&nbsp
						<img src="product/<?=$row['image3']?>" width="500" border="0" align="absmiddle"><br><br><br>
						
						
						<!----<img src="product/<?=$row[image2]?>">&nbsp!---->
						<!----<img src="product/<?=$row[image3]?>"><br><br>---->
						<!----<img src="product/<?=$row[image1]?>">&nbsp---->
						<!----<img src="product/<?=$row[image2]?>"><br><br>?>---->
						</center>
					</td>
				</tr>
			</table>

			<!-- 교환배송정보 -->
			<table border="0" cellpadding="0" cellspacing="0" width="746" class="cmfont">
				<tr><td height="10"></td></tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="746">
				<tr>
					<td align="center" class="cmfont"><br>
					<h3>배송안내</h3>
					-주문당일 <b>오후 2시이전 결제완료</b>시 당일출고 됩니다.<br>
					-<b>10만원 이상</b> 무료배송 입니다.<br>
					-재고부족 상품은 하루정도 더 소요 될 수도 있습니다. 재고 확보 불가능시 따로 연락드립니다.<br>
					-상품 포장디자인은 수시로 변경될 수 있습니다. 특정 디자인은 꼭 전화문의 후 주문바랍니다.<br>
					-<b>군부대 배송</b>은 꼭 전화문의후 우체국택배로 발송해야 합니다.<br>
					-유통기한은 기재된제품을 제외하고 최신제조상품으로 출고됩니다.<br>

					<h3>파손 및 누락 보상 절차안내</h3>
					-물품 수령 후 꼭 수량과 품목을 확인해주세요.<br>
					-이상이 있을시에는 꼭 외부 박스 사진과 상품 사진이 필요합니다.<br>
					-게시판이 아닌 꼭 전화로 문의접수 하여주시면 빠른 처리가 가능합니다.<br>
					-상황에 따라 교환 및 반품 보상처리가 진행됩니다.<br>
					</td>
				</tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="746" class="cmfont">
				<tr><td height="10"></td></tr>
			</table>


<!-------------------------------------------------------------------------------------------->	
<!-- 끝 : 다른 웹페이지 삽입할 부분                                                         -->
<!-------------------------------------------------------------------------------------------->	

<?
	include "main_bottom.php";
?>