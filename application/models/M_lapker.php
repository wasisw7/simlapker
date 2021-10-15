<?php

class M_lapker extends CI_Model {
	protected $_table = 'lapker';

	public function lihat(){

		$this->db->from($this->_table);
		$this->db->order_by("tanggal", "desc");
		$query = $this->db->get(); 
		return $query->result();

	}

	public function lihat_2(){
		$bulan = $this->uri->segment(3);
		$query =$this->db->query("SELECT * FROM ( SELECT ''AS nom,''AS nor,DATE_FORMAT (a.tanggal,'%e %b %Y') AS t1,a.tanggal AS t2,a.hari,a.ket,''AS 					  lokasi,''AS app,''AS uraian,''AS status_kerja,''AS kerja FROM kalender a  WHERE MONTH(tanggal)='$bulan' 
								AND YEAR(tanggal)='2021' 
								UNION ALL 
								SELECT b.id AS nom,'' nor,''AS t1,c.tanggal AS t2,''AS hari,''AS ket,b.tempat,b.app,b.uraian,b.status_kerja,'' kerja 
								FROM lapker c JOIN detail_lapker b ON c.id_lapker=b.id 
								WHERE MONTH(c.tanggal)='$bulan' AND YEAR(c.tanggal)='2021' AND c.username='Wasis Wibowo, S.T'
								)a GROUP BY t2,nom,uraian ORDER BY t2,uraian");
		
		return $query->result();

	}
function  tanggal_format_indonesia($tgl){
            
        $tanggal  = explode('-',$tgl); 
        $bulan  = $this-> getBulan($tanggal[1]);
        $tahun  =  $tanggal[0];
        return  $tanggal[2].' '.$bulan.' '.$tahun;

    }
    
    function  tanggal_ind($tgl){
            
        $tanggal  = explode('-',$tgl); 
        $bulan  = $tanggal[1];
        $tahun  =  $tanggal[0];
        return  $tanggal[2].'-'.$bulan.'-'.$tahun;

    }
        
    function  getBulan($bln){
        switch  ($bln){
        case  1:
        return  "Januari";
        break;
        case  2:
        return  "Februari";
        break;
        case  3:
        return  "Maret";
        break;
        case  4:
        return  "April";
        break;
        case  5:
        return  "Mei";
        break;
        case  6:
        return  "Juni";
        break;
        case  7:
        return  "Juli";
        break;
        case  8:
        return  "Agustus";
        break;
        case  9:
        return  "September";
        break;
        case  10:
        return  "Oktober";
        break;
        case  11:
        return  "November";
        break;
        case  12:
        return  "Desember";
        break;
    }
    }
	public function header(){
		$bulan = $this->uri->segment(3);

		$lastmoth  = '2021-'.$bulan.'-'.'01';
        $lastyear  = date('Y-m-t',strtotime($lastmoth)); 
        $str       = $this->tanggal_format_indonesia($lastyear);

		$nmbulan= $this->getBulan($bulan);
		$query =$this->db->query("SELECT *, '$nmbulan' as nbulan,'$str' as str from pengguna where kode='PGN17'");
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