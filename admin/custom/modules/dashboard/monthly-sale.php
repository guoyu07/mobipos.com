
        <script>
            $.ajax({
            type:"GET",
            url:"./data/apis/dashboard/json-array-total-sales.php?branch=0",
            dataType:"json",
            success: function(response){

              

              //  console.log(response.data);
              //  console.log(response.max_val);
                        var chart = AmCharts.makeChart("this_month", {
                "type": "serial",
                
                "dataDateFormat": "DD-MM",
                "dataProvider": response.data,
                "valueAxes": [{
                    "maximum":response.max_val,
                    "minimum": 0,
                    "axisAlpha": 0,
                    "guides": [{
                        "fillAlpha": 0.1,
                        "fillColor": "#CC0000",
                        "lineAlpha": 0,
                        "toValue": 120,
                        "value": 0
                    }, {
                        "fillAlpha": 0.1,
                        "fillColor": "#0000cc",
                        "lineAlpha": 0,
                        "toValue": 200,
                        "value": 120
                    }]
                }],
                "graphs": [{
                    "bullet": "round",
                    "dashLength": 4,
                    "valueField": "total"
                }],
                "chartCursor": {
                    "cursorAlpha": 0,
                    "zoomable":false,
                    "valueZoomable":true
                },
                "categoryField": "day",
                "categoryAxis": {
                    "parseDates": false
                },
                "valueScrollbar":{

                }
            });

            }

        });

              $.ajax({
            type:"GET",
            url:"./data/apis/dashboard/json-array-12-months.php?branch=0",
            dataType:"json",
            success: function(response){

              
              //  console.log(response);
                AmCharts.ready(function () {
                // SERIAL CHART
                chart = new AmCharts.AmSerialChart();
                chart.dataProvider = response;
                chart.categoryField ="month";
                chart.startDuration = 1;
                chart.depth3D = 50;
                chart.angle = 30;
                chart.marginRight = -45;

                // AXES
                // category
                var categoryAxis = chart.categoryAxis;
                categoryAxis.gridAlpha = 0;
                categoryAxis.axisAlpha = 0;
                categoryAxis.gridPosition = "start";

                // value
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.axisAlpha = 0;
                valueAxis.gridAlpha = 0;
                chart.addValueAxis(valueAxis);

                // GRAPH
                var graph = new AmCharts.AmGraph();
                graph.valueField = "total";
                graph.colorField = "color";
                graph.balloonText = "<b>[[category]]: [[value]]</b>";
                graph.type = "column";
                graph.lineAlpha = 0.5;
                graph.lineColor = "#FFFFFF";
                graph.topRadius = 1;
                graph.fillAlphas = 0.9;
                chart.addGraph(graph);

                // CURSOR
                var chartCursor = new AmCharts.ChartCursor();
                chartCursor.cursorAlpha = 0;
                chartCursor.zoomable = false;
                chartCursor.categoryBalloonEnabled = false;
                chartCursor.valueLineEnabled = true;
                chartCursor.valueLineBalloonEnabled = true;
                chartCursor.valueLineAlpha = 1;
                chart.addChartCursor(chartCursor);

                chart.creditsPosition = "top-right";

                // WRITE
                chart.write("chartdiv_12_months");
            });

            }

        });



        
</script>