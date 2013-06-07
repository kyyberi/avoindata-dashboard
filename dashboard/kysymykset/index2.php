<?php require_once('../functions.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Avoindata.net dashboard | Tietoja palvelun kysymyksistä</title>
<link rel="stylesheet" href="../css/screen.css" type="text/css" media="screen" title="default" />
<link rel="stylesheet" href="../css/mod.css" type="text/css" media="screen" title="default" />
<!--[if IE]>
<link rel="stylesheet" media="all" type="text/css" href="css/pro_dropline_ie.css" />
<![endif]-->

<!--  jquery core -->
<!-- <script src="./js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script> -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<!--  checkbox styling script -->
<script src="../js/jquery/ui.core.js" type="text/javascript"></script>
<script src="../js/jquery/ui.checkbox.js" type="text/javascript"></script>
<script src="../js/jquery/jquery.bind.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
	$('input').checkBox();
	$('#toggle-all').click(function(){
 	$('#toggle-all').toggleClass('toggle-checked');
	$('#mainform input[type=checkbox]').checkBox('toggle');
	return false;
	});
});
</script>  

<![if !IE 7]>

<!--  styled select box script version 1 -->
<script src="../js/jquery/jquery.selectbox-0.5.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect').selectbox({ inputClass: "selectbox_styled" });
});
</script>
 

<![endif]>

<!--  styled select box script version 2 --> 
<script src="./js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_form_1').selectbox({ inputClass: "styledselect_form_1" });
	$('.styledselect_form_2').selectbox({ inputClass: "styledselect_form_2" });
});
</script>

<!--  styled select box script version 3 --> 
<script src="../js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_pages').selectbox({ inputClass: "styledselect_pages" });
});
</script>

<!--  styled file upload script --> 
<script src="../js/jquery/jquery.filestyle.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
  $(function() {
      $("input.file_1").filestyle({ 
          image: "images/forms/choose-file.gif",
          imageheight : 21,
          imagewidth : 78,
          width : 310
      });
  });
</script>

<!-- Custom jquery scripts -->
<script src="../js/jquery/custom_jquery.js" type="text/javascript"></script>
 
<!-- Tooltips -->
<script src="../js/jquery/jquery.tooltip.js" type="text/javascript"></script>
<script src="../js/jquery/jquery.dimensions.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	$('a.info-tooltip ').tooltip({
		track: true,
		delay: 0,
		fixPNG: true, 
		showURL: false,
		showBody: " - ",
		top: -35,
		left: 5
	});
});
</script> 


<!--  date picker script -->
<link rel="stylesheet" href="../css/datePicker.css" type="text/css" />
<script src="../js/jquery/date.js" type="text/javascript"></script>
<script src="../js/jquery/jquery.datePicker.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
        $(function()
{

// initialise the "Select date" link
$('#date-pick')
	.datePicker(
		// associate the link with a date picker
		{
			createButton:false,
			startDate:'01/01/2005',
			endDate:'31/12/2020'
		}
	).bind(
		// when the link is clicked display the date picker
		'click',
		function()
		{
			updateSelects($(this).dpGetSelected()[0]);
			$(this).dpDisplay();
			return false;
		}
	).bind(
		// when a date is selected update the SELECTs
		'dateSelected',
		function(e, selectedDate, $td, state)
		{
			updateSelects(selectedDate);
		}
	).bind(
		'dpClosed',
		function(e, selected)
		{
			updateSelects(selected[0]);
		}
	);
	
var updateSelects = function (selectedDate)
{
	var selectedDate = new Date(selectedDate);
	$('#d option[value=' + selectedDate.getDate() + ']').attr('selected', 'selected');
	$('#m option[value=' + (selectedDate.getMonth()+1) + ']').attr('selected', 'selected');
	$('#y option[value=' + (selectedDate.getFullYear()) + ']').attr('selected', 'selected');
}
// listen for when the selects are changed and update the picker
$('#d, #m, #y')
	.bind(
		'change',
		function()
		{
			var d = new Date(
						$('#y').val(),
						$('#m').val()-1,
						$('#d').val()
					);
			$('#date-pick').dpSetSelected(d.asString());
		}
	);

// default the position of the selects to today
var today = new Date();
updateSelects(today.getTime());

// and update the datePicker to reflect it...
$('#d').trigger('change');
});
</script>

<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "f7e65caf-8553-4f16-8c93-b153275dfac4", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>

