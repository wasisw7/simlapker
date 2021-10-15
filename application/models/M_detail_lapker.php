<?php

class M_detail_lapker extends CI_Model {
	protected $_table = 'detail_lapker';

	public function tambah($data){
		return $this->db->insert_batch($this->_table, $data);
	}

	public function lihat_no_terima($id){
		return $this->db->get_where($this->_table, ['id' => $id])->result();
	}

	public function hapus($id){
		return $this->db->delete($this->_table, ['id' => $id]);
	}
}