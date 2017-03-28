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
										<input readonly value="<?php echo $penjualan->persen * 100;?>" id="persen" class="form-control col-md-6 col-xs-12" type="text">
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
										<input id="nta" value="0" readonly="readonly" class="format-uang form-control col-md-6 col-xs-12" type="text">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class=" col-md-5 control-label ">Harga Jual
								</label>
								<div class="col-md-6">
									<div class="input-group">	
										<span class="input-group-addon">Rp</span>	
										<input id="harga_jual" value="0" readonly="readonly" class="format-uang form-control col-md-6 col-xs-12" type="text">
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
										<input id="up_salling" value="0" readonly="readonly" class="format-uang form-control col-md-6 col-xs-12" type="text">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class=" col-md-5 control-label ">Profit 1
								</label>
								<div class="col-md-6">
									<div class="input-group">	
										<span class="input-group-addon">Rp</span>	
										<input id="profit_1" value="0" readonly="readonly" class="format-uang form-control col-md-6 col-xs-12" type="text">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class=" col-md-5 control-label ">Fee
								</label>
								<div class="col-md-6">
									<div class="input-group">	
										<span class="input-group-addon">Rp</span>	
										<input value="<?php echo $penjualan->fee; ?>" id="fee"  readonly class="format-uang form-control col-md-6 col-xs-12" type="text">
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
										<input id="adm_fee" value="0" readonly="readonly" class="format-uang form-control col-md-6 col-xs-12" type="text">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class=" col-md-5 control-label ">Profit 2
								</label>
								<div class="col-md-6">
									<div class="input-group">	
										<span class="input-group-addon">Rp</span>	
										<input id="profit_2" value="0" readonly="readonly" class="format-uang form-control col-md-6 col-xs-12" type="text">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class=" col-md-5 control-label ">Jumlah
								</label>
								<div class="col-md-6">
									<div class="input-group">
										<span class="input-group-addon">Rp</span>	
										<input id="jumlah" value="0" readonly="readonly" class="format-uang form-control col-md-6 col-xs-12" type="text">
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
				<form role="form" autocomplete="off" action="<?php echo base_url('penjualan/do_edit_penjualan'); ?>" method="POST" >
				<input type="hidden" value="<?php echo $penjualan->booking_code; ?>" name="booking_code_asal">
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Maskapai</label>
								<select id="maskapai" name="maskapai" required class="form-control">
									<?php foreach ($maskapai as $mas): ?>
										<?php if ($penjualan->id_maskapai == $mas->id_maskapai ): ?>
											<option value="<?php echo $mas->id_maskapai ?>" selected><?php echo $mas->nama; ?></option>
										<?php else: ?>
											<option value="<?php echo $mas->id_maskapai ?>"><?php echo $mas->nama; ?></option>
										<?php endif; ?>
									<?php endforeach ?>
								</select>
							</div>

							<div class="form-group">
								<label>Tanggal Issued</label>

								<input   value="<?php echo isset($penjualan->tanggal) ? set_value("tanggal", $penjualan->tanggal) : set_value('tanggal'); ?>" id="tanggal" data-provide="datepicker" type="date" name="tanggal"  required class="form-control readonly">
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label>Booking Code</label>
										<input  value="<?php echo isset($penjualan->booking_code) ? set_value("booking_code", $penjualan->booking_code) : set_value('booking_code'); ?>" id="booking_code" name="booking_code" type='text'  required class="form-control">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label>Q</label>
										<input  value="<?php echo isset($penjualan->q) ? set_value("q", $penjualan->q) : set_value('q'); ?>" id="q" type='number' name="q"  required class="input-change form-control">
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>HPP</label>
								<div class="input-group">	
									<span class="input-group-addon">Rp</span>	
									<input  value="<?php echo isset($penjualan->hpp) ? set_value("hpp", $penjualan->hpp) : set_value('hpp'); ?>" type="text" id="hpp" name="hpp"  required class="input-change form-control">
								</div>
							</div>
							<div class="form-group">
								<label>Invoice</label>
								<div class="input-group">	
									<span class="input-group-addon">Rp</span>	
									<input  value="<?php echo isset($penjualan->invoice) ? set_value("invoice", $penjualan->invoice) : set_value('invoice'); ?>" type='text' id="invoice" name="invoice"  required class="input-change form-control">
								</div>
							</div>
							<div class="form-group">
								<label>Nama TC</label>
								<select required class="form-control" id="nama_tc" name="nama_tc"  >
									<?php foreach ($tc as $tc_): ?>
										<?php if ($penjualan->id_maskapai == $tc_->id_tc ): ?>
											<option value="<?php echo $tc_->id_tc ?>" selected><?php echo $tc_->nama; ?></option>
										<?php else: ?>
											<option value="<?php echo $tc_->id_tc ?>"><?php echo $tc_->nama; ?></option>
										<?php endif; ?>
									<?php endforeach ?>
								</select>
							</div>
							<input type="submit" class="btn btn-default" name="simpan" value="Save">
							<a href="<?php echo base_url('penjualan'); ?>"><button type="button" class="btn btn-default">Cancel</button></a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
