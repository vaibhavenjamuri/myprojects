<!DOCTYPE html>
<html>
<head>
    <title>Highcharts Stacked Bar Chart</title>
	<link rel="stylesheet" type="text/css" href="bootstrap-4.0.0/dist/css/bootstrap.min.css" />
   <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/bubble.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://code.highcharts.com/highcharts-more.js"></script>
   <script src="https://code.highcharts.com/modules/xrange.js"></script>
</head>
<body>
<a href="jelly.php">WebSite</a>
<div class="container-fluid">
    <div class="row">
<div class="col-md-6" id="container1" style="width:100%; height:400px;"></div>
<div class="col-md-6" id="container5" style="width:100%; height:400px;"></div>
</div>
 <div class="row">
<div class="col-md-12" id="container3" style="width:100%; height:800px;"></div>
</div>
<div class="row">
<div class="col-md-12" id="container4" style="width:100%; height:800px;"></div>
</div>

<div class="row">
<div class="col-md-6" id="container2" style="width:100%; height:800px;"></div>
<div class="col-md-6" id="container6" style="width:100%; height:800px;"></div>
</div>
<div class="row">
<div class="col-md-12" id="container7" style="width:100%; height:800px;"></div>

</div>
<div class="row">
<div class="col-md-12" id="container8" style="width:100%; height:800px;"></div>

</div>
<div class="row">
<div class="col-md-12" id="container9" style="width:100%; height:800px;"></div>

</div>
<div class="row">
<div class="col-md-12" id="container10" style="width:100%; height:800px;"></div>
<div style="text-align: center; font-family: sans-serif; font-size: 14px;width: 50%;margin: auto;">
  <span style="display: inline-block; width: 18px; height: 18px; background-color: orange; border-radius: 3px; margin-right: 6px; vertical-align: middle;"></span>
  1980–2015 Longitude Range

  <span style="display: inline-block; width: 18px; height: 18px; background-color: blue; border-radius: 3px; margin-left: 25px; margin-right: 6px; vertical-align: middle;"></span>
  2015–2025 Longitude Range

  <svg width="20" height="20" style="margin-left: 25px; margin-right: 6px; vertical-align: middle;">
    <circle cx="10" cy="10" r="6" fill="#66ccff" stroke="#00aaff" stroke-width="2"  />
  </svg>
  Longitude Observations
</div>
</div>
<div class="row">
<div id="container11" style="width:100%; height:800px;"></div>

<!-- Custom Static Legend -->
<div style="text-align: center; font-family: sans-serif; font-size: 14px;width: 50%;margin: auto;">
  <span style="display: inline-block; width: 18px; height: 18px; background-color: orange; border-radius: 3px; margin-right: 6px; vertical-align: middle;"></span>
  1980–2015 Latitude Range

  <span style="display: inline-block; width: 18px; height: 18px; background-color: blue; border-radius: 3px; margin-left: 25px; margin-right: 6px; vertical-align: middle;"></span>
  2015–2025 Latitude Range

  <svg width="20" height="20" style="margin-left: 25px; margin-right: 6px; vertical-align: middle;">
    <circle cx="10" cy="10" r="6" fill="#66ccff" stroke="#00aaff" stroke-width="2"  />
  </svg>
  Latitude Observations
</div>
</div>
</div>
      
  

  

