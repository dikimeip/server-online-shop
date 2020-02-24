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

	public function login_admin($uname,$password)
	{
		return $this->db->get_where('admin',['username'=>$uname,'password'=> $password])->row_array() ;
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
			$this->db->where('id_user',$id);
			$this->db->join('produk','produk.id_produk = pemesanan.id_pemesanan');
			$this->db->order_by('id_pemesanan', 'DESC');
			return $this->db->get()->result_array();
		}
	}

	public function cari_produk($id)
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->like('nama_produk', $id);
		$this->db->order_by('id_produk', 'DESC');
		return $this->db->get()->result_array();
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

	public function get_alert($id='')
	{
		if ($id == "") {
			$this->db->select('*');
			$this->db->from('alert');
			$this->db->order_by('id_alert', 'DESC');
			return $this->db->get()->result_array();
		} else {
			$this->db->select('*');
			$this->db->from('alert');
			$this->db->where('id_alert',$id);
			$this->db->order_by('id_alert', 'DESC');
			return $this->db->get()->result_array();
		}
	}

	public function post_alert($data)
	{
		$this->db->insert('alert',$data);
		return $this->db->affected_rows() ;
	}
	public function put_alert($id,$data)
	{
		$this->db->update('alert',$data,['id_alert'=>$id]);
		return $this->db->affected_rows();
	}

	public function delete_alert($id)
	{
		$this->db->delete('alert',['id_alert'=>$id]);
		return $this->db->affected_rows();
	}

	public function get_produk_hot($id ='')
	{
		if ($id == "") {
			$this->db->select('*');
			$this->db->from('produk');
			$this->db->where('hot_produk','yes');
			$this->db->limit(5);
			$this->db->order_by('id_produk', 'DESC');
			return $this->db->get()->result_array();
		}
	}

	public function get_produk_hots()
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->where('hot_produk','yes');
		$this->db->order_by('id_produk', 'DESC');
		return $this->db->get()->result_array();
	}

	public function get_produk_all($id ='')
	{
		if ($id == "") {
			$this->db->select('*');
			$this->db->from('produk');
			$this->db->limit(5);
			$this->db->order_by('id_produk', 'DESC');
			return $this->db->get()->result_array();
		}
	}

	public function get_produk_alls()
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->order_by('id_produk', 'DESC');
		return $this->db->get()->result_array();
	}

	public function get_produk_pria()
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->where('kategori_produk','pria');
		$this->db->order_by('id_produk', 'DESC');
		return $this->db->get()->result_array();
	}

	public function get_produk_wanita()
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->where('kategori_produk','wanita');
		$this->db->order_by('id_produk', 'DESC');
		return $this->db->get()->result_array();
	}

	public function get_produk_anak()
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->where('kategori_produk','anak');
		$this->db->order_by('id_produk', 'DESC');
		return $this->db->get()->result_array();
	}

	public function get_produk_muslimah()
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->where('kategori_produk','muslimah');
		$this->db->order_by('id_produk', 'DESC');
		return $this->db->get()->result_array();
	}

	public function get_produk_tas()
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->where('kategori_produk','tas');
		$this->db->order_by('id_produk', 'DESC');
		return $this->db->get()->result_array();
	}

	public function get_produk_jaket()
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->where('kategori_produk','jaket');
		$this->db->order_by('id_produk', 'DESC');
		return $this->db->get()->result_array();
	}

	public function get_produk_sepatu()
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->where('kategori_produk','sepatu');
		$this->db->order_by('id_produk', 'DESC');
		return $this->db->get()->result_array();
	}

	public function get_produk_aksesoris()
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->where('kategori_produk','aksesoris');
		$this->db->order_by('id_produk', 'DESC');
		return $this->db->get()->result_array();
	}

}