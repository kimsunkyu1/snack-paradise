<?
	include "main_top.php";
	include "common.php";

	$page=$_REQUEST['page'];
	$menu=$_REQUEST['menu'];
	$sort=$_REQUEST['sort'];

					if ($sort=="up")            // 고가격순
						$query="select * from product where  menu14=$menu and status14=1 order by price14 desc;";
					elseif ($sort=="down")  // 저가격순
						$query="select * from product where  menu14=$menu and status14=1 order by price14;";
					elseif ($sort=="name")  // 이름순
						$query="select * from product where  menu14=$menu and status14=1 order by name14;";
					else                              // 신상품순
						$query="select * from product where  menu14=$menu and status14=1 order by no14 desc;";
					$result = mysqli_query($db,$query);
					if(!$result) exit("에러:$query");
					$count=mysqli_num_rows($result);           // 출력할 제품 개수

?>

<!-------------------------------------------------------------------------------------------->	
<!-- 시작 : 다른 웹페이지 삽입할 부분                                                       -->
<!-------------------------------------------------------------------------------------------->	

			<!-- form2 시작 -->
			<form name="form2" method="post" action="product.php">
			<input type="hidden" name="menu" value="<?=$menu?>">

			<table border="0" cellpadding="0" cellspacing="5" width="767" class="cmfont" bgcolor="#efefef">
				<tr>
					<td bgcolor="white" align="center">
						<table border="0" cellpadding="0" cellspacing="0" width="751" class="cmfont">
							<tr>
								<td align="center" valign="middle">
									<table border="0" cellpadding="0" cellspacing="0" width="730" height="40" class="cmfont">
										<tr>
											<td width="500" class="cmfont">
												<font color="#C83762" class="cmfont"><b><?=$a_menu[$menu]?> &nbsp</b></font>&nbsp
											</td>
											<td align="right" width="274">
												<table width="100%" border="0" cellpadding="0" cellspacing="0" class="cmfont">
													<tr>
														<td align="right"><font color="EF3F25"><b><?=$count?></b></font> 개의 상품.&nbsp;&nbsp;&nbsp</td>
														<td width="100">
															<select name="sort" size="1" class="cmfont" onChange="form2.submit()">
															<?
															if($sort=="up")
															{
																echo("<option value='new'>신상품순 정렬</option>
																<option value='up' selected>고가격순 정렬</option>
																<option value='down'>저가격순 정렬</option>
																<option value='name'>상품명 정렬 </option>");
															}
															else if($sort=="down")
															{
																echo("<option value='new'>신상품순 정렬</option>
																<option value='up'>고가격순 정렬</option>
																<option value='down' selected>저가격순 정렬</option>
																<option value='name'>상품명 정렬 </option>");
															}
															else if($sort=="name")
															{
																echo("<option value='new'>신상품순 정렬</option>
																<option value='up'>고가격순 정렬</option>
																<option value='down'>저가격순 정렬</option>
																<option value='name' selected>상품명 정렬 </option>");
															}
															else
															{
																echo("<option value='new' selected>신상품순 정렬</option>
																<option value='up'>고가격순 정렬</option>
																<option value='down'>저가격순 정렬</option>
																<option value='name'>상품명 정렬 </option>");
															}
															?>
															</select>
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
			</form>
			<!-- form2 -->

				<table border="0" cellpadding="0" cellspacing="0">
				<!---1번째 줄-->
				<?
					echo("<table border='0' cellpadding='0' cellspacing='0'>");

					if ($sort=="up")            // 고가격순
						//$query="… where menu=$menu order by price desc";
						$query="select * from product where  menu14=$menu and status14=1 order by price14 desc;";
					elseif ($sort=="down")  // 저가격순
					    //$query="… where menu=$menu order by price";
						$query="select * from product where  menu14=$menu and status14=1 order by price14;";
					elseif ($sort=="name")  // 이름순
					    //$query="… where menu=$menu order by name";
						$query="select * from product where  menu14=$menu and status14=1 order by name14;";
					else                              // 신상품순
						$query="select * from product where  menu14=$menu and status14=1 order by no14 desc;";

					//$query="select * from product where  menu14=$menu and status14=1 order by name14;";
					$result = mysqli_query($db,$query);
					if(!$result) exit("에러:$query");

					$num_col=5;   $num_row=3;                   // column수, row수
					$count=mysqli_num_rows($result);           // 출력할 제품 개수
					$icount=0;       // 출력한 제품개수 카운터


					$page_line=$num_col*$num_row;       // 1페이지에 출력할 제품수
					if(!$page) $page=1;
					$pages = ceil($count/$page_line);
					$first = 1;
					if($count>0) $first = $page_line*($page-1);
					$page_last=$count-$first;
					if ($page_last>$page_line) $page_last=$page_line;
					if ($count>0) mysqli_data_seek($result,$first);

				?>

				
				<?
					for ($ir=0; $ir<$num_row; $ir++)
					{
						for ($ic=0;  $ic<$num_col;  $ic++)
						{
							if ($icount <= $page_last-1)
							{
								$row = mysqli_fetch_array($result);
								$dcprice = number_format( round($row['price14']*(100-$row['discount14'])/100, -1) );
								$price = number_format($row['price14']);
								

								echo("<td width='150' height='205' align='center' valign='top'>
									<table border='0' cellpadding='0' cellspacing='0' width='100' class='cmfont'>
										<tr> 
											<td align='center'> 
												<a href='product_detail.php?no=$row[no14]'><img src='product/$row[image1]' width='120' height='140' border='0'></a>
											</td>
										</tr>
										<tr><td height='5'></td></tr>
										<tr> 
											<td height='20' align='center'>
												<a href='product_detail.php?no=$row[no14]'><font color='444444'>$row[name14]</font></a>&nbsp;");

												if($row['icon_new14']==1)
												echo("<img src='images/i_new.gif' align='absmiddle' vspace='1'>");
												if($row['icon_hit14']==1)
												echo("<img src='images/i_hit.gif' align='absmiddle' vspace='1'>");
												if($row['icon_sale14']==1)
												echo("<img src='images/i_sale.gif' align='absmiddle' vspace='1'>");

											echo("</td>
										</tr>");
										if($row['discount14'] == 0)
											echo("<tr><td height='20' align='center'><b>$price 원</b></td></tr>");
										else
											echo("<tr><td height='20' align='center'><strike>$price 원</strike><br><b>$dcprice 원</b></td></tr>");

									echo("</table>
								</td>");
							}
							else
								echo("<td></td>");      // 제품 없는 경우
							$icount++;
						}
						echo("<tr><td height='10'></td></tr>");
					}
				?>
				</tr>
			</table>

			<!---- 화면 우측(신상품) 끝 -------------------------------------------------->	

<!-------------------------------------------------------------------------------------------->	
<!-- 끝 : 다른 웹페이지 삽입할 부분                                                         -->
<!-------------------------------------------------------------------------------------------->	
<?
	$blocks = ceil($pages/$page_block);
	$block = ceil($page/$page_block);
	$page_s = $page_block * ($block-1);
	$page_e = $page_block * $block;
	if($blocks <= $block) $page_e = $pages;

	echo("<table width='750' border='0' cellpadding='0' cellspacing='0'>
	<tr>
		<td height='30' class='cmfont' align='center'>");

	if ($block > 1)
	{
		$tmp = $page_s;
		echo("<a href='product.php?page=$tmp&text1=$text1&menu=$menu&sort=$sort'>
		<img src='images/i_prev.gif' align='absmiddle' border='0' >
		</a>&nbsp");
	}
	for($i=$page_s+1; $i<=$page_e; $i++)
	{
		if ($page == $i)
			echo("<font color='red'><b>$i</b></font>&nbsp");
		else
			echo("<a href='product.php?page=$i&text1=$text1&menu=$menu&sort=$sort'>[$i]</a>&nbsp");
	}
	if ($block < $blocks)
	{
		$tmp = $page_e+1;
		echo("&nbsp<a href='product.php?page=$tmp&text1=$text1&menu=$menu&sort=$sort'><img src='images/i_next.gif' align='absmiddle' border='0'></a>");
	}
	echo("</td></tr></table>");
?>


<?
	include "main_bottom.php";
?>