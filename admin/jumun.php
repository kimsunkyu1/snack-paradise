<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?
	include "../common.php";
	include "common.php";
	
	$state=$_REQUEST['state'];
	$text1=$_REQUEST['text1'];
	$sel1=$_REQUEST['sel1'];
	$sel2=$_REQUEST['sel2'];
	$day1_y=$_REQUEST['day1_y'];
	$day1_m=$_REQUEST['day1_m'];
	$day1_d=$_REQUEST['day1_d'];
	$day2_y=$_REQUEST['day2_y'];
	$day2_m=$_REQUEST['day2_m'];
	$day2_d=$_REQUEST['day2_d'];
	$page=$_REQUEST['page'];
	
  	if(!$sel1) $sel1 = 0;
	if(!$sel2) $sel2 = 0;
	if(!$text1) $text1 = "";
	if(!$day1_y) $day1_y = 2019;
	if(!$day2_y) $day2_y = date("Y");
	if(!$day2_m) $day2_m = date("m");
	if(!$day2_d) $day2_d = date("d");

	$day1=sprintf("%04d-%02d-%02d",$day1_y,$day1_m,$day1_d);
	$day2=sprintf("%04d-%02d-%02d",$day2_y,$day2_m,$day2_d);

	$k=0;
	if($sel1 != 0){$s[$k] = "state14=" . $sel1; $k++;}
	if($text1){
		if($sel2==0){$s[$k] = "no14 like '%" . $text1 . "%'"; $k++;}
		else if($sel2==1){$s[$k] = "o_name14 like '%" . $text1 . "%'"; $k++;}
		else if($sel2==2){$s[$k] = "product_names14 like '%" . $text1 . "%'"; $k++;}
	}
	if($day1_y && $day1_m && $day1_d){$s[$k] = "jumunday14>='$day1'"; $k++;}
	if($day2_y && $day2_m && $day2_d){$s[$k] = "jumunday14<='$day2'"; $k++;}
	
	if($k>0)
	{
		$tmp=implode(" and ",$s);
		$tmp=" where " . $tmp;
	}
	$query="select * from jumun ". $tmp ." order by no14 desc";
	//echo($tmp);
	$result=mysqli_query($db,$query);
	if (!$result) exit("에러: $qurey");
	$count=mysqli_num_rows($result);
?>




<html>
<head>
<title>쇼핑몰 홈페이지</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="include/font.css">
<script language="JavaScript" src="include/common.js"></script>
<script>
	function go_update(no,pos)
	{
		state=form1.state[pos].value;
		location.href="jumun_update.php?no="+no+"&state="+state+"&page="+form1.page.value+
			"&sel1="+form1.sel1.value+"&sel2="+form1.sel2.value+"&text1="+form1.text1.value+
			"&day1_y="+form1.day1_y.value+"&day1_m="+form1.day1_m.value+"&day1_d="+form1.day1_d.value+
			"&day2_y="+form1.day2_y.value+"&day2_m="+form1.day2_m.value+"&day2_d="+form1.day2_d.value;
	}
</script>
</head>

<body style="margin:0">

<center>

<br>
<script> document.write(menu());</script>

<form name="form1" method="post" action="jumun.php">
<input type="hidden" name="page" value="0">

