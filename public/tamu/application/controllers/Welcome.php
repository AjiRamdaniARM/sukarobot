<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$data['title']		= 'Buku Tamu';

		$data['aplikasi']	= $this->m_model->get_desc('tb_aplikasi');

		$this->load->view('beranda', $data);
	}

	public function insert()
	{
		date_default_timezone_set('Asia/Jakarta');

        $nama           = $_POST['nama'];
        $jenisKelamin   = $_POST['jenisKelamin'];
        $instansi       = $_POST['instansi'];
        $telp           = $_POST['telp'];
        $alamat         = $_POST['alamat'];
        $keperluan      = $_POST['keperluan'];
        $terdaftar      = date('Y-m-d H:i:s');

        $data = array(
            'nama'          => $nama,
            'jenisKelamin'  => $jenisKelamin,
            'instansi'      => $instansi,
            'telp'          => $telp,
            'alamat'        => $alamat,
            'keperluan'     => $keperluan,
            'terdaftar'     => $terdaftar,
        );

        $this->m_model->insert($data, 'tb_tamu');
        $this->session->set_flashdata('pesan','Data berhasil ditambahkan!');
        redirect('welcome');
    }
}
