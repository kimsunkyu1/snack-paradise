<?
	include "common.php";

	$cookie_no=$_COOKIE['cookie_no'];
	$cookie_name=$_COOKIE['cookie_name'];


	$name=$_REQUEST['name'];
	$pwd1=$_REQUEST['pwd1'];
	$pwd2=$_REQUEST['pwd2'];

	$phone1=$_REQUEST['phone1'];
	$phone2=$_REQUEST['phone2'];
	$phone3=$_REQUEST['phone3'];
	$tel1=$_REQUEST['tel1'];
	$tel2=$_REQUEST['tel2'];
	$tel3=$_REQUEST['tel3'];
	$sm=$_REQUEST['sm'];
	$birthday1=$_REQUEST['birthday1'];
	$birthday2=$_REQUEST['birthday2'];
	$birthday3=$_REQUEST['birthday3'];
	$zip=$_REQUEST['zip'];
	$juso=$_REQUEST['juso'];
	$email=$_REQUEST['email'];

	$tel = sprintf("%-3s%-4s%-4s", $tel1,$tel2,$tel3);
	$phone = sprintf("%-3s%-4s%-4s", $phone1,$phone2,$phone3);
	$birthday = sprintf("%04d-%02d-%02d", $birthday1,$birthday2,$birthday3);



	if(!$pwd1)
	{
		$query="update member set name14='$name',phone14='$phone', tel14='$tel', sm14=$sm, birthday14='$birthday', zip14='$zip', juso14='$juso', email14='$email' where no14=$cookie_no;";
		$result=mysqli_query($db,$query);
		if(!$result) exit("에러:$query");
	}
	else
	{
		$query="update member set pwd14='$pwd1', name14='$name',phone14='$phone', tel14='$tel', sm14=$sm, birthday14='$birthday', zip14='$zip', juso14='$juso', email14='$email' where no14=$cookie_no;";
		$result=mysqli_query($db,$query);
		if(!$result) exit("에러:$query");
	}


	echo("<script>location.href='member_edit.php'</script>");
?>
