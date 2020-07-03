<!-- var_dump($output); -->

<div style="margin-left: 2,5cm; margin-right: 2,5cm;">
	<p>Perihal: Laporan Buku Tamu</p>
	<p style="margin-left: 50px; font-size: 12px; margin-bottom: 50px;">(Periode <?= $start; ?> Sampai <?= $end; ?>)</p>
	<h3 style="text-align:center">DATA TAMU</h3>
	<table width="100%" border="1">
		<tr>
			<th>No.</th>
			<th>Nama</th>
			<th>No. Telp.</th>
			<th>Keperluan</th>
			<th>Tujuan</th>
			<th>Alamat</th>
			<th>Tipe</th>
			<th>Tanggal</th>
			<th>Status</th>
		</tr>

		<?php
			$no = 1;
			foreach($output as $row):
				if($row->status == 1){$status = "Sudah Di Proses";}else{$status = "Belum Di Proses";}
		?>

		<tr>
			<td style="text-align: center"><?= $no++ ?></td>
			<td><?= $row->nama_tamu ?></td>
			<td><?= $row->no_telp ?></td>
			<td><?= $row->keperluan ?></td>
			<td><?= $row->tujuan ?></td>
			<td><?= $row->alamat ?></td>
			<td><?= $row->tipe_tamu ?></td>
			<td><?= $row->tanggal ?></td>
			<td><?= $status ?></td>
		</tr>

		<?php endforeach; ?>
	</table>
</div>
