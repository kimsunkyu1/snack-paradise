<?
		include "common.php";

		

		$title = $_REQUEST['title'];
		$name = $_REQUEST['name'];
		$passwd = $_REQUEST['passwd'];
		$email = $_REQUEST['email'];
		$yn_text = $_REQUEST['yn_text'];
		$content = $_REQUEST['content'];
		
		$writeday1=Date('Y');
		$writeday2=Date('m');
		$writeday3=Date('d');
		$writeday = sprintf("%04d-%02d-%02d", $writeday1,$writeday2,$writeday3);


		$query="insert into qa (writeday14, count14, title14, name14, passwd14, email14, ishtml14, contents14)
		values ('$writeday', '0' ,'$title', '$name', '$passwd', '$email', '$yn_text', '$content');";
		$result=mysqli_query($db,$query);
		if(!$result) exit("에러:$query");


		$pos1 = mysqli_insert_id($db);


	$query="update qa set pos1='$pos1', pos2='A' where no14=$pos1;";
		$result = mysqli_query($db,$query);
		if(!$result) exit("에러:$query");

		echo("<script>location.href='qa.php'</script>");
?>