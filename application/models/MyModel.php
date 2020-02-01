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

	public function get_produk($id = '')
	{
		if ($id == "") {
			$this->db->select('*');
			$this->db->from('produk');
			$this->db->order_by('id_produk', 'DESC');
			return $this->db->get()->result_array();
		} else {
			$this->db->select('*');
			$this->db->from('produk');
			$this->db->where('id_produk',$id);
			$this->db->order_by('id_produk', 'DESC');
			return $this->db->get()->result_array();
		}
	}

	public function post_produk($data)
	{
		$this->db->insert('produk',$data);
		return $this->db->affected_rows() ;
	}

	public function put_produk($id,$data)
	{
		$this->db->update('produk',$data,['id_produk'=>$id]);
		return $this->db->affected_rows();
	}

	public function delete_produk($id)
	{
		$this->db->delete('produk',['id_produk'=>$id]);
		return $this->db->affected_rows();
	}

	public function get_user($id='')
	{
		if ($id == "") {
			$this->db->select('*');
			$this->db->from('user');
			$this->db->order_by('id_user', 'DESC');
			return $this->db->get()->result_array();
		} else {
			$this->db->select('*');
			$this->db->from('user');
			$this->db->where('id_user',$id);
			$this->db->order_by('id_user', 'DESC');
			return $this->db->get()->result_array();
		}
	}
}