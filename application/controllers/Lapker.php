<?php

use Dompdf\Dompdf;

class Lapker extends CI_Controller{
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->data['aktif'] = 'Lapker';
		$this->load->model('M_barang', 'm_barang');
		$this->load->model('M_supplier', 'm_supplier');
		$this->load->model('M_lapker', 'm_lapker');
		$this->load->model('M_detail_lapker', 'm_detail_lapker');
		$this->load->library('pdflib');
	}

	public function index(){
		$this->data['title'] = 'Lapker';
		$this->data['all_lapker'] = $this->m_lapker->lihat();
		$this->data['no'] = 1;

		$this->load->view('lapker/lihat', $this->data);
	}

	public function tambah(){
		$this->data['title'] = 'Tambah Transaksi';
		$this->data['all_barang'] = $this->m_barang->lihat_stok();
		$this->data['all_supplier'] = $this->m_supplier->lihat_spl();

		$this->load->view('lapker/tambah', $this->data);
	}

	public function proses_tambah(){
		$jumlah_barang_diterima = count($this->input->post('uraian_hidden'));

		$data_lapker = [
			'tanggal' => $this->input->post('tgl_terima'),
			'username' => $this->input->post('nama_petugas'),
			'id_lapker' => $this->input->post('no_terima'),
		];

		$data_detail_terima = [];

		for($i = 0; $i < $jumlah_barang_diterima; $i++){
			array_push($data_detail_terima, ['id' => $this->input->post('no_terima')]);
			$data_detail_terima[$i]['app'] = $this->input->post('nama_aplikasi_hidden')[$i];
			$data_detail_terima[$i]['tempat'] = $this->input->post('tempat_hidden')[$i];
			$data_detail_terima[$i]['uraian'] = $this->input->post('uraian_hidden')[$i];
			$data_detail_terima[$i]['status_kerja'] = $this->input->post('status_hidden')[$i];
		}

		if($this->m_lapker->tambah($data_lapker) && $this->m_detail_lapker->tambah($data_detail_terima)){
			$this->session->set_flashdata('success', 'Invoice <strong>Penerimaan</strong> Berhasil Dibuat!');
			redirect('lapker');
		}
	}

	public function detail($id){
		$this->data['title'] = 'Detail Lapker';
		$this->data['lapker'] = $this->m_lapker->lihat_no_terima($id);
		$this->data['all_detail_lapker'] = $this->m_detail_lapker->lihat_no_terima($id);
		$this->data['no'] = 1;

		$this->load->view('lapker/detail', $this->data);
	}

	public function detail_edit($id){
		$this->data['title'] = 'Edit Lapker';
		$this->data['lapker'] = $this->m_lapker->lihat_no_terima($id);
		$this->data['all_detail_lapker'] = $this->m_detail_lapker->lihat_no_terima($id);
		$this->data['no'] = 1;

		$this->load->view('lapker/detail_edit', $this->data);
	}

	public function ubah($id='',$idrincian=''){
		
		$this->data['title'] = 'Ubah Lapker';
		$this->data['barang'] = $this->m_lapker->edit_id($id,$idrincian);

		$this->load->view('lapker/ubah', $this->data);
	}

	public function hapus($id){
		if($this->m_lapker->hapus($id) && $this->m_detail_lapker->hapus($id)){
			$this->session->set_flashdata('success', 'Invoice Penerimaan <strong>Berhasil</strong> Dihapus!');
			redirect('lapker');
		} else {
			$this->session->set_flashdata('error', 'Invoice Penerimaan <strong>Gagal</strong> Dihapus!');
			redirect('lapker');
		}
	}

	public function get_all_barang(){
		$data = $this->m_barang->lihat_nama_barang($_POST['nama_barang']);
		echo json_encode($data);
	}

	public function proses_ubah($id='',$idrincian=''){
		
		$data = [
			'app' 			=> $this->input->post('nama_aplikasi'),
			'tempat' 		=> $this->input->post('tempat'),
			'uraian' 		=> $this->input->post('uraian'),
			'status_kerja'	=> $this->input->post('status_kerja'),
		];

		if($this->m_lapker->ubah($data, $idrincian)){
			$this->session->set_flashdata('success', 'Rincian lapker <strong>Berhasil</strong> Diubah!');
			redirect('lapker/detail_edit/'.$id);
		} else {
			$this->session->set_flashdata('error', 'Rincian lapker <strong>Gagal</strong> Diubah!');
			redirect('lapker/detail_edit/'.$id);
		}
	}

	public function keranjang_barang(){
		$this->load->view('lapker/keranjang');
	}

	// public function export2(){
	// 	ini_set('max_execution_time', -1);
	// 	ini_set('memory_limit', -1);\

	// 	$dompdf = new Dompdf();
	// 	// $this->data['perusahaan'] = $this->m_usaha->lihat();
	// 	$this->data['all_lapker'] = $this->m_lapker->lihat_2();
	// 	$this->data['all_header'] = $this->m_lapker->header();
	// 	$this->data['title'] = 'Laporan Data Penerimaan';
	// 	$this->data['no'] = 1;

	// 	$dompdf->setPaper('A4', 'Landscape');
	// 	$html = $this->load->view('lapker/report', $this->data, true);
	// 	$dompdf->load_html($html);
	// 	$dompdf->render();
	// 	$dompdf->stream('Laporan Data Penerimaan Tanggal ' . date('d F Y'), array("Attachment" => false));
	// }

public function export(){
		$bulan 	  = $this->input->post('bulan');
		$username = $this->session->login['nama'];
		ini_set('max_execution_time', -1);
		ini_set('memory_limit', -1);
		$this->data['all_lapker'] = $this->m_lapker->lihat_2($username,$bulan);
		$this->data['all_header'] = $this->m_lapker->header($username,$bulan);
		$this->data['title'] = 'Laporan Kerja Harian';		
		$this->pdflib->setFileName('Lapker.pdf');
    	$this->pdflib->setPaper('A4', 'Landscape');
    	$this->pdflib->loadView('lapker/report', $this->data, true);
    	
    }



public function cetak(){
		$this->data['title'] = 'Cetak Lapker';
		$this->load->view('lapker/cetak', $this->data);
	}

	public function export_detail($id){
		$dompdf = new Dompdf();
		// $this->data['perusahaan'] = $this->m_usaha->lihat();
		$this->data['penerimaan'] = $this->m_lapker->lihat_no_terima($id);
		$this->data['all_detail_terima'] = $this->m_detail_lapker->lihat_no_terima($id);
		$this->data['title'] = 'Laporan Detail Penerimaan';
		$this->data['no'] = 1;

		$dompdf->setPaper('A4', 'Landscape');
		$html = $this->load->view('lapker/detail_report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Detail Penerimaan Tanggal ' . date('d F Y'), array("Attachment" => false));
	}
}