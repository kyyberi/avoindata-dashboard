<?php

$url = 'http://avoindata.net/tampere/tampere-daily.json';
$content = file_get_contents($url);
$jsonData = json_decode($content, true);

$phpArray = json_decode($content, true);
$prev = 0; 
$dates = array();
$data = "data: [";
foreach ($phpArray as $item) {
	foreach ($item as $key => $value) {
		if($key == 'lkm') {
			if($value == 0){
				$value = $prev;
			}
    			$data .= $value.",";
			$prev = $value;
		}
		if($key == 'timestamp') {
		  //Date.UTC(2013,3,12,0,0,0)
		  	array_push($dates,date('Y,m,d,0,0,0', $value));
		}
	}
}
$startdate = reset($dates);
$countdata = substr( $data, 0, strlen($data) - 1 );
$countdata .= "]\n";

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript">
$(function () {
        $('#line').highcharts({
            chart: {
                type: 'spline'
            },
            title: {
                text: ''
            },
            subtitle: {
                text: 'Tampereen avoimen datan settien määrän muutos/kasvu'
            },
            xAxis: {
                type: 'datetime'
            },
            yAxis: {
                title: {
                    text: 'KPL'
                },
                min: 0,
                minorGridLineWidth: 1,
                gridLineWidth: 1,
                alternateGridColor: null,
                plotBands: [{ // Light air
                    from: 0,
                    to: 10,
                    color: 'rgba(0, 0, 0, 0)',
                    label: {
                        text: '',
                        style: {
                            color: '#e90000'
                        }
                    }
                }, { // Light breeze
                    from: 11,
                    to: 1000,
                    color: 'rgba(0, 0, 0, 0)',
                    label: {
                        text: '',
                        style: {
                            color: '#e90000'
                        }
                    }
                }]
            },
            tooltip: {
                valueSuffix: ' kpl'
            },
            plotOptions: {
                spline: {
                    lineWidth: 2,
                    states: {
                        hover: {
                            lineWidth: 4
                        }
                    },
                    marker: {
                        enabled: false
                    },
                    pointInterval: 86400000, // one day | 3600000, // one hour
                    pointStart: Date.UTC(<?php echo $startdate; ?>)
                }
            },
            series: [{
                name: 'Tampere, datasettien määrä päivittäin',
		color: '#0066FF',
		<?php echo $countdata; ?>                
		 }
		
    
            ]
            ,
            navigation: {
                menuItemStyle: {
                    fontSize: '12px'
                }
            }
        });
    });
    

		</script>
<script src="./js/highcharts.js"></script>
<script src="./js/highcharts-more.js"></script>
<script src="./js/modules/exporting.js"></script>
</head>
<body>
<chart id="line" style="min-width: 700px; height: 300px; margin: 0 auto"></chart>

</body>
</html>

