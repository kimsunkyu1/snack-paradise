<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?
	include "../common.php";

	$cookie_no=$_COOKIE['cookie_no'];

	$no = $_REQUEST['no'];

	$query = "select * from jumun where no14 = $no;";
	$result = mysqli_query($db,$query);
	if(!$result) exit("에러:$query");
	$row = mysqli_fetch_array($result);

	$o_tel1 = trim(substr($row['o_tel14'],0,3));
	$o_tel2 = trim(substr($row['o_tel14'],3,4));
	$o_tel3 = trim(substr($row['o_tel14'],7,4));

	$o_phone1 = trim(substr($row['o_phone14'],0,3));
	$o_phone2 = trim(substr($row['o_phone14'],3,4));
	$o_phone3 = trim(substr($row['o_phone14'],7,4));

	$r_tel1 = trim(substr($row['r_tel14'],0,3));
	$r_tel2 = trim(substr($row['r_tel14'],3,4));
	$r_tel3 = trim(substr($row['r_tel14'],7,4));

	$r_phone1 = trim(substr($row['r_phone14'],0,3));
	$r_phone2 = trim(substr($row['r_phone14'],3,4));
	$r_phone3 = trim(substr($row['r_phone14'],7,4));

	$o_tel = $o_tel1 . "-" . $o_tel2 . "-" . $o_tel3;
	$o_phone = $o_phone1 . "-" . $o_phone2 . "-" . $o_phone3;

	$r_tel = $r_tel1 . "-" . $r_tel2 . "-" . $r_tel3;
	$r_phone = $r_phone1 . "-" . $r_phone2 . "-" . $r_phone3;




?>

<html>
<head>
<title>쇼핑몰 홈페이지</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="include/font.css">
<script language="JavaScript" src="include/common.js"></script>
</head>

<body style="margin:0">

<center>

<br>
<script> document.write(menu());</script>
<br>
<br>

<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문번호</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE">&nbsp;<font size="3"><b><?=$no?> (<font color="blue">주문신청</font>)</b></font></td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문일</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$row['jumunday14']?></td>
	</tr>
</table>
<br>
<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문자</font></td>
				<?
					if(!$cookie_no)
						echo("<td width='300' height='20' bgcolor='#EEEEEE'>$row[o_name14] (비회원)</td>");
					else
					  echo("<td width='300' height='20' bgcolor='#EEEEEE'>$row[o_name14] (회원)</td>");
				?>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문자전화</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$o_tel?></td>
	</tr>
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문자 E-Mail</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$row['o_email14']?></td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문자핸드폰</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$o_phone?></td>
	</tr>
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문자주소</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE" colspan="3">(<?=$row['o_zip14']?>) <?=$row['o_juso14']?></td>
	</tr>
	</tr>
</table>
<img src="blank.gif" width="10" height="5"><br>
<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">수신자</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$row['r_name14']?></td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">수신자전화</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$r_tel?></td>
	</tr>
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">수신자 E-Mail</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$row['r_email14']?></td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">수신자핸드폰</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$r_phone?></td>
	</tr>
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">수신자주소</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE" colspan="3">(<?=$row['r_zip14']?>) <?=$row['r_juso14']?></td>
	</tr>
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">메모</font></td>
        <td width="300" height="50" bgcolor="#EEEEEE" colspan="3"><?=$row['memo14']?></td>
	</tr>
