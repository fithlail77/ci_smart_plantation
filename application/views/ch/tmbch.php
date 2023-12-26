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
                  <div class="margin">
                  <div class="btn-group">
                  <button type="button" class="btn btn-success" id="btn-reset-form">Reset Form</button>
                  </div>
                  <div class="btn-group">
                  <button type="button" class="btn btn-success" id="btn-tambah-form"><i class="fa fa-plus"></i></button>
                  </div>
                  </div>
                <form action="<?= base_url('ch/save');?>" method="post">
                <?= $this->session->userdata('message');?>
                <div class="box-body table-responsive">
                  <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Company</th>
                            <th>Nama Estate</th>
                            <th>Divisi</th>
                            <th>Curah Hujan (mm)</th>
                            <th>Tanggal</th>
                            <th>Jam Hujan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <select class="form-control" name="branch_id[]" id="branch_id" value="<?= set_value('branch_id');?>" required>
                                <option value="">Select..</option>
                                <?php foreach($branch as $val):?>
                                <option value="<?= $val->name;?>"><?= $val->name;?></option>
                                <?php endforeach;?>
                                </select>
                            </td>
                            <td>
                                <select class="form-control" name="estate_id[]" id="estate_id" value="<?= set_value('estate_id');?>" required>
                                <option value="">Select..</option>
                                <?php foreach($estate as $est):?>
                                <option value="<?= $est->estate_name;?>"><?= $est->estate_name;?></option>
                                <?php endforeach;?>
                                </select>
                            </td>
                            <td>
                                <select class="form-control" name="division_id[]" id="division_id" value="<?= set_value('division_id');?>" required>
                                <option value="">Select..</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                </select>
                            </td>
                            <td><input class="form-control" type="text" name="ch[]" id="ch" placeholder="Curah Hujan (mm).." required></td>
                            <td><input class="form-control" type="date" name="tgl[]" id="tgl" placeholder="Tanggal.." required></td>
                            <td><input class="form-control" type="time" name="time[]" id="time" required></td>
                        </tr>   
                    </tbody>
                  </table>
                    <div id="insert-form"></div>
                    <div class="modal-footer">
                    <a href="<?= base_url('ch');?>">
                    <button type="button" class="btn btn-secondary">Batal</button></a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                <input type="hidden" id="jumlah-form" value="1">
        </form>
                </div><!-- /.box-header -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<script>
  $(document).ready(function(){
    $("#btn-tambah-form").click(function(){
      var jumlah = parseInt($("#jumlah-form").val());
      var nextform = jumlah + 1;
      $("#insert-form").append(
        "<table class='table table-bordered table-striped'>" +
        "<tbody>" +
        "<tr>" +
        "<td>" +
        "<select class='form-control' name='branch_id[]' id='branch_id' value='<?= set_value('branch_id');?>' required>" +
        "<option value=''>Select..</option>" +
        "<?php foreach($branch as $val):?>" +
        "<option value='<?= $val->name;?>'><?= $val->name;?></option>" +
        "<?php endforeach;?>" +
        "</select>" +
        "</td>" +
        "<td>" +
        "<select class='form-control' name='estate_id[]' id='estate_id' value='<?= set_value('estate_id');?>' required>" +
        "<option value=''>Select..</option>" +
        "<?php foreach($estate as $est):?>" +
        "<option value='<?= $est->estate_name;?>'><?= $est->estate_name;?></option>" +
        "<?php endforeach;?>" +
        "</select>" +
        "</td>" +
        "<td>" +
        "<select class='form-control' name='division_id[]' id='division_id' required>" +
        "<option value=''>Select..</option>" +
        "<option value='1'>1</option>" +
        "<option value='2'>2</option>" +
        "<option value='3'>3</option>" +
        "<option value='4'>4</option>" +
        "<option value='5'>5</option>" +
        "<option value='6'>6</option>" +
        "</select>" +
        "</td>" +
        "<td><input class='form-control' type='text' name='ch[]' id='ch' placeholder='Curah Hujan (mm)..' required></td>" +
        "<td><input class='form-control' type='date' name='tgl[]' id='tgl' placeholder='Tanggal..' required></td>" +
        "<td><input class='form-control' type='time' name='time[]' id='time' required></td>" +
        "</tr>" +   
        "</tbody>" +
        "</table>");
        $("#jumlah-form").val(nextform);
      });
    $("#btn-reset-form").click(function(){ 
      $("#insert-form").html("");
      $("#jumlah-form").val("1");
    });
  }); 
</script>
