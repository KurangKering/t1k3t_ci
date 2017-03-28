<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<div class="box box-default">
			<div class="box-header with-border">
				<h3 class="box-title">Laporan Harian</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<form class="form-horizontal" method="get" action="">
					<div class="box-body">
						<div class="form-group">
							<label for="Bulan" class="col-md-2 control-label">Bulan</label>
							<div class="col-md-10">
								<select name="bulan" class="form-control">
									<?php foreach ($bulan as $index => $bbulan): ?>
										<option value="<?php echo $index; ?>"><?php echo $bbulan; ?></option>}
										option
									<?php endforeach ?>
								</select>
							</div>
							
						</div>
						<div class="form-group">
							<label for="Tahun" class="col-md-2 control-label">Tahun</label>
							<div class="col-md-10">
								<input type="text" name="tahun" value="2016" class="form-control" id="Bulan" placeholder="Tahun">
							</div>
						</div>
					</div>
					<!-- /.box-body -->
					<div class="box-footer">
						<button type="submit" class="btn btn-default">Cancel</button>
						<button type="submit" class="btn btn-info pull-right">Generate</button>
					</div>
					<!-- /.box-footer -->
				</form>
			</div>
		</div>
	</div>
