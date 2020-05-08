<?
	$no = $_REQUEST['no'];
	$num = $_REQUEST['num'];
	$opts1 = $_REQUEST['opts1'];
	$opts2 = $_REQUEST['opts2'];


	$pos = $_REQUEST['pos'];

	$cart = $_COOKIE['cart'];
	$n_cart = $_COOKIE['n_cart'];
	$kind = $_REQUEST['kind'];
	if (!$n_cart) $n_cart=0;   // 제품개수 0으로 초기화
	
	switch ($kind)
	{
			case "insert":      // 장바구니 담기
			case "order":      // 바로 구매하기
					// 제품개수 1 증가  $n_cart++
					$n_cart++;
					// 제품정보 합치기.
					$cart = implode("^", array($no, $num, $opts1, $opts2));
					// 제품정보, 개수($cart[$n_cart], $n_cart) 쿠키로 저장.
					setcookie("cart[$n_cart]",$cart);
					setcookie("n_cart",$n_cart);
					break;
			case "delete":      // 제품삭제
					setcookie("cart[$pos]","");
					break;
			case "update":     // 수량 수정
					$num1 = $_REQUEST['num'];

					//$pos번째 제품번호, 옵션값들 알아내기.
					list($no, $num, $opts1, $opts2)=explode("^", $cart[$pos]);
					$num = $num1;
					$cart = implode("^", array($no, $num, $opts1, $opts2));
					setcookie("cart[$pos]",$cart);
					break;
			case "deleteall":    // 장바구니 전체 비우기
				for($i=1;$i<=$n_cart;$i++)
				{ 
					if($cart[$i])
					{
						setcookie("cart[$i]","");
					}
				}
				$n_cart = 0;
				setcookie("n_cart","");
	}

	if ($kind=="order")
			echo("<script>location.href='order.php'</script>");
	else
			echo("<script>location.href='cart.php'</script>");
?>
