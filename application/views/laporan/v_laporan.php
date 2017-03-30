<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<div class="box box-default">
			<div class="box-header with-border">
				<h3 class="box-title">Laporan Harian</h3>
			</div>
			<!-- /.box-header -->

			<form class="form-horizontal" action="<?php echo base_url('laporan/generate_laporan') ?> " method="POST" target="_blank">

				<div class="box-body">

					<div class="form-group">
						<label for="Bulan" class="col-md-2 control-label">Bulan</label>
						<div class="col-md-10">
							<select id="bulan-laporan" name="bulan" class="form-control">
								<?php foreach ($bulan as $index => $bbulan): ?>

									<option value="<?php echo $index; ?>"><?php echo $bbulan; ?></option>}

								<?php endforeach ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="Tahun" class="col-md-2 control-label">Tahun</label>
						<div class="col-md-10">
							<select id="tahun-laporan" name="tahun" class="form-control">
								<?php foreach ($tahun as $t): ?>

									<option value="<?php echo $t; ?>"><?php echo $t; ?></option>}

								<?php endforeach ?>
							</select>
						</div>
					</div>
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					<div class="">
						<button id="btn-laporan" class="btn btn-info pull-right">Generate</button>
					</div>
				</div>
				<!-- /.box-footer -->
			</form>
		</div>
		

	</div>
</div>


