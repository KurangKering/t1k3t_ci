<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="row">
         <div class="col-md-6">
           <div class="form-group">
            <select class="form-control" id="dynamic_select">
              <option value="" disabled selected >Pilih Maskapai</option>
              <option value="0" >Semua Maskapai</option>
              <?php foreach ($maskapai as $mas): ?>
                <?php if ($mas->id_maskapai == $no_maskapai): ?>
                  <option value="<?php echo $mas->id_maskapai ?>"  selected><?php echo $mas->nama; ?></option>
                <?php else: ?>
                  <option value="<?php echo $mas->id_maskapai ?>" ><?php echo $mas->nama; ?></option>
                <?php endif ?>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="col-md-6">
          <a href="<?php echo base_url('penjualan/tambah_penjualan'); ?>" class="btn btn-primary btn-flat pull-right">Tambah Penjualan</a>
        </div>
      </div>
      <table  width="100%" class="table table-striped table-bordered table-hover nowrap" cellspacing="0" id="table_penjualan" >
        <thead>
          <tr>
            <th>Booking Code</th>
            <th>Maskapai</th>
            <th>Tanggal Issued</th>
            <th>Q</th>
            <th>HPP/NTA</th>
            <th>Percent</th>
            <th>NTA</th>
            <th>Harga Jual</th>
            <th>Up Salling</th>
            <th>Invoice</th>
            <th>Profit</th>
            <th >Fee</th>
            <th>Adm Fee</th>
            <th>Profit</th>
            <th>Nama TC</th>
            <th>Jumlah</th>
            <?php if ($isAdmin): ?>
            <th>Action</th>
            <?php endif ?>
            
          </tr>
        </thead>
        <tbody>
          <?php foreach ($penjualan as $jual): ?>
            <tr>
              <td><?php echo  $jual->booking_code; ?></td>
              <td><?php echo  $jual->nama_maskapai; ?></td>
              <td><?php echo  $jual->tanggal; ?></td>
              <td><?php echo  $jual->q; ?></td>
              <td><?php echo  rupiah_converter($jual->hpp); ?></td>
              <td><?php echo  persen_converter($jual->persen); ?></td>
              <td><?php echo  rupiah_converter($jual->NTA); ?></td>
              <td><?php echo  rupiah_converter($jual->harga_jual); ?></td>
              <td><?php echo  rupiah_converter($jual->up_salling); ?></td>
              <td><?php echo  rupiah_converter($jual->invoice); ?></td>
              <td><?php echo  rupiah_converter($jual->profit_1); ?></td>
              <td><?php echo  rupiah_converter($jual->fee); ?></td>
              <td><?php echo  rupiah_converter($jual->adm_fee); ?></td>
              <td><?php echo  rupiah_converter($jual->profit_2); ?></td>
              <td><?php echo  $jual->nama_tc; ?></td>
              <td><?php echo  rupiah_converter($jual->jumlah); ?></td>
              <?php if ($isAdmin): ?>

                <td><a class="btn btn-xs btn-warning" href="<?php echo base_url('penjualan/edit_penjualan/'. $jual->booking_code); ?>">Edit</a> <a href="#" class="btn btn-xs btn-danger" data-href="<?php echo base_url('penjualan/hapus_penjualan/'.$jual->booking_code); ?>"  data-toggle="modal" data-target="#confirm-delete-penjualan">Hapus</a>
                </td>
              <?php endif ?>

            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
</div>
</div>
<div class="modal modal-danger" id="confirm-delete-penjualan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
          <h4 class="modal-title">Yakin Ingin Menghapus Data Penjualan Ini ?</h4>
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