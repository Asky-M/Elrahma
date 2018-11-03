<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "northwind";
//GET DATA FROM DATABASE
try{
	$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
	$conn-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e){
	echo "Connection failed: " . $e->getmessage();
}
$sql = "SELECT * FROM orders AS o JOIN customers AS c ON o.CustomerID=c.CustomerID";
$data = $conn->prepare($sql);
$data->execute();
$orders = array();
while ($row = $data->fetch(PDO::FETCH_OBJ)){
	$orders[] = array( 
		"OrderID" => $row->OrderID,
		"ContactName" => $row->ContactName,
		"OrderDate" => $row->OrderDate,
		"ShipName" => $row->ShipName,
		"ShipAddress" => $row->ShipAddress,
		"ShipCity" => $row->ShipCity,
		"ShipRegion" => $row->ShipRegion,
		"ShipPostalCode" => $row->ShipPostalCode,
		"ShipCountry" => $row->ShipCountry
		);
}
$conn = null;
//PARSING DATA SQL -> XML DOCUMENT
$document = new DOMDocument();
$document->formatOutput = true;
$root = $document->createElement("OrderData");
$document->appendChild($root);
foreach($orders as $row){
	$block = $document-> createElement("order");
	$OrderID = $document->createElement("OrderID");
	$OrderID->appendChild($document->createTextNode($row['OrderID']));
	$block->appendChild($OrderID);
	
	$ContactName = $document-> createElement("ContactName");
	$ContactName->appendChild($document->createTextNode($row['ContactName']));
	$block->appendChild($ContactName);
	
	$OrderDate = $document->createElement("OrderDate");
	$OrderDate->appendChild($document->createTextNode($row['OrderDate']));
	$block->appendChild($OrderDate);
	
	$ShipName = $document->createElement("ShipName");
	$ShipName->appendChild($document->createTextNode($row['ShipName']));
	$block->appendChild($ShipName);
	
	$ShipAddress = $document->createElement("ShipAddress");
	$ShipAddress->appendChild($document->createTextNode($row['ShipAddress']));
	$block->appendChild($ShipAddress);

	$ShipCity = $document->createElement("ShipCity");
	$ShipCity->appendChild($document->createTextNode($row['ShipCity']));
	$block->appendChild($ShipCity);

	$ShipRegion = $document->createElement("ShipRegion");
	$ShipRegion->appendChild($document->createTextNode($row['ShipRegion']));
	$block->appendChild($ShipRegion);
	
	$ShipPostalCode = $document->createElement("ShipPostalCode");
	$ShipPostalCode->appendChild($document->createTextNode($row['ShipPostalCode']));
	$block->appendChild($ShipPostalCode);

	$ShipCountry = $document->createElement("ShipCountry");
	$ShipCountry->appendChild($document->createTextNode($row['ShipCountry']));
	$block->appendChild($ShipCountry);

	$root->appendChild($block);
}
$document->save(dirname('__FILE__').'/orders.xml');
?>
