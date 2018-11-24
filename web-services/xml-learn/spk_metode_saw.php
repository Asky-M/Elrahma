<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
	table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width:50%; 
    margin-left:auto; 
    margin-right:auto;

}
th{
	background-color: grey;
	color:white;
}
td, th {
    border: 1px solid #dddddd;
    text-align: center;
    padding: 8px;
}
.container{
	width: 100%;
	text-align:center;
}

  .rows{
  	width:50%;
  	margin-left:auto; 
    margin-right:auto;
  }
	</style>
</head>
<body>

<div class="container">
<?php
$konek = mysqli_connect("localhost","root","") or die (mysqli_error());
$db = mysqli_select_db($konek, "asky_spk") or die (mysqli_error());

// fungsi untuk mengabil tabel yang dipilih
$sql = mysqli_query($konek,"SELECT * FROM data_komputer");
// tabel menampilkan tabel
echo "
<table border='1' style='width: 90%;'>
<tr>
<th colspan='9'>Data Awal</th>
</tr>
<tr>
<th>ID Komputer</th>
<th>Nama Komputer</th>
<th>Harga (Juta)</th>
<th>ID Vendor</th>
<th>Nama Vendor</th>
<th>RAM (GB)</th>
<th>Hardisk</th>
<th>ID Sistem Operasi</th>
<th>Nama Sistem Operasi</th>
</tr>";
$data_arr_harga = array();
$data_arr_idvendor = array();
$data_arr_ram = array();
$data_arr_hardisk = array();
$data_arr_idso = array();
while ($data = mysqli_fetch_array($sql)) {
	echo "<tr>
	<td>".$data['idcom']."</td>
	<td>".$data['namacom']."</td>
	<td>".$data['harga']."</td>
	<td>".$data['idvendor']."</td>
	<td>".$data['namavendor']."</td>
	<td>".$data['ram']."</td>
	<td>".$data['hardisk']."</td>
	<td>".$data['idso']."</td>
	<td>".$data['namaso']."</td>
	</tr>";
	$data_arr_harga[] = $data['harga'];
	$data_arr_idvendor[] = $data['idvendor'];
	$data_arr_ram[] = $data['ram'];
	$data_arr_hardisk[] = $data['hardisk'];
	$data_arr_idso[] = $data['idso'];
}
echo "</table>";


//$sql2 = mysqli_query($konek, "SELECT c.idcom, harga, idvendor, ram, hardisk, idso FROM data_komputer c JOIN bobotmm s ON c.idcom = s.idcom");
$sql2 = mysqli_query($konek, "SELECT min(harga) as mharga, max(idvendor) as midvendor, min(ram) as mram, max(hardisk) as mhdd, max(idso) as midso FROM data_komputer");

//tampilkan hasil normalisasi
echo "<br>
	<table border='1' style='width: 50%;'>
		<tr>
			<th colspan='5'>Get Nilai Minimal dan maksimal</th>
		</tr>
		<tr>
			<th>Harga (Juta)</th>
			<th>ID Vendor</th>
			<th>RAM (GB)</th>
			<th>Hardisk</th>
			<th>ID Sistem Operasi</th>
		</tr>";		
while ($data2 = mysqli_fetch_array($sql2)) {
echo "<tr>
		<td>".$data2['mharga']."</td>
		<td>".$data2['midvendor']."</td>
		<td>".$data2['mram']."</td>
		<td>".$data2['mhdd']."</td>
		<td>".$data2['midso']."</td>
	  </tr>";
	  	$data_nor_1=$data2['mharga'];
		$data_nor_2=$data2['midvendor'];
		$data_nor_3=$data2['mram'];
		$data_nor_4=$data2['mhdd'];
		$data_nor_5=$data2['midso'];
}
echo "</table>";

 




//buat array bobot {harga = 15% ; vendor = 24%; ram = 31%; hardisk = 5%; SO = 25%
//$bobot = array(0.15,0.24,0.31,0.5,0.25);

$bharga = 0.15;	
$bvendor = 0.25;
$bram = 0.30;
$bhdd = 0.10;
$bso = 0.20;
echo "<br>
<table border='1' style='width: 50%;'>
	<tr>
		<th colspan='5'>Tampilkan Bobot tiap Kriteria</th>
	</tr>		
	<tr>
		<th>Harga (Juta)</th>
		<th>Vendor</th>
		<th>RAM (GB)</th>
		<th>Hardisk</th>
		<th>Sistem Operasi</th>
	</tr>
	<tr>
		<td>".$bharga."</td>
		<td>".$bvendor."</td>
		<td>".$bram."</td>
		<td>".$bhdd."</td>
		<td>".$bso."</td>
	</tr>
</table>";

echo '<br>
<table border="1" style="width: 50%;">
<tr>
<th colspan="5">Tampilkan Normalisasi tiap kriteria dibagi nilai min/max</th>
</tr>
	<tr>
			<th>Harga (Juta)</th>
			<th>Vendor</th>
			<th>RAM (GB)</th>
			<th>Hardisk</th>
			<th>Sistem Operasi</th>
		</tr>';

$hn_arr_1 = array();
$hn_arr_2 = array();
$hn_arr_3 = array();
$hn_arr_4 = array();
$hn_arr_5 = array();


for($h=0; $h<count($data_arr_harga);$h++)
{
	$hn_arr_1[] = $data_nor_1/$data_arr_harga[$h];
	$hn_arr_2[] = $data_arr_idvendor[$h]/$data_nor_2;
	$hn_arr_3[] = $data_nor_3/$data_arr_ram[$h];
	$hn_arr_4[] = $data_arr_hardisk[$h]/$data_nor_4;
	$hn_arr_5[] = $data_arr_idso[$h]/$data_nor_5;
	echo '<tr>
				<td>'.number_format($hn_arr_1[$h],2).'</td>
				<td>'.number_format($hn_arr_2[$h],2).'</td>
				<td>'.number_format($hn_arr_3[$h],2).'</td>
				<td>'.number_format($hn_arr_4[$h],2).'</td>
				<td>'.number_format($hn_arr_5[$h],2).'</td>
			</tr>';
}
echo '</table>';


echo "<br><h3>Hitung hasil Normalisasi yang dikalikan dengan bobot</h3>";

$b_1 = array();
$b_2 = array();
$b_3 = array();

$nama = '';
for($h=0; $h<=2;$h++)
{
	if($h == 0){
		$nama = 'A';
	}elseif($h == 1){
		$nama = 'B';
	}else{
		$nama = 'C';
	}
	$hasil = ($bharga*$hn_arr_1[$h])+($bvendor*$hn_arr_2[$h])+($bram*$hn_arr_3[$h])+($bhdd*$hn_arr_4[$h])+($bso*$hn_arr_5[$h]);
	echo '
<div class="rows">
	<table style="width:33.333333333333333%;float: left;margin-left:-1px;">			
			<tr>
				<th>komputer '.$nama.'</th>
			</tr>
			<tr><td>'.number_format($hn_arr_1[$h],2).'</td></tr>
			<tr><td>'.number_format($hn_arr_2[$h],2).'</td></tr>
			<tr><td>'.number_format($hn_arr_3[$h],2).'</td></tr>
			<tr><td>'.number_format($hn_arr_4[$h],2).'</td></tr>
			<tr><td>'.number_format($hn_arr_5[$h],2).'</td></tr>
			<tr><td ><b>Hasil : '.number_format($hasil,2).'</b></td></tr>

		  </table></div>';

	  	
}
?>


</div>
</body>
</html>


