<?
	include "../common.php";

	$no=$_REQUEST['no'];
	$menu=$_REQUEST['menu'];
	$code=$_REQUEST['code'];
	$name=$_REQUEST['name'];
	$coname=$_REQUEST['coname'];
	$price=$_REQUEST['price'];
	$opt1=$_REQUEST['opt1'];
	$opt2=$_REQUEST['opt2'];
	$contents=$_REQUEST['contents'];
	$status=$_REQUEST['status'];
	$icon_new=$_REQUEST['icon_new'];
	$icon_hit=$_REQUEST['icon_hit'];
	$icon_sale=$_REQUEST['icon_sale'];
	$discount=$_REQUEST['discount'];
	$regday1=$_REQUEST['regday1'];
	$regday2=$_REQUEST['regday2'];
	$regday3=$_REQUEST['regday3'];

	$imagename1=$_REQUEST['imagename1'];
	$imagename2=$_REQUEST['imagename2'];
	$imagename3=$_REQUEST['imagename3'];
	$checkno1=$_REQUEST['checkno1'];
	$checkno2=$_REQUEST['checkno2'];
	$checkno3=$_REQUEST['checkno3'];

	if($icon_new==1) $icon_new=1; else $icon_new=0;

	if($icon_hit==1) $icon_hit=1; else $icon_hit=0;

	if($icon_sale==1) $icon_sale=1; else $icon_sale=0;



	$regday = sprintf("%04d-%02d-%02d", $regday1,$regday2,$regday3);

	$name = addslashes($name);
	$contents = addslashes($contents);

	  $fname1=$imagename1;
	  if($checkno1=="1") $fname1="";
	  if ($_FILES["image1"]["error"]==0)      // 선택한 파일이 있는지 조사
	  {
		  $fname1=$_FILES["image1"]["name"];
		  if (!move_uploaded_file($_FILES["image1"]["tmp_name"],
			  "../product/$fname1")) exit("업로드 실패");
	  }

	  $fname2=$imagename2;
	  if($checkno2=="1") $fname2="";
	  if ($_FILES["image2"]["error"]==0)      // 선택한 파일이 있는지 조사
	  {
		  $fname2=$_FILES["image2"]["name"];
		  if (!move_uploaded_file($_FILES["image2"]["tmp_name"],
			  "../product/$fname2")) exit("업로드 실패2");
	  }

	  $fname3=$imagename3;
	  if($checkno3=="1") $fname3="";
	  if ($_FILES["image3"]["error"]==0)      // 선택한 파일이 있는지 조사
	  {
		  $fname3=$_FILES["image3"]["name"];
		  if (!move_uploaded_file($_FILES["image3"]["tmp_name"],
			  "../product/$fname3")) exit("업로드 실패3");
	  }

	$query="update product set menu14='$menu', code14='$code', name14='$name', coname14='$coname', price14='$price', opt1='$opt1', opt2='$opt2', contents14='$contents', status14='$status', icon_new14='$icon_new', icon_hit14='$icon_hit', icon_sale14='$icon_sale', discount14='$discount', regday14='$regday', image1='$fname1', image2='$fname2', image3='$fname3' where no14=$no;";
	$result = mysqli_query($db,$query);
	if(!$result) exit("에러:$query");

	echo("<script>location.href='product.php?no=$no&sel1=$sel1&sel2=$sel2&sel3=$sel3&sel4=$sel4&text1=$text1&page=$page'</script>");
?>

