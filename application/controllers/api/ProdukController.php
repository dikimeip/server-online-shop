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

class ProdukController extends REST_Controller
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
			$data = $this->Model->get_produk();
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
		} else {
			$data = $this->Model->get_produk($id);
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

	public function index_post()
	{
		$data = [
			'nama_produk' => $this->post('nama'),
			'harga' => $this->post('harga'),
			'deskripsi' => $this->post('desk'),
			'stok' => $this->post('stok'),
			'hot_produk' => 'Disable',
			'image_produk' => $this->post('foto'),
			'kategori_produk' => $this->post('kategori'),
			'tanggal_produk' => date('Y-m-d') ,
		];

		if ($this->Model->post_produk($data) > 0 ) {
			if ($data) {
				$this->response([
					'status' => 1,
					'value' => 'Produk Upload Finish'
				]);
			} else {
				$this->response([
					'status' => 0,
					'value' => 'Produk Upload Filed'
				]);
			}
		}
	}

	public function index_put()
	{
		$id = $this->put('id');
		$data = [
			'nama_produk' => $this->put('nama'),
			'harga' => $this->put('harga'),
			'deskripsi' => $this->put('desk'),
			'stok' => $this->put('stok'),
			'hot_produk' => $this->put('hot'),
			'image_produk' => $this->put('foto'),
			'kategori_produk' => $this->put('kategori'),
		];

		if ($this->Model->put_produk($id,$data)) {
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
			if ($this->Model->delete_produk($id)) {
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