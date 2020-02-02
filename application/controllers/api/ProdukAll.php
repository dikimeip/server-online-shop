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

class ProdukAll extends REST_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('MyModel','Model');
	}

	public function index_get()
	{
		$id = $this->get('id');
		if ($id == "HOTPRODUK") {
			$data = $this->Model->get_produk_hot();
			if ($data) {
				$this->response([
					'status' => 1,
					'value' => $data
				]);
			} else {
				$this->response([
					'status' => 0,
					'value' => 'Produk Not Found'
				]);
			}
		} elseif ($id == "NEWPRODUK") {
			$data = $this->Model->get_produk_all();
			if ($data) {
				$this->response([
					'status' => 1,
					'value' => $data
				]);
			} else {
				$this->response([
					'status' => 0,
					'value' => 'Produk Not Found'
				]);
			}
		}
	}
	
}