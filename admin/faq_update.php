<?
	include "../common.php";

	$no=$_REQUEST['no'];
	$title=$_REQUEST['title'];
	$contents=$_REQUEST['contents'];
	$page=$_REQUEST['page'];

	$query="update faq set title14='$title', contents14='$contents' where no14=$no;";
	$result = mysqli_query($db,$query);
	if(!$result) exit("에러:$query");

	echo("<script>location.href='faq.php?no=$no&page=$page'</script>");
?>

