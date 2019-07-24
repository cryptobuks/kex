function plotGraph($COIN_NAME="KEG",$PERIOD=30,$UNIT="BTC") { // period = time beetween candles in mins (defult 30)
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
		  prefix: $UNIT
	  },
	  data: [{
		  type: "candlestick",
		  name: $COIN_NAME,
		  showInLegend: true,
		
		  xValueType: "dateTime",
		  dataPoints: dps
	  }]
  });
 
  $.getJSON("https://api.kex.com/v1/price/?coin=".$COIN_NAME."&p=".$PERIOD.'&u='.$UNIT., $RESULT);
  $FIRST_TIMESTAMP =  result.timestamp;
  $TIMESTAMP_CURRENT = time();
  for (var i = 0; i < $TIMESTAMP_CURRENT; i+$PERIOD) {
    $.getJSON('https://api.kex.com/v1/price/$COIN_NAME?p='$FIRST_TIMESTAMP+i, $result);
		dps.push({
			x: result[i].timestamp,
			y: result[i].last
		});
	}
	chart.render();
 }
 

 
}
                  
