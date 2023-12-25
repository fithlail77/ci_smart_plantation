      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tambah Data Estate
          </h1>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header with-border">
                <form action="<?= base_url('estate/addEstate');?>" method="post">
            <div class="form-group">
                <label>Perusahaan</label>
                <select class="form-control" name="branch_id" id="branch_id" value="<?= set_value('branch_id');?>" required>
                <option value="">Select..</option>
                <?php foreach($branch as $val):?>
                <option value="<?= $val->name;?>"><?= $val->name;?></option>
                <?php endforeach;?>
                </select>
            </div>
            <div class="form-group">
                <label>Kode Estate</label>
                <input class="form-control" type="text" name="estate_code" id="estate_code" placeholder="Kode Estate" required>
            </div>
            <div class="form-group">
                <label>Nama Estate</label>
                <input class="form-control" type="text" name="estate_name" id="estate_name" placeholder="Nama Estate" required>
            </div>
            <div class="modal-footer">
                <a href="<?= base_url('estate');?>">
                <button type="button" class="btn btn-secondary">Batal</button></a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
                </div><!-- /.box-header -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