</div>
</div>
<script>
    $(document).ready(function() {
        // Fetch data from the backend
		
		
		
		
		
        $.getJSON('chart-data/chart-1.php', function(response) {
            // Function to compute total for each stack
            function computeStackTotals(series, categories) {
                let totals = categories.map((_, index) => 0);  // Initialize array of 0s

                // Add up all the series data for each category (month)
                series.forEach(serie => {
                    serie.data.forEach((value, index) => {
                        totals[index] += value;
                    });
                });

                return totals;
            }

            // Compute totals for sorting
            let totals = computeStackTotals(response.series, response.categories);

            // Sort categories and series based on total value
            let sortedIndices = totals
                .map((total, index) => ({ total, index }))  // Create an array of {total, index}
                .sort((a, b) => b.total - a.total)  // Sort descending by total value
                .map(item => item.index);  // Extract the original indices in sorted order

            // Reorder categories and series data
            let sortedCategories = sortedIndices.map(i => response.categories[i]);
            let sortedSeries = response.series.map(serie => ({
                name: serie.name,
                data: sortedIndices.map(i => serie.data[i])
            }));

            Highcharts.chart('container1', {
                chart: {
                    type: 'column'  // For vertical stacked bar, use 'column'
                },
                title: {
                    text: 'Monthly Frequency of Type of Occurrence (Sorted by Total)'
                },
                xAxis: {
                    categories: sortedCategories,  // Sorted months
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Frequency'
                    },
                    stackLabels: {
                        enabled: true,  // Enable total on top of stacks
                        style: {
                            fontWeight: 'bold',
                            color: ( // theme
                                Highcharts.defaultOptions.title.style &&
                                Highcharts.defaultOptions.title.style.color
                            ) || 'gray'
                        },
                        formatter: function () {
                            return this.total;  // Display total value
                        }
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y} occurrences</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        stacking: 'normal',  // Enable stacking
                        dataLabels: {
                            enabled: true
                        }
                    }
                },
                series: sortedSeries  // Use sorted data for series
            });
			
			
			
        });
		
		
		$.getJSON('chart-data/chart-2.php', function(response) {
            Highcharts.chart('container2', {
                chart: {
                    type: 'column'  // For vertical stacked bar, use 'column'
                },
                title: {
                    text: 'Frequency of Type of Occurrence by State (Sorted by Total)'
                },
                xAxis: {
                    categories: response.categories,  // Sorted states
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Frequency'
                    },
                    stackLabels: {
                        enabled: true,  // Enable total on top of stacks
                        style: {
                            fontWeight: 'bold',
                            color: ( // theme
                                Highcharts.defaultOptions.title.style &&
                                Highcharts.defaultOptions.title.style.color
                            ) || 'gray'
                        },
                        formatter: function () {
                            return this.total;  // Display total value
                        }
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y} occurrences</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        stacking: 'normal',  // Enable stacking
                        dataLabels: {
                            enabled: true
                        }
                    }
                },
                series: response.series  // Use sorted data for series
            });
        });
		
		
		
		  $.getJSON('chart-data/chart-3.php', function(response) {
			  console.log(response);
            // Function to compute total for each stack
            function computeStackTotals(series, categories) {
                let totals = categories.map((_, index) => 0);  // Initialize array of 0s

                // Add up all the series data for each category (month)
                series.forEach(serie => {
                    serie.data.forEach((value, index) => {
                        totals[index] += value;
                    });
                });

                return totals;
            }

            // Compute totals for sorting
            let totals = computeStackTotals(response.series, response.categories);

            // Sort categories and series based on total value
            let sortedIndices = totals
                .map((total, index) => ({ total, index }))  // Create an array of {total, index}
                .sort((a, b) => b.total - a.total)  // Sort descending by total value
                .map(item => item.index);  // Extract the original indices in sorted order

            // Reorder categories and series data
            let sortedCategories = sortedIndices.map(i => response.categories[i]);
            let sortedSeries = response.series.map(serie => ({
                name: serie.name,
                data: sortedIndices.map(i => serie.data[i])
            }));

            Highcharts.chart('container3', {
                chart: {
                    type: 'column'  // For vertical stacked bar, use 'column'
                },
                title: {
                    text: 'Monthly Frequency of Type of Occurrence (Sorted by Total)'
                },
                xAxis: {
                    categories: sortedCategories,  // Sorted months
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Frequency'
                    },
                    stackLabels: {
                        enabled: true,  // Enable total on top of stacks
                        style: {
                            fontWeight: 'bold',
                            color: ( // theme
                                Highcharts.defaultOptions.title.style &&
                                Highcharts.defaultOptions.title.style.color
                            ) || 'gray'
                        },
                        formatter: function () {
                            return this.total;  // Display total value
                        }
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y} occurrences</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        stacking: 'normal',  // Enable stacking
                        dataLabels: {
                            enabled: true
                        }
                    }
                },
                series: sortedSeries  // Use sorted data for series
            });
			
			
			
        });
		
				$.getJSON('chart-data/chart-4.php', function(response) {
            Highcharts.chart('container4', {
                chart: {
                    type: 'column'  // For vertical stacked bar, use 'column'
                },
                title: {
                    text: 'Frequency of Type of Occurrence by Species (Sorted by Total)'
                },
                xAxis: {
                    categories: response.categories,  // Sorted states
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Frequency'
                    },
                    stackLabels: {
                        enabled: true,  // Enable total on top of stacks
                        style: {
                            fontWeight: 'bold',
                            color: ( // theme
                                Highcharts.defaultOptions.title.style &&
                                Highcharts.defaultOptions.title.style.color
                            ) || 'gray'
                        },
                        formatter: function () {
                            return this.total;  // Display total value
                        }
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y} occurrences</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        stacking: 'normal',  // Enable stacking
                        dataLabels: {
                            enabled: true
                        }
                    }
                },
                series: response.series  // Use sorted data for series
            });
        });
		
			$.getJSON('chart-data/chart-5.php', function(response) {
            Highcharts.chart('container5', {
                chart: {
                    type: 'column'  // For vertical stacked bar, use 'column'
                },
                title: {
                    text: 'Frequency of Type of Occurrence by Species (Sorted by Total)'
                },
                xAxis: {
                    categories: response.categories,  // Sorted states
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Frequency'
                    },
                    stackLabels: {
                        enabled: true,  // Enable total on top of stacks
                        style: {
                            fontWeight: 'bold',
                            color: ( // theme
                                Highcharts.defaultOptions.title.style &&
                                Highcharts.defaultOptions.title.style.color
                            ) || 'gray'
                        },
                        formatter: function () {
                            return this.total;  // Display total value
                        }
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y} occurrences</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        stacking: 'normal',  // Enable stacking
                        dataLabels: {
                            enabled: true
                        }
                    }
                },
                series: response.series  // Use sorted data for series
            });
        });
		
					$.getJSON('chart-data/chart-6.php', function(response) {
            Highcharts.chart('container6', {
                chart: {
                    type: 'column'  // For vertical stacked bar, use 'column'
                },
                title: {
                    text: 'Frequency of Type of Occurrence in East coast, west coast, islands (andaman nicobar and Lakshadweep)'
                },
                xAxis: {
                    categories: response.categories,  // Sorted states
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Frequency'
                    },
                    stackLabels: {
                        enabled: true,  // Enable total on top of stacks
                        style: {
                            fontWeight: 'bold',
                            color: ( // theme
                                Highcharts.defaultOptions.title.style &&
                                Highcharts.defaultOptions.title.style.color
                            ) || 'gray'
                        },
                        formatter: function () {
                            return this.total;  // Display total value
                        }
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y} occurrences</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        stacking: 'normal',  // Enable stacking
                        dataLabels: {
                            enabled: true
                        }
                    }
                },
                series: response.series  // Use sorted data for series
            });
        });
		
		
		// $.getJSON('chart-data/chart-7.php', function(data) {
			// console.log(data);
			// data.series.sort((a, b) => a.name.localeCompare(b.name));
               // Highcharts.chart('container7', {
                        // chart: {
                            // type: 'column'
                        // },
                        // title: {
                            // text: 'State-wise Species Count'
                        // },
                        // xAxis: {
                            // categories: data.states,  // Set the states on the X-axis
                            // title: {
                                // text: 'States'
                            // }
                        // },
                        // yAxis: {
                            // min: 0,
                            // title: {
                                // text: 'Species Count'
                            // },
                            // stackLabels: {
                                // enabled: true,
                                // style: {
                                    // fontWeight: 'bold',
                                    
									// //color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
									
									// color: ( // theme
                                // Highcharts.defaultOptions.title.style &&
                                // Highcharts.defaultOptions.title.style.color
                            // ) || 'gray'
                                // }
                            // }
                        // },
                        // // legend: {
                            // // align: 'right',
                            // // //x: -20,
                            // // verticalAlign: 'bottom',
                            // // //y: 25,
                            // // floating: true,
                            // // backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
                            // // borderColor: '#CCC',
                            // // borderWidth: 1,
                            // // shadow: false
                        // // },
                        // tooltip: {
                            // headerFormat: '<b>{point.x}</b><br/>',
                            // pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}',  // Show species name and count in the tooltip
                            // formatter: function() {
                                // if (this.y !== null) {
                                    // return '<b>' + this.x + '</b><br/>' + this.series.name + ': ' + this.y;
                                // }
                                // return false;
                            // }
                        // },
                        // plotOptions: {
                            // column: {
                                // stacking: 'normal',  // Stack the species counts
                                // dataLabels: {
                                    // enabled: true,
                                    // formatter: function() {
                                        // // Show data labels only if the count is greater than 0
                                        // if (this.y !== null) {
                                            // return this.y;
                                        // }
                                        // return null;
                                    // }
                                // }
                            // }
                        // },
                        // series: data.series  // Series data for species per state
                    // });
		// });
		
		
	let isMonthlyView = false; // Track whether we’re in monthly view or state view
