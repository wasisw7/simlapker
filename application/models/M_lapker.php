<?php

class M_lapker extends CI_Model {
	protected $_table = 'lapker';

	public function lihat(){

		$this->db->from($this->_table);
		$this->db->order_by("tanggal", "desc");
		$query = $this->db->get(); 
		return $query->result();

	}
	public function status(){
		$query = $this->db->query('SELECT username,nama, 
(select COUNT(*) from lapker where DAY(tanggal)=1 and month(tanggal)=MONTH(CURDATE())and YEAR(tanggal)=YEAR(CURDATE())and username= z.nama) as tgl1,
(select COUNT(*) from lapker where DAY(tanggal)=2 and month(tanggal)=MONTH(CURDATE())and YEAR(tanggal)=YEAR(CURDATE())and username= z.nama) as tgl2,
(select COUNT(*) from lapker where DAY(tanggal)=3 and month(tanggal)=MONTH(CURDATE())and YEAR(tanggal)=YEAR(CURDATE())and username= z.nama) as tgl3,
(select COUNT(*) from lapker where DAY(tanggal)=4 and month(tanggal)=MONTH(CURDATE())and YEAR(tanggal)=YEAR(CURDATE())and username= z.nama) as tgl4,
(select COUNT(*) from lapker where DAY(tanggal)=5 and month(tanggal)=MONTH(CURDATE())and YEAR(tanggal)=YEAR(CURDATE())and username= z.nama) as tgl5,
(select COUNT(*) from lapker where DAY(tanggal)=6 and month(tanggal)=MONTH(CURDATE())and YEAR(tanggal)=YEAR(CURDATE())and username= z.nama) as tgl6,
(select COUNT(*) from lapker where DAY(tanggal)=7 and month(tanggal)=MONTH(CURDATE())and YEAR(tanggal)=YEAR(CURDATE())and username= z.nama) as tgl7,
(select COUNT(*) from lapker where DAY(tanggal)=8 and month(tanggal)=MONTH(CURDATE())and YEAR(tanggal)=YEAR(CURDATE())and username= z.nama) as tgl8,
(select COUNT(*) from lapker where DAY(tanggal)=9 and month(tanggal)=MONTH(CURDATE())and YEAR(tanggal)=YEAR(CURDATE())and username= z.nama) as tgl9,
(select COUNT(*) from lapker where DAY(tanggal)=10 and month(tanggal)=MONTH(CURDATE())and YEAR(tanggal)=YEAR(CURDATE())and username= z.nama) as tgl10,
(select COUNT(*) from lapker where DAY(tanggal)=11 and month(tanggal)=MONTH(CURDATE())and YEAR(tanggal)=YEAR(CURDATE())and username= z.nama) as tgl11,
(select COUNT(*) from lapker where DAY(tanggal)=12 and month(tanggal)=MONTH(CURDATE())and YEAR(tanggal)=YEAR(CURDATE())and username= z.nama) as tgl12,
(select COUNT(*) from lapker where DAY(tanggal)=13 and month(tanggal)=MONTH(CURDATE())and YEAR(tanggal)=YEAR(CURDATE())and username= z.nama) as tgl13,
(select COUNT(*) from lapker where DAY(tanggal)=14 and month(tanggal)=MONTH(CURDATE())and YEAR(tanggal)=YEAR(CURDATE())and username= z.nama) as tgl14,
(select COUNT(*) from lapker where DAY(tanggal)=15 and month(tanggal)=MONTH(CURDATE())and YEAR(tanggal)=YEAR(CURDATE())and username= z.nama) as tgl15,
(select COUNT(*) from lapker where DAY(tanggal)=16 and month(tanggal)=MONTH(CURDATE())and YEAR(tanggal)=YEAR(CURDATE())and username= z.nama) as tgl16,
(select COUNT(*) from lapker where DAY(tanggal)=17 and month(tanggal)=MONTH(CURDATE())and YEAR(tanggal)=YEAR(CURDATE())and username= z.nama) as tgl17,
(select COUNT(*) from lapker where DAY(tanggal)=18 and month(tanggal)=MONTH(CURDATE())and YEAR(tanggal)=YEAR(CURDATE())and username= z.nama) as tgl18,
(select COUNT(*) from lapker where DAY(tanggal)=19 and month(tanggal)=MONTH(CURDATE())and YEAR(tanggal)=YEAR(CURDATE())and username= z.nama) as tgl19,
(select COUNT(*) from lapker where DAY(tanggal)=20 and month(tanggal)=MONTH(CURDATE())and YEAR(tanggal)=YEAR(CURDATE())and username= z.nama) as tgl20,
(select COUNT(*) from lapker where DAY(tanggal)=21 and month(tanggal)=MONTH(CURDATE())and YEAR(tanggal)=YEAR(CURDATE())and username= z.nama) as tgl21,
(select COUNT(*) from lapker where DAY(tanggal)=22 and month(tanggal)=MONTH(CURDATE())and YEAR(tanggal)=YEAR(CURDATE())and username= z.nama) as tgl22,
(select COUNT(*) from lapker where DAY(tanggal)=23 and month(tanggal)=MONTH(CURDATE())and YEAR(tanggal)=YEAR(CURDATE())and username= z.nama) as tgl23,
(select COUNT(*) from lapker where DAY(tanggal)=24 and month(tanggal)=MONTH(CURDATE())and YEAR(tanggal)=YEAR(CURDATE())and username= z.nama) as tgl24,
(select COUNT(*) from lapker where DAY(tanggal)=25 and month(tanggal)=MONTH(CURDATE())and YEAR(tanggal)=YEAR(CURDATE())and username= z.nama) as tgl25,
(select COUNT(*) from lapker where DAY(tanggal)=26 and month(tanggal)=MONTH(CURDATE())and YEAR(tanggal)=YEAR(CURDATE())and username= z.nama) as tgl26,
(select COUNT(*) from lapker where DAY(tanggal)=27 and month(tanggal)=MONTH(CURDATE())and YEAR(tanggal)=YEAR(CURDATE())and username= z.nama) as tgl27,
(select COUNT(*) from lapker where DAY(tanggal)=28 and month(tanggal)=MONTH(CURDATE())and YEAR(tanggal)=YEAR(CURDATE())and username= z.nama) as tgl28,
(select COUNT(*) from lapker where DAY(tanggal)=29 and month(tanggal)=MONTH(CURDATE())and YEAR(tanggal)=YEAR(CURDATE())and username= z.nama) as tgl29,
(select COUNT(*) from lapker where DAY(tanggal)=30 and month(tanggal)=MONTH(CURDATE())and YEAR(tanggal)=YEAR(CURDATE())and username= z.nama) as tgl30,
(select COUNT(*) from lapker where DAY(tanggal)=31 and month(tanggal)=MONTH(CURDATE())and YEAR(tanggal)=YEAR(CURDATE())and username= z.nama) as tgl31


from petugas z
order by username
');
		return $query->result(); 

	}
	

	public function jumlah(){
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}

	public function lihat_no_terima($id){
		return $this->db->get_where($this->_table, ['id_lapker' => $id])->row();
	}

	public function tambah($data){
		return $this->db->insert($this->_table, $data);
	}

	public function hapus($id){
		return $this->db->delete($this->_table, ['id' => $id]);
	}
}