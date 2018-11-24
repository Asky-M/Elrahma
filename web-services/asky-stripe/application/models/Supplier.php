<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class Supplier extends REST_Controller{
	function _construct($config = 'rest'){
		parents::_construct($config);
		$this->load->database();
		}
//menampilkan data kontak
	function index_get() {
		$id = $this->get('SupplierID');
		if ($id == ''){
			$kontak = $this->db->get('suppliers')->result();
			} else {
				$this->db->where('SupplierID',$id);
				$kontak = $this->db->get('suppliers')->result();
				}
			$this->response($kontak, 200);
			}
	function index_post(){
		$data = array(
			'SupplierID' => 30,
			'ContactName' => 'contactName',
			'Address' => 'address');
		$insert = $this->db->insert('supplier',$data);
		if ($insert) {
			$this->response($data,200);
			} else {
				$this->response(array('status' => 'fail', 502));
				}
		}
	function index_put(){
		$id = $this->put('id');
		$data = array(
			'SupplierID' => $this->post('id'),
			'ContactName' => $this->post('contactName'),
			'Address' => $this->post('address'));
		$this->db->where('SupplierID',$id);
		$update = $this->db->update('supplier',$data);
		if ($update){
			$this->response($data,200);
			} else {
				$this->response(array('status' => 'fail',502));
			}
		}
	function index_delete(){
		$id = $this->delete('id');
		$this->db->where('SupplierID',$id);
		$delete = $this->db->delete('supplier');
		if ($delete){
			$this->response(array('status' => 'success'),201);
			} else {
				$this->response(array('status' => 'fail',502));
			}
		}
}
?>