<script type="text/javascript">
$(function () {
    	
    	// Radialize the colors
		Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function(color) {
		    return {
		        radialGradient: { cx: 0.5, cy: 0.3, r: 0.7 },
		        stops: [
		            [0, color],
		            [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
		        ]
		    };
		});
		
		// Build the chart
        $('#box').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: ''
            },
            tooltip: {
        	    pointFormat: '{series.name}: <b>{point.percentage}%</b>',
            	percentageDecimals: 1
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        color: '#000000',
                        connectorColor: '#000000',
                        formatter: function() {
                            return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
                        }
                    }
                }
            },
            series: [{
                type: 'pie',
                name: 'Categories',
		<?php
			echo qa_postcount_categories();
		?>
            }]
        });
    });
    

		</script>


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
                text: '<?php echo qa_start_date_simple(); ?>'
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
                    pointStart: Date.UTC(<?php echo qa_start_date(); ?>)
                }
            },
            series: [{
                name: 'kysymykset',
		color: '#0066FF',
                <?php echo qa_postcount_days(); ?> },
		{
                name: 'vastaukset',
		color: '#699b5e',
		dashStyle: 'ShortDash',
                <?php echo qa_answercount_days(); ?> }
    
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


<script type="text/javascript">
 
$(document).ready(function(){
 
        $(".slidingDiv").hide();
        $(".show_hide").show();
 
    $('.show_hide').click(function(){
    $(".slidingDiv").slideToggle();
    });
 
});

$(document).ready(function(){
 
        $(".slidingDiv2").hide();
        $(".show_hide2").show();
 
    $('.show_hide2').click(function(){
    $(".slidingDiv2").slideToggle();
    });
 
});
 
</script>


<script src="../js/highcharts.js"></script>
<script src="../js/modules/exporting.js"></script>
<script src="http://www.datatables.net/release-datatables/media/js/jquery.dataTables.js"></script>

<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#linetable').dataTable( {
				"bSort": true,
				"bInfo": true,
				"sPaginationType": "full_numbers"
			} );
			} );
		</script>


<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="../js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>
</head>
<body> 
<!-- Start: page-top-outer -->
<div id="page-top-outer">    

<!-- Start: page-top -->
<div id="page-top">

	<!-- start logo -->
	<div id="logo">
	<a href="/dashboard/"><img src="http://www.avoindata.net/qa-theme/tovolt/images/opendata.png" width="156" height="40" alt="" /></a>
	</div>
	<div style="float:left;margin-top:35px; margin-left:30px;color:#fff;"><h1 style="color:#f8f8f8;text-shadow: black 0.1em 0.1em 0.2em;">Avoimen datan asialla avoimesti mitään piilottelematta</h1></div>
	<!-- end logo -->
	
	
 	<div class="clear"></div>

</div>
<!-- End: page-top -->

</div>
<!-- End: page-top-outer -->
	
<div class="clear">&nbsp;</div>
 
<!--  start nav-outer-repeat................................................................................................. START -->
<div class="nav-outer-repeat"> 
<!--  start nav-outer -->
<div class="nav-outer"> 

		
		<!-- end nav-right -->


		<!--  start nav -->
		<div class="nav" style="">
		<div class="table">
		
		<ul class="select"><li><a href="/dashboard"><b>Etusivu</b><!--[if IE 7]><!--></a><!--<![endif]-->
		
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		                    
		<ul class="select"><li><a href="/dashboard/kayttajat/"><b>Käyttäjät</b><!--[if IE 7]><!--></a><!--<![endif]-->
		
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		
		<ul class="current"><li><a href="/dashboard/kysymykset/"><b>Kysymykset</b><!--[if IE 7]><!--></a><!--<![endif]-->
		
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		
		<ul class="select"><li><a href="/dashboard/vastaukset/"><b>Vastaukset</b><!--[if IE 7]><!--></a><!--<![endif]-->
		
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		
		<ul class="select"><li><a href="/dashboard/kategoriat/"><b>Kategoriat & tagit</b><!--[if IE 7]><!--></a><!--<![endif]-->
		
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>

		<div class="nav-divider">&nbsp;</div>
		
		<ul class="select"><li><a href="/dashboard/yhdistelmat/"><b>Yhdistelmät</b><!--[if IE 7]><!--></a><!--<![endif]-->
		
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		
		<div class="clear"></div>
		</div>
		<!--  start nav -->

</div>
<div class="clear"></div>
<!--  start nav-outer -->
</div>
<!--  start nav-outer-repeat................................................... END -->

  <div class="clear"></div>
 
