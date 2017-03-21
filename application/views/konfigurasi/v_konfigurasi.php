   <div class="row">
    <div class="col-lg-6 col-lg-offset-3">
    <div class="panel box panel-default">
            <div class="panel-body">
                <form role="form" method="POST" action="<?php echo base_url(); ?>konfigurasi/update_konfig">
                    <div class="form-group">
                        <label>Fee</label>
                        <div class="input-group">   
                            <span class="input-group-addon">Rp</span>   
                            <input value="<?php echo $konfig->fee; ?>" name="fee" id="fee" class="form-control" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Persen</label>
                        <div class="input-group">   
                            <input value="<?php echo $konfig->persen * 100; ?>" name="persen" id="persen" class="form-control" type="number">
                            <span class="input-group-addon">%</span>   
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Password Baru</label>
                        <input class="form-control" type="password" name="new_pass" placeholder="Kosongkan jika tidak ingin merubah password">
                    </div>
                    <div class="form-group">
                        <label>Ulangi Password Baru</label>
                        <input class="form-control" type="password" name="new_pass_confirm" placeholder="Kosongkan jika tidak ingin merubah password">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-default" name="simpan" value="simpan">
                        <button type="button" class="btn btn-default">cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>