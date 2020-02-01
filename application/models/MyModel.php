<?php  

/**
 * 
 */
class MyModel extends CI_Model
{
	
	public function post_login($uname,$password)
	{
		return $this->db->get_where('user',['username'=>$uname,'password'=> $password])->row_array() ;
	}
}