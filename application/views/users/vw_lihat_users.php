<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <div class="panel panel-default">
      <div class="panel-body">

       <div class="row">
       <div class="col-md-12">
          <a href="<?php echo base_url('users/tambah_users'); ?>" class="btn btn-primary btn-flat pull-right">Tambah User</a>
        </div>
      </div>
      <br>
      <table  width="100%" class="table table-striped table-bordered table-hover nowrap" cellspacing="0" id="table_users" >
        <thead>
          <tr>
            <th>#</th>
            <th>Username</th>
            <th>Role</th>
            <th>Action</th>

          </tr>
        </thead>
        <tbody>
          <?php $num = 1; foreach ($users as $key => $user): ?>
          <tr>
            <td><?php echo $num; ?></td>
            <td><?php echo $user->username; ?></td>
            <td><?php echo $user->role_name; ?></td>
            <td><a class="btn btn-xs btn-warning" href="<?php echo base_url('users/edit_users/' . $user->id); ?>">Edit</a> <a href="#" class="btn btn-xs btn-danger" data-href="<?php echo base_url('users/hapus_users/'. $user->id); ?>"  data-toggle="modal" data-target="#confirm-delete-users">Hapus</a>
            </td>
          </tr>
          <?php $num++; ?>
        <?php endforeach ?>

      </tbody>
    </table>
  </div>
</div>
</div>
</div>
</div>
</div>
<div class="modal modal-danger" id="confirm-delete-users" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
          <h4 class="modal-title">Yakin Ingin Menghapus User ini ?</h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline" data-dismiss="modal">Close</button>
          <a class="btn btn-outline btn-ok">Delete</a>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>