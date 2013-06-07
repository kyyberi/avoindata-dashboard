<?php require_once('../functions.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Avoindata.net - avoimen datan yhteisön käyttämät tagit</title>
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



<script src="../js/jqcloud-1.0.4.min.js"></script>
<script src="../js/highcharts.js"></script>
<script src="../js/modules/exporting.js"></script>

<script type="text/javascript">

<?php echo qa_top_tags_with_counts(); ?>

$(document).ready(function() {
   $("#wordcloud").jQCloud(word_list);
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
                plotShadow: true
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
                            return '<b>'+ this.point.name +'</b>: '+ this.percentage.toFixed(2) +' %';
                        }
                    }
                }
            },
            series: [{
                type: 'pie',
                name: 'Tags',
		<?php
			echo qa_tags_data();
		?>
            }]
        });
    });
    

</script>

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
			<li><a href="/dashboard/vastaukset/"><span>Vastaukset</span></a></li>
			<li><a href="/dashboard/kategoriat/"><span>Kategoriat</span></a></li>
			<li><a href="/dashboard/tagit/" class="current"><span>Tagit</span></a></li>
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
			<h1>Avoindata.net - tagit</h1>
			<div class="box1" style="display:none;width:150px;float:right;margin-left:30px;margin-right:30px;">
				<h4>Tageja</h4>
				<p class="p1"><?php echo qa_tags_count(); ?></p>
			</div>
			
			<p>Tageilla tarkennetaan esimerkiksi sitä minkä alueen dataa kysymys koskee tai onko kyseessä API:in vai tiedostoon liittyvä kysymys.				
				<div id="wordcloud" style="margin-top:0px;padding-top:0px;width: 720px; height: 200px; position: relative;float:left;"></div>
			</p>
		</div>
<!-- 				
				<div class="wrapper">
					<div class="col-1">
						<div class="box1">
							<h4>Kysymyksiä</h4>
							<p class="p1">123</p>
							<div class="wrapper"><a href="/dashboard/kysymykset/" class="link1"><em><b>Lisää...</b></em></a></div>
						</div>
					</div>
					<div class="col-2">
						<div class="box1">
							<h4>Vastauksia</h4>
							<p class="p1">245</p>
							<div class="wrapper"><a href="/dashboard/vastaukset/" class="link1"><em><b>Lisää...</b></em></a></div>
						</div>
					</div>
					<div class="col-3">
						<div class="box1">
							<h4>Käyttäjiä</h4>
							<p class="p1">423</p>
							<div class="wrapper"><a href="/dashboard/kayttajat" class="link1"><em><b>Lisää...</b></em></a></div>
						</div>
					</div>
				
					<div class="col-4">
						<div class="box1">
							<h4>Kategorioita</h4>
							<p class="p1">23</p>
							<div class="wrapper">
							<a href="/dashboard/kategoriat/" class="link1"><em><b>Lisää...</b></em></a></div>
						</div>
					</div>
					<div class="col-5">
						<div class="box1">
							<h4>Tageja</h4>
							<p class="p1">45</p>
							<div class="wrapper"><a href="/dashboard/tagit/" class="link1">
							<em><b>Lisää...</b></em></a>
							</div>
						</div>
					</div>
				</div>
-->
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
					<p>Dashboard on avoimen lähdekoodin projekti.</p>
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
						<h2>Käytetyt tagit ja esiintymismäärät</h2>
						<table id="table-2">
						<?php echo qa_tags_table_counts(); ?>	
						</table>				
						<div class="desc">
						<div class="box1" style="width:150px;float:left;margin-left:0px;margin-right:0px;margin-bottom:20px;">
							<h4>Tageja</h4>
							<p class="p1"><?php echo qa_tags_count(); ?></p>
						</div>
						Viereisessä taulukossa on riveittäin tagit (yhteensä <?php echo qa_tags_count();?> tagia) ja niiden esiintymismäärä eri kysymyksissä. 
						<br/><br/>
						<h4>Syötteet</h4>
						Lisäksi rivin lopussa on linkki RSS syötteeseen, joka listaa kyseisen tagin kysymykset.
						<img src="http://www.avoindata.net/qa-theme/tovolt/images/rss.jpg"/>
						<br/><br/>
						<h4>Tagien lisääminen</h4>
						Käyttäjät lisäävät tageja vapaasti kysymyksien esittämisen yhteydessä. 
						
						</div>
					</div>
					<div style="clear:both; height:30px;"></div>

					<h2>Käytetyt tagit piirakkana</h2>
						<chart id="boxcategories" style="min-width: 600px; height: 350px; margin: 0 auto"><p>replace</p></chart>			
						
						
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