let mainCategories, mainSeriesData, monthlySeriesData; // Store main and monthly data

// Fetch initial data and render chart
$.getJSON('chart-data/chart-8.php', function(data) {
    // Store the initial state categories and series data for the main chart
    mainCategories = data.states;
    mainSeriesData = data.series;
    monthlySeriesData = data.monthlySeries;
	pieData=data.pieData;

    // Render the main chart with state-wise data
    renderChart('State-wise Species Count', mainCategories, mainSeriesData);
});

// Function to render chart with specified title, categories, and series data
function renderChart(title, categories, seriesData) {
    // Highcharts.chart('container8', {
        // chart: {
            // type: 'column',
            // events: {
                // click: function () {
                    // if (isMonthlyView) {
                        // // Switch back to the main state-wise view
                        // isMonthlyView = false;
                        // renderChart('State-wise Species Count', mainCategories, mainSeriesData);
                    // }
                // }
            // }
        // },
        // title: {
            // text: title
        // },
        // xAxis: {
            // categories: categories,  // Set the categories (either states or months)
            // title: {
                // text: isMonthlyView ? 'Months' : 'States'
            // }
        // },
        // yAxis: {
            // min: 0,
            // title: {
                // text: 'Number of times occurred'
            // },
            // stackLabels: {
                // enabled: false,
                // style: {
                    // fontWeight: 'bold',
                    // color: (Highcharts.defaultOptions.title.style && Highcharts.defaultOptions.title.style.color) || 'gray'
                // }
            // }
        // },
        // tooltip: {
            // formatter: function () {
                // // let tooltip = '<b>' + this.x + '</b><br/>';
				// let tooltip = '';

                // this.points.forEach(point => {
					// if(point.y>0){
                    // tooltip += point.series.name + ': ' + point.y + '<br/>';
					// }
                // });
                // tooltip += '<b>Total: ' + this.points[0].total + '</b>';
                // return tooltip;
            // },
            // shared: true
        // },
        // plotOptions: {
            // column: {
                // stacking: 'normal',
                // dataLabels: {
                    // enabled: true,
                    // formatter: function() {
                        // return this.y !== 0 ? this.y : null;
                    // }
                // }
            // },
            // series: {
                // cursor: 'pointer',
                // point: {
                    // events: {
                        // click: function() {
                            // if (!isMonthlyView) {
                                // // On click, show monthly data for the clicked state
                                // let state = this.category;
                                // if (monthlySeriesData[state]) {
                                    // isMonthlyView = true;
                                    // renderChart('Monthly Species Count for ' + state, ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'], monthlySeriesData[state]);
                                // }
                            // }
                        // }
                    // }
                // }
            // }
        // },
        // series: seriesData
    // });
	 Object.keys(pieData).forEach((state, index) => {
            const chartId = `pie-chart-${index}`;
            
            // Create a div for each pie chart
            const chartDiv = document.createElement('div');
            chartDiv.id = chartId;
            chartDiv.style.width = '600px';
            chartDiv.style.height = '500px';
            chartDiv.style.display = 'inline-block';
            chartDiv.style.margin = '10px';
            container7.appendChild(chartDiv);
	Highcharts.chart(chartId, {
                chart: {
                    type: 'pie'
                },
                title: {
                    text: `Species Distribution - ${state}`
                },
                tooltip: {
                    pointFormat: '{seriesData.name}: <b>{point.y}</b>'
                },
                plotOptions: {
                    pie: {
						size: '50%',
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.y}'
                        }
                    }
                },
                series: [{
                    name: 'Count',
                    colorByPoint: true,
                    data: pieData[state]
                }]
            });
	 });
}


