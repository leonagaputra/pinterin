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
        <div class="col-md-12">
            <div class="box box-primary color-palette-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Geographic Dashboard </h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div id="map" style="width:100%;height:200px;"></div>
                </div>
            </div>
        </div>        
    </div>
    
    <div class="row">        
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
    <!-- /.row -->
    <!-- Main row -->
    <!-- Your Page Content Here -->

</section>
<script>
function pieChart(){
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
        ?>
        var PieData = [
            <?php
                
                $i = 0;
                $str = "";
                foreach($sd as $obj){
                    $str .= "{";
                        $str .= "value:\"".$obj->JML."\",";
                        $str .= "color:\"".$colors[$i]['COLOR']."\",";
                        $str .= "highlight:\"".$colors[$i]['HIGHLIGHT']."\",";
                        $str .= "label:\"".$obj->USIA." tahun\"";
                    $str .= "}";
                    $i++;
                    if($i < count($sd)) $str .= ",";
                }
                echo $str;
                
            ?>
          
        ];
        var PieDataSMP = [
            <?php
                
                $i = 0;
                $str = "";
                foreach($smp as $obj){
                    $str .= "{";
                        $str .= "value:\"".$obj->JML."\",";
                        $str .= "color:\"".$colors[$i]['COLOR']."\",";
                        $str .= "highlight:\"".$colors[$i]['HIGHLIGHT']."\",";
                        $str .= "label:\"".$obj->USIA." tahun\"";
                    $str .= "}";
                    $i++;
                    if($i < count($smp)) $str .= ",";
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
}

function addMarkers(){
}
</script>