<?php include('header.php');?>
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
<?php include('footer.php');?>
