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
		} elseif ($id == "pria") {
			$data = $this->Model->get_produk_pria();
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
		} elseif ($id == "wanita") {
			$data = $this->Model->get_produk_wanita();
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
		} elseif ($id == "anak"){
			$data = $this->Model->get_produk_anak();
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
		} elseif ($id == "muslimah"){
			$data = $this->Model->get_produk_muslimah();
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
		} elseif ($id == "tas"){
			$data = $this->Model->get_produk_tas();
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
		} elseif ($id == "jaket"){
			$data = $this->Model->get_produk_jaket();
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
		} elseif ($id == "sepatu"){
			$data = $this->Model->get_produk_sepatu();
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
		} elseif ($id == "aksesoris"){
			$data = $this->Model->get_produk_aksesoris();
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
		} elseif ($id == "NEWPRODUKALL"){
			$data = $this->Model->get_produk_alls();
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
		} elseif ($id == "HOTPRODUKALL"){
			$data = $this->Model->get_produk_hots();
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