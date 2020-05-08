<?
	include "../common.php";

	$title=$_REQUEST['title'];
	$contents=$_REQUEST['contents'];

	$query="insert into faq (title14, contents14)
			values ('$title', '$contents');";
	$result=mysqli_query($db,$query);
	if(!$result) exit("에러:$query");

	echo("<script>location.href='faq.php'</script>");
?>

