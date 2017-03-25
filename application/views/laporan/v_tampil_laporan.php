
<table class="table table-bordered" style="border-collapse: collapse;">
	<thead>
		<tr>
			<th rowspan="2" class="vertical-center text-center">Tanggal</th>
			<?php foreach ($maskapai as $mas): ?>
				<th colspan="2" class="text-center"><?php echo $mas->nama; ?></th>
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
		<?php foreach ($hari as $h): ?>
			<tr>
				<td><?php echo $h; ?></td>
				<td>data</td>
				<td>data</td>
				<td>data</td>
				<td>data</td>
				<td>data</td>
				<td>data</td>
			</tr>
		<?php endforeach ?>
		
	</tbody>
</table>
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