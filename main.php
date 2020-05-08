<?
	include "main_top.php";
	include "common.php";

	$text1=$_REQUEST['text1'];


?>

<!-------------------------------------------------------------------------------------------->	
<!-- 시작 : 다른 웹페이지 삽입할 부분                                                       -->
<!-------------------------------------------------------------------------------------------->	

			<!---- 화면 우측(신상품) 시작 -------------------------------------------------->	
			<table width="767" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td height="60">
						<img src="images/main_newproduct.jpg" width="767" height="40">
					</td>
				</tr>
			</table>

				<table border="0" cellpadding="0" cellspacing="0">
				<!---1번째 줄-->
				<?
					echo("<table border='0' cellpadding='0' cellspacing='0'>");
					$query="select * from product where icon_new14=1 and status14=1 order by rand() limit 15";
					$result = mysqli_query($db,$query);
					if(!$result) exit("에러:$query");

					$num_col=5;   $num_row=3;                   // column수, row수
					$count=mysqli_num_rows($result);           // 출력할 제품 개수
					$icount=0;       // 출력한 제품개수 카운터
				?>

				
				<?
					for ($ir=0; $ir<$num_row; $ir++)
					{
						for ($ic=0;  $ic<$num_col;  $ic++)
						{
							if ($icount < $count)
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
	include "main_bottom.php";
?>