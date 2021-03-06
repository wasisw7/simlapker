<?php

class Dashboard extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if($this->session->login['role'] != 'petugas' && $this->session->login['role'] != 'admin') redirect();
		$this->data['aktif'] = 'dashboard';
		$this->load->model('M_barang', 'm_barang');
		$this->load->model('M_customer', 'm_customer');
		$this->load->model('M_supplier', 'm_supplier');
		$this->load->model('M_petugas', 'm_petugas');
		$this->load->model('M_pengeluaran', 'm_pengeluaran');
		$this->load->model('M_penerimaan', 'm_penerimaan');
		$this->load->model('M_pengguna', 'm_pengguna');
		$this->load->model('M_profile', 'm_profile');
		$this->load->model('M_lapker', 'm_lapker');
	}

	public function index(){

		if ($this->session->login['role'] == 'petugas'){
			$this->data['title'] = 'Halaman Dashboard';
			$this->data['all_status'] = $this->m_lapker->status();
			$this->load->view('dashboard2', $this->data);
		}else{
			$this->data['title'] 			= 'Halaman Dashboard';
			$this->data['jumlah_barang'] 	= $this->m_barang->jumlah();
			$this->data['jumlah_customer'] 	= $this->m_customer->jumlah();
			$this->data['jumlah_petugas'] 	= $this->m_petugas->jumlah();
			$this->data['jumlah_admin'] 	= $this->m_pengguna->jumlah();
			$this->data['profile'] 			= $this->m_profile->lihat();
			$this->data['all_status'] 		= $this->m_lapker->status();
			$this->load->view('dashboard', $this->data);
		}


		
	}
}