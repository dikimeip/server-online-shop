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

	public function post_user($data)
	{
		$this->db->insert('user',$data);
		return $this->db->affected_rows() ;
	}

	public function put_user($id,$data)
	{
		$this->db->update('user',$data,['id_user'=>$id]);
		return $this->db->affected_rows();
	}

	public function delete_user($id)
	{
		$this->db->delete('user',['id_user'=>$id]);
		return $this->db->affected_rows();
	}

	public function get_sale($id='')
	{
		if ($id == "") {
			$this->db->select('*');
			$this->db->from('flash_sale');
			$this->db->order_by('id_flash', 'DESC');
			return $this->db->get()->result_array();
		} else {
			$this->db->select('*');
			$this->db->from('flash_sale');
			$this->db->where('id_flash',$id);
			$this->db->order_by('id_flash', 'DESC');
			return $this->db->get()->result_array();
		}
	}

	public function post_flash($data)
	{
		$this->db->insert('flash_sale',$data);
		return $this->db->affected_rows() ;
	}

	public function put_sale($id,$data)
	{
		$this->db->update('flash_sale',$data,['id_flash'=>$id]);
		return $this->db->affected_rows();
	}

	public function delete_sale($id)
	{
		$this->db->delete('flash_sale',['id_flash'=>$id]);
		return $this->db->affected_rows();
	}

	public function get_pemesanan($id='')
	{
		if ($id == "") {
			$this->db->select('*');
			$this->db->from('pemesanan');
			$this->db->order_by('id_pemesanan', 'DESC');
			return $this->db->get()->result_array();
		} else {
			$this->db->select('*');
			$this->db->from('pemesanan');
			$this->db->where('id_pemesanan',$id);
			$this->db->order_by('id_pemesanan', 'DESC');
			return $this->db->get()->result_array();
		}
	}

	public function post_pemesanan($data)
	{
		$this->db->insert('pemesanan',$data);
		return $this->db->affected_rows() ;
	}

	public function put_pemesanan($id,$data)
	{
		$this->db->update('pemesanan',$data,['id_pemesanan'=>$id]);
		return $this->db->affected_rows();
	}

	public function delete_pemesanan($id)
	{
		$this->db->delete('pemesanan',['id_pemesanan'=>$id]);
		return $this->db->affected_rows();
	}

}