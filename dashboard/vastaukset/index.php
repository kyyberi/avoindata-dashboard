<?php require_once('../functions.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Avoindata.net - avoimen datan yhteisön vastaukset</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<link href="/dashboard/css/style2.css" rel="stylesheet" type="text/css" />
<link href="/dashboard/css/mod2.css" rel="stylesheet" type="text/css" />
<link href="/dashboard/css/layout2.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="/dashboard/js/cufon-yui.js" type="text/javascript"></script>
<script src="/dashboard/js/cufon-replace.js" type="text/javascript"></script>
<script src="/dashboard/js/Myriad_Pro_400.font.js" type="text/javascript"></script>
<script src="/dashboard/js/Myriad_Pro_600.font.js" type="text/javascript"></script>
<!--[if lt IE 7]>
	<link href="ie_style2.css" rel="stylesheet" type="text/css" />
<![endif]-->

<script type="text/javascript">
$(function () {
        $('#boxquestions').highcharts({
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
        $('#boxcategories').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: ''
            },
            tooltip: {
        	    pointFormat: '{series.name}: <b>{point.percentage.toFixed(2)}%</b>',
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
                            return '<b>'+ this.point.name +'</b>: '+ this.percentage.toFixed(2) +' %';
                        }
                    }
                }
            },
            series: [{
                type: 'pie',
                name: 'Categories',
		<?
			echo qa_answercount_categories();
		?>
            }]
        });
    });
    

		</script>

<script src="../js/highcharts.js"></script>
<script src="../js/modules/exporting.js"></script>


<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="../js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>



</head>
<body id="page1">
<!-- header -->
<div id="header">
	<div class="container">
		<ul class="nav">
			<li><a href="/dashboard/"><span>Etusivu</span></a></li>
			<li><a href="/dashboard/kayttajat/"><span>Käyttäjät</span></a></li>
			<li><a href="/dashboard/kysymykset/"><span>Kysymykset</span></a></li>
			<li><a href="/dashboard/vastaukset/" class="current"><span>Vastaukset</span></a></li>
			<li><a href="/dashboard/kategoriat/"><span>Kategoriat</span></a></li>
			<li><a href="/dashboard/tagit/"><span>Tagit</span></a></li>
			<!-- <li><a href="/dashboard/yhdistelmat/"><span>Yhdistelmät</span></a></li> -->
		</ul>
	</div>
</div>
<!-- content -->
<div id="content">
	<div class="container">
<!-- .intro-text -->
		<div class="boxsome">
				
		<h3 style="color:#000;">Jaa someen</h3>
		<div style="margin-top:10px;">
				<!--
					<span class='st_twitter_vcount' displayText='Tweet'></span>
					<span class='st_facebook_vcount' displayText='Facebook'></span>
					<span class='st_linkedin_vcount' displayText='LinkedIn'></span>
					<span class='st_googleplus_vcount' displayText='Google +'></span>
				-->
				<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
<a class="addthis_button_linkedin"></a>
<a class="addthis_button_facebook"></a>
<a class="addthis_button_twitter"></a>
<a class="addthis_button_google_plusone_share"></a>
</div>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=undefined"></script>
<!-- AddThis Button END -->
				<h3 style="color:#000;padding-top:40px;margin-bottom:10px;">Osallistu!</h3>
				<p style="margin-top:0px;padding-top:0px;color:#000;">Osoita ja jaa osaamisesi <a href="http://avoindata.net">avoindata.net</a> <br/>palvelussa!. <br/><br/><b>Emme edellytä rekisteröitymistä.</b></p>	
				</div> 
		</div>
 
		<div class="intro-text" style="">
			<h1>Avoindata.net - kysymys/vastausmäärät</h1>
			<chart id="boxquestions" style="min-width: 700px; height: 250px; margin: 0 auto"><p>replace</p></chart>
		</div>

		<div style="clear:both; height:50px;"></div>
