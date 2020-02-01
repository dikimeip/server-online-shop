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

class AlertController extends REST_Controller
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
			$data = $this->Model->get_alert();
			if ($data) {
				$this->response([
					'status' => 1,
					'value' => $data
				]);
			} else {
				$this->response([
					'status' => 0,
					'value' => 'Alert Not Found'
				]);
			}
		} else {
			$data = $this->Model->get_alert($id);
			if ($data) {
				$this->response([
					'status' => 1,
					'value' => $data
				]);
			} else {
				$this->response([
					'status' => 0,
					'value' => 'Alert Not Found'
				]);
			}
		}	
	}

	public function index_post()
	{
		$data = [
			'judul' => $this->post('judul'),
			'isi' => $this->post('isi'),
			'tanggal' => date('Y-m-d') ,
		];

		if ($this->Model->post_alert($data) > 0 ) {
			if ($data) {
				$this->response([
					'status' => 1,
					'value' => 'Alert Upload Finish'
				]);
			} else {
				$this->response([
					'status' => 0,
					'value' => 'Alert Upload Filed'
				]);
			}
		}
	}

	public function index_put()
	{
		$id = $this->put('id');
		$data = [
			'judul' => $this->put('judul'),
			'isi' => $this->put('isi'),
		];

		if ($this->Model->put_alert($id,$data)) {
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
			if ($this->Model->delete_alert($id)) {
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