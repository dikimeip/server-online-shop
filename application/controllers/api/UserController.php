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

class UserController extends REST_Controller
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
			$data = $this->Model->get_user();
			if ($data) {
				$this->response([
					'status' => 1,
					'value' => $data
				]);
			} else {
				$this->response([
					'status' => 0,
					'value' => 'User Not Found'
				]);
			}
		} else {
			$data = $this->Model->get_user($id);
			if ($data) {
				$this->response([
					'status' => 1,
					'value' => $data
				]);
			} else {
				$this->response([
					'status' => 0,
					'value' => 'User Not Found'
				]);
			}
		}
		
	}

	public function index_post()
	{
		$data = [
			'username' => $this->post('username'),
			'password' => $this->post('password'),
			'email' => $this->post('email'),
			'no_hp' => $this->post('hp'),
			'alamat' => $this->post('alamat'),
			'tanggal_user' => date('Y-m-d') ,
		];

		if ($this->Model->post_user($data) > 0 ) {
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
			'username' => $this->put('username'),
			'password' => $this->put('password'),
			'email' => $this->put('email'),
			'no_hp' => $this->put('hp'),
			'alamat' => $this->put('alamat'),
		];

		if ($this->Model->put_user($id,$data)) {
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
			if ($this->Model->delete_user($id)) {
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