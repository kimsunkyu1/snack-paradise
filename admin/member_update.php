<?
	include "../common.php";
	
	$no=$_REQUEST['no'];
	$pwd=$_REQUEST['pwd'];
	$name=$_REQUEST['name'];
	$tel1=$_REQUEST['tel1'];
	$tel2=$_REQUEST['tel2'];
	$tel3=$_REQUEST['tel3'];
	$phone1=$_REQUEST['phone1'];
	$phone2=$_REQUEST['phone2'];
	$phone3=$_REQUEST['phone3'];

	$sm=$_REQUEST['sm'];
	$gubun=$_REQUEST['gubun'];
	$email=$_REQUEST['email'];
	$birthday1=$_REQUEST['birthday1'];
	$birthday2=$_REQUEST['birthday2'];
	$birthday3=$_REQUEST['birthday3'];
	$juso=$_REQUEST['juso'];

	$tel = sprintf("%-3s%-4s%-4s", $tel1,$tel2,$tel3);
	$phone = sprintf("%-3s%-4s%-4s", $phone1,$phone2,$phone3);
	$birthday = sprintf("%04d-%02d-%02d", $birthday1,$birthday2,$birthday3);

	$query="update member set pwd14='$pwd', name14='$name',tel14='$tel', phone14='$phone', sm14=$sm, birthday14='$birthday', email14='$email', zip14='$zip', juso14='$juso', gubun14=$gubun where no14=$no;";
	$result = mysqli_query($db,$query);
	if(!$result) exit("에러:$query");

	echo("<script>location.href='member.php'</script>");

?>