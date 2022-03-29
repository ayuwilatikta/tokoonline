<?php

class Dashboard extends CI_Controller{


	public function __construct(){
		parent::__construct();

		if ($this->session->userdata('role_id') != '2') {
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
					Anda Belum Login!
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
			redirect('auth/login');
		}
	}

	public function tambah_ke_keranjang($id_brg)
	{
		$barang = $this->model_barang->find($id_brg);

		$data = array(
			'id' => $barang->id_brg,
			'qty' => 1,
			'price' => $barang->harga,
			'name' => $barang->nama_brg

		);

		$this->cart->insert($data);
		redirect('welcome');
	}

	public function detail_keranjang()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('keranjang');
		$this->load->view('templates/footer');
	}

	public function hapus_keranjang()
	{
		$this->cart->destroy();
		redirect('welcome');
	}

	public 	function hapus()
	{
		$where = array('id' => $id);
		$this->cart->model_barang->hapus($where,'tb_pesanan');
		redirect('dashboard/detail_keranjang');
	}

	public function pembayaran()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('pembayaran');
		$this->load->view('templates/footer');
	}

	// public function verifi()
	// {

	// 	$this->load->view('templates/header');
	// 	$this->load->view('templates/sidebar');
	// 	$this->load->view('verifi');
	// 	$this->load->view('templates/footer');
	// }


	public function proses_pesanan()
	{
		$is_processed = $this->model_invoice->index();
		if ($is_processed) {

			$this->cart->destroy();
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('proses_pesanan');
			$this->load->view('templates/footer');
		}
		else
		{
			echo "Maaf , Pesanan Anda Gagal di Proses !";
		}
	}

	public function detail($id_brg)
	{
		$data['tb_barang'] = $this->model_barang->detail_brg($id_brg);
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('detail_barang', $data);
		$this->load->view('templates/footer');
	}
	function transaksi(){
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('transaksi');
		$this->load->view('templates/footer');
	}

	function tambah_transaksi(){
		$id_invoice = $this->input->post('id_invoice');
		$id_pesanan = $this->input->post('id_pesanan');
		$status_pembayaran = $this->input->post('status_pembayaran');
		$gambar = $this->input->post('gambar');
		// $gambar	= $_FILES['gambar']['name'];
		// if ($gambar =''){}else{
		// 	$config ['upload_path'] = './uploads';
		// 	$config ['allowed_types'] = 'jpg|jpeg|png|gif';

		// 	$this->load->library('upload', $config);
		// 	if (!$this->upload->do_upload('gambar')) {
		// 		echo "Gambar Gagal di Upload !";
		// 	}else{
		// 		$gambar=$this->upload->data('file_name');
		// 	}
		// }

		$data = array(
			'id_invoice' => $id_invoice,
			'id_pesanan' => $id_pesanan,
			'status_pembayaran' => $status_pembayaran,
			'gambar' => $gambar
			);
		$this->model_invoice->transaksi($data,'tb_transaksi');
		redirect('dashboard/proses_pesanan');
	}
	
}