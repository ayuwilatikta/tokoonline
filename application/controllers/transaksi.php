<?php

class Transaksi extends CI_Controller{

	function transaksi_(){
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('transaksi');
		$this->load->view('templates/footer');
	}

	function tambah_transaksi(){
		$id_invoice = $this->input->post('id_invoice');
		$id_pembayaran = $this->input->post('id_pembayaran');
		$status_pembayaran = $this->input->post('status_pembayaran');
		$gambar	= $_FILES['gambar']['name'];
		if ($gambar =''){}else{
			$config ['upload_path'] = './uploads';
			$config ['allowed_types'] = 'jpg|jpeg|png|gif';

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('gambar')) {
				echo "Gambar Gagal di Upload !";
			}else{
				$gambar=$this->upload->data('file_name');
			}
		}

		$data = array(
			'id_invoice' => $id_invoice,
			'id_pembayaran' => $id_pembayaran,
			'status_pembayaran' => $status_pembayaran,
			'gambar' => $gambar
			);
		$this->model_transaksi->input_data($data,'tb_transaksi');
		redirect('transaksi/index');
	}
}