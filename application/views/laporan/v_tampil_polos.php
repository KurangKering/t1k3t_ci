<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Sistem Penjualan Tiket</title>
	<!-- Tell the browser to be responsive to screen width -->
	<!-- Bootstrap 3.3.6 -->

	<style>
		body {
			font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;
			font-weight: 400;
			font-size: 14px;
			line-height: 1.42857143;
		}
		TABLE {
			border-width: 1px;border-style: solid;border-color: black;border-collapse: collapse;

			margin: 0 auto;
			width: 100%;
			clear: both;
			border-collapse: collapse;
			table-layout: fixed; // ***********add this
			word-wrap:break-word; // ***********and this


		}
		TH {border-width: 1px;padding: 3px;border-style: solid;border-color: black;background-color: #6495ED;}
		TD {border-width: 1px;padding: 3px;border-style: solid;border-color: black; text-align: right}
		.odd  { background-color:#ffffff; }
		.even { background-color:#dddddd; }
		.text-center {
			text-align: center;
		}
	</style>
</head>
<body>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<h3 class="text-center" style="font-weight: bold">PERINCIAN LPP Cabang Bulan <?php echo $bulan ?> Tahun <?php echo $tahun ?></h3>

			<h4 class="text-center" style="font-weight: bold">CABANG PEKANBARU</h4>
			<br>

			<table class="" id="table-laporan" style="" width="100%" border="1px">
				<thead>
					<tr>
						<th rowspan="2" class="vertical-center text-center">Tanggal</th>
						<?php foreach ($maskapai as $mas): ?>
							<th colspan="2" class="text-center"><?php echo $mas ?></th>
						<?php endforeach ?>
						<th rowspan="2" class="vertical-center text-center">JMl Tiket</th>
						<th rowspan="2" class="vertical-center text-center">Adm Fee</th>
					</tr>
					<tr>
						<?php for ($i=0;  $i < count($maskapai); $i++) { 
							echo '
							<th class="text-center">Pemakaian</th>
							<th  class="text-center">Setoran</th>';
						}?>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($data_laporan['isi'] as $tanggal => $data): ?>
						<tr>
							<td class="text-center"><?php echo $tanggal; ?></td>
							<?php foreach ($data['data'] as $key => $value): ?>
								<td><?php echo rupiah_converter($value['jumlah']); ?></td>
								<td><?php echo rupiah_converter($value['jumlah']) ?></td>
							<?php endforeach ?>
							<td class="text-center"><?php echo $data['jumlah_q']['0']; ?></td>
							<td><?php echo rupiah_converter($data['adm_fee']['0']); ?></td>
						</tr>
					<?php endforeach ?>
				</tbody>
				<tfoot>
					<tr>
						<td style="font-weight: bold">Total</td>
						<?php foreach ($data_laporan['penjumlahan']['maskapai'] as $key => $value): ?>
							<td style="font-weight: bold">
								<?php echo rupiah_converter($value['sum']); ?>
							</td>
							<td style="font-weight: bold">
								<?php echo rupiah_converter($value['sum']); ?>
							</td>
						<?php endforeach ?>
						<td style="font-weight: bold " class="text-center">
							<?php echo $data_laporan['penjumlahan']['jumlah_q']; ?>
						</td>
						<td style="font-weight: bold"><?php echo rupiah_converter($data_laporan['penjumlahan']['adm_fee']); ?></td>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</body>
</html>
