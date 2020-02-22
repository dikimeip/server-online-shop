<?php  

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

header('Access-Control-Allow-Origin: *');

if($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
	header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
	header('Access-Control-Allow-Headers: Content-Type');
	exit;
}

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class PemesananController extends REST_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('MyModel','Model');
	}

	public function index_get()
	{
		$id = $this->get('id');
		if ($id === "") {
			$data = $this->Model->get_pemesanan();
			if ($data) {
				$this->response([
					'status' => 1,
					'value' => $data
				]);
			} else {
				$this->response([
					'status' => 0,
					'value' => 'Pemesanan Not Found'
				]);
			}
		} else {
			$data = $this->Model->get_pemesanan($id);
			if ($data) {
				$this->response([
					'status' => 1,
					'value' => $data
				]);
			} else {
				$this->response([
					'status' => 0,
					'value' => 'Pemesanan Not Found'
				]);
			}
		}
		
	}

	public function index_post()
	{
		$data = [
			'id_produk' => $this->post('id_produk'),
			'id_user' => $this->post('id_user'),
			'jumlah' => $this->post('jumlah'),
			'total' => $this->post('total'),
			'tanggal' => date('Y-m-d') ,
			'status_kirim' => 'Proses Pembayaran',
			'invoice' => $this->post('invoice'),
		];

		if ($this->Model->post_pemesanan($data) > 0 ) {
			if ($data) {
				$this->response([
					'status' => 1,
					'value' => 'User Upload Finish'
				]);
			} else {
				$this->response([
					'status' => 0,
					'value' => 'User Upload Filed'
				]);
			}
		}
	}

	public function index_put()
	{
		$id = $this->put('id');
		$data = [
			'id_produk' => $this->put('id_produk'),
			'id_user' => $this->put('id_user'),
			'jumlah' => $this->put('jumlah'),
			'total' => $this->put('total'),
			'status_kirim' => $this->put('status'),
		];

		if ($this->Model->put_pemesanan($id,$data)) {
			$this->response([
					'status' => 1,
					'value' => 'Update Success'
				]);
		} else {
			$this->response([
					'status' => 0,
					'value' => 'Update Filed'
				]);
		}
	}

	public function index_delete()
	{
		$id = $_GET['id'];
		if ($id == "") {
			$this->response([
					'status' => 0,
					'value' => 'Id Not Found'
				]);
		} else {
			if ($this->Model->delete_pemesanan($id)) {
				$this->response([
					'status' => 1,
					'value' => 'Finish Delete'
				]);
			} else {
				$this->response([
					'status' => 0,
					'value' => 'Failed Delete'
				]);
			}
		}
	}
	
}