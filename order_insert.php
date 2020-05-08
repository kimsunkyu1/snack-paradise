<?
		include "common.php";

		$cart=$_COOKIE['cart'];
		$n_cart=$_COOKIE['n_cart'];
		$cookie_no=$_COOKIE['cookie_no'];



		$o_name = $_REQUEST['o_name'];
		$o_tel1 = $_REQUEST['o_tel1'];
		$o_tel2 = $_REQUEST['o_tel2'];
		$o_tel3 = $_REQUEST['o_tel3'];
		$o_tel = sprintf("%-3s%-4s%-4s", $o_tel1,$o_tel2,$o_tel3);
		$o_phone1 = $_REQUEST['o_phone1'];
		$o_phone2 = $_REQUEST['o_phone2'];
		$o_phone3 = $_REQUEST['o_phone3'];
		$o_phone = sprintf("%-3s%-4s%-4s", $o_phone1,$o_phone2,$o_phone3);
		$o_email = $_REQUEST['o_email'];
		$o_zip = $_REQUEST['o_zip'];
		$o_addr = $_REQUEST['o_addr'];

		$r_name = $_REQUEST['r_name'];
		$r_tel1 = $_REQUEST['r_tel1'];
		$r_tel2 = $_REQUEST['r_tel2'];
		$r_tel3 = $_REQUEST['r_tel3'];
		$r_tel = sprintf("%-3s%-4s%-4s", $r_tel1,$r_tel2,$r_tel3);
		$r_phone1 = $_REQUEST['r_phone1'];
		$r_phone2 = $_REQUEST['r_phone2'];
		$r_phone3 = $_REQUEST['r_phone3'];
		$r_phone = sprintf("%-3s%-4s%-4s", $r_phone1,$r_phone2,$r_phone3);
		$r_email = $_REQUEST['r_email'];
		$r_zip = $_REQUEST['r_zip'];
		$r_addr = $_REQUEST['r_addr'];
		$o_etc = $_REQUEST['o_etc'];

		$pay_method = $_REQUEST['pay_method'];
		$card_kind = $_REQUEST['card_kind'];
		$card_no1 = $_REQUEST['card_no1'];
		$card_no2 = $_REQUEST['card_no2'];
		$card_no3 = $_REQUEST['card_no3'];
		$card_no4 = $_REQUEST['card_no4'];
		$card_month = $_REQUEST['card_month'];
		$card_year = $_REQUEST['card_year'];
		$card_pw = $_REQUEST['card_pw'];
		$card_halbu = $_REQUEST['card_halbu'];
		$bank_kind = $_REQUEST['bank_kind'];
		$bank_sender = $_REQUEST['bank_sender'];


		$query="select * from jumun where jumunday14=curdate() order by no14 desc;";
		$result=mysqli_query($db,$query);
		if(!$result) exit("에러:$query");
		$row=mysqli_fetch_array($result);
		$count=mysqli_num_rows($result);           // 출력할 제품 개수
		

		if ($count>0)   
		{
			$a = (int)substr($row['no14'],-4) + 1;
			$no14 = date("ymd").sprintf("%04d",$a);
		}
		else
		{
			$no14 = date("ymd")."0001";
		}

		$total=0;
		$product_nums = 0;
		$product_names = "";
		for ($i=1;  $i<=$n_cart;  $i++)
		{
			 if ($cart[$i]) // 제품정보가 있는 경우만
			 {
					 //• 장바구니 cookie에서 제품번호, 수량, 소옵션번호1,2 알아내기
					list($no, $num, $opts1, $opts2)=explode("^", $cart[$i]);

					$query="select * from opts where no14='$opts1';";
					$result=mysqli_query($db,$query);
					if(!$result) exit("에러:$query");
					$row1=mysqli_fetch_array($result);
					
					$query="select * from opts where no14='$opts2';";
					$result=mysqli_query($db,$query);
					if(!$result) exit("에러:$query");
					$row2=mysqli_fetch_array($result);

					// • 제품정보(제품번호, 단가, 할인여부, 할인율) 알아내기
					$query="select * from product where no14='$no';";
					$result=mysqli_query($db,$query);
					if(!$result) exit("에러:$query");
					$row=mysqli_fetch_array($result);

					$price = round($row['price14']*(100-$row['discount14'])/100, -1);
					$cash = $num * $price;


					// • insert SQL문을 이용하여 jumuns 테이블에 저장.
					//	(주문번호, 제품번호, 수량, 단가, 금액, 할인율, 소옵션번호1,2)
					$query="insert into jumuns (jumun_no14, product_no14, num14, price14, cash14, discount14, opts_no1, opts_no2) values ('$no14', '$no', '$num', '$price', '$cash', '$row[discount14]', '$row1[no14]', '$row2[no14]');";
					$result=mysqli_query($db,$query);
					if(!$result) exit("에러:$query");

					// • 장바구니 cookie에서 제품 정보 삭제.
					setcookie("cart[$i]","");

					// • 총금액 = 총금액 + 금액;
					$total = $total + $cash;

					 $product_nums = $product_nums + 1;
					 if ($product_nums==1) $product_names = $row['name14'];
				}
		}

		if ($product_nums>1)      // 제품수가 2개 이상인 경우만, "외 ?" 추가
		{
				$tmp = $product_nums;
				$product_names = $product_names . " 외 " . $tmp;
		}

		if($total < $max_baesongbi) 
		{
				// • insert SQL문을 이용하여 jumuns테이블에 배송비 정보 저장.
				//	(주문_번호, 0, 1, 배송비, 배송비, 0, 0, 0,)
				$query="insert into jumuns (jumun_no14, product_no14, num14, price14, cash14, discount14, opts_no1, opts_no2) values ('$no14', '0', '1', '$baesongbi', '$baesongbi', '0', '0', '0');";
				$result=mysqli_query($db,$query);
				if(!$result) exit("에러:$query");

				// • 총금액 = 총금액 + 배송비;
				$total = $total + $baesongbi;
		}

		if ($cookie_no)
			 $member_no=$cookie_no;
		else
			 $member_no=0;


		$query="insert into jumun (no14, member_no14, jumunday14, product_names14, product_nums14, 
  o_name14, o_tel14, o_phone14, o_email14, o_zip14, o_juso14, 
  r_name14, r_tel14, r_phone14, r_email14, r_zip14, r_juso14, memo14,
  pay_method14, card_okno14, card_halbu14, card_kind14, 
  bank_kind14, bank_sender14,
  total_cash14, state14)
 values ('$no14', '$member_no', curdate(), '$product_names', '$product_nums', '$o_name', '$o_tel', '$o_phone', '$o_email', '$o_zip', '$o_addr', '$r_name', '$r_tel', '$r_phone', '$r_email', '$r_zip', '$r_addr', '$o_etc', '$pay_method', '$no14', '$card_halbu', '$card_kind', '$bank_kind', '$bank_sender', '$total', '1');";

	 /*$query="insert into jumun (no14, member_no14, jumunday14, product_names14, product_nums14, 
	  o_name14, o_tel14, o_phone14, o_email14, o_zip14, o_juso14, 
	  r_name14, r_tel14, r_phone14, r_email14, r_zip14, r_juso14, memo14,
	  pay_method14, card_okno14, card_halbu14, card_kind14, 
	  bank_kind14, bank_sender14,
	  total_cash14, state14)
	 values ('$no14', '$member_no', curdate(), '$product_names', '$product_nums', '$o_name', '$o_tel', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '$o_etc', '1', '1', '1', '1', '1', '1', '1', '1');";*/
		
		$result=mysqli_query($db,$query);
		if(!$result) exit("에러:$query");

		echo("<script>location.href='order_ok.php'</script>");

		


?>