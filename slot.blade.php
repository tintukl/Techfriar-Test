<!DOCTYPE html>
<html>
<body>

<h2>Parking Slot Booking</h2>

<form method = "post" action="{{route('slot')}}">
  @csrf
  <label for="name">First name:</label><br>
  <input type="text" id="fname" name="customer_name"><br>
  <label for="vehile">vehicle_number:</label><br>
  <input type="text" id="lname" name="vehicle_number"><br><br>
  <label for="vehile">booking_start_date_time:</label><br>
  <input type="text" id="lname" name="booking_start_date_time"><br><br>
  <label for="vehile">booking_end_date_time:</label><br>
  <input type="text" id="lname" name="booking_end_date_time"><br><br>
  
  <input type="submit" value="Submit">
</form> 

</body>
</html>

