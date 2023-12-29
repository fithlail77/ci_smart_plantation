<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Laporan Curah Hujan<small>e-Smart Plantation</small></h1>
  </section>
  <section class="content">
    <div class="row">
    <div class="col-md-6">
    <!-- BAR CHART 1-->
        <div class="box box-primary">
          <div class="box-header with-border">
            <?php foreach($chartch as $chart) {
                  $ch_estate[] = $chart->ch_estate;
                  $ch[] = $chart->ch;
                  };
              ?>
              <h3 class="box-title">Grafik Curah Hujan - <?php echo $chart->date; ?></h3>     
          </div>
          <div class="box-body">
            <div class="chart">
               <canvas id="barChart1" style="height:250px"></canvas>
            </div>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
              <!-- BAR CHART 2-->
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title">Grafik Curah Hujan GUM Per Tahun</h3>
          </div>
          <div class="box-body">
            <?php foreach($chartchy as $chy) {
                  $chthn[] = $chy->tahun;
                  $cy[] = $chy->totalch;
                  };
            ?>
            <canvas id="barChart2" style="height:250px"></canvas>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
            </div><!-- /.col (LEFT) -->
            <div class="col-md-6">
              <!-- BAR CHART 3-->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Grafik Curah Hujan Estate Per Tahun</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="chart">
                  <?php foreach($chartsdg as $sdg) {
                        $sdg1[] = $sdg->ch_estate;
                        $sdg2[] = $sdg->totalch;
                    };
                    foreach($chartmlr as $mlr) {
                      $mlr1[] = $mlr->ch_estate;
                      $mlr2[] = $mlr->totalch;
                    };
                    foreach($charttgg as $tgg) {
                      $tgg1[] = $tgg->ch_estate;
                      $tgg2[] = $tgg->totalch;
                    };
                    foreach($chartmlu as $mlu) {
                      $mlu1[] = $mlu->ch_estate;
                      $mlu2[] = $mlu->totalch;
                    };
                    foreach($chartngr as $ngr) {
                      $ngr1[] = $ngr->ch_estate;
                      $ngr2[] = $ngr->totalch;
                    };
                    foreach($chartgmo as $gmo) {
                      $gmo1[] = $gmo->ch_estate;
                      $gmo2[] = $gmo->totalch;
                    };
                    ?>
                    <canvas id="barChart3" style="height:250px"></canvas>
                    <div class="legendDiv"></div>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

              <!-- BAR CHART -->
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Bar Chart</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="chart">
                    <canvas id="barChart" style="height:250px"></canvas>
                  </div>
                </div><!-- /.box-body -->
             </div><!-- /.box -->
            </div><!-- /.col (RIGHT) -->
    </div><!-- /.row -->
    </section>
</div><!-- /.content-wrapper -->
    <script>
      $(function () {
        /* ChartJS
         * -------
         * Here we will create a few charts using ChartJS
         */

        //-------------
        //- BAR CHART -
        //-------------
        var barChartCanvas = $("#barChart1").get(0).getContext("2d");
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

        var barChartCanvas = $("#barChart2").get(0).getContext("2d");
        var barChart = new Chart(barChartCanvas);
        var barChartData = {
          labels: <?php echo json_encode($chthn); ?>,
          datasets: [
            {
              label: "Total GUM",
              fillColor: "rgba(255,160,122, 1)",
              strokeColor: "rgba(255,160,122, 1)",
              pointColor: "rgba(255,160,122, 1)",
              pointStrokeColor: "#c1c7d1",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(220,220,220,1)",
              data: <?php echo json_encode($cy); ?>
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

        var barChartCanvas = $("#barChart3").get(0).getContext("2d");
        var barChart = new Chart(barChartCanvas);
        var barChartData = {
          labels: [2019, 2020, 2021, 2022, 2023],
          datasets: [
            {
              label: "SEDADUNG",
              fillColor: "rgba(70,130,180, 1)",
              strokeColor: "rgba(70,130,180, 1)",
              pointColor: "rgba(70,130,180, 1)",
              pointStrokeColor: "#c1c7d1",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(220,220,220,1)",
              data: <?php echo json_encode($sdg2); ?>
            },
            {
              label: "MELAMOR",
              fillColor: "rgba(255,160,122, 1)",
              strokeColor: "rgba(255,160,122, 1)",
              pointColor: "rgba(255,160,122, 1)",
              pointStrokeColor: "#c1c7d1",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(220,220,220,1)",
              data: <?php echo json_encode($mlr2); ?>
            },
            {
              label: "TUGANG",
              fillColor: "rgba(165,42,42, 1)",
              strokeColor: "rgba(165,42,42, 1)",
              pointColor: "rgba(165,42,42, 1)",
              pointStrokeColor: "#c1c7d1",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(220,220,220,1)",
              data: <?php echo json_encode($tgg2); ?>
            },
            {
              label: "MULAU",
              fillColor: "rgba(218,165,32, 1)",
              strokeColor: "rgba(218,165,32, 1)",
              pointColor: "rgba(218,165,32, 1)",
              pointStrokeColor: "#c1c7d1",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(220,220,220,1)",
              data: <?php echo json_encode($mlu2); ?>
            },
            {
              label: "NGARING",
              fillColor: "rgba(30,144,255, 1)",
              strokeColor: "rgba(30,144,255, 1)",
              pointColor: "rgba(30,144,255, 1)",
              pointStrokeColor: "#c1c7d1",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(220,220,220,1)",
              data: <?php echo json_encode($ngr2); ?>
            },
            {
              label: "GMO",
              fillColor: "rgba(119,136,153, 1)",
              strokeColor: "rgba(119,136,153, 1)",
              pointColor: "rgba(119,136,153, 1)",
              pointStrokeColor: "#c1c7d1",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(220,220,220,1)",
              data: <?php echo json_encode($gmo2); ?>
            }
          ]
        };

        barChartData.datasets[1].fillColor = "#00a65a";
        barChartData.datasets[1].strokeColor = "#00a65a";
        barChartData.datasets[1].pointColor = "#00a65a";
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