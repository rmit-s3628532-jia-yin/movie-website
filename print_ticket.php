<?php 
error_reporting(E_ALL);
session_start(); 
$_SESSION['customer_details'] = $_POST;

$full = [18.5, 15.5, 12.5, 30, 25, 33, 30, 30];
$discount = [12.5, 10.5, 8.5, 25, 20, 22, 20, 20];
$seatType = ['Standard (Full)', 'Standard (Concession)', 'Standard (Child)',
				'First Class (Adult)', 'First Class (Child)',
				'Beanbag (Adult)', 'Beanbag (Family)', 'Beanbag (Child)'];
$discountTime = ['MON-01', 'MON-06', 'MON-09', 'TUE-01', 'TUE-06', 'TUE-09', 'WED-01', 'THU-01', 'FRI-01'];
$session = ['MON-01' => "Monday, 1pm", 'MON-06' => "Monday, 6pm", 'MON-09' => "Monday, 9pm",
			'TUE-01' => "Tuesday, 1pm", 'TUE-06' => "Tuesday, 6pm", 'TUE-09' => "Tuesday, 9pm",
			'WED-01' => "Wednesday, 1pm", 'WED-06' => "Wednesday, 6pm", 'WED-09' => "Wednesday, 9pm",
			'THU-01' => "Thursday, 1pm", 'THU-06' => "Thursday, 6pm", 'THU-09' => "Thursday, 9pm",
			'FRI-01' => "Friday, 1pm", 'FRI-06' => "Friday, 6pm", 'FRI-09' => "Friday, 9pm",
			'SAT-12' => "Saturday, 12pm", 'SAT-03' => "Saturday, 3pm", 'SAT-06' => "Saturday, 6pm", 'SAT-09' => "Saturday, 9pm",
			'SUN-12' => "Sunday, 12pm", 'SUN-03' => "Sunday, 3pm", 'SUN-06' => "Sunday, 6pm", 'SUN-09' => "Sunday, 9pm"];
$movies = ['AC' => 'Atomic Blonde', 'RC' => 'the Big Sick', 'CH' => 'Mickey & the Roadster Racers', 'AF' => 'Whisper of the Heart'];

$seatTypeAs = ['SF' => 'Standard (Full)', 'SP' => 'Standard (Concession)', 'SC' => 'Standard (Child)',
				'FA' => 'First Class (Adult)', 'FC' => 'First Class (Child)',
				'BA' => 'Beanbag (Adult)', 'BF' => 'Beanbag (Family)', 'BC' =>'Beanbag (Child)'];
$grandTotal = 0;

$writeString='';
for ($i = 0; $i < count($_SESSION['cart']); $i++) {
	$writeString .= "{$_SESSION['customer_details']['name']}\n";
	$writeString .= "{$_SESSION['customer_details']['email']}\n";
	$writeString .= "{$_SESSION['customer_details']['phone']}\n";
  foreach ($_SESSION['cart'][$i] as $key => $val) {
	if ($key == 'movie') {
	  $writeString .= $key.": ".$movies[$val]."\n"; 
	} 
	if ($key == 'session') {
		$writeString .= $key.": ".$session[$val]."\n"; 
	}
	
	if ($key == 'seats') { 
	  $writeString .= "seats:\n";
	  foreach ($_SESSION['cart'][$i]['seats'] as $key => $num) {
		  if ($num != 0)
		$writeString .= "\t".$seatTypeAs[$key].': '.$num."\n";  
	  }
	}
  }
}
file_put_contents('bookings.txt', $writeString, FILE_APPEND | LOCK_EX);
?>
<!DOCTYPE html>
<html>

<!-- MODULE FOR HEAD -->
<?php include_once('head.php'); ?>
<body>
	<?php include_once('nav.php'); ?>
	<main>
		<?php
			if (isset($_SESSION['customer_details'])) {
				for ($i = 0; $i < count($_SESSION['cart']); $i++) {
					$html = '';
					echo "<div id='ticket'>";
					echo "<p class='left' id='customer_name'>{$_SESSION['customer_details']['name']}</p>".
						"<p class='right'>Silverado</p>";
					echo "<p class='left'>{$_SESSION['customer_details']['email']}</p>".
						"<p class='right'>{$movies[$_SESSION['cart'][$i]['movie']]}</p>";
					echo "<p class='left'>{$_SESSION['customer_details']['phone']}</p>".
						"<p class='right'>{$session[$_SESSION['cart'][$i]['session']]}</p>";
					
					$isDiscount = false;
					for ($it = 0; $it < count($discountTime); ++$it)
					{
						if (strcmp($_SESSION['cart'][$i]['session'], $discountTime[$it]) == 0) {
							$isDiscount = true;
						}
					}
					
					$it = 0;
					$grandTotal = 0;
					$eachSeat = '';
					foreach ($_SESSION['cart'][$i]['seats'] as $key => $num)
					{
						if($isDiscount == true && $num != 0) 
						{
							$grandTotal += $num * $discount[$it];
							echo "<p class='left'>" . "{$num} x " . $seatType[$it] . '</p>' .
							"<p class='right'>" . number_format((float)$num * $discount[$it], 2, '.', '') . '</p>';		// subtotal
						}
						
						else if ($isDiscount == false && $num != 0)
						{
							$grandTotal += $num * $full[$it];
							echo "<p class='left'>" . "{$num} x " . $seatType[$it] . '</p>' .
							"<p class='right'>" . number_format((float)$num * $full[$it], 2, '.', '') . '</p>';		// subtotal
						}
						
						for ($c = 0; $c < $num; $c++) {
							if ($num != 0) {
							$eachSeat .= "<div class='each_ticket'>"."<p class='individual'>Silverado</p>".
										"<p class='individual'>{$session[$_SESSION['cart'][$i]['session']]}</p>".
										"<p class='individual'>{$movies[$_SESSION['cart'][$i]['movie']]}</p>".
										"<p></p>".
										"<p class='individual'>" . $seatType[$it] . '</p>'."</div>";
							}
						}
						$it++;
					}
					$grandTotal = number_format($grandTotal, 2, '.', '');
					echo "<p id='grand_total'>Total:  $grandTotal</p>";
					echo $eachSeat;
					echo "</div>";
				}
			}
		?>
		
	</main>
		
  	<!-- MODULE FOR FOOTER -->
    <?php include_once('footer.php'); ?>
</body>

</html>