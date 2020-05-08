
<?
	include "main_top.php";
	include "common.php";

	$text1 = $_REQUEST['findtext'];
	$text2 = $_REQUEST['text2'];
	if(!$text2) {
		$text2 = $_REQUEST['findtext'];
		$query = "select * from product where name14 like '%$text1%'";
	}
	else {
		$query = "select * from product where name14 like '%$text2%'";
	}

	
	$page = $_REQUEST['page'];

	$result = mysqli_query($db,$query);
	if(!$result) exit("에러:$query");
	$count = mysqli_num_rows($result);
?>

<!-------------------------------------------------------------------------------------------->	
<!-- 시작 : 다른 웹페이지 삽입할 부분                                                       -->
<!-------------------------------------------------------------------------------------------->	

			<!--  현재 페이지 자바스크립  -------------------------------------------->
			<script language="javascript">
				function SearchProduct() {
					form2.submit();
				}
			</script>

			<table border="0" cellpadding="0" cellspacing="0" width="747">
			  <tr><td height="13"></td></tr>
			  <tr>
			    <td height="30" align="center"><p><img src="images/search_title.gif" width="746" height="30" border="0" /></p></td>
			  </tr>
			  <tr><td height="13"></td></tr>
			</table>

			<table width="730" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td align="center" valign="middle" colspan="3" height="5">
						<table border="0" cellpadding="0" cellspacing="0" width="690">
							<tr><td class="cmfont"><img src="images/search_title1.gif" border="0"></td></tr>
      			  <tr><td height="10"></td></tr>
			      </table>
					</td>
				</tr>
				<tr>
					<td width="730" align="center" valign="top" bgcolor="#FFFFFF"> 

        
						<table width="686" border="0" cellpadding=0 cellspacing=0 class="cmfont">
							<tr bgcolor="8B9CBF"><td height="3" colspan="5"></td></tr>
							<tr height="29" bgcolor="EEEEEE"> 
								<td width="80"  align="center">그림</td>
								<td align="center">상품명</td>
								<td width="150" align="right">가격</td>
								<td width="20"></td>
							</tr>
							<tr bgcolor="8B9CBF"><td height="1" colspan="5"  bgcolor="AAAAAA"></td></tr>


							<?

								if(!$page) $page=1;
								$pages = ceil($count/$page_line);
								$first = 1;
								if($count>0) $first = $page_line*($page-1);
								$page_last=$count-$first;
								if ($page_last>$page_line) $page_last=$page_line;
								if ($count>0) mysqli_data_seek($result,$first);

								for($i = 0; $i < $page_last; $i++) {
									$row = mysqli_fetch_array($result);
									$price = number_format($row['price14']);
									$dcprice = number_format( round($row['price14']*(100-$row['discount14'])/100, -1) );

									echo("<tr height='70'>
										<td width='80' align='center' valign='middle'>
											<a href='product_detail.php?no=$row[no14]'><img src='product/$row[image1]' width='60' height='60' border='0'></a>
										</td>
										<td align='left' valign='middle'>
											<a href='product_detail.php?no=$row[no14]'><font color='#4186C7'><b>$row[name14]</b></font></a><br>");
									if($row['icon_new14'] == 1)
										echo("<img src='images/i_new.gif' align='absmiddle' vspace='1'>");
									if($row['icon_hit14'] == 1)
										echo("<img src='images/i_hit.gif' align='absmiddle' vspace='1'>");
									if($row['icon_sale14'] == 1)
										echo("<img src='images/i_sale.gif' align='absmiddle' vspace='1'><font color='red'>$row[discount14]%</font>");
									
									if($row['discount14'] == 0)
										echo("</td>
											<td width='150' align='right' valign='middle'>$price 원</td>");
									else {
										echo("<td width='150' align='right' valign='middle'><strike>$price 원</strike><br>$dcprice 원</td>");
									}
									echo("<td width='20'></td>
									</tr>
									<tr><td align='center' valign='middle' colspan='5' height='1' background='images/ln1.gif'></td></tr>");
								}
							?>

							<tr bgcolor="8B9CBF"><td height="3" colspan="5"></td></tr>
						</table>
					</td>
				</tr>
			</table>
		<?
			$blocks = ceil($pages/$page_block);
			$block = ceil($page/$page_block);
			$page_s = $page_block * ($block-1);
			$page_e = $page_block * $block;
			if($blocks <= $block) $page_e = $pages;

			echo("<table width='770' border='0' cellpadding='0' cellspacing='0'>
			<tr>
				<td height='30' class='cmfont' align='center'>");

			if ($block > 1)
			{
				$tmp = $page_s;
				echo("<a href='product_search.php?page=$tmp&text2=$text2'>
				<img src='images/i_prev.gif' align='absmiddle' border='0' >
				</a>&nbsp");
			}
			for($i=$page_s+1; $i<=$page_e; $i++)
			{
				if ($page == $i)
					echo("<font color='red'><b>$i</b></font>&nbsp");
				else
					echo("<a href='product_search.php?page=$i&text2=$text2'>[$i]</a>&nbsp");
			}
			if ($block < $blocks)
			{
				$tmp = $page_e+1;
				echo("&nbsp<a href='product_search.php?page=$tmp&text2=$text2'><img src='images/i_next.gif' align='absmiddle' border='0'></a>");
			}
			echo("</td></tr></table>");
		?>

<!-------------------------------------------------------------------------------------------->	
<!-- 끝 : 다른 웹페이지 삽입할 부분                                                         -->
<!-------------------------------------------------------------------------------------------->	


<?
	include "main_bottom.php";
?>