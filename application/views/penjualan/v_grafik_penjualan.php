<div class="row">
	<div class="col-md-5 col-md-offset-7">
		<div class="form-group">
			<div class="row">
				<div class="col-md-4">
					<select class="form-control" id="select-tahun">
						<option value="" disabled selected >Pilih Tahun</option>
						<?php foreach ($options['tahun'] as $tahun): ?>
							<option value="<?php echo $tahun ?>" ><?php echo $tahun; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="col-md-5">
					<select class="form-control" id="select-maskapai">
						<option value="" disabled selected >Pilih Maskapai</option>
						<option value="0" >Semua Maskapai</option>
						<?php foreach ($options['maskapai'] as $mas): ?>
							<option value="<?php echo $mas['id_maskapai'] ?>" ><?php echo $mas['nama_maskapai']; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="col-md-3">
					<button id="btn-grafik" disabled="disabled" type="button" class="form-control btn btn-primary btn-flat pull-right">Tampil</button>
				</div>
			</div>

		</div>
	</div>
</div>

<div id="chart-penjualan"> </div>
