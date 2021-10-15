<?php

class M_lapker extends CI_Model {
	protected $_table = 'lapker';
	protected $_table2 = 'detail_lapker';

	public function lihat(){
		$username = $this->session->login['nama'];
		$this->db->from($this->_table);
		$this->db->where("username",$username);
		$this->db->order_by("tanggal", "desc");
		$query = $this->db->get(); 
		return $query->result();

	}

	public function edit_id($id='',$idrincian=''){
			$query = $this->db->get_where($this->_table2, ['idrincian' => $idrincian]);
			return $query->row();
		}
	public function ubah($data, $idrincian){
			$query = $this->db->set($data);
			$query = $this->db->where(['idrincian' => $idrincian]);
			$query = $this->db->update($this->_table2);
			return $query;
		}

	public function lihat_2(){
		$username = $this->uri->segment(3);
		$bulan = $this->uri->segment(4);

		$query =$this->db->query("SELECT * FROM ( SELECT ''AS nom,''AS nor,DATE_FORMAT (a.tanggal,'%e %b %Y') AS t1,a.tanggal AS t2,a.hari,a.ket,''AS 					  lokasi,''AS app,''AS uraian,''AS status_kerja,''AS kerja FROM kalender a  WHERE MONTH(tanggal)='$bulan' 
								AND YEAR(tanggal)='2021' 
								UNION ALL 
								SELECT b.id AS nom,'' nor,''AS t1,c.tanggal AS t2,''AS hari,''AS ket,b.tempat,b.app,b.uraian,b.status_kerja,'' kerja 
								FROM lapker c INNER JOIN detail_lapker b ON c.id_lapker=b.id 
								INNER JOIN petugas d ON c.username=d.nama
								WHERE MONTH(c.tanggal)='$bulan' and d.username='$username' AND YEAR(c.tanggal)='2021'
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
		$username = $this->uri->segment(3);
		$bulan = $this->uri->segment(4);

		$lastmoth  = '2021-'.$bulan.'-'.'01';
        $lastyear  = date('Y-m-t',strtotime($lastmoth)); 
        $str       = $this->tanggal_format_indonesia($lastyear);

		$nmbulan= $this->getBulan($bulan);
		$query =$this->db->query("SELECT *, '$nmbulan' as nbulan,'$str' as str from pengguna where username='$username'");
		return $query->result();

	}
	public function status(){

		$bulan = date('m');
		$tahun = date('Y');
		$jumHari = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
		if ($jumHari=='31'){
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
		}else if ($jumHari=='30'){
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
(select COUNT(*) from lapker where DAY(tanggal)=30 and month(tanggal)=MONTH(CURDATE())and YEAR(tanggal)=YEAR(CURDATE())and username= z.nama) as tgl30


from petugas z
order by username
');
		}else if ($jumHari=='29'){
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
(select COUNT(*) from lapker where DAY(tanggal)=29 and month(tanggal)=MONTH(CURDATE())and YEAR(tanggal)=YEAR(CURDATE())and username= z.nama) as tgl29


from petugas z
order by username
');
		}else{
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
(select COUNT(*) from lapker where DAY(tanggal)=28 and month(tanggal)=MONTH(CURDATE())and YEAR(tanggal)=YEAR(CURDATE())and username= z.nama) as tgl28


from petugas z
order by username
');
		}
		
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