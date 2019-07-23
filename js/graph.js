function plotGraph($COIN_NAME=KEG) {
  var dps = [];
  var chart = new CanvasJS.Chart("chartContainer", {
	  zoomEnabled: true,
	  exportEnabled: true,
	  title: {
		  text: $COIN_NAME
	  },
	  subtitles: [{
		  text : "Try Zooming and Panning"
	  }],
	  axisX: {
		  valueFormatString: "DD MMM"
	  },
	  axisY: {
		  title: "Price",
		  includeZero: false,
		  interval: 5,
		  prefix: "$"
	  },
	  data: [{
		  type: "candlestick",
		  name: $COIN_NAME,
		  showInLegend: true,
		  yValueFormatString: "$##0.00",
		  xValueType: "dateTime",
		  dataPoints: dps
	  }]
  });
 
  $.getJSON("https://api.kex.com/v1/price/$COIN_NAME", $RESULT);
  $FIRST_TIMESTAMP =  result.timestamp;
  $TIMESTAMP_CURRENT = time();
  for (var i = 0; i < $TIMESTAMP_CURRENT i++) {
    $.getJSON('https://api.kex.com/v1/price/$COIN_NAME?ts='$FIRST_TIMESTAMP+i, $result);
		dps.push({
			x: result[i].timestamp,
			y: result[i].last
		});
	}
	chart.render();
 }
 

 
}
                  
