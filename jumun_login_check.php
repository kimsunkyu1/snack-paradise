<?
	include "common.php";

	$uid = $_REQUEST['uid'];
	$pwd = $_REQUEST['pwd'];
	$name = $_REQUEST['name'];
	$email = $_REQUEST['email'];

	if($uid && $pwd) {
		$query="select * from member where uid14='$uid' and pwd14='$pwd';";
		$result=mysqli_query($db,$query);
		if(!$result) exit("에러:$query");
		$row=mysqli_fetch_array($result);
	}
	else if($name && $email) {
		$query="select * from member where name14='$name' and email14='$email';";
		$result=mysqli_query($db,$query);
		if(!$result) exit("에러:$query");
		$row=mysqli_fetch_array($result);
	}
	$count=mysqli_num_rows($result);

	if($count>0)
	{
		echo("<script>location.href='jumun.php?no=$row[no14]'</script>");
	}
	else
	{
		echo("<script>history.go(-1);</script>");
	}

?>