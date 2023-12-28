<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Laporan Curah Hujan
            <small>e-Smart Plantation</small>
          </h1>
        </section>
        <section class="content">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title"><i class="fa fa-line-chart"></i> Grafik </h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="">Pilih Estate</label>
                                    <select class="filter_nama" style="width: 150px;">
                                        <option value=""></option>
                                        <?php foreach ($estate as $est) : ?>
                                            <option value="<?= $est->estate_name; ?>"><?= $est->estate_name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="init-loading grafik" style="height:600px;width:100%;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title"><i class="fa fa-line-chart"></i> Grafik Stacked</h3>
                            </div>
                            <div class="box-body">
                                <div class="init-loading grafik_stacked" style="height:640px;width:100%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        
</div><!-- /.content-wrapper -->
<script>
        var filtering = {}
        $(document).ready(function() {
            $('.filter_nama').select2({
                placeholder: "Pilih Estate",
                allowClear: true,
                theme: "classic"
            });
            filter()
            init()

        })

        function filter() {
            $('.filter_nama').change(function() {
                filtering['filter_nama'] = $(this).val();
                init()
            })
        }

        function init() {
            $(".init-loading").html("<i class='fa fa-spin fa-refresh'></i> &nbsp;&nbsp;&nbsp;Memuat Data ...");
            grafik()
            grafik_stacked()
        }

        function grafik() {
            $.ajax({
                type: "post",
                url: "<?php echo base_url() ?>reportch/data_grafik",
                data: filtering,
                dataType: "json",
                success: function(data) {
                    barChart(data, "grafik");
                }
            })
        }

        function grafik_stacked() {
            $.ajax({
                type: "post",
                url: "<?php echo base_url() ?>reportch/data_grafik_stack",
                data: filtering,
                dataType: "json",
                success: function(data) {
                    var app = []
                    $.each(data, function(i, el) {
                        $.each(el, function(i, ol) {
                            app.push(ol);
                        })
                    })
                    barChartStacked(app, "grafik_stacked");
                }
            })
        }

        function barChart(data, chartdiv) {
            am4core.useTheme(am4themes_animated);
            am4core.useTheme(am4themes_kelly);
            var chart = am4core.create(chartdiv, am4charts.XYChart);

            chart.data = data;
            // Create axes
            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "Estate";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 20;
            categoryAxis.renderer.inside = false;
            categoryAxis.start = 0;
            // categoryAxis.end = splitChart;

            categoryAxis.renderer.grid.template.disabled = true;

            var label = categoryAxis.renderer.labels.template;
            label.wrap = true;
            label.maxWidth = 160;
            // label.truncate = true;
            label.tooltipText = "{estate}";

            categoryAxis.events.on("sizechanged", function(ev) {
                var axis = ev.target;
                var cellWidth = axis.pixelWidth / (axis.endIndex - axis.startIndex);
                if (cellWidth < axis.renderer.labels.template.maxWidth) {
                    axis.renderer.labels.template.rotation = -75;
                    axis.renderer.labels.template.horizontalCenter = "right";
                    axis.renderer.labels.template.verticalCenter = "middle";
                } else {
                    axis.renderer.labels.template.rotation = 0;
                    axis.renderer.labels.template.horizontalCenter = "middle";
                    axis.renderer.labels.template.verticalCenter = "top";
                }
            });

            var valueAxis1 = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis1.extraMax = 0.3;
            valueAxis1.min = 0;

            var series1 = chart.series.push(new am4charts.ColumnSeries());
            series1.dataFields.valueY = "data";
            series1.dataFields.categoryX = "estate";
            series1.name = "Estate";
            series1.yAxis = valueAxis1;
            series1.columns.template.tooltipText = "{valueY.value}";
            chart.cursor = new am4charts.XYCursor();

            chart.legend = new am4charts.Legend();
            chart.legend.position = "top";
        }

        function barChartStacked(data, chartdiv) {
            var chart = am4core.create(chartdiv, am4charts.XYChart);
            chart.exporting.menu = new am4core.ExportMenu();
            chart.exporting.menu.align = "right";
            chart.exporting.menu.verticalAlign = "top";
            chart.data = data;
            chart.paddingRight = 0;
            chart.paddingLeft = 0;
            chart.paddingTop = 0;
            chart.paddingBottom = 0;
            // Create axes
            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "estate";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 20;
            categoryAxis.renderer.inside = false;
            categoryAxis.start = 0;
            // categoryAxis.end = splitChart;

            categoryAxis.renderer.grid.template.disabled = true;

            var label = categoryAxis.renderer.labels.template;
            label.wrap = true;
            label.maxWidth = 160;
            // label.truncate = true;
            label.tooltipText = "{estate}";

            categoryAxis.events.on("sizechanged", function(ev) {
                var axis = ev.target;
                var cellWidth = axis.pixelWidth / (axis.endIndex - axis.startIndex);
                if (cellWidth < axis.renderer.labels.template.maxWidth) {
                    axis.renderer.labels.template.rotation = -75;
                    axis.renderer.labels.template.horizontalCenter = "right";
                    axis.renderer.labels.template.verticalCenter = "middle";
                } else {
                    axis.renderer.labels.template.rotation = 0;
                    axis.renderer.labels.template.horizontalCenter = "middle";
                    axis.renderer.labels.template.verticalCenter = "top";
                }
            });

            var valueAxis1 = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis1.extraMax = 0.3;
            valueAxis1.min = 0;

            var series1 = chart.series.push(new am4charts.ColumnSeries());
            series1.dataFields.valueY = "data_sedadung";
            series1.dataFields.categoryX = "estate";
            series1.yAxis = valueAxis1;
            series1.name = "Sedadung";
            series1.fill = "green";
            series1.stroke = "green";
            series1.stacked = true;
            series1.columns.template.tooltipText = "{valueY.value}";

            var series1 = chart.series.push(new am4charts.ColumnSeries());
            series1.dataFields.valueY = "data_melamor";
            series1.dataFields.categoryX = "estate";
            series1.yAxis = valueAxis1;
            series1.name = "Melamor";
            series1.fill = "red";
            series1.stroke = "red";
            series1.stacked = true;
            series1.columns.template.tooltipText = "{valueY.value}";

            chart.scrollbarX = new am4charts.XYChartScrollbar();
            chart.scrollbarX.series.push(series1);
            chart.scrollbarX.parent = chart.bottomAxesContainer;

            var bullet4 = series1.bullets.push(new am4charts.CircleBullet());
            bullet4.circle.radius = 3;
            bullet4.circle.strokeWidth = 2;
            bullet4.circle.fill = am4core.color("black");


            // Add label
            var labelBullet = series1.bullets.push(new am4charts.LabelBullet());
            labelBullet.label.html = `
                <div style='background:red;color:white;padding:0px 20px;text-align:center;'>{data_sedadung}</div>
                <div style='background:green;color:white;padding:0px 20px;text-align:center;'>{data_melamor}</div>
                `;
            labelBullet.label.dy = -40;

            chart.cursor = new am4charts.XYCursor();

            chart.legend = new am4charts.Legend();
            chart.legend.position = "top";
        }
    </script>