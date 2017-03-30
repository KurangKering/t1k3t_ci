<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Sistem Penjualan Tiket</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/template/adminLTE/bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/template/adminLTE/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/template/adminLTE/Ionicons/css/ionicons.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/toastr/toastr.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/template/adminLTE/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
  folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/adminLTE/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/mycss.css">
  <style>
  	TABLE {border-width: 1px;border-style: solid;border-color: black;border-collapse: collapse;}
  	TH {border-width: 1px;padding: 3px;border-style: solid;border-color: black;background-color: #6495ED;}
  	TD {border-width: 1px;padding: 3px;border-style: solid;border-color: black;}
  	.odd  { background-color:#ffffff; }
  	.even { background-color:#dddddd; }
  	TR:Nth-Child(Even) {Background-Color: #dddddd;}
  	TR:Hover TD {Background-Color: #C1D5F8;}
  </style>
</head>
<body>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<h3 class="text-center">PERINCIAN LPP Cabang Bulan <?php echo $bulan ?> Tahun <?php echo $tahun ?></h3>
				<h4 class="text-center">CABANG PEKANBARU</h4>
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
								<td><?php echo $tanggal; ?></td>
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
<!-- <TR>
		<TH colspan="2" style="text-align: center"> Average</TH>
		<TH rowspan="2">Red eyes </TH>
	</TR>
	<TR>
		<TH style="text-align: center">height</TH><TH style="text-align: center">weight</TH>
	</TR>
	<TR> 
		<TD>1.9<TD>0.003<TD>40%</TD>
	</TR>
	<TR> 
		<TD>1.7<TD>0.002<TD>43%</TD>
	</TR>
 -->