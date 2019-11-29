
<?php 
error_reporting(E_ALL);
session_start(); ?>

<!DOCTYPE html> 
<html lang='en'>

<!-- MODULE FOR HEAD -->
<?php include_once('head.php'); ?>

<body>
	<?php include_once('nav.php'); ?>
    <main>
		<div>
			<h2>We are Back!</h2>

		    <p>After three months' renovation</p>
			<p>We present you the premium cinema experience that you had never experienced before in town</p>

		</div>
		<div class='container'>
			<h2>3D Projection</h2>
			<!-- Original image below sourced for educational purposes: http://hypersonicegypt.com/screens/ -->
			<p><img class = 'homepage_img' src='../img/3D.jpg' alt='3D cinema screen' </p>
		</div>
		<div class = 'container'>
		<h2>Dolby lighting and sound</h2>	
		<p>Experience a unique full-spectrum color technology that provides extremelly crisp and clear image.</p>
		<p>Breathtaking sound in Dolby Atmos fills the cinema and flows around you</p>
		<p><a href='http://www.dolby.com/us/en/platforms/dolby-cinema.html'>learn more about dolby ></a></p>
		<!-- Original image below sourced for educational purposes: https://www.google.com.au/search?biw=1396&bih=646&tbm=isch&sa=1&q=dolby+lighting+&oq=dolby+lighting+&gs_l=psy-ab.3...52194.53434.0.54035.9.7.0.0.0.0.328.580.2-1j1.2.0....0...1.1.64.psy-ab..8.0.0.xTAShdVbWh4#imgrc=cSGS9cqrpB6MYM -->
		<p><img class = 'homepage_img' src='../img/dolby.jpg' alt='dolby System' </p>
		</div>
		<h2 id='seats'>New Seats</h2>
	
		<img id = 'seating_img' src='../img/seating.png' alt='Seating Plan'>
		<table id = 'seating_plan'>
		<tr><th>40 normal seats</th></tr>

		<tr><td>full Adult</td></tr>
		<tr> <td>concession Adult</td></tr>
		<tr><td>child under 12</td></tr>
		
		
		<tr><th>12 first class seats</th></tr>
		
		<tr><td>adult</td></tr>
		<tr><td>child under 12</td></tr>
		
		<tr><th>13 bean bag seats</th></tr>
		
		<tr><td>adult (2 adults)</td></tr>
		<tr><td>family (1 adult + 1 child)</td></tr>
		<tr><td>child (3 children under 12)</td></tr>
		
		</table> 
		<!-- end of .seating -->
    </main>
    
   	<!-- MODULE FOR FOOTER -->
    <?php include_once('footer.php'); ?>
    
</body>
</html>