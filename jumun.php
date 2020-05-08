<?
	include "main_top.php";
	include "common.php";
	$no = $_REQUEST['no'];
	$page = $_REQUEST['page'];

	$query = "select * from jumun where member_no14 = $no order by no14;";
	$result = mysqli_query($db,$query);
	if(!$result) exit("에러:$query");
	$count = mysqli_num_rows($result);
?>
<!-------------------------------------------------------------------------------------------->	
<!-- 시작 : 다른 웹페이지 삽입할 부분                                                       -->
<!-------------------------------------------------------------------------------------------->	

			<table border="0" cellpadding="0" cellspacing="0" width="747">
				<tr><td height="13"></td></tr>
				<tr>
					<td height="30" align="center"><img src="images/jumun_title.gif" width="746" height="30" border="0"></td>
				</tr>
				<tr><td height="20"></td></tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="690">
				<tr>
					<td><img src="images/jumun_title1.gif" border="0" align="absmiddle"></td>
				</tr>
				<tr><td height="10"></td></tr>
			</table>

			<table border="0" cellpadding="0" cellspacing="0" width="685" class="cmfont">
				<tr><td colspan="5" height="3" bgcolor="#0066CC"></td></tr>
				<tr bgcolor="F2F2F2">
					<td width="80" height="30" align="center">주문일</td>
					<td width="100"  align="center">주문번호</td>
					<td width="290" align="center">제품명</td>
					<td width="100" align="center">금액</td>
					<td width="115" align="center">주문상태</td>
				</tr>
				<tr><td colspan="5" bgcolor="DEDCDD"></td></tr>

				<?
					$query = "select * from jumun where member_no14 = $no order by jumunday14 desc;";
					$result = mysqli_query($db,$query);
					if(!$result) exit("에러:$query");
					$count = mysqli_num_rows($result);

					if(!$page) $page=1;
					$pages = ceil($count/$page_line);
					$first = 1;
					if($count>0) $first = $page_line*($page-1);
					$page_last=$count-$first;
					if ($page_last>$page_line) $page_last=$page_line;
					if ($count>0) mysqli_data_seek($result,$first);

					//for ($i=0;  $i<$count;  $i++)
					for ($i=0;  $i<$page_last;  $i++)
					{
						$row = mysqli_fetch_array($result);

						$query = "select * from jumuns where jumun_no14 = $row[no14];";
						$result2 = mysqli_query($db,$query);
						if(!$result2) exit("에러:$query");
						$count2 = mysqli_num_rows($result2);
						$allPrice = 0;
						for($i2 = 0; $i2<$count2; $i2++) {
							$row2 = mysqli_fetch_array($result2);
							$allPrice += $row2['price14'];
						}

						echo("<tr>
							<td height='30' align='center'><font color='686868'>$row[jumunday14]</font></td>
							<td align='center'>
								<a href='jumun_info.php?no=$row[no14]&page=$page'><font color='#0066CC'>$row[no14]</font></a>
							</td>
							<td><font color='686868'>$row[product_names14]</font></td>
							<td align='right'><font color='686868'>" . number_format($allPrice) . "원</font></td>");
						
							if($row['state14'] == 1)
								echo("<td align='center'><font color='#0066CC'>주문신청</font></td>");
							if($row['state14'] == 2)
								echo("<td align='center'><font color='#0066CC'>주문확인</font></td>");
							if($row['state14'] == 3)
								echo("<td align='center'><font color='#0066CC'>입금확인</font></td>");
							if($row['state14'] == 4)
								echo("<td align='center'><font color='#0066CC'>배송중</font></td>");
							if($row['state14'] == 5)
								echo("<td align='center'><font color='#686868'>주문완료</font></td>");
							if($row['state14'] == 6)
								echo("<td align='center'><font color='#D06404'>주문취소</font></td>");
						echo("</tr>
						<tr><td colspan='5' background='images/line_dot.gif'></td></tr>");
					}
				?>

			</table>
			<br>
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
					echo("<a href='jumun.php?page=$tmp&no=$no'>
					<img src='images/i_prev.gif' align='absmiddle' border='0' >
					</a>&nbsp");
				}
				for($i=$page_s+1; $i<=$page_e; $i++)
				{
					if ($page == $i)
						echo("<font color='red'><b>$i</b></font>&nbsp");
					else
						echo("<a href='jumun.php?page=$i&no=$no'>[$i]</a>&nbsp");
				}
				if ($block < $blocks)
				{
					$tmp = $page_e+1;
					echo("&nbsp<a href='jumun.php?page=$tmp&no=$no'><img src='images/i_next.gif' align='absmiddle' border='0'></a>");
				}
				echo("</td></tr></table>");
			?>

<!-------------------------------------------------------------------------------------------->	
<!-- 끝 : 다른 웹페이지 삽입할 부분                                                         -->
<!-------------------------------------------------------------------------------------------->	

<?
	include "main_bottom.php";
?>