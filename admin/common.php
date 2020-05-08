<?
	$admin_id = "admin";
	$admin_pw = "1234";


	$a_status=array("상품상태","판매중","판매중지","품절");
	$n_status=count($a_status);

	$a_icon=array("아이콘","New","Hit","Sale");
	$n_icon=count($a_icon);

	$a_text1=array("","제품이름","제품번호");   // for문의 $i는 1부터 시작
	$n_text1=count($a_text1);

	$a_menu=array("분류선택","과자","라면","초콜릿","껌/젤리","음료/식품/주전부리");
	$n_menu=count($a_menu);

	$a_state=array("전체","주문신청","주문확인","입금확인", "배송중", "주문완료","주문취소");
	$n_state=count($a_state);
	
	$a_search=array("주문번호", "고객명", "상품명");
	$n_search=count($a_search);

?>