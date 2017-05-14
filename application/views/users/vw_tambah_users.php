
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Form Tambah Users</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form autocomplete="off" class="form-horizontal" method="post" action="<?php echo base_url('users/do_tambah_users'); ?>">
        <div class="box-body">
          <div class="form-group">
            <label for="username" class="col-md-4 control-label">Username</label>
            <div class="col-md-8">
              <input required class="form-control" id="username" name="username" placeholder="Username" type="text">
            </div>
          </div>
          <div class="form-group">
            <label for="pass" class="col-md-4 control-label">Password</label>
            <div class="col-md-8">
              <input required class="form-control" id="pass" name="pass" placeholder="Password" type="password">
            </div>
          </div>
          <div class="form-group">
          <label for="pass_conf" class="col-md-4 control-label">Ulangi Password</label>
            <div class="col-md-8">
              <input required class="form-control" id="pass_conf" name="pass_conf" placeholder="Password Confirmation" type="password">
            </div>
          </div>
          <div class="form-group">
            <label for="role_name" class="col-md-4 control-label">Hak role_name</label>
            <div class="col-md-8">
              <div class="radio">
                <label>
                  <input name="role_name" id="active" value="admin" checked="" type="radio">
                  Admin
                </label>
              </div>
              <div class="radio">
                <label>
                  <input name="role_name" id="inactive" value="manager" type="radio">
                  Manager
                </label>
              </div>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <a href="<?php echo base_url() ?>users"><button type="button" class="btn btn-default">Cancel</button></a>
          <input type="submit"  class="btn btn-info pull-right" value="Simpan" name="">
          
        </div>
        <!-- /.box-footer -->
      </form>
    </div>
  </div>
</div>