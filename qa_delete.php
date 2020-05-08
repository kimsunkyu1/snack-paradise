<?
	include "common.php";

	$no=$_REQUEST['no'];
	$passwd=$_REQUEST['passwd'];
	$sel1 = $_REQUEST['sel1'];
	$text1 = $_REQUEST['text1'];
	$page = $_REQUEST['page'];

	$query="select * from qa where no14=$no AND passwd14='$passwd'";
	$result=mysqli_query($db,$query);
	if(!$result) exit("에러:$query");

	$count=mysqli_num_rows($result);
					
	if($count>0)
	{			
		$query = "delete from qa where no14 = $no;";
		$result = mysqli_query($db,$query);
		if(!$result) exit("에러:$query");

		echo("<script>location.href='qa.php?page=$page&sel1=$sel1&text1=$text1'</script>");
	}
	else
	{
		echo("<script>history.go(-1);</script>");
	}
?>