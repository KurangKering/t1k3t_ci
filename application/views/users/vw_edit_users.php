
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Form Edit Users</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form autocomplete="off" class="form-horizontal" method="post" action="<?php echo base_url('users/do_edit_users'); ?>">
      <input type="hidden" name="id" value="<?php echo $user->id ?>">
        <div class="box-body">
          <div class="form-group">
            <label for="username" class="col-md-4 control-label">Username</label>
            <div class="col-md-8">
              <input readonly="" value="<?php echo $user->username; ?>" class="form-control" id="username" name="username" placeholder="Username" type="text">
            </div>
          </div>
          <div class="form-group">
            <label for="new_pass" class="col-md-4 control-label">Password</label>
            <div class="col-md-8">
              <input  class="form-control" id="new_pass" name="new_pass" placeholder="Password" type="password">
            </div>
          </div>
          <div class="form-group">
          <label for="new_pass_confirm" class="col-md-4 control-label">Ulangi Password</label>
            <div class="col-md-8">
              <input  class="form-control" id="new_pass_confirm" name="new_pass_confirm" placeholder="Password Confirmation" type="password">
            </div>
          </div>
          <div class="form-group">
            <label for="role_name" class="col-md-4 control-label">Hak role_name</label>
            <div class="col-md-8">
              <div class="radio">
                <label>
                  <input name="role_name"  value="admin"  type="radio" <?php echo $user->role_name == 'admin' ? 'checked=""' : ''; ?>>
                  Admin
                </label>
              </div>
              <div class="radio">
                <label>
                  <input name="role_name"  value="manager" type="radio" <?php echo $user->role_name == 'manager' ? 'checked=""' : ''; ?>>
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