</table>
<br>
<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">지불종류</font></td>
			<?
				if($row['pay_method14'] == 0)
				{
					echo("<td width='300' height='20' bgcolor='#EEEEEE'>카드</td>
					<td width='100' height='20' bgcolor='#CCCCCC' align='center'><font color='#142712'>카드승인번호 </font></td>
					<td width='300' height='20' bgcolor='#EEEEEE'>$row[card_okno14]&nbsp</td>");


				echo("<tr> 
        <td width='100' height='20' bgcolor='#CCCCCC' align='center'><font color='#142712'>카드 할부</font></td>");

					if($row['card_halbu14'] == 0)
					{
						echo("<td width='300' height='20' bgcolor='#EEEEEE'>일시불</td>");
					}
					else if($row['card_halbu14'] == 3)
					{
						echo("<td width='300' height='20' bgcolor='#EEEEEE'>3개월</td>");
					}
					else if($row['card_halbu14'] == 6)
					{
						echo("<td width='300' height='20' bgcolor='#EEEEEE'>6개월</td>");
					}
					else if($row['card_halbu14'] == 9)
					{
						echo("<td width='300' height='20' bgcolor='#EEEEEE'>9개월</td>");
					}
					else if($row['card_halbu14'] == 12)
					{
						echo("<td width='300' height='20' bgcolor='#EEEEEE'>12개월</td>");
					}
	
		
        echo("<td width='100' height='20' bgcolor='#CCCCCC' align='center'><font color='#142712'>카드종류</font></td>");


					if($row['card_kind14'] == 1)
					{
						echo("<td width='300' height='20' bgcolor='#EEEEEE'>국민카드</td>");
					}
					else if($row['card_kind14'] == 2)
					{
						echo("<td width='300' height='20' bgcolor='#EEEEEE'>신한카드</td>");
					}
					else if($row['card_kind14'] == 3)
					{
						echo("<td width='300' height='20' bgcolor='#EEEEEE'>우리카드</td>");
					}
					else if($row['card_kind14'] == 4)
					{
						echo("<td width='300' height='20' bgcolor='#EEEEEE'>하나카드</td>");
					}
				echo("</tr>

				<tr> 
					<td width='100' height='20' bgcolor='#CCCCCC' align='center'><font color='#142712'>무통장</font></td>");
								
							echo("<td width='300' height='20' bgcolor='#EEEEEE'> </td>");


								
					echo("<td width='100' height='20' bgcolor='#CCCCCC' align='center'><font color='#142712'>입금자이름</font></td>
					<td width='300' height='20' bgcolor='#EEEEEE'> </td>
					</tr>
				</table>");

				}
				else
				{
					echo("<td width='300' height='20' bgcolor='#EEEEEE'>무통장</td>
					<td width='100' height='20' bgcolor='#CCCCCC' align='center'><font color='#142712'>카드승인번호 </font></td>
					<td width='300' height='20' bgcolor='#EEEEEE'> &nbsp</td>");

					echo("<tr> 
					<td width='100' height='20' bgcolor='#CCCCCC' align='center'><font color='#142712'>카드 할부</font></td>");
					echo("<td width='300' height='20' bgcolor='#EEEEEE'> </td>");

					echo("<td width='100' height='20' bgcolor='#CCCCCC' align='center'><font color='#142712'>카드종류</font></td>");
					echo("<td width='300' height='20' bgcolor='#EEEEEE'> </td>");



					echo("<tr> 
								<td width='100' height='20' bgcolor='#CCCCCC' align='center'><font color='#142712'>무통장</font></td>");
								
									if($row['bank_kind14'] == 1)
									{
										echo("<td width='300' height='20' bgcolor='#EEEEEE'>국민은행:000-00-000</td>");
									}
									else if($row['bank_kind14'] == 2)
									{
										echo("<td width='300' height='20' bgcolor='#EEEEEE'>신한은행111-11-111</td>");
									}
								
								echo("<td width='100' height='20' bgcolor='#CCCCCC' align='center'><font color='#142712'>입금자이름</font></td>
								<td width='300' height='20' bgcolor='#EEEEEE'>$row[bank_sender14]</td>");
					echo("</tr>
				</table>");
				}
			?>
        
	</tr>
	
	
	





<br>
<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr bgcolor="#CCCCCC"> 
    <td width="340" height="20" align="center"><font color="#142712">상품명</font></td>
		<td width="50"  height="20" align="center"><font color="#142712">수량</font></td>
		<td width="70"  height="20" align="center"><font color="#142712">단가</font></td>
		<td width="70"  height="20" align="center"><font color="#142712">금액</font></td>
		<td width="50"  height="20" align="center"><font color="#142712">할인</font></td>
		<td width="60"  height="20" align="center"><font color="#142712">옵션1</font></td>
		<td width="60"  height="20" align="center"><font color="#142712">옵션2</font></td>
	</tr>


	<?
		$query="select *, jumuns.product_no14 as jumuns_product_no14, product.name14 as product_name, jumuns.price14 as jumuns_price, jumuns.cash14 as jumuns_cash, jumuns.discount14 as jumuns_discount, opts1.name14 as opts1_name, opts2.name14 as opts2_name
				from ((jumuns left join product on jumuns.product_no14=product.no14)
						 left join opts as opts1 on jumuns.opts_no1=opts1.no14)
						 left join opts as opts2 on jumuns.opts_no2=opts2.no14
			where jumuns.jumun_no14='$no';";

		$result = mysqli_query($db,$query);
		if(!$result) exit("에러:$query");
		$count = mysqli_num_rows($result);

		$total = 0;
		for($i=1; $i<=$count; $i++)
		{
			$row1 = mysqli_fetch_array($result);

			$jumuns_price = number_format($row1['jumuns_price']);
			$jumuns_cash = number_format($row1['jumuns_cash']);

			echo("<tr bgcolor='#EEEEEE' height='20'>");
			if($row1['jumuns_product_no14'] == 0)
				echo("<td width='340' height='20' align='left'>택배비</td>");	
			else
				echo("<td width='340' height='20' align='left'>$row1[product_name]</td>");
			
			echo("<td width='50'  height='20' align='center'>$row1[num14]</td>	
				<td width='70'  height='20' align='right'>$jumuns_price</td>	
				<td width='70'  height='20' align='right'>$jumuns_cash</td>");

			$total = $total + $row1['jumuns_cash'];

			if($row1['jumuns_product_no14'] == 0)
				echo("<td width='50'  height='20' align='center'></td>	");	
			else
				echo("<td width='50'  height='20' align='center'>$row1[jumuns_discount]%</td>	");

			
			echo("<td width='60'  height='20' align='center'>$row1[opts1_name]</td>	
				<td width='60'  height='20' align='center'>$row1[opts2_name]</td>	
			</tr>");
		}
	?>

</table>
<img src="blank.gif" width="10" height="5"><br>
<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr> 
	  <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">총금액</font></td>
		<td width="700" height="20" bgcolor="#EEEEEE" align="right"><font color="#142712" size="3"><b><?=number_format($total)?></b></font> 원&nbsp;&nbsp</td>
	</tr>
</table>

<table width="800" border="0" cellspacing="0" cellpadding="7">
	<tr> 
		<td align="center">
			<input type="button" value="이 전 화 면" onClick="javascript:history.back();">&nbsp
			<input type="button" value="프린트" onClick="javascript:print();">
		</td>
	</tr>
</table>

</center>

<br>
</body>
</html>
