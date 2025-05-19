function generateChart() {

    const database1 = $('#database1').val();
    const table1 = $('#table1').val();
    const xaxis1 = $('#xaxis1').val();
    const yaxis1 = $('#yaxis1').val();
    const stationId1 = $('#stationId1').val();
const stationsel1 = $('#stationsel1').val();
	

    const database2 = $('#database2').val();
    const table2 = $('#table2').val();
    const xaxis2 = $('#xaxis2').val();
    const yaxis2 = $('#yaxis2').val();
    const stationId2 = $('#stationId2').val();
 const stationsel2 = $('#stationsel2').val();
    
	
	const database3 = $('#database3').val();
    const table3 = $('#table3').val();
    const xaxis3 = $('#xaxis3').val();
    const yaxis3 = $('#yaxis3').val();
    const stationId3 = $('#stationId3').val();
const stationsel3 = $('#stationsel3').val();

    const database4 = $('#database4').val();
    const table4 = $('#table4').val();
    const xaxis4 = $('#xaxis4').val();
    const yaxis4 = $('#yaxis4').val();
    const stationId4 = $('#stationId4').val();
 const stationsel4 = $('#stationsel4').val();
 
    const startDate = $('#startDate').val();
    const endDate = $('#endDate').val();
	 const min = $('#min').val();
    const max = $('#max').val();
	
    $.get(`fetch_data.php?getData=true&database1=${database1}&table1=${table1}&xaxis1=${xaxis1}&yaxis1=${yaxis1}&stationId1=${stationId1}&stationsel1=${stationsel1}&database2=${database2}&table2=${table2}&xaxis2=${xaxis2}&yaxis2=${yaxis2}&stationId2=${stationId2}&stationsel2=${stationsel2}&database3=${database3}&table3=${table3}&xaxis3=${xaxis3}&yaxis3=${yaxis3}&stationId3=${stationId3}&stationsel3=${stationsel3}&database4=${database4}&table4=${table4}&xaxis4=${xaxis4}&yaxis4=${yaxis4}&stationId4=${stationId4}&stationsel4=${stationsel4}&startDate=${startDate}&endDate=${endDate}&min=${min}&max=${max}`, function (data) {
        
		const seriesData = JSON.parse(data);

        Highcharts.chart('chartContainer', {
            chart: {
                type: 'line',
                zoomType: 'x',
               panning: true, // Enables panning
        panKey: 'shift', // Press Shift key for panning
        scrollablePlotArea: {
            minWidth: 800, // Minimum width for the plot area, add horizontal scroll
            scrollPositionX: 1 // Start from the beginning of the scrollable area
        }
            },
            title: {
                text: 'Multi-Line Timeseries Graph'
            },
            xAxis: {
                type: 'datetime',
                title: {
                    text: 'Observation Time'
                },
				 scrollbar: {
            enabled: true // Adds a scrollbar to the x-axis
        }
            },
            yAxis: {
                title: {
                    text: 'Value'
                }
            },
            series: seriesData,
            legend: {
                enabled: true
            },
            credits: {
                enabled: false
            },
            exporting: {
                enabled: true
            },
            plotOptions: {
                series: {
                    marker: {
                        enabled: true
                    }
                }
            },
            tooltip: {
                shared: true,
                crosshairs: true
            },
            resetZoomButton: {
                position: {
                    align: 'right',
                    verticalAlign: 'top',
                    x: -10,
                    y: 10
                },
                relativeTo: 'chart'
            }
        });
    });
}
