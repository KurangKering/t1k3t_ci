<?php echo $this->session->userdata('status'); ?>

<div class="row">
  <div class="col-md-6">
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Data Maskapai</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
       <a href="<?php echo base_url() ?>master/tambah_maskapai"> <button type="button" class="btn btn-primary btn-flat margin">Tambah Maskapai</button></a>
       <table width="100%" class="table table-striped table-bordered table-hover nowrap" cellspacing="0" id="table-maskapai">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Maskapai</th>
            <th style="">Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          <?php foreach ($data_maskapai as $maskapai): ?>
            <tr>
              <td></td>
              <td><?php echo $maskapai->nama; ?></td>

              <?php if ($maskapai->status == 'ACTIVE') {
                $class = 'btn  btn-success btn-xs';
              } else{
                $class = 'btn bg-maroon btn-xs';
              }
              ?>
              <td style="text-align: center"> <span class="<?php echo $class; ?>"><?php echo $maskapai->status ?></span></td>
              <td>
                
                <a class="btn btn-xs btn-warning" href="<?php echo base_url('master/edit_maskapai/'. $maskapai->id_maskapai) ?>">Edit</a>
                  <a class="btn btn-danger btn-xs" href="<?php echo base_url('master/hapus_maskapai/'. $maskapai->id_maskapai) ?>"><span>Hapus</span></a>
                
              </td>
            </tr> 
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>

<div class="col-md-6">
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Data TC</h3>

    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <a href="<?php echo base_url() ?>master/tambah_tc"> <button type="button" class="btn btn-primary btn-flat margin">Tambah TC</button></a>

      <table width="100%" class="table table-striped table-bordered table-hover nowrap" cellspacing="0" id="table-tc">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama TC</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($data_tc as $tc): ?>
            <tr>
              <td></td>
              <td><?php echo $tc->nama; ?></td>

              <?php if ($tc->status == 'ACTIVE') {
                $class = 'btn  btn-success btn-xs';
              } else{
                $class = 'btn bg-maroon btn-xs';
              }
              ?>
              <td style="text-align: center"> <span class="<?php echo $class; ?>"><?php echo $tc->status ?></span></td>
              <td>
                
                <a class="btn btn-xs btn-warning" href="<?php echo base_url('master/edit_tc/'. $tc->id_tc) ?>">Edit</a>
                  <a class="btn btn-danger btn-xs" href="<?php echo base_url('master/hapus_tc/'. $tc->id_tc) ?>"><span>Hapus</span></a>
                
              </td>
            </tr> 
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>
</div>
</div>
</div>
</div>