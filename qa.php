
<?
	include "main_top.php";
	include "common.php";

	$sel1 = $_REQUEST['sel1'];
	$text1 = $_REQUEST['text1'];
	$page = $_REQUEST['page'];

	if (!$sel1) $sel1=1;
	if (!$text1)
			$query="select * from qa order by pos1 desc, pos2;";
	else
	{
		 if ($sel1==1)          // 제목
				$query="select * from qa where title14 like '%$text1%'   order by pos1 desc, pos2;";
		 else if ($sel1==2)    // 내용
				$query="select * from qa where contents14 like '%$text1%'   order by pos1 desc, pos2;";
		 else                        // 작성자
				$query="select * from qa where name14 like '%$text1%' order by pos1 desc, pos2;";   
	}
	$result = mysqli_query($db,$query);
	if(!$result) exit("에러:$query");
	$count=mysqli_num_rows($result);

	$pages = ceil($count/$page_line);

?>
<!-------------------------------------------------------------------------------------------->	
<!-- 시작 : 다른 웹페이지 삽입할 부분                                                       -->
<!-------------------------------------------------------------------------------------------->	

			<!--  현재 페이지 자바스크립  -------------------------------------------->
			<script Language="Javascript">
				function Search_qa()	
				{
					form2.submit();
				}
			</script>

			<table border="0" cellpadding="0" cellspacing="0" width="747">
				<tr><td height="13"></td></tr>
				<tr>
					<td height="30"><img src="images/qa_title.gif" width="746" height="30" border="0"></td>
				</tr>
				<tr><td height="13"></td></tr>
			</table>

			<table border="0" cellpadding="0" cellspacing="0" width="690">
				<tr>
					<td><img src="images/qa_title1.gif" border="0"></td>
				</tr>
				<tr>
					<td align="right" class="cmfont">
						<font color="#686868">게시물:</font><?=$count;?> &nbsp;&nbsp; <font color="#686868">페이지:</font><?=$page;?>/<?=$pages;?>
					</td>
				</tr>
			</table>

			<table border="0" cellpadding="0" cellspacing="0" width="690" class="cmfont">
				<tr><td colspan="5" height="3" bgcolor="8B9CBF"></td></tr>
				<tr bgcolor="F2F2F2" >
					<td width="90" height="25" align="center">번호</td>
					<td align="center">제목</td>
					<td width="90" align="center">작성자</td>
					<td width="90" align="center">작성일</td>
					<td width="90" align="center">조회</td>
				</tr>

				<?
					if (!$sel1) $sel1=1;
					if (!$text1)
							$query="select * from qa order by pos1 desc, pos2;";
					else
					{
						 if ($sel1==1)          // 제목
								$query="select * from qa where title14 like '%$text1%'   order by pos1 desc, pos2;";
						 else if ($sel1==2)    // 내용
								$query="select * from qa where contents14 like '%$text1%'   order by pos1 desc, pos2;";
						 else                        // 작성자
								$query="select * from qa where name14 like '%$text1%'   order by pos1 desc, pos2;";   
					}
					$result = mysqli_query($db,$query);
					if(!$result) exit("에러:$query");
					$count=mysqli_num_rows($result); 


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

						$n=strlen($row['pos2']);    
						echo("<tr><td height='1' bgcolor='#DEDCDD'colspan='5'></td></tr>
						<tr height='25' bgcolor='#FFFFFF'>	
							<td width='90' align='center'><font color='#686868'>$row[no14]</font></td>");
						if($n == 1)
						{
							echo("<td><a href='qa_read.php?no=$row[no14]&page=$page&sel1=$sel1&text1=$text'><font color='#4186C7'>$row[title14]</font></a></td>	");
						}
						else
						{
							$nbsp = "";
							for($j=0;  $j<$n-2;  $j++) 
								$nbsp = $nbsp . "&nbsp;&nbsp;";

							echo("<td>$nbsp<img src='images/i_re.gif' border='0' align='absmiddle'>&nbsp;<a href='qa_read.php?no=$row[no14]&page=$page&sel1=$sel1&text1=$text'><font color='#4186C7'>Re:$row[title14]</font></a>
							</td>");
						}

							echo("<td width='90' align='center'><font color='#686868'>$row[name14]</font></td>	
							<td width='90' align='center'><font color='#686868'>$row[writeday14]</font></td>	
							<td width='90' align='center'><font color='#686868'>$row[count14]</font></td>
						</tr>");
					}
					?>

				<tr><td colspan="5" height="2" bgcolor="8B9CBF"></td></tr>
			</table>

			<table border="0" cellpadding="0" cellspacing="0" width="690">
				<!-- form2 시작 -->
				<form name="form2" method="post" action="qa.php">
				<input type="hidden" name="page" value="<?=$page;?>">
				<tr>
					<td height="40">&nbsp;
						<?
						if($sel1 == 2)
							echo("<select name='sel1' class='cmfont1'>
								<option value='1'>제목</option>
								<option value='2' selected>내용</option>
								<option value='3'>작성자</option>
							</select>");
						else if($sel1 == 3)
							echo("<select name='sel1' class='cmfont1'>
								<option value='1'>제목</option>
								<option value='2'>내용</option>
								<option value='3' selected>작성자</option>
							</select>");
						else
							echo("<select name='sel1' class='cmfont1'>
								<option value='1' selected>제목</option>
								<option value='2'>내용</option>
								<option value='3'>작성자</option>
							</select>");
						?>
						<input type='text' name='text1' size="10" maxlength="20" value="" class="cmfont1">			
						<input type="image" src="images/i_search.gif" align="absmiddle" border="0" onclick="javascript:Search_qa();">
					</td>
					<td align="right">
						<a href="qa_new.php"><img src="images/b_new.gif" border="0"></a>&nbsp;
					</td>
				</tr>
				</form>
				<!-- form2 끝 -->
			</table>



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
					echo("<a href='qa.php?page=$tmp&sel1=$sel1&text1=$text1'>
					<img src='images/i_prev.gif' align='absmiddle' border='0' >
					</a>&nbsp");
				}
				for($i=$page_s+1; $i<=$page_e; $i++)
				{
					if ($page == $i)
						echo("<font color='red'><b>$i</b></font>&nbsp");
					else
						echo("<a href='qa.php?page=$i&sel1=$sel1&text1=$text1'>[$i]</a>&nbsp");
				}
				if ($block < $blocks)
				{
					$tmp = $page_e+1;
					echo("&nbsp<a href='qa.php?page=$tmp&sel1=$sel1&text1=$text1'><img src='images/i_next.gif' align='absmiddle' border='0'></a>");
				}
				echo("</td></tr></table>");
			?>

<!-------------------------------------------------------------------------------------------->	
<!-- 끝 : 다른 웹페이지 삽입할 부분                                                         -->
<!-------------------------------------------------------------------------------------------->	

<?
	include "main_bottom.php";
?>