<?
	include "main_top.php";
	include "common.php";

	$no = $_REQUEST['no'];
	$page = $_REQUEST['page'];
?>
<!-------------------------------------------------------------------------------------------->	
<!-- 시작 : 다른 웹페이지 삽입할 부분                                                       -->
<!-------------------------------------------------------------------------------------------->	

			<table border="0" cellpadding="0" cellspacing="0" width="747">
				<tr><td height="13"></td></tr>
				<tr>
					<td height="30" align="center"><img src="images/jumun_title.gif" width="746" height="30" border="0"></td>
				</tr>
				<tr><td height="13"></td></tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="690">
				<tr>
					<td><img src="images/jumun_title2.gif" border="0" align="absmiddle"></td>
				</tr>
				<tr><td height="5"></td></tr>
			</table>

			<table border="0" cellpadding="0" cellspacing="0" width="685" class="cmfont">
				<tr><td colspan="6" height="2" bgcolor="8B9CBF"></td></tr>
				<tr>
					<td width="60"  bgcolor="F2F2F2" align="center" height="30"></td>
					<td width="395" bgcolor="F2F2F2" align="center">상품명</td>
					<td width="50"  bgcolor="F2F2F2" align="center">수량</td>
					<td width="90"  bgcolor="F2F2F2" align="center">금액</td>
					<td width="90"  bgcolor="F2F2F2" align="center">합계</td>
				</tr>
				<tr><td colspan="6" bgcolor="DEDCDD"></td></tr>
			<?
				//$query = "select * from jumuns where jumun_no14 = $no;";
				$query = "select jumuns.*, product.*, opts1.name14 as opts1_name, opts2.name14 as opts2_name FROM ((jumuns JOIN product ON jumuns.product_no14 = product.no14)
				JOIN opts as opts1 ON jumuns.opts_no1 = opts1.no14)
				JOIN opts as opts2 ON jumuns.opts_no2 = opts2.no14
				where jumuns.jumun_no14 = $no;";

				$result = mysqli_query($db,$query);
				if(!$result) exit("에러:$query");
				$count = mysqli_num_rows($result);

				$allPrice = 0;
				for($i = 0; $i < $count; $i++) {
					$row = mysqli_fetch_array($result);
					echo("<tr>
						<td width='60'>
							<a href='product_detail.html?no=0000'><img src='$row[image1]' width='50' height='50' border='0'></a>
						</td>
						<td height='52'>
							<a href='jumun_read.html?no=200701010001&page=1'><font color='686868'>$row[name14]</font><br><font color='#0066CC'>[$row[opts1_name]]</font> $row[opts2_name]</a>
						</td>
						<td align='center'><font color='686868'>$row[num14]</font></td>
						<td align='right'><font color='686868'>".number_format($row['price14'])." 원</font></td>"); 
						$thisPrice = $row['price14'] * $row['num14'];
						$allPrice += $thisPrice;
						echo("<td align='right'><font color='686868'>".number_format($thisPrice)." 원</font></td>
					</tr>
					<tr><td colspan='6' background='images/line_dot.gif'></td></tr>");
				}

			?>
				<tr><td colspan="6" height="2" bgcolor="8B9CBF"></td></tr>
				<tr>
					<td width='60'></td>
					<td height='52'></td>
					<td align='center'><font color='686868'></font></td>
					<td align='right'><font color='686868'></font></td>
					<td align='right'><font color='686868'><b>배송비 2500 원</b></font></td></tr>
			</table>

			<br><br><br>

			<?
				$query = "select * from jumun where no14 = $no;";
				$result = mysqli_query($db,$query);
				if(!$result) exit("에러:$query");
				$row = mysqli_fetch_array($result);

				$o_tel1=trim(substr($row['o_tel14'],0,3));
				$o_tel2=trim(substr($row['o_tel14'],3,4));
				$o_tel3=trim(substr($row['o_tel14'],7,4));

				$o_phone1=trim(substr($row['o_phone14'],0,3));
				$o_phone2=trim(substr($row['o_phone14'],3,4));
				$o_phone3=trim(substr($row['o_phone14'],7,4));

				$r_tel1=trim(substr($row['r_tel14'],0,3));
				$r_tel2=trim(substr($row['r_tel14'],3,4));
				$r_tel3=trim(substr($row['r_tel14'],7,4));

				$r_phone1=trim(substr($row['r_phone14'],0,3));
				$r_phone2=trim(substr($row['r_phone14'],3,4));
				$r_phone3=trim(substr($row['r_phone14'],7,4));
			?>
			<table border="0" cellpadding="0" cellspacing="0" width="690">
				<tr>
					<td><img src="images/jumun_title3.gif" border="0" align="absmiddle"></td>
				</tr>
				<tr><td height="5"></td></tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="685" class="cmfont">
				<tr><td height="2" bgcolor="8B9CBF"></td></tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="1" width="685" bgcolor="#EEEEEE" class="cmfont">
				<tr height="25">
					<td width="100" bgcolor="#F2F2F2">&nbsp;주문번호</td>
					<td width="242" bgcolor="#FFFFFF">&nbsp;<font color="#686868"><?=$row['no14'];?><font></td>
					<td width="100" bgcolor="#F2F2F2">&nbsp;결제금액</td>
					<td width="243" bgcolor="#FFFFFF">&nbsp;<font color="#D06404"><b><?=number_format($allPrice + 2500);?> 원</b></font></td>
				</tr>
				<tr height="25">
					<td width="100" bgcolor="#F2F2F2">&nbsp;결제방식</td>
					<?
						if($row['pay_method14'] == 0)
							echo("<td width='242' bgcolor='#FFFFFF'>&nbsp;<font color='#686868'>카드</font></td>");
						else
							echo("<td width='242' bgcolor='#FFFFFF'>&nbsp;<font color='#686868'>현금</font></td>");
					?>
					<td width="100" bgcolor="#F2F2F2">&nbsp;승인번호</td>
					<?
						if($row['pay_method14'] == 0)
							echo("<td width='243' bgcolor='#FFFFFF'>&nbsp;<font color='#686868'>$row[card_okno14]</font></td>");
						else
							echo("<td width='242' bgcolor='#FFFFFF'>&nbsp;<font color='#686868'></font></td>");
					?>
				</tr>
				<tr height="25">
					<td width="100" bgcolor="#F2F2F2">&nbsp;카드종류</td>
					<?
						if($row['pay_method14'] == 0) {
							if($row['card_kind14'] == 1)
								echo("<td width='242' bgcolor='#FFFFFF'>&nbsp;<font color='#686868'>국민카드</font></td>");
							else if($row['card_kind14'] == 2)
								echo("<td width='242' bgcolor='#FFFFFF'>&nbsp;<font color='#686868'>신한카드</font></td>");
							else if($row['card_kind14'] == 3)
								echo("<td width='242' bgcolor='#FFFFFF'>&nbsp;<font color='#686868'>우리카드</font></td>");
							else if($row['card_kind14'] == 4)
								echo("<td width='242' bgcolor='#FFFFFF'>&nbsp;<font color='#686868'>하나카드</font></td>");
						}
						else
							echo("<td width='242' bgcolor='#FFFFFF'>&nbsp;<font color='#686868'></font></td>");

					?>
					<td width="100" bgcolor="#F2F2F2">&nbsp;할부</td>
					<?
						if($row['pay_method14'] == 0) {
							if($row['card_halbu14'] == 0)
								echo("<td width='243' bgcolor='#FFFFFF'>&nbsp;<font color='#686868'>일시불</font></td>");
							else
								echo("<td width='243' bgcolor='#FFFFFF'>&nbsp;<font color='#686868'>$row[card_halbu14]개월</font></td>");
						}
						else
							echo("<td width='242' bgcolor='#FFFFFF'>&nbsp;<font color='#686868'></font></td>");
					?>
				</tr>
				<tr height="25">
					<td width="100" bgcolor="#F2F2F2">&nbsp;결제방식</td>
					<?
						if($row['pay_method14'] == 1) {
							if($row['bank_kind14'] == 1)
								echo("<td width='242' bgcolor='#FFFFFF'>&nbsp;<font color='#686868'>무통장 (국민:000-000000-0000)</font></td>");
							else if($row['bank_kind14'] == 2)
								echo("<td width='242' bgcolor='#FFFFFF'>&nbsp;<font color='#686868'>무통장 (신한:000-000000-0000)</font></td>");
						}
						else
							echo("<td width='242' bgcolor='#FFFFFF'>&nbsp;<font color='#686868'></font></td>");

					?>
					<td width="100" bgcolor="#F2F2F2">&nbsp;보낸사람</td>
					<?
						if($row['pay_method14'] == 1) {
							echo("<td width='243' bgcolor='#FFFFFF'>&nbsp;<font color='#686868'>$row[bank_sender14]</font></td>");
						}
						else
							echo("<td width='242' bgcolor='#FFFFFF'>&nbsp;<font color='#686868'></font></td>");

					?>
				</tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="685" class="cmfont">
				<tr><td height="2" bgcolor="8B9CBF"></td></tr>
			</table>

			<br><br><br>

			<table border="0" cellpadding="0" cellspacing="0" width="690">
				<tr>
					<td><img src="images/jumun_title4.gif" border="0" align="absmiddle"></td>
				</tr>
				<tr><td height="5"></td></tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="685" class="cmfont">
				<tr><td height="2" bgcolor="8B9CBF"></td></tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="1" width="685" bgcolor="#EEEEEE" class="cmfont">
				<tr height="25">
					<td width="100" bgcolor="#F2F2F2">&nbsp;주문자명</td>
					<td bgcolor="#FFFFFF" colspan="3">&nbsp;<font color="#686868"><?=$row['o_name14'];?></font></td>
				</tr>
				<tr height="25">
					<td width="100" bgcolor="#F2F2F2">&nbsp;전화번호</td>
					<td width="242" bgcolor="#FFFFFF">&nbsp;<font color="#686868"><?=$o_tel1 . "-" . $o_tel2 . "-" . $o_tel3;?></font></td>
					
					<td width="100" bgcolor="#F2F2F2">&nbsp;휴대폰</td>
					<td width="243" bgcolor="#FFFFFF">&nbsp;<font color="#686868"><?=$o_phone1 . "-" . $o_phone2 . "-" . $o_phone3;?></font></td>
				</tr>
				<tr height="25">
					<td width="100" bgcolor="#F2F2F2">&nbsp;이메일</td>
					<td bgcolor="#FFFFFF" colspan="3">&nbsp;<font color="#686868"><?=$row['o_email14'];?></font></td>
				</tr>
				<tr><td height="1" bgcolor="8B9CBF" colspan="4"></td></tr>
				<tr height="25">
					<td width="100" bgcolor="#F2F2F2">&nbsp;수취인명</td>
					<td bgcolor="#FFFFFF" colspan="3">&nbsp;<font color="#686868"><?=$row['r_name14'];?></font></td>
				</tr>
				<tr height="25">
					<td width="100" bgcolor="#F2F2F2">&nbsp;전화번호</td>
					<td width="242" bgcolor="#FFFFFF">&nbsp;<font color="#686868"><?=$r_tel1 . "-" . $r_tel2 . "-" . $r_tel3;?></font></td>
					<td width="100" bgcolor="#F2F2F2">&nbsp;휴대폰</td>
					<td width="243" bgcolor="#FFFFFF">&nbsp;<font color="#686868"><?=$r_phone1 . "-" . $r_phone2 . "-" . $r_phone3;?></font></td>
				</tr>
				<tr height="25">
					<td width="100" bgcolor="#F2F2F2">&nbsp;배달주소</td>
					<td bgcolor="#FFFFFF" colspan="3">&nbsp;<font color="#686868">[<?=$row['r_zip14'];?>]&nbsp; <?=$row['r_juso14'];?></font></td>
				</tr>
				<tr height="25">
					<td width="100" bgcolor="#F2F2F2">&nbsp;메모</td>
					<td bgcolor="#FFFFFF" colspan="3">&nbsp;<font color="#686868"><?=$row['memo14'];?></font></td>
				</tr>
				
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="685" class="cmfont">
				<tr><td height="2" bgcolor="8B9CBF"></td></tr>
			</table>

			<table border="0" cellpadding="0" cellspacing="0" width="690">
				<tr>
					<td height="40" class="cmfont" align="right">
						<img src="images/b_list.gif" border="0" OnClick="location.href='jumun.php?no=<?=$row['member_no14'];?>&page=<?=$page;?>'" style="cursor:hand">&nbsp;&nbsp;&nbsp
					</td>
				</tr>
			</table>


<!-------------------------------------------------------------------------------------------->	
<!-- 끝 : 다른 웹페이지 삽입할 부분                                                         -->
<!-------------------------------------------------------------------------------------------->	

<?
	include "main_bottom.php";
?>