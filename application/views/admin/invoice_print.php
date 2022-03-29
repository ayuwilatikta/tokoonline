<div class="container-fluid">
	<h4>Laporan Customer Pemesanan Produk</h4>

	<table border="1">
		<tr>
			<th>Id Invoice</th>
			<th>Nama Pemesanan</th>
			<th>Alamat Pengiriman</th>
			<th>Tanggal Pemesanan</th>
			<th>Batas Pembayaran</th>
		</tr>

		<?php foreach ($invoice as $inv) : ?>

		<tr>
			<td><?php echo $inv->id ?></td>
			<td><?php echo $inv->nama ?></td>
			<td><?php echo $inv->alamat ?></td>
			<td><?php echo $inv->tgl_pesan ?></td>
			<td><?php echo $inv->batas_bayar ?></td>
		</tr>

	<?php endforeach; ?>

	</table>

	<script type="text/javascript">
		window.print();
	</script>
</div>