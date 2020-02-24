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

class AdminController extends Rest_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('MyModel','Model');
	}


	public function index_post()
	{
		$uname = $this->post('username');
		$password = $this->post('password');
		$data = $this->Model->login_admin($uname,$password);
		if ($data) {
			$this->response([
				'status' => 1,
				'value' => $data
			]);
		} else {
			$this->response([
				'status' => 0,
				'value' => 'failed login'
			]);
		}
	}
	
}