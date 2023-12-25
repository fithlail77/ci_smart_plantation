      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Estate
            <small>Estate List Data</small>
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
							<button type="button" class="btn btn-success btn-md-left" data-toggle="modal" data-target="#addEstateModal">
								<i class="zmdi zmdi-plus"></i>Tambah Estate
							</button>
						</div>
					</div>
                </div><!-- /.box-header -->
				<?= $this->session->userdata('message');?>
                <div class="box-body table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
					    <th>NO</th>
						<th>Company</th>
						<th>Kode Estate</th>
						<th>Estate</th>
						<th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
					  <?php $no=0;
					  		foreach($estate as $est): $no++;?>
					  <tr>
	  					<td><?= $no;?></td>
						<td><?= $est->company;?></td>
						<td><?= $est->estate_code;?></td>
						<td><?= $est->estate_name;?></td>
						<td>
							<div class="table-data-feature">
								<button class="item" title="Edit" data-toggle="modal" data-target="#editEstateModal<?= $est->estate_id;?>" >
									<i class="fa fa-pencil" style="color:blue"></i>
								</button>
								<button class="item" data-toggle="tooltip" title="Delete">
									<a href="#!" onclick="deleteConfirm('<?= base_url('estate/delEstate/'. $est->estate_id);?>')" >
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

		<!-- modal addEstate -->
		<div class="modal fade" id="addEstateModal" tabindex="-1" role="dialog" aria-labelledby="addEstateModal" aria-hidden="true">
			<div class="modal-dialog modal-md" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="addEstateModal">Tambah Estate</h4>
					</div>
					<div class="modal-body">
						<div class="login-form">
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
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
									<button type="submit" class="btn btn-primary">Confirm</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end modal addEstate -->

		<!-- modal editEstate -->
		<?php $no = 0;
			foreach($estate as $est): $no++;?>
		<div class="modal fade" id="editEstateModal<?= $est->estate_id;?>" tabindex="-1" role="dialog" aria-labelledby="editEstateModal" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="editEstateModal">Ubah Data Estate</h4>
					</div>
					<div class="modal-body">
						<div class="login-form">
							<?= form_open_multipart('estate/editEstate');?>
								<input class="form-control" type="hidden" name="estate_id" id="estate_id" value="<?= $est->estate_id;?>" required>
								<div class="form-group">
									<label>Perusahaan</label>
									<select class="form-control" name="branch_id" id="branch_id" required>
										<option value="<?= $est->company;?>"> <?= $est->company;?></option>
										<?php foreach($branch as $val):?>
										<option value="<?= $val->name;?>"><?= $val->name;?></option>
					  					<?php endforeach;?>
									</select>
								</div>
								<div class="form-group">
									<label>Kode Estate</label>
									<input class="form-control" type="text" name="estate_code" id="estate_code" placeholder="Kode Estate" value="<?= $est->estate_code;?>" required>
								</div>
								<div class="form-group">
									<label>Nama Estate</label>
									<input class="form-control" type="text" name="estate_name" id="estate_name" placeholder="Nama Estate" value="<?= $est->estate_name;?>" required>
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


