
<?
	include "common.php";

	$uid=$_REQUEST['uid'];
	$pwd=$_REQUEST['pwd'];


	$query="select no14, name14 from member where uid14='$uid' and pwd14='$pwd';";
	$result=mysqli_query($db,$query);
	if(!$result) exit("에러:$query");

	$count=mysqli_num_rows($result);
					
	if($count>0)
	{
		$row=mysqli_fetch_array($result);
		$no=$row['no14'];
		$name=$row['name14'];

		setcookie("cookie_no",$no);
		setcookie("cookie_name",$name);

		echo("<script>location.href='index.html'</script>");
	}
	else
	{
		echo("<script>location.href='member_login.php'</script>");
	}
?>