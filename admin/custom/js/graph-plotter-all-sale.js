'use strict';

$(document).ready(function(){

   
    $.ajax({
      //  url: "./data/apis/dashboard/json-array-all-sales.php",
      method: "GET",
      dataType: "json",
      success: function(response){
      	var d=new Date();
      	var year=d.getFullYear();
      	var new_yr;
      	var month=d.getMonth()+1;
      	if(month<10){
      		var new_yr="0"+month+"-"+year;
      	}else{
      		var new_yr=""+month+"-"+year;
      	}
      	
        //console.log(response);
       var  lineChartData=[{
            label: new_yr,
            data:response,
            color: "#fff"
        }
        ];

         var lineChartOptions = {
        series: {
            lines: {
                show: true,
                barWidth: 0.05,
                fill: 0
            }
        },
        shadowSize: 0.1,
        grid : {
            borderWidth: 1,
            borderColor: 'rgba(255,255,255,0.1)',
            show : true,
            hoverable : true,
            clickable : true
        },
        yaxis: {
            tickColor: 'rgba(255,255,255,0.1)',
            tickDecimals: 0,
            font: {
                lineHeight: 13,
                style: 'normal',
                color: 'rgba(255,255,255,0.75)',
                size: 11
            },
            shadowSize: 0
        },

        xaxis: {
            tickColor: 'rgba(255,255,255,0.1)',
            tickDecimals: 0,
            font: {
                lineHeight: 13,
                style: 'normal',
                color: 'rgba(255,255,255,0.75)',
                size: 11
            },
            shadowSize: 0
        },
        legend:{
            container: '.flot-chart-legends--line',
            backgroundOpacity: 0.5,
            noColumns: 0,
            lineWidth: 0,
            labelBoxBorderColor: 'rgba(255,255,255,0)'
        }
    };

    // Create chart
    if ($('.flot-line')[0]) {
        $.plot($('.flot-line'), lineChartData, lineChartOptions);
    }
      }
  });


    // Chart Options
   
});
