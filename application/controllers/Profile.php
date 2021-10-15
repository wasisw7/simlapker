<?php

class Profile extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_profile', 'm_profile');
		$this->data['aktif'] = 'profile';
	}

	public function index(){
		$this->data['title'] = 'Profil ';
		$this->data['profile'] = $this->m_profile->lihat();
		$this->load->view('profile', $this->data);
	}

	public function proses_ubah(){
		$data = [
			'nama_toko' => $this->input->post('nama_toko'),
			'nama_pemilik' => $this->input->post('nama_pemilik'),
			'no_telepon' => $this->input->post('no_telepon'),
			'alamat' => $this->input->post('alamat'),
		];

		if($this->m_profile->ubah($data)){
			$this->session->set_flashdata('success', 'Profil profile <strong>Berhasil</strong> Diubah!');
			redirect('profile');
		} else {
			$this->session->set_flashdata('error', 'Profil profile <strong>Gagal</strong> Diubah!');
			redirect('profile');
		}
	}
}