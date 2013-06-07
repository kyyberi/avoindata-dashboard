<?php require_once('functions.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Avoindata.net - avoimen datan yhteisön tilastot</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<link href="/dashboard/css/style2.css" rel="stylesheet" type="text/css" />
<link href="/dashboard/css/layout2.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="/dashboard/js/cufon-yui.js" type="text/javascript"></script>
<script src="/dashboard/js/cufon-replace.js" type="text/javascript"></script>
<script src="/dashboard/js/Myriad_Pro_400.font.js" type="text/javascript"></script>
<script src="/dashboard/js/Myriad_Pro_600.font.js" type="text/javascript"></script>
<!--[if lt IE 7]>
	<link href="ie_style2.css" rel="stylesheet" type="text/css" />
<![endif]-->

<script>
$(document).ready(function(){

    //run once
    var el=$('#scrolldiv');
    var originalelpos=el.offset().top; // take it where it originally is on the page

    //run on scroll
     $(window).scroll(function(){
        var el = $('#scrolldiv'); // important! (local)
        var elpos = el.offset().top; // take current situation
        var windowpos = $(window).scrollTop();
        var finaldestination = windowpos+originalelpos;
        el.stop().animate({'top':finaldestination},500);
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
                name: 'rekisteröityneitä käyttäjiä',
		color: '#0066FF',
                <?php echo qa_userscount_days(); ?> }
		
    
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
				"bInfo": true
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
<body id="page1">
<!-- header -->
<div id="header">
	<div class="container">
<!-- .logo -->
<!--
		<div class="logo">

			<h3 style="float:right;margin-left:30px;">Tilastotietoa Suomen avoimen datan tietopalvelusta - <a href="index.html">avoindata.net</a></h3>
		</div>
-->
<!-- /.logo -->
<!--
		<form action="" id="search-form">
			<fieldset>
				<input type="text" class="text" /><input type="submit" value="Search" class="submit" />
			</fieldset>
		</form>
-->
<!-- .nav -->
		<ul class="nav">
			<li><a href="/dashboard/" class="current"><span>Etusivu</span></a></li>
			<li><a href="/dashboard/kayttajat/"><span>Käyttäjät</span></a></li>
			<li><a href="/dashboard/kysymykset/"><span>Kysymykset</span></a></li>
			<li><a href="/dashboard/vastaukset/"><span>Vastaukset</span></a></li>
			<li><a href="/dashboard/kategoriat/"><span>Kategoriat</span></a></li>
			<li><a href="/dashboard/tagit/"><span>Tagit</span></a></li>
			<!-- <li><a href="/dashboard/yhdistelmat/"><span>Yhdistelmät</span></a></li> -->
		</ul>
<!-- /.nav -->
<!-- .extra-box -->


<!-- /.extra-box -->
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
			<h1>Suomen avoimen datan yhteisö<span>avoindata.net palvelussa</span><em> tilastoina ja graafeina</em></h1>
			<img src="/dashboard/images/avoindata3.png" style="float:right;margin-left:20px;margin-right:20px;"/>
			<p>Tällä sivustolla on tilastoja ja graafeja palvelun käyttäjistä, kysymyksistä, vastauksista, tageista, kategorioista ja edellisten yhdistelmistä.</p>
			
			<p>Avoindata.net palvelussa <b>kysyminen tai vastaaminen ei edellytä rekisteröitymistä</b>, vaan se on vapaaehtoista.</p>
			<!-- <div class="wrapper"><a href="#" class="button">View Our Works</a></div> -->
		</div>
				
				<div class="wrapper">
					<div class="col-1">
						<div class="box1">
							<!-- <p><img src="images/img2.jpg" alt="" /></p> -->
							<h4>Kysymyksiä</h4>
							<p class="p1"><?php echo qa_question_count(); ?></p>
							<div class="wrapper"><a href="/dashboard/kysymykset/" class="link1"><em><b>Lisää...</b></em></a></div>
						</div>
					</div>
					<div class="col-2">
						<div class="box1">
							<!-- <p><img src="images/img3.jpg" alt="" /></p>-->
							<h4>Vastauksia</h4>
							<p class="p1"><?php echo qa_answer_count(); ?></p>
							<div class="wrapper"><a href="/dashboard/vastaukset/" class="link1"><em><b>Lisää...</b></em></a></div>
						</div>
					</div>
					<div class="col-3">
						<div class="box1">
							<!-- <p><img src="images/img4.jpg" alt="" /></p> -->
							<h4>Käyttäjiä</h4>
							<p class="p1"><?php echo qa_user_count(); ?></p>
							<div class="wrapper"><a href="/dashboard/kayttajat" class="link1"><em><b>Lisää...</b></em></a></div>
						</div>
					</div>
				
					<div class="col-4">
						<div class="box1">
							<!-- <p><img src="images/img2.jpg" alt="" /></p> -->
							<h4>Kategorioita</h4>
							<p class="p1"><?php echo qa_category_count(); ?></p>
							<div class="wrapper">
							<a href="/dashboard/kategoriat/" class="link1"><em><b>Lisää...</b></em></a></div>
						</div>
					</div>
					<div class="col-5">
						<div class="box1">
							<!-- <p><img src="images/img3.jpg" alt="" /></p>-->
							<h4>Tageja</h4>
							<p class="p1"><?php echo qa_tags_count(); ?></p>
							<div class="wrapper"><a href="/dashboard/tagit/" class="link1">
							<em><b>Lisää...</b></em></a>
							</div>
						</div>
					</div>
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
					<h2>Mikä avoindata.net?<em>- mitä ja kenelle</em></h2>
					<p><strong class="txt1"><a href="http://avoindata.net">Avoindata.net</a></strong> on pystytetty suomalaisen avoimen datan verkoston avoimeksi tukisivustoksi. Tällä sivustolla on tilastoja ja graafeja palvelun käyttäjistä, kysymyksistä, vastauksista, tageista, kategorioista ja edellisten yhdistelmistä.</p> 
					<div class="img-box">
						<!-- <img src="http://www.avoindata.net/qa-theme/tovolt/images/opendata.png" alt="" /> -->
						<h3>Kenelle?</h3>
						<p>
						Avoimeen dataan keskittyvän tukisivuston käyttäjiksi ja hyödyntäjiksi nähdään:
						<ul class="list1" style="margin-left:40px;">
    							<li>ohjelmistojen kehittäjät</li>
    							<li>datan tuottajat mukaan lukien julkinen että yksityinen sektori ja</li>
    							<li>tutkijat</li>
						</ul>
						</p>
						<h3>Yhteisön moderoima</h3>
						<p>Avoindata.net on Suomen avoimen datan yhteisön hallinnoima palvelu. Aktiiviset, muita auttavat, kysymyksiä esittävät ja hyviä vastauksia 							kirjoittavat käyttäjät "palkitaan" palvelun sisällä rintamerkeillä. Käyttäjän oikeudet lisääntyvät pisteiden karttuessa. Tietylle tasolle päässeet 							aktiiviset käyttäjät saavat mahdollisuuden hallinnollisiin toimintoihin.</p>

						<h3>Epävirallinen kansallinen pilotti</h3>
						<p>Avoindata.net toimii pilottina ja mikäli se osoittautuu tarpeelliseksi, tulee vastaavantyyppinen palvelu osaksi kansallista avoimen datan 							palvelua. Pilotoinnin aikana pystymme aloittamaan toistemme auttamisen, omalla kielellämme, omista data varannoista ja niiden hyödyntämisestä sekä 							kehittämisestä.</p>

						<h3>Terminologian kehittäminen</h3>
						<p>Tämän lisäksi asiantuntijat (juuri sinä), jotka avoindata.net palvelua käyttävät, vaikuttavat siihen millaiseksi Suomessa kehittymässä oleva ja vakiintumaton avoimen datan terminologia kehittyy.</p>

						<h3>Refenssit</h3>
						<p>
						Palvelua voi käyttää kuka tahansa, kaikki ovat tervetulleita. Kuitenkin pääasialliset käyttäjät ovat Suomen avoimen datan yhteisön jäsenet. 
						</p>

						<p>Organisaatioista ainakin seuraavat käyttävät palvelua oman toimintansa tukena:
						<img class="refimg" style="margin-bottom:20px;margin-top:20px;margin-left:30px;" src="/dashboard/images/okfn.png"/>
						<img class="refimg" style="margin-bottom:20px;margin-top:20px;margin-left:35px;" src="/dashboard/images/tampereen_kaupunki.png"/>
						<img class="refimg" style="margin-bottom:20px;margin-top:20px;margin-left:30px;" src="/dashboard/images/apps_logo.jpg"/>
						</p>
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
