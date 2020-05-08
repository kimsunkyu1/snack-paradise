<?
	include "../common.php";

	$no = $_REQUEST['no'];
	
	$query = "delete from jumun where no14 = $no;";
	$result = mysqli_query($db,$query);
	if(!$result) exit("에러:$query");

	$query = "delete from jumuns where jumun_no14 = $no;";
	$result = mysqli_query($db,$query);
	if(!$result) exit("에러:$query1");

	echo("<script>location.href='jumun.php'</script>");
?>