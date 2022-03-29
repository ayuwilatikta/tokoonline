<div class="container-fluid">
		<div class="col-md-2"></div>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
		<br><br>
		<h3>Input Alamat Bukti</h3>
		<form method="post" action="<?php echo base_url('transaksi/transaksi_') ?> ">

			<div class="form-group">
				<label>Id Invoive</label>
				<input type="text" name="id_invoice" placeholder="Id Invoice Anda" class="form-control">
			</div>

			<div class="form-group">
				<label>Id Pesanan</label>
				<input type="text" name="id_pesanan" placeholder="Id Pesanan Anda" class="form-control">
			</div>

			<div class="form-group">
				<label>Status Pembayaran</label>
				<select class="form-control">
					<option>Sudah Bayar</option>
					<option>Belum Bayar</option>
				</select>
			</div>

			<div class="form-group">
				<label>Bukti Bayar</label>
				<input type="file" name="gambar" placeholder="Bukti Anda" class="form-control">
			</div>

			<button type="submit" class="btn btn-sm btn-primary mb-3">Ok</button>
			
		</form>
		</div>


		<div class="col-md-2"></div>
	</div>
</div>