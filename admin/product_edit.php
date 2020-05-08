<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?
	include "../common.php";
	include "common.php";

	$no = $_REQUEST['no'];
	$opt1 = $_REQUEST['opt1'];
	$opt2 = $_REQUEST['opt2'];


	$query = "select * from product where no14 = $no;";
	$result = mysqli_query($db,$query);
	if(!$result) exit("에러:$query");

	$row = mysqli_fetch_array($result);

	$name = $row['name14'];
	$name = stripslashes($name);
	$contents = $row['contents14'];
	$contents = stripslashes($contents);
?>

<html>
<head>
<title>쇼핑몰 관리자 홈페이지</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="include/font.css">
<script language="JavaScript" src="include/common.js"></script>

<script language="JavaScript">
	function imageView(strImage)
	{
		this.document.images["big"].src = strImage;
	}
</script>

</head>

<body style="margin:0">

<form name="form1" method="post" action="product_update.php" enctype="multipart/form-data">

<input type="hidden" name="sel1" value="">
<input type="hidden" name="sel2" value="">
<input type="hidden" name="sel3" value="">
<input type="hidden" name="sel4" value="">
<input type="hidden" name="text1" value="">
<input type="hidden" name="page" value="1">
<input type="hidden" name="no" value="<?=$row['no14']?>">

<center>

<br>
<script> document.write(menu());</script>
<br>
<br>