<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
	
	</div>
	<!-- end page-heading -->

	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<!-- <th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th> -->
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<!-- <th rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th> -->
	</tr>
	<tr>
		<td id="tbl-border-left"></td>
		<td>
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div style="width:430px;float:left;margin-right:0px;padding-left:0px;margin-left:2px;">
				<h2 class="boxtitle" style="margin:0px;width:100%;padding-right:7px;">Statistiikkaa kysymyksistä</h2>
				<chart id="boxfill" style="height: 200px; margin: 0px; margin-right:0px;text-align:left;">
				Avoindata.net on pystytetty suomalaisen avoimen datan verkoston avoimeksi tukisivustoksi. 
				<div class="stats">
					<div class="label">Kysymyksiä:</div> 
					<div id="count"><?php echo qa_question_count(); ?></div>
				</div>
				<div class="stats">
					<div class="label"><a href="/dashboard/kategoriat/">Kategorioita</a>:</div> 
					<div id="count"><?php echo qa_category_count(); ?></div>
				</div>
				
				</chart>
			</div>
			<div style="width:418px;float:left;margin-left:30px;padding-left:0px;">
			<h2 class="boxtitle" style="margin:0px;width:100%;padding-right:7px;">Jaa verkkoon</h2>
			<chart id="boxfill" style="height: 200px; margin: 0px; margin-right:0px;text-align:left;">
			 Sivun statistiikat kertovat omaan avointa kieltään palvelussa esitetyistä kysymyksistä. Jokainen voi tehdä omat johtopäätöksensä - jakaa eteenpäin tai ei.
				<div style="margin-top:30px;">
				
					<span class='st_twitter_vcount' displayText='Tweet'></span>
					<span class='st_facebook_vcount' displayText='Facebook'></span>
					<span class='st_linkedin_vcount' displayText='LinkedIn'></span>
					<span class='st_googleplus_vcount' displayText='Google +'></span>
				</div> 
			</chart>
			
			</div>

			
			<div class="clear"></div>
			
			
			
			<div style="width:900px;float:left;margin-right:0px;padding-left:0px;margin-top:30px;">
				<h2 class="boxtitle" style="margin-right:3px;margin-left:3px;">Kysymys/vastaus trendi  | <span style="font-size:14px;"><a href="#" onclick="return false;" class="show_hide2">Näytä yksityiskohdat</a></span>
				<span style="font-size:14px;float:right;">Katso myös <a href="/dashboard/vastaukset/">vastauksien tilastot</a></span>
				</h2>
				<div class="slidingDiv2" style="width:845px;">

				<?php
					echo qa_postcount_days(); echo "<br/><br/>";
					echo qa_start_date();
				?>
				<a href="#" onclick="return false;" class="show_hide2">hide</a>
				</div>
				<chart id="line" style="min-width: 700px; height: 300px; margin: 0 auto"></chart>
				
			</div>
			
			<div style="width:900px;float:left;margin-right:0px;padding-left:0px;margin-top:30px;">
				<h2 class="boxtitle" style="margin-right:4px;margin-left:4px;">Kysymysmäärät <a href="/dashboard/kategoriat/">kategorioittain</a> | <span style="font-size:14px;"><a href="#" onclick="return false;" class="show_hide">Näytä yksityiskohdat</a></span>
				<span style="font-size:14px;float:right;">Katso myös <a href="/dashboard/vastaukset/">vastausten tilastot</a></span>
				</h2>
			
			<div class="slidingDiv" id="kysmaarat" style="height:<?php echo qa_postcount_categories_table_height();?>">
			<div class="fancytable" >
				<table cellpadding="0" cellspacing="0" border="0" class="display" class="gridtable" id="linetable">
				<thead>
					<tr>
						<th>Kategoria</th>
						<th>%</th>
						<th>lkm</th>
						
					</tr>
				</thead>
				<tbody>
					<?php echo qa_postcount_categories_table();?>	
				</tbody>
				</table>
            		</div>
			</div> 
			
			
			<chart id="box" style="width: 852px; height: 400px; margin: 0 auto">
			
			</chart>
			
			</div>

			</div>
			<!--  end table-content  -->
	
			<div class="clear"></div>
			
		 
		</div>
		<!--  end content-table-inner ............................................END  -->
		</td>
		<td id="tbl-border-right"></td>
	</tr>
	<tr>
		<th class="sized bottomleft"></th>
		<td id="tbl-border-bottom">&nbsp;</td>
		<th class="sized bottomright"></th>
	</tr>
	</table>
	<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer........................................................END -->

<div class="clear">&nbsp;</div>
    
<!-- start footer -->         
<div id="footer">
<!-- <div id="footer-pad">&nbsp;</div> -->
	<!--  start footer-left -->
	<div id="footer-left">
	Admin Skin &copy; Copyright Internet Dreams Ltd. <a href="">www.netdreams.co.uk</a>. All rights reserved.</div>
	<!--  end footer-left -->
	<div class="clear">&nbsp;</div>
</div>
<!-- end footer -->
 
</body>
</html>
