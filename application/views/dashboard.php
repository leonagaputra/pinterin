<section class="content-header">
    <h1>
        Dashboard
        <small>Data Anak putus sekolah</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <!--<li class="active">Here</li>-->
    </ol>
</section>


<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary color-palette-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Geographic Dashboard </h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div id="map" style="width:100%;height:300px;"></div>
                </div>
            </div>
        </div> 
        <div class="col-md-6">            
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">User Registration VS User Upload</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="chart">
                        <canvas id="barChart" style="height:250px"></canvas>
                    </div>
                    <div class="legend">
                        <table>
                            <tr>
                                <td style="background-color:#c1c7d1;width: 20px;"></td>
                                <td>&nbsp;Jumlah User</td>
                            </tr>
                            <tr>
                                <td style="background-color:#00a65a;width: 20px;"></td>
                                <td>&nbsp;User Upload</td>
                            </tr>
                        </table>
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>

    <div class="row">        
        <div class="col-md-6">
            <!-- BAR CHART -->
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Upload Data Per Komunitas</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="chart">
                        <canvas id="barChartCommunity" style="height:250px"></canvas>
                    </div>
                    <div class="legend">
                        <table>
                            <tr>
                                <td style="background-color:#f56954;width: 20px;"></td>
                                <td>&nbsp;Sahabat Anak</td>
                            </tr>
                            <tr>
                                <td style="background-color:#00a65a;width: 20px;"></td>
                                <td>&nbsp;IAD Mengajar</td>
                            </tr>
                            <tr>
                                <td style="background-color:#f39c12;width: 20px;"></td>
                                <td>&nbsp;Netizen</td>
                            </tr>
                            <tr>
                                <td style="background-color:#00c0ef;width: 20px;"></td>
                                <td>&nbsp;Pendidik</td>
                            </tr>
                        </table>
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
        <div class="col-md-6">
            <!-- DONUT CHART -->
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Usia Anak SD Tidak Mampu</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <canvas id="pieChart" style="height:250px"></canvas>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
        
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <!-- Your Page Content Here -->
    <div class="row">        
        <div class="col-md-6">
            <!-- DONUT CHART -->
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Usia Anak SMP Tidak Mampu</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <canvas id="pieChartSMP" style="height:250px"></canvas>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</section>
<script>
    function pieChart() {
        //-------------
        //- PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
        var pieChartCanvasSMP = $("#pieChartSMP").get(0).getContext("2d");
        var pieChart = new Chart(pieChartCanvas);
        var pieChartSMP = new Chart(pieChartCanvasSMP);
        <?php
        $colors = array(
            array(
                "COLOR" => "#f56954",
                "HIGHLIGHT" => "#f56954"
            ),
            array(
                "COLOR" => "#00a65a",
                "HIGHLIGHT" => "#00a65a"
            ),
            array(
                "COLOR" => "#f39c12",
                "HIGHLIGHT" => "#f39c12"
            ),
            array(
                "COLOR" => "#00c0ef",
                "HIGHLIGHT" => "#00c0ef"
            ),
            array(
                "COLOR" => "#3c8dbc",
                "HIGHLIGHT" => "#3c8dbc"
            ),
            array(
                "COLOR" => "#d2d6de",
                "HIGHLIGHT" => "#d2d6de"
            )
        );

        $colors1 = array(
            array(
                "COLOR" => "#a56954",
                "HIGHLIGHT" => "#a56954"
            ),
            array(
                "COLOR" => "#a0a65a",
                "HIGHLIGHT" => "#a0a65a"
            ),
            array(
                "COLOR" => "#a39c12",
                "HIGHLIGHT" => "#a39c12"
            ),
            array(
                "COLOR" => "#a0c0ef",
                "HIGHLIGHT" => "#a0c0ef"
            ),
            array(
                "COLOR" => "#ac8dbc",
                "HIGHLIGHT" => "#ac8dbc"
            ),
            array(
                "COLOR" => "#a2d6de",
                "HIGHLIGHT" => "#a2d6de"
            )
        );
        ?>
        var PieData = [
            <?php
            $i = 0;
            $str = "";
            foreach ($sd as $obj) {
                $str .= "{";
                $str .= "value:\"" . $obj->JML . "\",";
                $str .= "color:\"" . $colors[$i]['COLOR'] . "\",";
                $str .= "highlight:\"" . $colors[$i]['HIGHLIGHT'] . "\",";
                $str .= "label:\"" . $obj->USIA . " tahun\"";
                $str .= "}";
                $i++;
                if ($i < count($sd))
                    $str .= ",";
            }
            echo $str;
            ?>

        ];
        var PieDataSMP = [
            <?php
            $i = 0;
            $str = "";
            foreach ($smp as $obj) {
                $str .= "{";
                $str .= "value:\"" . $obj->JML . "\",";
                $str .= "color:\"" . $colors1[$i]['COLOR'] . "\",";
                $str .= "highlight:\"" . $colors1[$i]['HIGHLIGHT'] . "\",";
                $str .= "label:\"" . $obj->USIA . " tahun\"";
                $str .= "}";
                $i++;
                if ($i < count($smp))
                    $str .= ",";
            }
            echo $str;
            ?>

        ];
        var pieOptions = {
            //Boolean - Whether we should show a stroke on each segment
            segmentShowStroke: true,
            //String - The colour of each segment stroke
            segmentStrokeColor: "#fff",
            //Number - The width of each segment stroke
            segmentStrokeWidth: 2,
            //Number - The percentage of the chart that we cut out of the middle
            percentageInnerCutout: 50, // This is 0 for Pie charts
            //Number - Amount of animation steps
            animationSteps: 100,
            //String - Animation easing effect
            animationEasing: "easeOutBounce",
            //Boolean - Whether we animate the rotation of the Doughnut
            animateRotate: true,
            //Boolean - Whether we animate scaling the Doughnut from the centre
            animateScale: false,
            //Boolean - whether to make the chart responsive to window resizing
            responsive: true,
            // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
            maintainAspectRatio: true,
            //String - A legend template
            legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
        };
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        pieChart.Doughnut(PieData, pieOptions);
        pieChartSMP.Doughnut(PieDataSMP, pieOptions);

//        var legendHolder = document.createElement('div');
//		legendHolder.innerHTML = pieChart.generateLegend();
    }

    function addFirstMarker() {
        var locations = [];
        <?php
        $str = "";
        $i = 0;
        foreach ($all as $obj) {
            $str .= "locations.push({lat:" . $obj->VLATITUDE . ",lng:" . $obj->VLONGITUDE . "});\r\n";
        }
        echo $str;
        ?>
        console.log('hore');
        //console.log(locations);
        //addMarker(locations[0]);
        for (var i = 0; i < locations.length; i++) {
            addMarker(locations[i]);
        }
    }

    function barChart() {
        //-------------
        //- BAR CHART -
        //-------------
        var areaChartData = {
            //labels: ["January", "February", "March", "April", "May", "June", "July"],
            labels: [
                <?php
                $str = "";
                $i = 0;
                foreach ($user as $obj) {
                    $str .= '"' . $obj->BULAN . '"';
                    $i++;
                    if ($i < count($user))
                        $str .= ",";
                }
                echo $str;
                ?>
            ],
            datasets: [
                {
                    label: "Jumlah User",
                    fillColor: "rgba(210, 214, 222, 1)",
                    strokeColor: "rgba(210, 214, 222, 1)",
                    pointColor: "rgba(210, 214, 222, 1)",
                    pointStrokeColor: "#c1c7d1",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    //data: [65, 59, 80, 81, 56, 55, 40]
                    data: [
                        <?php
                        $str = "";
                        $i = 0;
                        foreach ($user as $obj) {
                            //$str .= $obj->JUMLAH;
                            $str .= $obj->JML_YTD;
                            $i++;
                            if ($i < count($user))
                                $str .= ",";
                        }
                        echo $str;
                        ?>
                    ]
                }
                ,
                {
                    label: "User Upload",
                    fillColor: "#00A65A",
                    strokeColor: "#00A65A",
                    pointColor: "#00A65A",
                    pointStrokeColor: "#00A65A",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(60,141,188,1)",
                    data: [
                        <?php
                        $str = "";
                        $i = 0;
                        foreach ($user as $obj) {
                            $str .= $obj->TRX;
                            $i++;
                            if ($i < count($user))
                                $str .= ",";
                        }
                        echo $str;
                        ?>
                    ]
                }
            ]
        };
        var barChartCanvas = $("#barChart").get(0).getContext("2d");
        var barChart = new Chart(barChartCanvas);

        var barChartData = areaChartData;
//        barChartData.datasets[1].fillColor = "#00a65a";
//        barChartData.datasets[1].strokeColor = "#00a65a";
//        barChartData.datasets[1].pointColor = "#00a65a";
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
    }
    
    function barChartCommunity() {
        //-------------
        //- BAR CHART -
        //-------------
        var areaChartData = {
            //labels: ["January", "February", "March", "April", "May", "June", "July"],
            labels: [
                <?php
                $str = "";
                $i = 0;
                foreach ($community[0]->MONTHS as $obj) {
                    $str .= '"' . $obj->BULAN . '"';
                    $i++;
                    if ($i < count($community[0]->MONTHS))
                        $str .= ",";
                }
                echo $str;
                ?>
            ],
            datasets: [
                <?php
                $str = "";
                $i = 0;
                foreach($community as $obj){
                    
                    $str .= "{";
                    $str .= "label:\"".$obj->COM."\",";
                    $str .= "fillColor:\"".$color[$i]->VITEMDESC."\",";
                    $str .= "strokeColor:\"".$color[$i]->VITEMDESC."\",";
                    $str .= "pointColor:\"".$color[$i]->VITEMDESC."\",";
                    $str .= "pointStrokeColor:\"".$color[$i]->VITEMDESC."\",";
                    $str .= "pointHighlightFill:\"#fff\",";
                    $str .= "pointHighlightStroke:\"rgba(220,220,220,1)\",";
                    $str .= "data: [";
                    $j = 0;
                    foreach($obj->MONTHS as $mon){
                        $str .= $mon->JUMLAH;
                            //$str .= $obj->JML_YTD;
                            $j++;
                            if ($j < count($obj->MONTHS))
                                $str .= ",";
                    }
                    $str .= "]";
                    $str .= "}";
                    $i++;
                    if ($i < count($community))
                        $str .= ",";
                }
                echo $str;
                ?>
//                {
//                    label: "Jumlah User",
//                    fillColor: "rgba(210, 214, 222, 1)",
//                    strokeColor: "rgba(210, 214, 222, 1)",
//                    pointColor: "rgba(210, 214, 222, 1)",
//                    pointStrokeColor: "#c1c7d1",
//                    pointHighlightFill: "#fff",
//                    pointHighlightStroke: "rgba(220,220,220,1)",
//                    //data: [65, 59, 80, 81, 56, 55, 40]
//                    data: [
//                        
//                    ]
//                }                
            ]
        };
        var barChartCanvas = $("#barChartCommunity").get(0).getContext("2d");
        var barChart = new Chart(barChartCanvas);

        var barChartData = areaChartData;
//        barChartData.datasets[1].fillColor = "#00a65a";
//        barChartData.datasets[1].strokeColor = "#00a65a";
//        barChartData.datasets[1].pointColor = "#00a65a";
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
    }
</script>