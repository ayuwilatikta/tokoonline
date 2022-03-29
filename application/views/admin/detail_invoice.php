<div class="container-fluid">
	<h4>Detail Pesanan <div class="btn btn-sm btn-success">No. Invoice: <?php echo $invoice->id ?></div></h4>

<!-- 	<table>
		<tr>
			<th>Nama Pembeli</th>
			<th>Alamat</th>
		</tr>
		<tr>
			 <td> : </td>
			 <td> : </td>
		</tr>
		.
		<tr>
			<td>.</td>
			<td>.</td>
		</tr>
	</table> -->
	<center><table border="1" class="table table-bordered table-hover table-striped">

		PESANAN ANDA

		<tr>
			<th>NAMA PRODUK</th>
			<th>JUMLAH PESANAN</th>
			<th>HARGA SATUAN</th>
			<th>SUB-TOTAL</th>
		</tr>

		<?php 
		$total = 0;
		foreach ($pesanan as $psn) :
			$subtotal = $psn->jumlah * $psn->harga;
			$total += $subtotal;
		 ?>

		 <tr>
		 	<td><?php echo $psn->nama_brg ?></td>
		 	<td><?php echo $psn->jumlah ?></td>
		 	<td><?php echo number_format($psn->harga,0,',','.') ?></td>
		 	<td><?php echo number_format($subtotal,0,',','.') ?></td>
		 </tr>

		<?php endforeach; ?>
		<tr>
			<td colspan="4" align="right">Grand Total RP. <?php echo number_format($total,0,',','.') ?></td>
		</tr>
		
	</table></center>

	<script type="text/javascript">
		window.print();
	</script>

	<a href="<?php echo base_url('admin/invoice/index') ?>"><div class="btn btn-sm btn-primary">Kembali</div></a>
</div>