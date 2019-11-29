// add event listeners to the elements with the tag "select" so that the ticket price calculation will be 
// updated each time on change

var onChange = document.getElementsByTagName('select');
onChange[0].addEventListener('change', movieChange);	
onChange[1].addEventListener('change', sessionChange);
for (var i = 0; i < onChange.length; i++) {
	onChange[i].addEventListener('change', calculatePrice);
}
document.getElementById('hidden').style.display = 'none';
var isDiscount;

// session options change according to the movie selected 
function movieChange() 
{
	var html = '';
	var AC = ['Wednesday 9pm', 'Thursday 9pm', 'Friday 9pm', 'Saturday 9pm', 'Sunday 9pm'];
	var RC = ['Monday 9pm', 'Tuesday 9pm', 'Wednesday 1pm', 'Thursday 1pm', 'friday 1pm', 'Saturday 6pm', 'Sunday 6pm'];
	var CH = ['Monday 1pm', 'Tuesday 1pm', 'Wednesday 6pm', 'Thursday 6pm', 'Saturday 12pm', 'Sunday 12pm'];
	var AF = ['Monday 6pm', 'Tuesday 6pm', 'Saturday 3pm', 'Sunday 3pm'];
	
	var AC_values = ['WED-09', 'THU-09', 'FRI-09', 'SAT-09', 'SUN-09'];
	var RC_values = ['MON-09', 'TUE-09', 'WED-01', 'THU-01', 'FRI-01', 'SAT-06', 'SUN-06'];
	var CH_values = ['MON-01', 'TUE-01', 'WED-06', 'THU-06', 'SAT-12', 'SUN-12'];
	var AF_values = ['MON-06', 'TUE-06', 'SAT-03', 'SUN-03'];
	
	html = document.getElementById('session').innerHTML = '<option value=\'null\'>[select a session]</option>';

	switch(document.getElementById('movie').value)
	{
		case 'AC':
			for (var i = 0; i < AC.length; i++) {
				html += '<option value=\'' + AC_values[i] + '\'>' + AC[i] + '</option>';
				document.getElementById('session').innerHTML = html;
			}
			break;
		case 'RC':
			for (var i = 0; i < RC.length; i++) {
				html += '<option value=\'' + RC_values[i] + '\'>' + RC[i] + '</option>';
				document.getElementById('session').innerHTML = html;
			}
			break; 
		case 'CH':
		for (var i = 0; i < CH.length; i++) {
			html += '<option value=\'' + CH_values[i] + '\'>' + CH[i] + '</option>';
			document.getElementById('session').innerHTML = html;
		}
		break; 
		case 'AF':
		for (var i = 0; i < AF.length; i++) {
			html += '<option value=\'' + AF_values[i] + '\'>' + AF[i] + '</option>';
			document.getElementById('session').innerHTML = html;
		}
		break; 
		default:		// no movie is selected, no session displayed
			document.getElementById('session').innerHTML = '';
		break;
	}
	canChooseSeats();

	return true;
}

// determine if there is a discount base ont the session time after session is changed
function sessionChange()
{
	isDiscount = false;
	var discountTime = ['MON-01', 'MON-06', 'MON-09', 'TUE-01', 'TUE-06', 'TUE-09', 'WED-01', 'THU-01', 'FRI-01'];
	var time = document.getElementById('session').value;
	
	for (var i = 0; i < discountTime.length; i++)
	{
		if (time == discountTime[i]) {
			isDiscount = true;
		}
	}
	
	canChooseSeats();
	return true;
}

// if movie or session are not selected, seats are not displayed
function canChooseSeats() {
	if (document.getElementById('movie').value == 'null' || document.getElementById('session').value == 'null')
		document.getElementById('hidden').style.display = 'none';
	else 
		document.getElementById('hidden').style.display = 'block';
}

// calculate ticket price and render the table on the browser in real time
function calculatePrice() 
{	
	/*document.getElementById('seats').focus();
	document.getElementById('seats').select();
	return false;*/
	// calculate the prices of every ticket type
	
	var full = [18.5, 15.5, 12.5, 30, 25, 33, 30, 30];
	var discount = [12.5, 10.5, 8.5, 25, 20, 22, 20, 20];
	var seatType = ['Standard (Full)', 'Standard (Concession)', 'Standard (Child)',
					'First Class (Adult)', 'First Class (Child)',
					'Beanbag (Adult)', 'Beanbag (Family)', 'Beanbag (Child)'];
	var html = writeHeaders();
	var seat_types = document.getElementsByClassName('seat_type');
	var num;
	
	for (var i = 0; i < seatType.length; i++)
	{
		num = parseInt(seat_types[i].value);	// number of tickets
		if(isDiscount == true && num != 0) 
		{
			html += '<tr>' + '<td>' + seatType[i] + '</td>' +
			'<td>' + discount[i].toFixed(2) + '</td>' +				// print the discount ticket price
			'<td>' + num + '</td>' + 
			'<td>' + (num * discount[i]).toFixed(2) + '</td>' + '</tr>';		// subtotal
		}
		
		else if (isDiscount == false && num != 0)
		{
			html += '<tr>' + '<td>' + seatType[i] + '</td>' +
			'<td>' + full[i].toFixed(2) + '</td>' +				// print the full ticket price
			'<td>' + num + '</td>' + 
			'<td>' + (num * full[i]).toFixed(2) + '</td>' + '</tr>';		// subtotal
		}
	}
	
	document.getElementById('price_table').innerHTML = html;
	
	return true;
}

// write the price table headers to HTML
function writeHeaders() {
	var html = '<tr>';
	html += '<th>' + 'Ticket Type' + '</th>';
	html += '<th>' + 'Cost' + '</th>';
	html += '<th>' + 'Qty' + '</th>';
	html += '<th>' + 'Subtotal' + '</th>' + '</tr>';
	return html;
}

function hasSelectedTickets() 
{
	var ticketSelected = false;
	var seats = document.getElementsByClassName('seat_type');;
	for (var i = 0; i < seats.length; i++)
	{
		if (seats[i].value != '0') {
			ticketSelected = true;
			return true;
		}
	}
	// if no ticket selected prompt the user to enter valid data and resubmit the form
	document.getElementById('error').innerHTML = 'Please select a ticket';
	document.getElementById('error').style.color = 'red';
	document.getElementById('seats[SF]').focus();
	return false;
}

// check if all the data has been entered
function dataEntered()
{	
	var data = document.getElementsByClassName('customer_data');
	var entered = true;
	for (var i = 0; i < data.length; i++)
	{
		if (data[i].value == '')
		{
			entered = false;
		}
	}
	if (entered == false) {
		document.getElementById('data_entered').innerHTML = 'please fill in all the fields';
	}
	return entered;
}
