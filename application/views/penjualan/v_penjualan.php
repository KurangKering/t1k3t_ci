<div class="row">
  <div class="col-lg-12">
    <div class="box">
    <div class="box-header">
      <a href="<?php echo base_url('penjualan/tambah_penjualan'); ?>" class="btn btn-primary btn-flat">Tambah Penjualan</a>
    </div>
     <div class="box-body">
      <table  class="table table-striped table-bordered table-hover " cellspacing="0" id="table_penjualan" >
        <thead>
          <tr>
            <th no>Booking Code</th>
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
            <th>Action</th>
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
              <td><a class="btn btn-xs btn-warning" href="<?php echo base_url('penjualan/edit_penjualan/'. $jual->booking_code); ?>">Edit</a> <a href="<?php echo base_url('penjualan/hapus_penjualan/'. $jual->booking_code); ?>" class="btn btn-xs btn-danger">Hapus</a></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>

