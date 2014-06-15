$(document).ready(function() {
var options = {
title: {text: 'Outside Temperature',},

chart: {
renderTo: 'outside_temp',
type: 'line', 
backgroundColor: 'transparent',},

xAxis: {tickInterval: 120,},

tooltip: {formatter: function() {return '<b>'+ this.series.name +'</b><br/>'+this.x +': '+ this.y;}},

series: [],}
           
$.getJSON("QI05D03.php", function(json)  {
options.xAxis.categories = json[0]['data'];
options.series[0] = json[1];
chart = new Highcharts.Chart(options);
});
});
		