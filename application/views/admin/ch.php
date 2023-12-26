<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Curah Hujan
            <small>Curah Hujan List Data</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
				  <div class="margin">
						<div class="btn-group">
							<a href="<?= base_url('ch/tmbCh');?>">
							<button type="button" class="btn btn-success btn-md-left">
								<i class="zmdi zmdi-plus"></i>Tambah Data
							</button>
							</a>
						</div>
						<div class="btn-group">
							<button type="button" class="btn btn-success btn-md-left" data-toggle="modal" data-target="#uploadChModal">
								<i class="zmdi zmdi-plus"></i>Upload Data
							</button>
						</div>
					</div>
                </div><!-- /.box-header -->
				<?= $this->session->userdata('message');?>
                <div class="box-body table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
										        <th width="20px">NO</th>
												<th width="150px">Company</th>
												<th width="150px">Nama Estate</th>
												<th width="150px">Divisi</th>
												<th width="150px">Curah Hujan (mm)</th>
												<th width="150px">Tanggal</th>
												<th width="150px">Jam Hujan</th>
												<th width="80px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
					  <?php $no=0;
					  		foreach($hujan as $ch): $no++;?>
					  <tr>
	  					<td><?= $no;?></td>
						<td><?= $ch->company;?></td>
						<td><?= $ch->ch_estate;?></td>
						<td><?= $ch->ch_division;?></td>
						<td><?= $ch->ch; ?></td>
						<td><?= $ch->date; ?></td>
						<td><?= $ch->time; ?></td>
						<td>
							<div class="table-data-feature">
								<div class="table-data-feature">
								<button class="item" title="Edit" data-toggle="modal" data-target="#editHujanModal<?= $ch->ch_id;?>" >
									<i class="fa fa-pencil" style="color:blue"></i>
								</button>
								<button class="item" data-toggle="tooltip" title="Delete">
									<a href="#!" onclick="deleteConfirm('<?= base_url('ch/delch/'. $ch->ch_id);?>')" >
									<i class="fa fa-trash-o" style="color:red"></i></a>
								</button>
							</div>
						</td>
					  </tr>
					  <?php endforeach;?>
                	</tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <!-- modal uploadCh -->
    <script src="<?= base_url("assets/js/jquery.min.js"); ?>" type="text/javascript"></script>
		<div class="modal fade" id="uploadChModal" tabindex="-1" role="dialog" aria-labelledby="uploadChModal" aria-hidden="true">
			<div class="modal-dialog modal-md" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="uploadChModal">Upload Data Curah Hujan - Excel File</h4>
					</div>
					<div class="modal-body">
						<div class="login-form">
							<form action="<?= base_url('ch/uploadCh');?>" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label>File</label>
									<input class="form-control" type="file" name="uploadCh" id="uploadCh" placeholder="Uploda File..." required>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
									<button type="submit" class="btn btn-primary">Simpan</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end modal uploadCh -->

		<!-- modal editHujanModal -->
		<?php $no = 0;
			foreach($hujan as $ch): $no++;?>
		<div class="modal fade" id="editHujanModal<?= $ch->ch_id;?>" tabindex="-1" role="dialog" aria-labelledby="editHujanModal" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="editHujanModal">Ubah Data Curah Hujan</h4>
					</div>
					<div class="modal-body">
						<div class="login-form">
							<?= form_open_multipart('ch/editCh');?>
								<input class="form-control" type="hidden" name="ch_id" id="ch_id" value="<?= $ch->ch_id;?>" required>
								<div class="form-group">
									<label>Perusahaan</label>
									<select class="form-control" name="branch_id" id="branch_id" required>
										<option value="<?= $ch->company;?>"> <?= $ch->company;?></option>
										<?php foreach($branch as $val):?>
										<option value="<?= $val->name;?>"><?= $val->name;?></option>
					  					<?php endforeach;?>
									</select>
								</div>
								<div class="form-group">
									<label>Estate</label>
									<select class="form-control" name="ch_estate" id="ch_estate" required>
										<option value="<?= $ch->ch_estate;?>"> <?= $ch->ch_estate;?></option>
										<?php foreach($estate as $est):?>
										<option value="<?= $est->estate_name;?>"><?= $est->estate_name;?></option>
					  					<?php endforeach;?>
									</select>
								</div>
								<div class="form-group">
									<label>Divisi</label>
									<select class="form-control" name="ch_division" id="ch_division" required>
										<option value="<?= $ch->ch_division;?>"> <?= $ch->ch_division;?></option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
									</select>
								</div>	
								<div class="form-group">
									<label>Curah Hujan</label>
									<input class="form-control" type="text" name="ch" id="ch" placeholder="Curah Hujan" value="<?= $ch->ch;?>" required>
								</div>
								<div class="form-group">
									<label>Tanggal</label>
									<input class="form-control" type="date" name="date" id="date" placeholder="Tanggal" value="<?= $ch->date;?>" required>
								</div>
								<div class="form-group">
									<label>Waktu</label>
									<input class="form-control" type="time" name="time" id="time" placeholder="Waktu" value="<?= $ch->time;?>" required>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
									<button type="submit" class="btn btn-primary">Simpan</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endforeach;?>
	<!-- end modal editCh -->