<!-- /.intro-text -->

		<div class="wrapper">
			<div class="aside">
				<div class="box" >
					<h3>Aihealueet</h3>
					<p>Alla linkit graafeihin ja tilastoihin</p>
					<ul class="list1">
						<li><a href="/dashboard/kayttajat/">Käyttäjät</a></li>
						<li><a href="/dashboard/kysymykset/">Kysymykset</a></li>
						<li><a href="/dashboard/vastaukset/">Vastaukset</a></li>
						<li><a href="/dashboard/kategoriat/">Kategoriat</a></li>
						<li><a href="/dashboard/tagit/">Tagit</a></li>
						<!-- <li><a href="/dashboard/yhdistelmat/">Edellisten yhdistelmät</a></li> -->
					</ul>
				</div>
				<div style="height:30px;"></div>
<!-- .box -->
				<div class="box">
					<h3>Tietoja</h3>
					<p><a href="http://avoindata.net">Avoindata.net</a> palvelu perustuu avoimen lähdekoodin projektiin <a href="http://www.question2answer.org/">Question2Answer</a>.</p>
				<img src="/dashboard/images/q2a.png"/> 

				</div>

				<div style="height:30px;"></div>

				<div class="box">
					<h3>Ylläpito</h3>

					<p>Projektin aikana on tehty <a target="new" href="http://www.question2answer.org/">Question2Answer</a> käyttöliittymän <a target="new" href="https://github.com/kyyberi/qa-fi-FI">suomennos</a>, joka on kontribuoitu takaisin.</p>
					<p><a href="https://github.com/kyyberi/avoindata-dashboard">Dashboard</a> on avoimen lähdekoodin projekti.</p>
					<img src="http://avoindata.net/dashboard/images/githublogo.jpg" style="width:60%;margin-bottom:10px;"/> 
					<p>Vastuullinen ylläpitäjä:
					<ul class="list1">
					<li><a target="new" href="http://fi.linkedin.com/in/jarkkomoilanen/">Jarkko Moilanen</a></li>
					<li>Email: jarkko dot moilanen [at] hermia dot fi</li>
					<li>Twitter: <a target="new" href="https://twitter.com/kyyberi">@kyyberi</a></li>
					</ul>
					</p>
				</div>
				<div style="height:30px;"></div>

				<div class="box">
					<h3>Sponsorit</h3>
					<p>Avoindata.net dashboard on kehitetty Open Data Tampere Region projektissa.</p>
					<a target="new" href="http://www.hermia.fi/opendatatre/"><img src="http://avoindata.net/images/tre-120.jpg" style="margin-bottom:10px;margin-top:10px;"/></a>
					<a target="new" href="http://www.oske.net/"><img src="http://avoindata.net/images/Digi_FIN.jpeg"/></a>
					
				</div>
<!-- /.box -->
			</div>
			<div class="mainContent">
				<div class="article">
					<div class="details">
					<h2>Vastausmäärät kategorioittain</h2>
						<chart id="boxcategories" style="min-width: 600px; height: 350px; margin: 0 auto"><p>replace</p></chart>				
						
					</div>

					<div style="clear:both; height:30px;"></div>
					<div class="details">
						<?php echo qa_top_answer_points(); ?>
						<div class="desc">
						Top 5 kysyjät avoindata.net palvelussa. Kysymyllä paljon pääset/päädyt listalle! Kysy siis avoimeen dataan liittyviä kysymyksiä <a href="http://avoindata.net/ask">avoindata.net</a> palvelussa.<br/><br/><b>Emme edellytä rekisteröitymistä!</b></a>
						</div> 
					</div>
					

				
				</div>
			</div>
		</div>
	</div>
</div>
<!-- footer -->
<div id="footer">
	<div class="container">
		Osallistu, kysy, vastaa, kommentoi ja levitä tietoa <a href="http://avoindata.net">avoindata.net palvelusta</a>! - 
	</div>
</div>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>
