<?
	$no=$_REQUEST['no'];
	include "common.php";

	$query="select * from product where no14=$no;";
	$result = mysqli_query($db,$query);
	if(!$result) exit("에러:$query");

	$row = mysqli_fetch_array($result);
?>


						<img src="product/<?=$row['image1']?>"><br><br><br>
						
						<!----<img src="product/<?=$row[image2]?>">&nbsp!---->
						<!----<img src="product/<?=$row[image3]?>"><br><br>---->
						<!----<img src="product/<?=$row[image1]?>">&nbsp---->
						<!----<img src="product/<?=$row[image2]?>"><br><br>?>---->
					