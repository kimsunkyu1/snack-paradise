<?
	include "../common.php";
	
	$no = $_REQUEST['no'];
	
	$query = "delete from member where no14 = $no;";
	$result = mysqli_query($db,$query);
	if(!$result) exit("에러:$query");

	echo("<script>location.href='member.php'</script>");
?>