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
            <div class="col-md-6">
              <!-- AREA CHART -->
              <?php foreach($chartch as $chart) {
                        $ch_estate[] = $chart->ch_estate;
                        $ch[] = $chart->ch;
                    };
                    ?>
                <div class="box box-success">
                  <div class="box-header with-border">
                    <h3 class="box-title">Grafik Curah Hujan - <?php echo $chart->date; ?></h3>
                    <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                  </div>
                  <div class="box-body">
                    <div class="chart">
                      <canvas id="barChart" style="height:230px"></canvas>
                    </div>
                  </div><!-- /.box-body -->
                </div><!-- /.box -->
              </div>
            </div>
          </div>
        </section>
</div><!-- /.content-wrapper -->
    <!-- jQuery 2.1.4 -->
    <script src="<?= base_url('assets/');?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?= base_url('assets/');?>bootstrap/js/bootstrap.min.js"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="<?= base_url('assets/');?>plugins/chartjs/Chart.min.js"></script>
    <!-- FastClick -->
    <script src="<?= base_url('assets/');?>plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/');?>dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url('assets/');?>dist/js/demo.js"></script>
    <!-- page script -->

    <script>
      $(function () {
        /* ChartJS
         * -------
         * Here we will create a few charts using ChartJS
         */

        //-------------
        //- BAR CHART -
        //-------------
        var barChartCanvas = $("#barChart").get(0).getContext("2d");
        var barChart = new Chart(barChartCanvas);
        var barChartData = {
          labels: <?php echo json_encode($ch_estate); ?>,
          datasets: [
            {
              label: "Curah Hujan Daily",
              fillColor: "rgba(32,178,170, 1)",
              strokeColor: "rgba(32,178,170, 1)",
              pointColor: "rgba(32,178,170, 1)",
              pointStrokeColor: "#c1c7d1",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(220,220,220,1)",
              data: <?php echo json_encode($ch); ?>
            }
          ]
        };
        barChartData.datasets.fillColor = "#00a65a";
        barChartData.datasets.strokeColor = "#00a65a";
        barChartData.datasets.pointColor = "#00a65a";
        var barChartOptions = {
          //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
          scaleBeginAtZero: true,
          //Boolean - Whether grid lines are shown across the chart
          scaleShowGridLines: true,
          //String - Colour of the grid lines
          scaleGridLineColor: "rgba(0,0,0,.05)",
          //Number - Width of the grid lines
          scaleGridLineWidth: 1,
          //Boolean - Whether to show horizontal lines (except X axis)
          scaleShowHorizontalLines: true,
          //Boolean - Whether to show vertical lines (except Y axis)
          scaleShowVerticalLines: true,
          //Boolean - If there is a stroke on each bar
          barShowStroke: true,
          //Number - Pixel width of the bar stroke
          barStrokeWidth: 2,
          //Number - Spacing between each of the X value sets
          barValueSpacing: 5,
          //Number - Spacing between data sets within X values
          barDatasetSpacing: 1,
          //String - A legend template
          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
          //Boolean - whether to make the chart responsive
          responsive: true,
          maintainAspectRatio: true
        };

        barChartOptions.datasetFill = false;
        barChart.Bar(barChartData, barChartOptions);
      });
    </script>