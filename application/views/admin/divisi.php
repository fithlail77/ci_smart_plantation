<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Divisi
            <small>Divisi List Data</small>
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
							<button type="button" class="btn btn-success btn-md-left" data-toggle="modal" data-target="#addDivisiModal">
								<i class="zmdi zmdi-plus"></i>Add divisi
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
												<th width="80px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
					  <?php $no=0;
					  		foreach($divisi as $div): $no++;?>
					  <tr>
	  					<td><?= $no;?></td>
						<td><?= $div->company;?></td>
						<td><?= $div->estate_name;?></td>
						<td><?= $div->division;?></td>
						<td>
							<div class="table-data-feature">
								<div class="table-data-feature">
								<button class="item" title="Edit" data-toggle="modal" data-target="#editDivisiModal<?= $div->division_id;?>" >
									<i class="fa fa-pencil"></i>
								</button>
								<button class="item" data-toggle="tooltip" title="Delete">
									<a href="#!" onclick="deleteConfirm('<?= base_url('estate/delDivisi/'. $div->division_id);?>')" >
									<i class="fa fa-trash-o" style="color:black"></i></a>
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

      <!-- modal addDivisi -->
		<div class="modal fade" id="addDivisiModal" tabindex="-1" role="dialog" aria-labelledby="addDivisiModal" aria-hidden="true">
			<div class="modal-dialog modal-md" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="addEstateModal">Tambah Divisi</h4>
					</div>
					<div class="modal-body">
						<div class="login-form">
							<form action="<?= base_url('divisi/addDivisi');?>" method="post">
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
									<label>Estate</label>
									<select class="form-control" name="estate_id" id="estate_id" value="<?= set_value('estate_id');?>" required>
										<option value="">Select..</option>
										<?php foreach($estate as $est):?>
										<option value="<?= $est->estate_name;?>"><?= $est->estate_name;?></option>
					  					<?php endforeach;?>
									</select>
								</div>
								<div class="form-group">
									<label>Divisi</label>
									<input class="form-control" type="text" name="division" id="division" placeholder="Divisi" required>
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
		<!-- end modal addDivisi -->

		<!-- modal editEstate -->
		<?php $no = 0;
			foreach($divisi as $div): $no++;?>
		<div class="modal fade" id="editDivisiModal<?= $div->division_id;?>" tabindex="-1" role="dialog" aria-labelledby="editDivisiModal" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="editDivisiModal">Ubah Data Divisi</h4>
					</div>
					<div class="modal-body">
						<div class="login-form">
							<?= form_open_multipart('divisi/editDivisi');?>
								<input class="form-control" type="hidden" name="division_id" id="division_id" value="<?= $div->division_id;?>" required>
								<div class="form-group">
									<label>Perusahaan</label>
									<select class="form-control" name="branch_id" id="branch_id" required>
										<option value="<?= $div->company;?>"> <?= $div->company;?></option>
										<?php foreach($branch as $val):?>
										<option value="<?= $val->name;?>"><?= $val->name;?></option>
					  					<?php endforeach;?>
									</select>
								</div>
								<div class="form-group">
									<label>Nama Estate</label>
									<select class="form-control" name="estate_name" id="estate_name" required>
										<option value="<?= $div->estate_name;?>"> <?= $div->estate_name;?></option>
										<?php foreach($estate as $est):?>
										<option value="<?= $est->estate_name;?>"><?= $est->estate_name;?></option>
					  					<?php endforeach;?>
									</select>
								</div>
								<div class="form-group">
									<label>Divisi</label>
									<input class="form-control" type="text" name="division" id="division" placeholder="Divisi" value="<?= $div->division;?>" required>
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
	<!-- end modal editEstate -->	