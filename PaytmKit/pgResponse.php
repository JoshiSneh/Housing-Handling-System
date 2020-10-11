<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Response</title>
	<script type="text/javascript">
		window.history.forward();
	</script>
</head>

<body>
	<?php
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");
	include("../dbconnection.php");

	require_once("./lib/config_paytm.php");
	require_once("./lib/encdec_paytm.php");

	$paytmChecksum = "";
	$paramList = array();
	$isValidChecksum = "FALSE";

	$paramList = $_POST;
	$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

	//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
	$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.
	?>
	<?php
	if ($isValidChecksum == "TRUE") {
		echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
		if ($_POST["STATUS"] == "TXN_SUCCESS") {
			echo "<b>Transaction status is success</b>" . "<br/>";
			//Process your transaction here as success transaction.
			//Verify amount & order id received from Payment gateway with your application's order id and amount.

			if (isset($_POST['ORDERID']) && isset($_POST['TXNAMOUNT'])) {
				$orderid = $_POST['ORDERID'];
				$customerid = $_SESSION['lemail'];
				$status = $_POST['STATUS'];
				$date = $_SESSION['date'];
				$id = $_SESSION['id'];
				$month = $_SESSION['month'];
				$txndate = $_POST['TXNDATE'];
				$amount = $_POST['TXNAMOUNT'];

				$sql = "INSERT INTO checkout(check_user_id, check_pay_id, user_email, check_pay_month, check_status, check_amount, pay_date, check_date) VALUES ('$id', '$orderid', '$customerid', '$month', '$status', '$amount', '$date', '$txndate')";
				$result = mysqli_query($conn, $sql);
				if ($result) {
					echo "Redirecting to Payment Page..";
					echo "<script> setTimeout(function(){
					    location.href = '../payment/payment.php?msg=2';
				    },1500)</script>";
				}
			}
		} else {
			echo "<b>Transaction status is failure</b>" . "<br/>";
		}

		if (isset($_POST) && count($_POST) > 0) {
		}
	} else {
		echo "<b>Checksum mismatched.</b>";
		//Process transaction as suspicious.
	}

	?>
</body>

</html>