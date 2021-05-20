<?php
 
$dataPoints = array(
	array("label"=> 1997, "y"=> 254722.1),
	array("label"=> 1998, "y"=> 292175.1),
	array("label"=> 1999, "y"=> 369565),
	array("label"=> 2000, "y"=> 284918.9),
	array("label"=> 2001, "y"=> 325574.7),
	array("label"=> 2002, "y"=> 254689.8),
	array("label"=> 2003, "y"=> 303909),
	array("label"=> 2004, "y"=> 335092.9),
	array("label"=> 2005, "y"=> 408128),
	array("label"=> 2006, "y"=> 300992.2),
	array("label"=> 2007, "y"=> 401911.5),
	array("label"=> 2008, "y"=> 299009.2),
	array("label"=> 2009, "y"=> 319814.4),
	array("label"=> 2010, "y"=> 357303.9),
	array("label"=> 2011, "y"=> 353838.9),
	array("label"=> 2012, "y"=> 288386.5),
	array("label"=> 2013, "y"=> 485058.4),
	array("label"=> 2014, "y"=> 326794.4),
	array("label"=> 2015, "y"=> 483812.3),
	array("label"=> 2016, "y"=> 254484)
);
	
?>
<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	//theme: "light2",
	title:{
		text: "Salmon Production - 1997 to 2006"
	},
	axisX:{
		crosshair: {
			enabled: true,
			snapToDataPoint: true
		}
	},
	axisY:{
		title: "in Metric Tons",
		includeZero: true,
		crosshair: {
			enabled: true,
			snapToDataPoint: true
		}
	},
	toolTip:{
		enabled: false
	},
	data: [{
		type: "area",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
<script>
window.onload = function() {
 
var dataPoints = [];
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	zoomEnabled: true,
	title: {
		text: "Pashm Price - 2017"
	},
	axisY: {
		title: "Price in USD",
		titleFontSize: 24,
		prefix: "$"
	},
	data: [{
		type: "line",
		yValueFormatString: "$#,##0.00",
		dataPoints: dataPoints
	}]
});
 
function addData(data) {
	var dps = data.price_usd;
	for (var i = 0; i < dps.length; i++) {
		dataPoints.push({
			x: new Date(dps[i][0]),
			y: dps[i][1]
		});
	}
	chart.render();
}
 
$.getJSON("https://canvasjs.com/data/gallery/php/bitcoin-price.json", addData);
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<br>
<br>
<br>
<br>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
</body>
</html>                       