// fetch('chart-data/chart-9.php') // your PHP file
  // .then(response => response.json())
  // .then(result => {
    // const categories = result.categories;
    // const ranges = result.ranges;

    // Highcharts.chart('container9', {
      // chart: {
        // type: 'columnrange',
        // inverted: true  // So species on X, latitudes on Y
      // },
      // title: {
        // text: 'Latitude Range per Species'
      // },
      // xAxis: {
        // categories: categories,
        // title: { text: 'Species' }
      // },
      // yAxis: {
        // title: { text: 'Latitude' }
      // },
      // tooltip: {
        // formatter: function () {
          // return `<b>${categories[this.point.x]}</b><br>Min: ${this.point.low}<br>Max: ${this.point.high}`;
        // }
      // },
      // series: [{
        // name: 'Latitude Range',
        // data: ranges
      // }]
    // });
  // });

fetch('chart-data/chart-10.php') // Replace with your PHP file path
  .then(res => res.json())
  .then(data => {
Highcharts.chart('container10', {
  chart: {
    zoomType: 'xy'
  },
  title: {
    text: 'Species longitude Ranges and Observations'
  },
  xAxis: {
    title: { text: 'longitude' },
    min: 60,
    max: 100
  },
  yAxis: {
    title: { text: 'Species' },
    categories: data.categories,
    reversed: true
  },
  tooltip: {
    formatter: function () {
      if (this.series.type === 'xrange') {
        return `<b>${this.point.species}</b><br>Range: ${this.point.x}° to ${this.point.x2}°<br>Period: ${this.point.rangeLabel}`;
      } else {
        return `<b>${this.point.species}</b><br>longitude: ${this.x}°<br>Year: ${this.point.year}`;
      }
    }
  },
  legend: {
    enabled: false
  },
 plotOptions: {
        xrange: {
         pointHeight :7,
		  pointWidth :7
        }
      },
  series: [
    {
      type: 'xrange',
      name: '1980–2015',
      data: data.xrange.filter(d => d.rangeLabel === '1980–2015'),
      color: 'blue',
      showInLegend: false
    },
    {
      type: 'xrange',
      name: '2015–2025',
      data: data.xrange.filter(d => d.rangeLabel === '2015–2025'),
      color: 'orange',
      showInLegend: false
    },
    {
      type: 'bubble',
      name: 'longitude Observations',
      data: data.bubbles,
      minSize: 9,
      maxSize: 9,
      colorKey: 'z',
      tooltip: {
        pointFormat: 'longitude: {point.x}°<br>Year: {point.year}'
      }
    }
  ]
});
  }); 
		
		
