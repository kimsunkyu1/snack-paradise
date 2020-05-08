<?
	include "../common.php";

	$no = $_REQUEST['no'];
	$page = $_REQUEST['page'];

	$query = "delete from faq where no14 = $no;";
	$result = mysqli_query($db,$query);
	if(!$result) exit("에러:$query");

	echo("<script>location.href='faq.php?no=$no&page=$page'</script>");
?>