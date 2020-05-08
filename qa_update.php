<?
	include "common.php";

	$a = mysqli_insert_id($db);


	$no=$_REQUEST['no'];

	$title=$_REQUEST['title'];
	$name=$_REQUEST['name'];
	$passwd=$_REQUEST['passwd'];
	$email=$_REQUEST['email'];
	$ishtml=$_REQUEST['ishtml'];
	$content=$_REQUEST['content'];

	$sel1=$_REQUEST['sel1'];
	$text1=$_REQUEST['text1'];
	$page=$_REQUEST['page'];


	


	$query="update qa set title14='$title', name14='$name', passwd14='$passwd', email14='$email', ishtml14=$ishtml, contents14='$content' where no14=$no;";
	$result = mysqli_query($db,$query);
	if(!$result) exit("에러:$query");

	echo("<script>location.href='qa_read.php?no=$no&page=$page&sel1=$sel1&text1=$text1'</script>");
?>