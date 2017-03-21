<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-info">
			<div class="panel-heading">
				Informasi
			</div>
			<div class="panel-body">
				<div class="row">
					<form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
						<div class="col-lg-4">
							<div class="form-group">
								<label class=" col-md-5 control-label ">Percent HPP
								</label>
								<div class="col-md-6">
									<div class="input-group">	
										<input value="" id="persen" readonly="readonly" class="form-control col-md-6 col-xs-12" type="text">
										<span class="input-group-addon">%</span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class=" col-md-5 control-label ">NTA
								</label>
								<div class="col-md-6">
									<div class="input-group">	
										<span class="input-group-addon">Rp</span>	
										<input id="nta" value="0" readonly="readonly" class="form-control col-md-6 col-xs-12" type="text">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class=" col-md-5 control-label ">Harga Jual
								</label>
								<div class="col-md-6">
									<div class="input-group">	
										<span class="input-group-addon">Rp</span>	
										<input id="harga_jual" value="0" readonly="readonly" class="form-control col-md-6 col-xs-12" type="text">
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label class=" col-md-5 control-label ">Up Salling
								</label>
								<div class="col-md-6">
									<div class="input-group">	
										<span class="input-group-addon">Rp</span>	
										<input id="up_salling" value="0" readonly="readonly" class="form-control col-md-6 col-xs-12" type="text">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class=" col-md-5 control-label ">Profit 1
								</label>
								<div class="col-md-6">
									<div class="input-group">	
										<span class="input-group-addon">Rp</span>	
										<input id="profit_1" value="0" readonly="readonly" class="form-control col-md-6 col-xs-12" type="text">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class=" col-md-5 control-label ">Fee
								</label>
								<div class="col-md-6">
									<div class="input-group">	
										<span class="input-group-addon">Rp</span>	
										<input value="" id="fee" readonly="readonly" class="form-control col-md-6 col-xs-12" type="text">
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label class=" col-md-5 control-label ">Adm Fee
								</label>
								<div class="col-md-6">
									<div class="input-group">	
										<span class="input-group-addon">Rp</span>	
										<input id="adm_fee" value="0" readonly="readonly" class="form-control col-md-6 col-xs-12" type="text">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class=" col-md-5 control-label ">Profit 2
								</label>
								<div class="col-md-6">
									<div class="input-group">	
										<span class="input-group-addon">Rp</span>	
										<input id="profit_2" value="0" readonly="readonly" class="form-control col-md-6 col-xs-12" type="text">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class=" col-md-5 control-label ">Jumlah
								</label>
								<div class="col-md-6">
									<div class="input-group">
										<span class="input-group-addon">Rp</span>	
										<input id="jumlah" value="0" readonly="readonly" class="form-control col-md-6 col-xs-12" type="text">
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				Form Input
			</div>
			<div class="panel-body">
				<form role="form" action="" method="POST">
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Maskapai</label>
								<select id="maskapai" name="maskapai" required class="form-control">
									
								</select>
							</div>
							<div class="form-group">
								<label>Tanggal Issued</label>
								<input  value="<?php echo isset($tanggal) ? set_value("tanggal", $tanggal) : set_value("tanggal"); ?>" id="tanggal" data-provide="datepicker" type="date" name="tanggal"  required class="form-control readonly">
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label>Booking Code</label>
										<input value="<?php echo isset($booking_code) ? set_value("booking_code", $booking_code) : set_value("booking_code"); ?>" id="booking_code" name="booking_code" type='text'  required class="form-control">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label>Q</label>
										<input value ="<?php echo isset($q) ? set_value("q", $q) : set_value("q"); ?>" id="q" type='number' name="q"  required class="form-control">
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>HPP</label>
								<div class="input-group">	
									<span class="input-group-addon">Rp</span>	
									<input value="<?php echo isset($hpp) ? set_value("hpp", $hpp) : set_value("hpp"); ?>" type="text" id="hpp" name="hpp"  required class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label>Invoice</label>
								<div class="input-group">	
									<span class="input-group-addon">Rp</span>	
									<input value="<?php echo isset($invoice) ? set_value("invoice", $invoice) : set_value("invoice"); ?>" type='text' id="invoice" name="invoice"  required class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label>Nama TC</label>
								<select required class="form-control" id="nama_tc" name="nama_tc"  >
									
								</select>
							</div>
							<input type="submit" class="btn btn-default" name="simpan" value="Save">
							<a href="penjualan_data.php"><button type="button" class="btn btn-default">Cancel</button></a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>