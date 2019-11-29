<?php 
error_reporting(E_ALL);
session_start(); 
?>
<!DOCTYPE html>
<html>

<!-- MODULE FOR HEAD -->
<?php include_once('head.php'); ?>
<body>
	<?php include_once('nav.php'); ?>
	<main>
		<form action='print_ticket.php' method='post' id='customer_details' onsubmit='return dataEntered()'>
			<fieldset>
				<legend id='details_title'>please enter your details</legend>
				<p><label>name</label><br>
					<input type='text' name='name' class='customer_data' id='customer_name' pattern="^[a-zA-Z ,.'-]+$" title='please enter a valid name'></input><br/></p>
				<p><label>email</label><br>
					<!-- Original code below sourced for educational purposes: https://www.wired.com/2008/08/four_regular_expressions_to_check_email_addresses/ -->
					<input type='text' name='email' class='customer_data' id='customer_email' pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$" title='please enter a valid email' ></input><br/></p>
				<p><label>mobile number</label><br>
					<!-- Original code below sourced for educational purposes: https://manual.limesurvey.org/Using_regular_expressions -->
					<input type='text' name='phone' class='customer_data' id='customer_phone' pattern='^(?:\+?61|0)[2-478](?:[ -]?[0-9]){8}$' title='please enter a valid australian number'></input></p>
					<p id='data_entered'></p>
	
				<p><button class='buttons' type='submit' form='customer_details' value='submit'>submit</button></p>
			</fieldset>
		</form>
	
	</main>
		
  	<!-- MODULE FOR FOOTER -->
    <?php include_once('footer.php'); ?>
	<script type='text/javascript' src='tools.js'></script>
</body>

</html>