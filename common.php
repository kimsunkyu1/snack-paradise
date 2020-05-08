<?
	$db=mysqli_connect("localhost","doerksk","q1w2e3r4!","doerksk");
	if(!$db) exit("DB연결에러");

	$page_line = 5;
	$page_block = 3;

	$baesongbi = 2500;
	$max_baesongbi = 100000;

	$a_menu=array("분류선택","과자","라면","초콜릿","껌/젤리","음료/식품/주전부리");
	$n_menu=count($a_menu);

?>