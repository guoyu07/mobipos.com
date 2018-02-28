
 <?php

 
  $id=$_REQUEST['id']; 
  $name=$_REQUEST['name']; 


  ?>
       
<?php include('amchart.php'); ?>   
 
        <script>

    

            var branch=document.getElementById("branch_name").value;
            $.ajax({
            type:"GET",
            url:"./data/apis/dashboard/json-array-total-sales.php?branch="+branch,
            dataType:"json",
            success: function(response){

                var chart = AmCharts.makeChart("this_month_branch", {
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


         
           

                    
</script>
<div> <input id='branch_name' value="<?php echo $id; ?>" hidden>
<div class="row">
    <?php  include('monthly-sale.php'); ?> 
<div class="col-lg-12">
                        <div class="card">
                             <h4 class="card-header">
                              <!--  <?php echo $name; ?> <?php echo date("F Y"); ?> Sales</h4> -->
                            <div class="card-body">
                                 <div id="this_month_branch" style="width: 100%;height: 400px;"></div>
                        </div>
                               
                            </div>
                        </div>
</div>


</div>