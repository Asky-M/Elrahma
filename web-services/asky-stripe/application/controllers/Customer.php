<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
//class Customer.php extends REST_Controller{
class Customer extends REST_Controller{
	function __construct($config = 'rest'){
		parent::__construct($config);
		$this->load->database();
		}
//menampilkan data kontak
	function index_get() {
		$id = $this->get('CustomerID ');
		if ($id == ''){
			$kontak = $this->db->get('customers')->result();
			} else {
				$this->db->where('CustomerID ',$id);
				$kontak = $this->db->get('customers')->result();
				}
			$this->response($kontak, 200);
			}
	function index_post(){
		$data = array(
			'CustomerID ' => 30,
			'ContactName' => 'contactName',
			'Address' => 'address');
		$insert = $this->db->insert('customers',$data);
		if ($insert) {
			$this->response($data,200);
			} else {
				$this->response(array('status' => 'fail', 502));
				}
		}
	function index_put(){
		$id = $this->put('id');
		$data = array(
			'CustomerID ' => $this->post('id'),
			'ContactName' => $this->post('contactName'),
			'Address' => $this->post('address'));
		$this->db->where('CustomerID ',$id);
		$update = $this->db->update('customers',$data);
		if ($update){
			$this->response($data,200);
			} else {
				$this->response(array('status' => 'fail',502));
			}
		}
	function index_delete(){
		$id = $this->delete('id');
		$this->db->where('CustomerID ',$id);
		$delete = $this->db->delete('customers');
		if ($delete){
			$this->response(array('status' => 'success'),201);
			} else {
				$this->response(array('status' => 'fail',502));
			}
		}
}
?>