<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr height="23"> 
		<td width="100" bgcolor="#CCCCCC" align="center">상품분류</td>
		<td width="700" bgcolor="#F2F2F2">
		<?
			echo("<select name='menu'>");
			for($i=0;$i<$n_menu;$i++)
			{
					if ($i==$row[menu14])
						 echo("<option value='$i' selected>$a_menu[$i]</option>");
					else
						 echo("<option value='$i'>$a_menu[$i]</option>");
			}
			echo("</select>");
		?>
		</td>
	</tr>
	<tr height="23"> 
		<td width="100" bgcolor="#CCCCCC" align="center">상품코드</td>
		<td width="700"  bgcolor="#F2F2F2">
			<input type="text" name="code" value="<?=$row['code14']?>" size="20" maxlength="20">
		</td>
	</tr>
	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">상품명</td>
		<td width="700"  bgcolor="#F2F2F2">
			<input type="text" name="name" value="<?=$name?>" size="60" maxlength="60">
		</td>
	</tr>
	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">제조사</td>
		<td width="700"  bgcolor="#F2F2F2">
			<input type="text" name="coname" value="<?=$row['coname14']?>" size="30" maxlength="30">
		</td>
	</tr>
	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">판매가</td>
		<td width="700"  bgcolor="#F2F2F2">
			<input type="text" name="price" value="<?=$row['price14']?>" size="12" maxlength="12"> 원
		</td>
	</tr>
	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">옵션</td>
		<td width="700"  bgcolor="#F2F2F2">
		<?
			$query = "select * from opt order by no14;";
			$result = mysqli_query($db,$query);
			if(!$result) exit("에러:$query");

	
			$count = mysqli_num_rows($result);

			echo("<select name='opt1'>");
			echo("<option value='0' selected>옵션선택</option>");
			for($i=0;$i<$count;$i++)
			{
				$row1 = mysqli_fetch_array($result);
				if ($opt1==$row1['no14'])
					 echo("<option value='$row1[no14]' selected>$row1[name14]</option>");
				else
					 echo("<option value='$row1[no14]'>$row1[name14]</option>");
			}
			echo("</select>");

			echo("<select name='opt2'>");
			mysqli_data_seek($result,0);
			echo("<option value='0' selected>옵션선택2</option>");
			for($i=0;$i<$count;$i++)
			{
					$row1 = mysqli_fetch_array($result);
					if ($opt2==$row1['no14'])
						 echo("<option value='$row1[no14]' selected>$row1[name14]</option>");
					else
						 echo("<option value='$row1[no14]'>$row1[name14]</option>");
			}
			echo("</select>"); 
		?>
		</td>
	</tr>
	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">제품설명</td>
		<td width="700"  bgcolor="#F2F2F2">
			<textarea name="contents" rows="4" cols="70"><?=$contents?></textarea>
		</td>
	</tr>

	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">상품상태</td>
		<td width="700"  bgcolor="#F2F2F2">

		<?
			for($i=1;$i<$n_status;$i++)
			{
				if($i == $row['status14'])
					echo("<input type='radio' name='status' value='$i' checked>$a_status[$i]");
				else
					echo("<input type='radio' name='status' value='$i'>$a_status[$i]");
			}
		?>
		</td>
	</tr>

	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">아이콘</td>
		<td width="700"  bgcolor="#F2F2F2">
		
		<?
		if($row['icon_new14'] == 1)
			echo("<input type='checkbox' name='icon_new' value='1' checked> $a_icon[1] &nbsp;&nbsp");	
		else
			echo("<input type='checkbox' name='icon_new' value='1'> $a_icon[1] &nbsp;&nbsp");

		if($row['icon_hit14'] == 1)
			echo("<input type='checkbox' name='icon_hit' value='1' checked> $a_icon[2] &nbsp;&nbsp");	
		else
			echo("<input type='checkbox' name='icon_hit' value='1'> $a_icon[2] &nbsp;&nbsp");

		if($row['icon_sale14'] == 1)
			echo("<input type='checkbox' name='icon_sale' value='1' checked> $a_icon[3] &nbsp;&nbsp");	
		else
			echo("<input type='checkbox' name='icon_sale' value='1'> $a_icon[3] &nbsp;&nbsp");

		echo("할인율 : <input type='text' name='discount' value='$row[discount14]' size='3' maxlength='3'> %");
		?>
		
		</td>
	</tr>
	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">등록일</td>
		<td width="700"  bgcolor="#F2F2F2">
		<?
			$regday1 = trim(substr($row['regday14'],0,4));
			$regday2 = trim(substr($row['regday14'],5,2));
			$regday3 = trim(substr($row['regday14'],8,2));

			echo("<input type='text' name='regday1' value='$regday1' size='4' maxlength='4'> 년 &nbsp");
			echo("<input type='text' name='regday2' value='$regday2' size='2' maxlength='2'> 월 &nbsp)");
			echo("<input type='text' name='regday3' value='$regday3' size='2' maxlength='2'> 일 &nbsp)");
		?>
		</td>
	</tr>

	<tr> 
		<td width="100" bgcolor="#CCCCCC" align="center">이미지</td>
		<td width="700"  bgcolor="#F2F2F2">

			<table border="0" cellspacing="0" cellpadding="0" align="left">
				<tr>
					<td>
						<table width="390" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td>
									<input type='hidden' name='imagename1' value='<?=$row['image1']?>'>
									&nbsp;<input type="checkbox" name="checkno1" value="1"> <b>이미지1</b>: <?=$row['image1']?>
									<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="file" name="image1" size="20" value="찾아보기">
								</td>
							</tr>
							<tr>
								<td>
									<input type='hidden' name='imagename2' value='<?=$row['image2']?>'>
									&nbsp;<input type="checkbox" name="checkno2" value="1"> <b>이미지2</b>: <?=$row['image2']?>
									<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="file" name="image2" size="20" value="찾아보기">
								</td>
							</tr> 
							<tr>
								<td>
									<input type='hidden' name='imagename3' value='<?=$row['image3']?>'>
									&nbsp;<input type="checkbox" name="checkno3" value="1"> <b>이미지3</b>: <?=$row['image3']?>
									<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="file" name="image3" size="20" value="찾아보기">
								</td>
							</tr> 
							<tr>
								<td><br>&nbsp;&nbsp;&nbsp;※ 삭제할 그림은 체크를 하세요.</td>
							</tr> 
				  	</table>
						<br><br><br><br><br>
						<table width="390" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td  valign="middle">&nbsp;
									<img src="../product/<?=$row['image1']?>" width="50" height="50" border="1" style='cursor:hand' onclick="imageView('../product/<?=$row['image1']?>')">&nbsp;
									<img src="../product/<?=$row['image2']?>" width="50" height="50" border="1" style='cursor:hand' onclick="imageView('../product/<?=$row['image2']?>')">&nbsp;
									<img src="../product/<?=$row['image3']?>"  width="50" height="50" border="1" style='cursor:hand' onclick="imageView('../product/<?=$row['image3']?>')">&nbsp;
								</td>
							</tr>				 
						</table>
					</td>
					<td>
						<td align="right" width="310"><img name="big" src="../product/<?=$row['image1']?>" width="300" height="300" border="1"></td>
					</td>
				</tr>
			</table>

		</td>
	</tr>
</table>
<table width="800" border="0" cellspacing="0" cellpadding="5">
	<tr> 
		<td align="center">
			<input type="submit" value="수정하기"> &nbsp;&nbsp
			<input type="button" value="이전화면" onClick="javascript:history.back();">
		</td>
	</tr>
</table>

</form>

</center>

</body>
</html>