<table width="800" border="0" cellspacing="0" cellpadding="0">
	<tr height="40">
		<td align="left"  width="70" valign="bottom">&nbsp 주문수 : <font color="#FF0000"><?=$count;?></font></td>
		<td align="right" width="730" valign="bottom">
			기간 : 
			
			<input type="text" name="day1_y" size="4" value="<?=date('Y')?>">
			<select name="day1_m">
				<?
					for($i = 1; $i <= 12; $i++)
					{
						if($i == $day1_m){
							echo("<option value='$i'  selected>$i</option>");
						}
						else echo("<option value='$i'>$i</option>");
					}
				?>
			</select>
			<select name="day1_d">
				<?
					for($i = 1; $i <= 31; $i++)
					{
						if($i == $day1_d){
							echo("<option value='$i'  selected>$i</option>");
						}
						else echo("<option value='$i'>$i</option>");
					}
				?>
			</select> - 
			<input type="text" name="day2_y" size="4" value="<?=date('Y')?>">
			<select name="day2_m">
				<?
					for($i = 1; $i <= 12; $i++)
					{
						if($i == $day2_m){
							echo("<option value='$i'  selected>$i</option>");
						}
						else echo("<option value='$i'>$i</option>");
					}
				?>
			</select>
			<select name="day2_d">
				<?
					for($i = 1; $i <= 31; $i++)
					{
						if($i == $day2_d){
							echo("<option value='$i'  selected>$i</option>");
						}
						else echo("<option value='$i'>$i</option>");
					}
				?>
			</select> &nbsp
			<?
			echo("<select name='sel1'>");
				for($i=0;$i<$n_state;$i++){
					if($i==$sel1)
						echo("<option value='$i' selected>$a_state[$i]</option>");
					else
						echo("<option value='$i'>$a_state[$i]</option>");
				}
			echo("</select> &nbsp ");

			echo("<select name='sel2'>");
				for($i=0;$i<$n_search;$i++){
					if($i==$sel2)
						echo("<option value='$i' selected>$a_search[$i]</option>");
					else
						echo("<option value='$i'>$a_search[$i]</option>");
				}
			echo("</select> &nbsp ");
		?>

			<input type="text" name="text1" size="10" value="">&nbsp
			<input type="button" value="검색" onclick="javascript:form1.submit();"> &nbsp;
		</td>
	</tr>
	</tr><td height="5" colspan="2"></td></tr>
</table>

