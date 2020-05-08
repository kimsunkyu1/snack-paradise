<?
		include "common.php";

		$no = $_REQUEST['no'];
		$pos1 = $_REQUEST['pos1'];
		$pos2 = $_REQUEST['pos2'];
		$title = $_REQUEST['title'];
		$name = $_REQUEST['name'];
		$passwd = $_REQUEST['passwd'];
		$email = $_REQUEST['email'];
		$yn_text = $_REQUEST['ishtml'];
		$content = $_REQUEST['content'];
		
		$writeday1=Date('Y');
		$writeday2=Date('m');
		$writeday3=Date('d');
		$writeday = sprintf("%04d-%02d-%02d", $writeday1,$writeday2,$writeday3);


		$query="insert into qa (writeday14, count14, title14, name14, passwd14, email14, ishtml14, contents14)
		values ('$writeday', '0' ,'$title', '$name', '$passwd', '$email', '$yn_text', '$content');";
		$result=mysqli_query($db,$query);
		if(!$result) exit("에러:$query");

		$no = mysqli_insert_id($db); // insert 한 no 값

		$query="select * from qa where pos1=$pos1 order by no14 desc limit 1;"; // pos2 마지막값 가져오기
		$result = mysqli_query($db,$query);
		if(!$result) exit("에러:$query");
		$row = mysqli_fetch_array($result);
		$pos2 = $row['pos2'];
		
		$query="update qa set pos1='$pos1', pos2=CONCAT('$pos2','A') where no14=$no;";
		$result = mysqli_query($db,$query);
		if(!$result) exit("에러:$query");

		echo("<script>location.href='qa.php'</script>");
?>