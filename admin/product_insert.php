<?
	include "../common.php";

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

	if($icon_new==1) $icon_new=1; else $icon_new=0;
	if($icon_hit==1) $icon_hit=1; else $icon_hit=0;
	if($icon_sale==1) $icon_sale=1; else $icon_sale=0;


	$regday = sprintf("%04d-%02d-%02d", $regday1,$regday2,$regday3);

	$name = addslashes($name);
	$contents = addslashes($contents);


	  
	  if ($_FILES["image1"]["error"]==0)      // 선택한 파일이 있는지 조사
	  {
		  $fname1=$_FILES["image1"]["name"];
		  if (!move_uploaded_file($_FILES["image1"]["tmp_name"],
			  "../product/$fname1")) exit("업로드 실패");
	  }
	  if ($_FILES["image2"]["error"]==0)      // 선택한 파일이 있는지 조사
	  {
		  $fname2=$_FILES["image2"]["name"];
		  if (!move_uploaded_file($_FILES["image2"]["tmp_name"],
			  "../product/$fname2")) exit("업로드 실패2");
	  }
	  if ($_FILES["image3"]["error"]==0)      // 선택한 파일이 있는지 조사
	  {
		  $fname3=$_FILES["image3"]["name"];
		  if (!move_uploaded_file($_FILES["image3"]["tmp_name"],
			  "../product/$fname3")) exit("업로드 실패3");
	  }


	$query="insert into product (menu14, code14, name14, coname14, price14, opt1, opt2, contents14, status14, icon_new14, icon_hit14, icon_sale14, discount14, regday14, image1, image2, image3) 
	values ('$menu', '$code', '$name', '$coname', '$price', '$opt1', '$opt2', '$contents', '$status', '$icon_new', '$icon_hit', '$icon_sale', '$discount', '$regday', '$fname1', '$fname2', '$fname3');";
	$result=mysqli_query($db,$query);
	if(!$result) exit("에러:$query");

	echo("<script>location.href='product.php'</script>");
?>