fetch('chart-data/chart-11.php') // Replace with your PHP file path
  .then(res => res.json())
  .then(data => {
Highcharts.chart('container11', {
  chart: {
    zoomType: 'xy'
  },
  title: {
    text: 'Species Latitude Ranges and Observations'
  },
  xAxis: {
    title: { text: 'Latitude' },
    min: 0,
    max: 30
  },
  yAxis: {
    title: { text: 'Species' },
    categories: data.categories,
    reversed: true
  },
  tooltip: {
    formatter: function () {
      if (this.series.type === 'xrange') {
        return `<b>${this.point.species}</b><br>Range: ${this.point.x}° to ${this.point.x2}°<br>Period: ${this.point.rangeLabel}`;
      } else {
        return `<b>${this.point.species}</b><br>Latitude: ${this.x}°<br>Year: ${this.point.year}`;
      }
    }
  },
  legend: {
    enabled: false
  },
 plotOptions: {
        xrange: {
         pointHeight :7,
		  pointWidth :7
        }
      },
  series: [
    {
      type: 'xrange',
      name: '1980–2015',
      data: data.xrange.filter(d => d.rangeLabel === '1980–2015'),
      color: 'blue',
      showInLegend: false
    },
    {
      type: 'xrange',
      name: '2015–2025',
      data: data.xrange.filter(d => d.rangeLabel === '2015–2025'),
      color: 'orange',
      showInLegend: false
    },
    {
      type: 'bubble',
      name: 'Latitude Observations',
      data: data.bubbles,
      minSize: 9,
      maxSize: 9,
      colorKey: 'z',
      tooltip: {
        pointFormat: 'Latitude: {point.x}°<br>Year: {point.year}'
      }
    }
  ]
});
  }); 
  });  
</script>   
</script>

</body>
</html>
