<!DOCTYPE html>
<html>
	<head>
		<title>Orders</title>
		<meta charset='utf-8'>
		<meta name='viewport' content='width=device-width, initial-scale=1'>	
		<link rel='stylesheet' type='text/css' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css'>
		<link rel='stylesheet' type='text/css' href='https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css'>	
		<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css'>
	</head>	
	<body>
		<nav class='navbar navbar-expand-sm bg-dark navbar-dark fixed-top'>
		  <a class='navbar-brand' href='http://localhost/asky_web/web/'>Asky_web</a>
		  <ul class='navbar-nav'>
			<li class='nav-item'>
			  <a class='nav-link' href='http://localhost/asky_web/web/readProducts.php'>Products</a>
			</li>
			<li class='nav-item'>
			  <a class='nav-link active' href='http://localhost/asky_web/web/readOrders.php'>Orders</a>
			</li>
		  </ul>
		</nav>	
		<div class='container' style='margin-top:70px;padding-bottom:50px;'>
		<?php
		include (dirname('__FILE__').'/orders.php');
		$objDOM = new DOMDocument();
		$objDOM->load(dirname('__FILE__').'/orders.xml');
		$orders = $objDOM->getElementsByTagName("order");
		$display = "<h1>Orders</h1><hr>
					<div class='table-responsive-xl'>
					<table id='myData' class='table table-sm table-bordered'>
					<thead class='thead-light'>
						<th>ID</th>
						<th>Contact Name</th>
						<th>Order Date</th>
						<th>Ship Name</th>
						<th>Ship Address</th>
						<th>Ship City</th>
						<th>Ship Region</th>
						<th>Ship Postal Code</th>
						<th>Ship Country</th>
					</thead>
					<tbody>";
			foreach ($orders as $value) {
				$OrderIDs = $value->getElementsByTagName("OrderID");
				$ContactNames = $value->getElementsByTagName("ContactName");
				$OrderDates = $value->getElementsByTagName("OrderDate");
				$ShipNames = $value->getElementsByTagName("ShipName");
				$ShipAddress = $value->getElementsByTagName("ShipAddress");
				$ShipCitys = $value->getElementsByTagName("ShipCity");
				$ShipRegions = $value->getElementsByTagName("ShipRegion");
				$ShipPostalCodes = $value->getElementsByTagName("ShipPostalCode");
				$ShipCountrys = $value->getElementsByTagName("ShipCountry");

				$display .= "<tr>
					<td>{$OrderIDs->item(0)->nodeValue}</td>
					<td>{$ContactNames->item(0)->nodeValue}</td>					
					<td>{$OrderDates->item(0)->nodeValue}</td>
					<td>{$ShipNames->item(0)->nodeValue}</td>
					<td>{$ShipAddress->item(0)->nodeValue}</td>
					<td>{$ShipCitys->item(0)->nodeValue}</td>
					<td>{$ShipRegions->item(0)->nodeValue}</td>
					<td>{$ShipPostalCodes->item(0)->nodeValue}</td>
					<td>{$ShipCountrys->item(0)->nodeValue}</td>
					</tr>";
			}
		$display .="</tbody>
			</table>
		</div>";
		echo $display;
		?>
		</div>
		
		<script type='text/javascript' src='https://code.jquery.com/jquery-3.3.1.js'></script>
		<script type='text/javascript' src='https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js'></script>
		<script type='text/javascript' src='https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js'></script>
		<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
		<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>	
		<script>
			$(document).ready(function() {
				$('#myData').DataTable();
			});
		</script>
</body>
</html>
