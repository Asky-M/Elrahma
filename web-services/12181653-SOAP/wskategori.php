<?php
//set namespace
$ns = "http://".$_SERVER['HTTP_POST']."/12181653/wskategori.php";
//load nusoap library
require_once 'lib/nusoap.php';
$server = new soap_server;
//create soap server object
$server->configureWSDL("WEB SERVICE MENGGUNAKAN SOAP WSDL", $ns); //wsdl konfigurasi
$server->wsdl->schemaTargetNamespace = $ns //server namespace

//kategori buku
//complex array keys dan tipe kategori buku
$server->wsdl->addComplexType("kategoriData","complexType","struct","all","",array("id_kategori_buku"=>array("name"=>"id_kategori_buku","type"=>"xsd:int"),"kategori_buku"=>array("name"=>"kategori_buku","type"=>"xsd:string")
)
);
//complex array kategori buku
$server->wsdl->addComplexType("kategoriArray","complexType","array","","SOAP-ENC:array",array(),array(array("ref"=>"SOAP-ENC:arrayType","wsdl:arrayType"=>"tns:kategoriData[]")
),
"kategoriData"
);

//end complex type kategori
//create kategori buku
$input_create = array('kategori_buku'=>"xsd:string");
//parameter create kategori
$return_create = array("return"=>"xsd:string");
$server->register('create',$input_create, $return_create, $ns, "urn:".$ns."/create","rpc","encoded","menyimpan kategori buku baru");
//end create

//readyidkategori buku
$input_readyid = array('id_kategori_buku'=>"xsd:int");
//parameter readyid kategori
$return_readyid = array("return"=>"tns:kategoriArray");
$server->register('readyid',$input_readyid, $return_readyid, $ns, "urn:".$ns."/readyid","rpc","encoded", "Menambil kategori buku bu id_kategori_buku");
//end

//update kategori buku
$input_update = array("id_kategori_buku"=>"xsd:int","kategori_buku"=>"xsd:string");
//parameter update
$return_update = array("return"=>"xsd:string");
$server->register('updatebyid', $input_update, $return_update, $ns, "urn:".$ns."/updatebyid", "rpc", "encoded", "Mengupdate kategori by id_kategori_buku");
//end

//delete kategori buku
$input_delete = array('id_kategori_buku'=>"xsd:string");
//parameter
$return_delete = array("return"=>"xsd:string");
$server->register('deletebyid', $input_delete, $return_delete, $ns, "urn:".$ns."/deletebyid", "rpc", "encoded", "Menghapus kategori by id_kategori_buku");
//end

//ambil semua data kategori buku
$input_readall = array(); //parameter ambil kategori
$return_readall = array("return"=>"tns:kategoriArray");
$server->register('readall', $input_readall, $return_readall, $ns, "urn:".$ns."/readall", "rpc", "encoded", "Mengambil semua kategori by id_kategori_buku");
//end

//FUNCTION KATEGORI BUKU
function create($kategori_buku){
	require_once 'classDb/classkategori.php';
	$kategori = new classkategori;
	if ($kategori->create($kategori_buku)){
		$respon = "SUKSES";
	}else{
		$respon = "TERJADI KESALAHAN";
	}
	return $respon;
}

function readybyid($id_kategori_buku){
	require_once 'classDb/classkategori.php';
	$kategori = new classkategori;
	$hasil = $kategori->readybyid($id_kategori_buku);
	$daftar = array();
	while ($item = $hasil->fetch_assoc()) {
		array_push($daftar, array('id_kategori_buku'=>$item['id_kategori_buku'],'kategori_buku'=>$item['kategori_buku']));
	}
	return $daftar;
}

function readall(){
	require_once 'classDb/classkategori.php';
	$kategori = new classkategori;
	$hasil = $kategori->readAll();
	$daftar = array();
	while ($item = $hasil->fetch_assoc()) {
		array_push($daftar,array('id_kategori_buku'=>$item['kategori_buku']));
	}
	return daftar;
}

function updatebyid($id_kategori_buku){
	require_once 'classDb/classkategori.php';
	$kategori = new classkategori;
	if ($kategori->updatebyid($id_kategori_buku)) {
		$respon "SUKSES";
	}else{
		$respon "TERJADI KESALAHAN";
	}
	return respon;
}

function deletebyid($id_kategori_buku){
	require_once 'classDb/classkategori.php';
	$kategori = new classkategori;
	if ($kategori->deletebyid($id_kategori_buku)) {
		$respon "SUKSES";
	}else{
		$respon "TERJADI KESALAHAN";
	}
	return respon;
}
$server->service(file_get_contents("php://input"));

?>