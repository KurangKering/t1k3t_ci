<div class="row">
 <div class="col-lg-12">
  <div class="panel box panel-default">
    <div class="panel-heading">
     <ul class="nav nav-tabs">
       <li class="active"><a href="#home-pills" data-toggle="tab">Data Maskapai</a>
       </li>
       <li><a href="#profile-pills" data-toggle="tab">Data TC</a>
       </li>
     </ul>
   </div>
   <!-- /.panel-heading -->
   <div class="panel-body">
    <div class="tab-content">
      <div class="tab-pane fade in active" id="home-pills">

        <!-- <span class="text-primary"><a href="penjualan_tambah.php"><button class="btn btn-primary btn-sm " id="showTransForm"><i class="fa fa-plus"></i> Tambah Maskapai</button></a></span> -->
        <table width="100%" class="table table-striped table-bordered table-hover nowrap" cellspacing="0" id="table-maskapai">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Maskapai</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>

            <?php foreach ($data_maskapai as $maskapai): ?>
              <tr>
                <td></td>
                <td><?php echo $maskapai->nama; ?></td>
                <td><?php echo $maskapai->status; ?></td>
                <td></td>
              </tr> 
            <?php endforeach ?>
          </tbody>
        </table>

      </div>
      <div class="tab-pane fade" id="profile-pills">
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
              <td><?php echo $tc->nama_tc; ?></td>
              <td><?php echo $tc->status; ?></td>
              <td></td>
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