<table width="800" border="1" cellpadding="0" style="border-collapse:collapse">
	<tr bgcolor="#CCCCCC" height="23"> 
		<td width="70"  align="center">주문번호</td>
		<td width="70"  align="center">주문일</td>
		<td width="250" align="center">상품명</td>
		<td width="50"  align="center">제품수</td>	
		<td width="70"  align="center">총금액</td>
	    <td width="65"  align="center">주문자</td>
		<td width="50"  align="center">결재</td>
		<td width="135" align="center" colspan="2">주문상태</td>
	    <td width="50"  align="center">삭제</td>
	</tr>
	<?
	$state=$_REQUEST['state'];
	$text1=$_REQUEST['text1'];
	$sel1=$_REQUEST['sel1'];
	$sel2=$_REQUEST['sel2'];
	$day1_y=$_REQUEST['day1_y'];
	$day1_m=$_REQUEST['day1_m'];
	$day1_d=$_REQUEST['day1_d'];
	$day2_y=$_REQUEST['day2_y'];
	$day2_m=$_REQUEST['day2_m'];
	$day2_d=$_REQUEST['day2_d'];
	$page=$_REQUEST['page'];
	
  	if(!$sel1) $sel1 = 0;
	if(!$sel2) $sel2 = 0;
	if(!$text1) $text1 = "";
	if(!$day1_y) $day1_y = 2019;
	if(!$day2_y) $day2_y = date("Y");
	if(!$day2_m) $day2_m = date("m");
	if(!$day2_d) $day2_d = date("d");

	$day1=sprintf("%04d-%02d-%02d",$day1_y,$day1_m,$day1_d);
	$day2=sprintf("%04d-%02d-%02d",$day2_y,$day2_m,$day2_d);

	$k=0;

	if($sel1 != 0){$s[$k] = "state14=" . $sel1;  $k++; }
	if($text1){
		if($sel2==0){$s[$k] = "no14 like '%" . $text1 . "%'"; $k++;}
		else if($sel2==1){$s[$k] = "o_name14 like '%" . $text1 . "%'"; $k++;}
		else if($sel2==2){$s[$k] = "product_names14 like '%" . $text1 . "%'"; $k++;}
	}
	if($day1_y && $day1_m && $day1_d){$s[$k] = "jumunday14>='$day1'"; $k++;}
	if($day2_y && $day2_m && $day2_d){$s[$k] = "jumunday14<='$day2'"; $k++;}
	if($k>0)
	{
		$tmp=implode(" and ",$s);
		$tmp=" where " . $tmp;
	}

	$query="select * from jumun " . $tmp . " order by no14 desc";
	$result=mysqli_query($db,$query);
	if (!$result) exit("에러: $qurey");
	$count=mysqli_num_rows($result);




		if(!$page) $page=1;
		$pages = ceil($count/$page_line);
		$first = 1;
		if($count>0) $first = $page_line*($page-1);
		$page_last=$count-$first;
		if ($page_last>$page_line) $page_last=$page_line;
		if ($count>0) mysqli_data_seek($result,$first);


		for($i=0; $i<$page_last; $i++)
		{
			$row = mysqli_fetch_array($result);

			echo("<tr bgcolor='#F2F2F2' height='23'> 
				<td width='70'  align='center'><a href='jumun_info.php?no=$row[no14]'>$row[no14]</a></td>
				<td width='70'  align='center'>$row[jumunday14]</td>
				<td width='250' align='left'>&nbsp;$row[product_names14]</td>	
				<td width='40' align='center'>$row[product_nums14]</td>	
				<td width='70'  align='right'>$row[total_cash14]&nbsp</td>	
				<td width='65'  align='center'>$row[o_name14]</td>");

				
				if($row['pay_method14'] == 0)
					echo("<td width='50'  align='center'>카드</td>	");
				else
					echo("<td width='50'  align='center'>무통장</td>	");



				echo("<td width='85' align='center' valign='bottom'>");
				
				
				$color="black";
				if ($row['state14']==5)  $color="blue";  // 주문완료 
				if ($row['state14']==6)  $color="red";   // 주문취소

				echo("<select name='state' style='font-size:9pt; color:$color'>");	
				for($j=0;$j<$n_state;$j++)
				{
					if ($j==$row['state14'])
						echo("<option value='$j' selected>$a_state[$j]</option>");
					else
						echo("<option value='$j'>$a_state[$j]</option>");
				}
				echo("</select>&nbsp;");
				echo("</td>");

				echo("<td width='50' align='center'>
					<a href='javascript:go_update(\"$row[no14]\",\"$i\");'><img src='images/b_edit1.gif' border='0'></a>
				</td>	
				<td width='50' align='center'>
					<a href='jumun_delete.php?no=$row[no14]' onclick='javascript:return confirm(\"삭제할까요 ?\");'><img src='images/b_delete1.gif' border='0'></a>
				</td>
			</tr>");
		}
	?>
</table>

<input type="hidden" name="state">


</form>


<?
	$blocks = ceil($pages/$page_block);
	$block = ceil($page/$page_block);
	$page_s = $page_block * ($block-1);
	$page_e = $page_block * $block;
	if($blocks <= $block) $page_e = $pages;

	echo("<table width='800' border='0' cellpadding='0' cellspacing='0'>
	<tr>
		<td height='30' class='cmfont' align='center'>");

	if ($block > 1)
	{
		$tmp = $page_s;
		echo("<a href='jumun.php?page=$tmp&text1=$text1'>
		<img src='images/i_prev.gif' align='absmiddle' border='0' >
		</a>&nbsp");
	}
	for($i=$page_s+1; $i<=$page_e; $i++)
	{
		if ($page == $i)
			echo("<font color='red'><b>$i</b></font>&nbsp");
		else
			echo("<a href='jumun.php?page=$i&sel1=$sel1&sel2=$sel2&text1=$text1&day1_y=$day1_y&day1_m=$day1_m&day1_d=$day1_d&day2_y=$day2_y&day2_m=$day2_m&day2_d=$day2_d'>[$i]</a>&nbsp");
	}
	if ($block < $blocks)
	{
		$tmp = $page_e+1;
		echo("&nbsp<a href='jumun.php?page=$tmp&sel1=$sel1&sel2=$sel2&text1=$text1&day1_y=$day1_y&day1_m=$day1_m&day1_d=$day1_d&day2_y=$day2_y&day2_m=$day2_m&day2_d=$day2_d'><img src='images/i_next.gif' align='absmiddle' border='0'></a>");
	}
	echo("</td></tr></table>");
?>
</center>

</body>
</html>