
<?php echo validation_errors(); ?>
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo $judul_form; ?></h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form class="form-horizontal" method="post" action="<?php echo base_url() ?>master/dummy">
        <div class="box-body">
        <input type="hidden" name="tipe" value="<?php echo $tipe_aksi ?>">
          <div class="form-group">
            <label for="nama" class="col-md-4 control-label">Nama Maskapai</label>
            <div class="col-md-8">
            <input class="form-control" id="nama" value="<?php echo isset($maskapai->nama) ? set_value("nama", $maskapai->nama) : set_value("nama"); ?>" name="nama" placeholder="Nama Maskapai" type="text">
            </div>
          </div>
          <div class="form-group">
            <label for="status" class="col-md-4 control-label">Status</label>
            <div class="col-md-8">
              <div class="radio">
                <label>
                  <input name="status" id="active" value="active" checked="" type="radio">
                  Active
                </label>
              </div>
              <div class="radio">
                <label>
                  <input name="status" id="inactive" value="inactive" type="radio">
                  Tidak Active
                </label>
              </div>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <a href="<?php echo base_url() ?>master"><button type="button" class="btn btn-default">Cancel</button></a>
          <input type="submit"  class="btn btn-info pull-right" value="Simpan" name="">
          
        </div>
        <!-- /.box-footer -->
      </form>
    </div>
  </div>
</div>

