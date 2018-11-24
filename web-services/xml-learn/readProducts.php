<?php include('header.php');?>
		<div class='container' style='margin-top:70px;padding-bottom:50px;'>
			<?php
			include (dirname('__FILE__').'/products.php');
			$objDOM = new DOMDocument();
			$objDOM->load(dirname('_FILE_') . '/products.xml');
			$products = $objDOM->getElementsByTagName("product");
			$display = "<h1>Products</h1><hr>
						<div class='table-responsive-sm'>
						<table id='myData' class='table table-sm table-bordered'>
						<thead class='thead-light'>
							<tr>
								<th>ID</th>
								<th>Product Name</th>
								<th>Categories</th>
								<th>Quantity PerUnit</th>
								<th>Units In Stock</th>
							</tr>
						</thead>
						<tbody>";
			foreach($products as $value){
				$ProductIDs = $value->getElementsByTagName("ProductID");
				$ProductNames = $value->getElementsByTagName("ProductName");
				$CategoryNames = $value->getElementsByTagName("CategoryName");
				$QuantityPerUnits = $value->getElementsByTagName("QuantityPerUnit");
				$UnitsInStocks = $value->getElementsByTagName("UnitsInStock");

				$display .= "<tr>
								<td>{$ProductIDs->item(0)->nodeValue}</td>
								<td>{$ProductNames->item(0)->nodeValue}</td>
								<td>{$CategoryNames->item(0)->nodeValue}</td>
								<td>{$QuantityPerUnits->item(0)->nodeValue}</td>
								<td>{$UnitsInStocks->item(0)->nodeValue}</td>
							</tr>";
			}
			$display .="</tbody>
					</table>
					</div>";
			echo $display;
			?>
		</div>
<?php include('footer.php');?>
