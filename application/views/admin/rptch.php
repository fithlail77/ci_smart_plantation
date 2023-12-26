<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Curah Hujan
            <small>Curah Hujan List Data</small>
          </h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-50">
                    <div class="box">
                        <div class="box-header">
				            <div class="margin">
                                <div class="btn-group">
                                    <input type="text" class="form-control shawCalRanges" name="rangetgl" id="rangetgl" placeholder="Pilih Range Tanggal..">
						        </div>
						        <div class="btn-group">
							        <button type="button" class="btn btn-success btn-md-left" data-toggle="modal" data-target="#addDivisiModal">
								        <i class="zmdi zmdi-plus"></i>Add divisi
							        </button>
						        </div>
					        </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</div><!-- /.content-wrapper -->

<script src="<?php echo base_url(); ?>assets/daterangepicker/daterangepicker.js"></script>
<script>
    /*******************************************/
    // Always Show Calendar on Ranges
    /*******************************************/
    $('.shawCalRanges').daterangepicker({
        // autoApply: true,

        locale: {
            format: 'YYYY-MM-DD',
            separator: " s.d "

        },
        startDate: moment().subtract(7, 'day'),

        ranges: {
            'Hari ini': [moment(), moment()],
            'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            '7 hari yang lalu': [moment().subtract(6, 'days'), moment()],
            '30 hari yang lalu': [moment().subtract(29, 'days'), moment()],
            'Bulan ini': [moment().startOf('month'), moment().endOf('month')],
            'Bulan lalu': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        alwaysShowCalendars: true,
    });
</script>