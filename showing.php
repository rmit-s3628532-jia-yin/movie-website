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
	<div class = 'container'>
	<h2>now showing</h2>
	</div>
	<div id='showing'>
	<figure>
	<!-- Original image below sourced for educational purposes: https://www.google.com.au/imgres?imgurl=https%3A%2F%2Fupload.wikimedia.org%2Fwikipedia%2Fen%2F6%2F69%2FThe_Big_Sick.jpg&imgrefurl=https%3A%2F%2Fen.wikipedia.org%2Fwiki%2FThe_Big_Sick&docid=0wnwq7PuefjotM&tbnid=fxoekunBVhvfUM%3A&vet=10ahUKEwiTxP7zzuXVAhUIhrwKHUHiD-oQMwgmKAAwAA..i&w=220&h=326&bih=690&biw=1396&q=the%20big%20sick&ved=0ahUKEwiTxP7zzuXVAhUIhrwKHUHiD-oQMwgmKAAwAA&iact=mrc&uact=8   -->
    <img class='movie_img' src='../img/the_Big_Sick.jpg' alt='poster of the Big Sick'><br>	
	<caption>the Big Sick</caption>

	</figure>
	
	<figure>
	<!-- Original image below sourced for educational purposes: https://cdn.hoyts.com.au/mediafiles/images/AUposters/HO00004815.jpg   -->
    <img class='movie_img' src='../img/Atomic_Blonde.jpg' alt='poster of Atomic Blonde'><br>
	<caption>Atomic Blonde</caption>
	</figure>
	<br>
	<figure>
	<!-- Original image below sourced for educational purposes: https://cdn.hoyts.com.au/mediafiles/images/AUposters/HO00005517.jpg  -->
    <img class='movie_img' src='../img/Whisper_of_the_Heart.jpg' alt='poster of Whisper of the Heart'><br>
	<caption>Whisper of <br>the Heart</caption>
	</figure>
	
	<figure>
	<!-- Original image below sourced for educational purposes: https://cdn.eventcinemas.com.au/cdn/resources/movies/10602/images/largeposter.jpg  -->
    <img class='movie_img' src='../img/Mickey.jpg' alt='poster of mickey and the Roadster Racers' ><br>
	<caption>Mickey & the<br> Roadster Racers</caption>
	</figure>
	</div>
	
	<table id='schedule'>
	<tr>
	<th>Mon-Tue</th>
	<th>Wed-Fri</th>
	<th>Sat-Sun</th>
	</tr>
	<tr>
	<td>1pm - Mickey & the Roadster Racers</td>
	<td>1pm - the Big Sick</td>
	<td>12pm - Mickey & the Roadster Racers</td>
	</tr>
	<tr>
	<td>6pm - Whisper of the Heart</td>
	<td>6pm - Mickey & the Roadster Racers</td>
	<td>3pm - Whisper of the Heart</td>
	</tr>
	
	<tr>
	<td>9pm - the Big Sick</td>
	<td>9pm - Atomic Blonde</td>
	<td>6pm - the Big Sick</td>
	</tr>
	
	<tr>
	<td></td>
	<td></td>
	<td>9pm - Atomic Blonde</td>
	</tr>
	</table>
	
	<h2>Seating</h2>
	<h3>Standard</h3>
	
	<table class='price'>
	<tr>
	<th>Seat Option</th>
	<th>Seat Code</th>
	<th>Mon - Tue (All Day)<br>Mon - Fri (1pm only)</th>
	<th>Wed - Fri (after 1pm)<br>Sat - Sun (All Day)</th>
	</tr>
	<tr>
	<td>Full</td>
	<td>SF</td>
	<td>$12.50</td>
	<td>$18.50</td>
	</tr>
	<tr>
	<td>Concession</td>
	<td>SP</td>
	<td>$10.50</td>
	<td>$15.50</td>
	</tr>
	
	<tr>
	<td>Child</td>
	<td>SC</td>
	<td>$8.50</td>
	<td>$12.50</td>
	</tr>
	</table>
	
	<h3>First Class</h3>
	<table class='price'>
	<tr>
	<th>Seat Option</th>
	<th>Seat Code</th>
	<th>Mon - Tue (All Day)<br>Mon - Fri (1pm only)</th>
	<th>Wed - Fri (after 1pm)<br>Sat - Sun (All Day)</th>
	</tr>
	<tr>
	<td>Adult</td>
	<td>FA</td>
	<td>$25</td>
	<td>$30</td>
	</tr>
	<tr>
	<td>Child</td>
	<td>FC</td>
	<td>$20</td>
	<td>$25</td>
	</tr>
	
	</table>
	
	<h3>Beanbag</h3>
	<table class='price'>
	<tr>
	<th>Seat Option</th>
	<th>Seat Code</th>
	<th>Mon - Tue (All Day)<br>Mon - Fri (1pm only)</th>
	<th>Wed - Fri (after 1pm)<br>Sat - Sun (All Day)</th>
	</tr>
	<tr>
	<td>Adult</td>
	<td>BA</td>
	<td>$22</td>
	<td>$33</td>
	</tr>
	<tr>
	<td>Family</td>
	<td>BF</td>
	<td>$20</td>
	<td>$30</td>
	</tr>
	<tr>
	<td>Child</td>
	<td>BC</td>
	<td>$20</td>
	<td>$30</td>
	</tr>
	
	</table>
	<!-- Original CSS code sourced and adapted for educational purposes: 
	https://titan.csit.rmit.edu.au/~e54061/wp/silverado-test.php -->
	<form action='reservation.php' method='post' id='booking_form' onsubmit='return hasSelectedTickets();'>
	<fieldset><legend id='booking_title'>Booking Form</legend>
      <p><label>Movie</label><br><select name='movie' id='movie'>
	  <option value='null'>[select a movie]</option>
	  <option value='AC'>Atomic Blonde</option>
	  <option value='RC'>the Big Sick</option>
	  <option value='CH'>Mickey & the Roadster Racers</option>
	  <option value='AF'>Whisper of the Heart</option> 
	  </select></p>
      <p><label>Session</label><br>
	  <select name='session' id='session'>
		 
      </select></p>
	  <div id='hidden'>
      <fieldset id='seat_selection'><legend id='form_seats'>Choose Seats</legend>
		<p id='error'></p>
        <fieldset><legend>Standard</legend>
          <p><label>Adult</label><br><select class='seat_type' name='seats[SF]' id='seats[SF]'>
		  <option value='0'>0</option>
		  <option value='1'>1</option>
		  <option value='2'>2</option>
		  <option value='3'>3</option>
		  <option value='4'>4</option>
		  <option value='5'>5</option>
		  <option value='6'>6</option>
		  <option value='7'>7</option>
		  <option value='8'>8</option>
		  <option value='9'>9</option>
		  <option value='10'>10</option>
		  </select></p>
          <p><label>Concession</label><br><select class='seat_type' name='seats[SP]' id='seats[SP]'>
		  <option value='0'>0</option>
		  <option value='1'>1</option>
		  <option value='2'>2</option>
		  <option value='3'>3</option>
		  <option value='4'>4</option>
		  <option value='5'>5</option>
		  <option value='6'>6</option>
		  <option value='7'>7</option>
		  <option value='8'>8</option>
		  <option value='9'>9</option>
		  <option value='10'>10</option></select></p>
          <p><label>Child</label><br><select class='seat_type' name='seats[SC]' id='seats[SC]'>
		  <option value='0'>0</option>
		  <option value='1'>1</option>
		  <option value='2'>2</option>
		  <option value='3'>3</option>
		  <option value='4'>4</option>
		  <option value='5'>5</option>
		  <option value='6'>6</option>
		  <option value='7'>7</option>
		  <option value='8'>8</option>
		  <option value='9'>9</option>
		  <option value='10'>10</option></select></p>
        </fieldset>
        <fieldset><legend>First Class</legend>
          <p><label>Adult</label><br><select class='seat_type' name='seats[FA]' id='seats[FA]'>
		  <option value='0'>0</option>
		  <option value='1'>1</option>
		  <option value='2'>2</option>
		  <option value='3'>3</option>
		  <option value='4'>4</option>
		  <option value='5'>5</option>
		  <option value='6'>6</option>
		  <option value='7'>7</option>
		  <option value='8'>8</option>
		  <option value='9'>9</option>
		  <option value='10'>10</option></select></p>
          <p><label>Child</label><br><select class='seat_type' name='seats[FC]' id='seats[FC]'>
		  <option value='0'>0</option>
		  <option value='1'>1</option>
		  <option value='2'>2</option>
		  <option value='3'>3</option>
		  <option value='4'>4</option>
		  <option value='5'>5</option>
		  <option value='6'>6</option>
		  <option value='7'>7</option>
		  <option value='8'>8</option>
		  <option value='9'>9</option>
		  <option value='10'>10</option></select></p>
        </fieldset>
        <fieldset><legend>Bean Bags</legend>
          <p><label>Adult</label><br><select class='seat_type' name='seats[BA]' id='seats[BA]'>
		  <option value='0'>0</option>
		  <option value='1'>1</option>
		  <option value='2'>2</option>
		  <option value='3'>3</option>
		  <option value='4'>4</option>
		  <option value='5'>5</option>
		  <option value='6'>6</option>
		  <option value='7'>7</option>
		  <option value='8'>8</option>
		  <option value='9'>9</option>
		  <option value='10'>10</option></select></p>
          <p><label>Family</label><br><select class='seat_type' name='seats[BF]' id='seats[BF]'>
		  <option value='0'>0</option>
		  <option value='1'>1</option>
		  <option value='2'>2</option>
		  <option value='3'>3</option>
		  <option value='4'>4</option>
		  <option value='5'>5</option>
		  <option value='6'>6</option>
		  <option value='7'>7</option>
		  <option value='8'>8</option>
		  <option value='9'>9</option>
		  <option value='10'>10</option></select></p>
          <p><label>Child</label><br><select class='seat_type' name='seats[BC]' id='seats[BC]'>
		  <option value='0'>0</option>
		  <option value='1'>1</option>
		  <option value='2'>2</option>
		  <option value='3'>3</option>
		  <option value='4'>4</option>
		  <option value='5'>5</option>
		  <option value='6'>6</option>
		  <option value='7'>7</option>
		  <option value='8'>8</option>
		  <option value='9'>9</option>
		  <option value='10'>10</option></select></p>
        </select></fieldset>
      </fieldset></select>
      <h4></h4>       <!-- movie name * --> 
      <h5></h5>		<!-- session time-->
	  <table id='price_table'>
	  	
	  </table>
      <p><button class='buttons' type='submit' form='booking_form' value='submit'>Book</button></p>
	  </div>
    </fieldset>
	</form>
	</main>
	
  	<!-- MODULE FOR FOOTER -->
    <?php include_once('footer.php'); ?>
    
	<script type='text/javascript' src='tools.js'></script>
</body>

</html>