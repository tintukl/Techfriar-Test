<!DOCTYPE html>
<html>
<body>

<h2>Customer List</h2>

<table border="1">
    <thead>
        <tr>
          <td>ID</td>
          <td>Customer Name</td>
          <td>Vehicle Number</td>
        </tr>
    </thead>
    <tbody>
        @foreach($customers as $customer)
        <tr>
            <td>{{$customer->id}}</td>
            <td>{{$customer->customer_name}}</td>
            <td>{{$customer->vehicle_number}}</td>
        </tr>
        @endforeach
    </tbody>
  </table>
<p>Total cash collected: {{$total_collection}}
</body>
</html>

