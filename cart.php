<?php
    // TO ENSURE NO SESSION ERRORS
    error_reporting(E_ALL);
    // OPEN SESSION
    session_start();
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
    $grandTotal = 0;
	

	if (isset($_POST['delete'])) {
		unset($_SESSION['cart'][$_POST['delete']]);
		$_SESSION['cart'] = array_values($_SESSION['cart']);
		unset($_POST['delete']);
	}
?>

<!DOCTYPE html>
<html>
    <?php include_once('head.php'); ?>
<body>
	<?php include_once('nav.php'); ?>

<main>
	<form action='cart.php' method='post' id='cart' class='default'>
    <?php
        if (isset($_SESSION['cart'])) {
    	    for ($i = 0; $i < count($_SESSION['cart']); $i++) {
				$html = "";
				$time = $session[$_SESSION['cart'][$i]['session']];
				$movieVal = $_SESSION['cart'][$i]['movie'];
				$movieName = $movies[$movieVal];
            	$isDiscount = false;
            	for ($it = 0; $it < count($discountTime); ++$it)
            	{
            		if (strcmp($_SESSION['cart'][$i]['session'], $discountTime[$it]) == 0) {
            			$isDiscount = true;
            		}
            	}
            	
            	$it = 0;
            	$total = 0;
            	foreach ($_SESSION['cart'][$i]['seats'] as $key => $num)
            	{
                    if($isDiscount == true && $num != 0) 
                    {
                        $total += $num * $discount[$it];
                    	$html .= '<tr>' . '<td>' . $seatType[$it] . '</td>' .
                    	'<td>' . number_format((float)$discount[$it], 2, '.', '') . '</td>' .				// print the discount ticket price
                    	'<td>' . $num . '</td>' . 
                    	'<td>' . number_format((float)$num * $discount[$it], 2, '.', '') . '</td>' . '</tr>';		// subtotal
                    }
                    
                    else if ($isDiscount == false && $num != 0)
                    {
                        $total += $num * $full[$it];
                    	$html .= '<tr>' . '<td>' . $seatType[$it] . '</td>' .
                    	'<td>' . number_format($full[$it], 2, '.', '') . '</td>' .				// print the full ticket price
                    	'<td>' . $num . '</td>' . 
                    	'<td>' . number_format($num * $full[$it], 2, '.', '') . '</td>' . '</tr>';		// subtotal
                    }
                    $it++;
            	}
            	$grandTotal += $total;
            	$html .= "<tr><td colspan='3' style='text-align:right'>Total: </td><td>".number_format($total, 2, '.', '')."</td></tr>" ;
            	
				echo "<h3 class='movie_name'>{$movieName}</h3>";
				echo "<h4 class='time'> Showing at {$time}</h4>";
				echo "<p><button class='buttons' form='cart' type='submit' name='delete' value='{$i}'>Delete from Cart</button></p>";
    	        echo "<table class='bookings'> 
    	            <tr>
            	        <th>Ticket Type</th>
                    	<th>Cost</th>
                    	<th>Quantity</th>
                    	<th>Subtotal</th>
            	    </tr>";
				echo $html;
            	echo "</table>";
    	    }
			
			if (isset($_SESSION['cart'][0])) {
				$grandTotal = number_format($grandTotal, 2, '.', '');
				echo "<p id='grand_total'>Grand Total:  $grandTotal</p>";
			
	?>
	</form>
     <!-- PROCEED TO INPUT USER INFORMATION -->
     <form id='input_details' action='collect_details.php' method='post'>
		<p><button class='buttons' type='submit' value='submit'>Check Out</button></p>
	</form>
    
    <?php
			}
        }
    ?>
</main>
  <!-- MODULE FOR FOOTER -->
     <?php include_once('footer.php'); ?>   
</body>
</html>