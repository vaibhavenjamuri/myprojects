import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Chart, registerables } from 'node_modules/chart.js'
import { MasterService } from '../service/master.service';
import ChartDataLabels from 'chartjs-plugin-datalabels';
Chart.register(ChartDataLabels);
Chart.register(...registerables);
@Component({
	selector: 'app-mychart',
	templateUrl: './mychart.component.html',
	styleUrls: ['./mychart.component.css']
})
export class MychartComponent implements OnInit {
	http: HttpClient;
	constructor(private service: MasterService,private httpClient: HttpClient) { 
	this.http = httpClient;
	}
	myChart: any
	myChart2: any
	myChart3: any
	chartdata: any;
	chartdata2: any;
	chartdata3: any;
	chartdata11: any;
	chartdata22: any;
	chartdata33: any;
	labeldata: any[] = [];
	realdata: any[] = [];
	colordata: any[] = [];
	bordercolor: any[]=[];
	labeldata2: any[] = [];
	realdata2: any[] = [];
	colordata2: any[] = [];
	colordata3: any[] = [];
	bordercolor2: any[]=[];
	bordercolor3: any[]=[];
	labeldata3: any[] = [];
	realdata3: any[] = [];
	filteredUsers: any; 
    selectedYear: string = '0';
	onYearChange() {
		if (this.selectedYear) {
			this.fetchChartDataForYear(this.selectedYear);
		}
	}
	fetchChartDataForYear(year: string) {
		const apiUrl = `http://172.16.1.57/api/chart1.php?year=${year}`;
		const apiUrl1 = `http://172.16.1.57/api/chart2.php?year=${year}`;
		const apiUrl2 = `http://172.16.1.57/api/chart3.php?year=${year}`;
		this.http.get(apiUrl).subscribe((data1: any) => {
			this.chartdata11 = data1;
			if (this.myChart) {
				this.myChart.destroy(); // Destroy previous chart instance to update with new data
			}
			if (this.labeldata) {
				this.labeldata=[]; // Destroy previous chart instance to update with new data
			}
			if (this.realdata) {
				this.realdata=[]; // Destroy previous chart instance to update with new data
			}
			if(this.chartdata11!=null){
				for(let i=0; i<this.chartdata11.length ;i++){
					var r=Math.floor(Math.random()*255);
					var g=Math.floor(Math.random()*255);
					var b=Math.floor(Math.random()*255);
					this.colordata.push('rgba('+r+','+g+','+b+',0.7)');
					this.bordercolor.push('rgba('+r+','+g+','+b+',0.8)');
					this.labeldata.push(this.chartdata11[i].label);
					this.realdata.push(this.chartdata11[i].y);
				}
				this.RenderChart(this.labeldata,this.realdata,this.colordata,this.bordercolor,'bar','barchart');
			}
		});
		this.http.get(apiUrl1).subscribe((data: any) => {
			this.chartdata22 = data;
			if (this.myChart2) {
				this.myChart2.destroy(); // Destroy previous chart instance to update with new data
			}
			if (this.labeldata2) {
				this.labeldata2=[]; // Destroy previous chart instance to update with new data
			}
			if (this.realdata2) {
				this.realdata2=[]; // Destroy previous chart instance to update with new data
			}
			if(this.chartdata22!=null){
				for(let i=0; i<this.chartdata22.length ;i++){
					var r=Math.floor(Math.random()*255);
					var g=Math.floor(Math.random()*255);
					var b=Math.floor(Math.random()*255);
					this.colordata2.push('rgba('+r+','+g+','+b+',0.5)');
					this.bordercolor2.push('rgba('+r+','+g+','+b+',0.8)');
					this.labeldata2.push(this.chartdata22[i].label);
					this.realdata2.push(this.chartdata22[i].y);
				}
				this.RenderChart2(this.labeldata2,this.realdata2,this.colordata2,this.bordercolor2,'doughnut','dochart');
			}
		});
		this.http.get(apiUrl2).subscribe((data: any) => {
			this.chartdata33 = data;
			if (this.myChart3) {
				this.myChart3.destroy(); // Destroy previous chart instance to update with new data
			}
			if (this.labeldata3) {
			  this.labeldata3=[]; // Destroy previous chart instance to update with new data
			}
			if (this.realdata3) {
			  this.realdata3=[]; // Destroy previous chart instance to update with new data
			}
			if(this.chartdata3!=null){
				for(let i=0; i<this.chartdata33.length ;i++){
					var r=Math.floor(Math.random()*255);
					var g=Math.floor(Math.random()*255);
					var b=Math.floor(Math.random()*255);
					this.colordata3.push('rgba('+r+','+g+','+b+',0.5)');
					this.bordercolor3.push('rgba('+r+','+g+','+b+',0.8)');
					this.labeldata3.push(this.chartdata33[i].label);
					this.realdata3.push(this.chartdata33[i].y);
				}
				this.RenderChart3(this.labeldata3,this.realdata3,this.colordata3,this.bordercolor3,'pie','piechart');
			}
		});
	}
  
  
	generateRandomColors(count: number): string[] {
		const colors: string[] = [];
		for (let i = 0; i < count; i++) {
			const color = `rgba(${this.randomValue(0, 255)}, ${this.randomValue(0, 255)}, ${this.randomValue(0, 255)}, 0.7)`;
			colors.push(color);
		}
		return colors;
	}
	randomValue(min: number, max: number): number {
		return Math.floor(Math.random() * (max - min + 1)) + min;
	}
	ngOnInit(): void {
		this.service.Getchartinfo().subscribe(data => {
			this.chartdata = data;
			if(this.chartdata!=null){
				for(let i=0; i<this.chartdata.length ;i++){
					var r=Math.floor(Math.random()*255);
					var g=Math.floor(Math.random()*255);
					var b=Math.floor(Math.random()*255);
					this.colordata.push('rgba('+r+','+g+','+b+',0.7)');
					this.bordercolor.push('rgba('+r+','+g+','+b+',0.8)');
					this.labeldata.push(this.chartdata[i].label);
					this.realdata.push(this.chartdata[i].y);
				}
				this.RenderChart(this.labeldata,this.realdata,this.colordata,this.bordercolor,'bar','barchart');
			}
		});
		this.service.Getchartinfo2().subscribe(data => {
			this.chartdata2 = data;
			if(this.chartdata2!=null){
				for(let i=0; i<this.chartdata2.length ;i++){
					var r=Math.floor(Math.random()*255);
					var g=Math.floor(Math.random()*255);
					var b=Math.floor(Math.random()*255);
					this.colordata2.push('rgba('+r+','+g+','+b+',0.5)');
					this.bordercolor2.push('rgba('+r+','+g+','+b+',0.8)');
					this.labeldata2.push(this.chartdata2[i].label);
					this.realdata2.push(this.chartdata2[i].y);
				}
				this.RenderChart2(this.labeldata2,this.realdata2,this.colordata2,this.bordercolor2,'doughnut','dochart');
				console.log(this.realdata2);
			}
		});
		this.service.Getchartinfo3().subscribe(data => {
			this.chartdata3 = data;
			if(this.chartdata3!=null){
				for(let i=0; i<this.chartdata3.length ;i++){
					var r=Math.floor(Math.random()*255);
					var g=Math.floor(Math.random()*255);
					var b=Math.floor(Math.random()*255);
					this.colordata3.push('rgba('+r+','+g+','+b+',0.5)');
					this.bordercolor3.push('rgba('+r+','+g+','+b+',0.8)');
					this.labeldata3.push(this.chartdata3[i].label);
					this.realdata3.push(this.chartdata3[i].y);
				}
				this.RenderChart3(this.labeldata3,this.realdata3,this.colordata3,this.bordercolor,'pie','piechart');
			}
		});
	}
	RenderChart(labeldata:any,realdata:any,colordata:any,bordercolor:any,type:any,id:any) {
		this.myChart = new Chart(id, {
			type: type,
			data: {
				labels: labeldata,
				datasets: [{
					label: 'Number of Publications',
					data: realdata,
					backgroundColor: colordata,
					borderColor: bordercolor,
					borderWidth: 1
				}]
			},
			options: {
				plugins: {
					datalabels: {
						color: 'black',  // Label text color
						font: {
							size: 11         // Adjust font size
						},
						anchor: 'end',  // ✅ Position the label outside the chart
						align: 'end',   // ✅ Push label further away
						formatter: (value: number) => value  // Append % to values
					}
				}
			},
			plugins: [ChartDataLabels]  // Register the datalabels plugin
		});
	}
	RenderChart2(labeldata2:any,realdata2:any,colordata2:any,bordercolor2:any,type:any,id:any) {
		this.myChart2 = new Chart(id, {
			type: type,
			data: {
				labels: labeldata2,
				datasets: [{
					label: 'Number of Publications',
					data: realdata2,
					backgroundColor: this.colordata2,
					borderColor: this.bordercolor2,
					borderWidth: 1
				}]
			},
			options: {
				plugins: {
					datalabels: {
						color: 'black',  // Label text color
						font: {
							size: 11         // Adjust font size
						},
						anchor: 'center',  // ✅ Position the label outside the chart
						align: 'center',
						formatter: (value: number) => value   // Append % to values
					}
				}
			},
			plugins: [ChartDataLabels]  // Register the datalabels plugin
		});
	}
	RenderChart3(labeldata3:any,realdata3:any,colordata3:any,bordercolor3:any,type:any,id:any) {
		this.myChart3 = new Chart(id, {
			type: type,
			data: {
				labels: labeldata3,
				datasets: [{
					label: 'Number of Publications',
					data: realdata3,
					backgroundColor: this.colordata3,
					borderColor: this.bordercolor3,
					borderWidth: 1
				}]
			},
			options: {
				plugins: {
					datalabels: {
						color: 'black',  // Label text color
						font: {
							size: 11         // Adjust font size
						},
						anchor: 'center',  // ✅ Position the label outside the chart
						align: 'center',   // ✅ Push label further away
						offset: 2,     // ✅ Adjusts spacing from the chart
						formatter: (value: number) => value   // Append % to values
					}
				}
			},
			plugins: [ChartDataLabels]  // Register the datalabels plugin
		});
	}

}
