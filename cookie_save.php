<?
	$irum = $_REQUEST[irum];
	$cart = implode("^", array(1, 2, 3, 4));
	setcookie("cart",$cart);
	echo("<script>location.href='cookie_view.php'</script>");

?>