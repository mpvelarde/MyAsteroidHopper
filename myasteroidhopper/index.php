<!doctype html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->

<head>
  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>My Asteroid Hopper</title>

  <meta name="viewport" content="width=device-width">

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
  
  <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/colorbox.css">

  <script src="js/jquery.colorbox.js"></script>

</head>

<body>
    <div id="wrap">
        <div class="control">
	<div class="menu">
	    <a href="#" class="logo">My Asteroid Hopper</a>
            <div class="arrow arrowDown"></div>
	</div>
        
        <div class="listContainer">
            <ul class="list">
                <li><a id="link_1" href="#">Ceres</a></li>
                <li><a href="#">Pallas</a></li>
                <li><a href="#">Juno</a></li>
                <li><a href="#">Ceres</a></li>
                <li><a href="#">Pallas</a></li>
                <li><a href="#">Juno</a></li>
                <li><a href="#">Ceres</a></li>
                <li><a href="#">Pallas</a></li>
                <li><a href="#">Juno</a></li>
                <li><a href="#">Ceres</a></li>
                <li><a href="#">Pallas</a></li>
                <li><a href="#">Juno</a></li>
                <li><a href="#">Ceres</a></li>
                <li><a href="#">Pallas</a></li>
                <li><a href="#">Juno</a></li>
                <li><a href="#">Ceres</a></li>
                <li><a href="#">Pallas</a></li>
                <li><a href="#">Juno</a></li>
                <li><a href="#">Ceres</a></li>
                <li><a href="#">Pallas</a></li>
                <li><a href="#">Juno</a></li>
                <li><a href="#">Ceres</a></li>
                <li><a href="#">Pallas</a></li>
                <li><a href="#">Juno</a></li>
                <div style="clear:both;"></div>
            </ul>
            <div style="clear:both;"></div>
        </div>
        
        <div class="pagination">
            <div class="prev pagButton"></div>
            <div class="next pagButton"></div>
            <div style="clear:both;"></div>
        </div>
        
	
	<div id="linksContainer" style="display:none;">
            <a id="sun" href="#sun_content" ></a>
            <a id="star" href="#inline_content" ></a>
	</div>
	<div id="colorboxContents" style='display:none'>
            <div id='inline_content' class="inlineContent" style='padding:10px; background:#fff;'></div>
            <div id='sun_content' style='padding:10px; background:#fff;'>
		<h1>Sun</h1>
		<div>
		    <img src="images/sun_medium.png" alt="Sun" />
		    <p>Mass 895.8E18 kg</p>
		    <p>Distance from the sun 895.8E18 kg</p>
		</div>
	    </div>
	</div>
   </div>
   
    <div id="about" class="section">
	<h1>Asteroids</h1>
	<p>Asteroids are small rocky bodies primarily in orbit between Jupiter and Mars (i.e. main-belt). Those observed range in diameter from 948 km (1 Ceres) to a few meters. Near-Earth asteroids (NEAs) are a subset of asteroids whose orbits approach and/or cross the Earth's orbit. Please visit our sister-site dedicated to near-Earth objects (NEOs) for more information on NEAs.</p>
	<img src="images/Asteroid.jpg" alt="asteroid" />
	<h1>Comets</h1>
	<p>Comets are relatively small icy bodies, often only a few kilometers in extent, that formed in the outer solar system where temperatures are cold enough to sustain (predominately water) ices. They represent the leftover bits and pieces from the outer solar system formation process that took place some 4.6 billion years ago.</p>
	<img src="images/original.jpg" alt="comet" />
    </div>
    <div id="sky_map" class="section"></div>

    <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAA1Wn8H9VA5NSOVRIMUIarcRSs0R12aLb9PbAGCcsfG7w_64TQqRRLIQXLu_a-nPOfIyyUY40UnNZtoQ" type="text/javascript"></script>
    <script type="text/javascript">
        var map ;
        var marker;
	
	    //<![CDATA[
	
	$(window).load(function(){
	    initialize();
            
            getAsteroids();
            
	    $("#sun").colorbox({inline:true, width:"50%"});
            $("#star").colorbox({inline:true, width:"50%"});
            
            $(".logo").click(function(){
                var ua = navigator.userAgent;
                if (ua.indexOf("BlackBerry") >= 0)
                {
                  window.scrollBy(0,0);
                }else{
                  jQuery('html, body').animate({scrollTop: jQuery("#home").offset().top}, 1000);
                }
            });
            
            $(".list li a").click(function(){
                //get asteroid id
                var id = $(this).attr("id");
                id = id.replace('link_','');
                
                //get asteroid data by id
                var obj = jQuery.parseJSON('{"a": "2.6707341", "Node": "169.88278", "e": "0.25530539", "D": "54.2745028204", "G": "0.32", "i": "12.97937", "H": "5.33", "M": "257.6392602", "e_type": "e", "n": "9.52493364674", "ephem_list": [{"dec": -0.14602110692343545, "here_date": 35474.5, "ra": 5.443538996148381, "mag": 11.14}, {"dec": -0.13743765396970684, "here_date": 35479.5, "ra": 5.474796733753414, "mag": 11.16}, {"dec": -0.12848053194958695, "here_date": 35484.5, "ra": 5.505826066360945, "mag": 11.17}, {"dec": -0.1191698228062876, "here_date": 35489.5, "ra": 5.536603091773308, "mag": 11.17}, {"dec": -0.1095296893329475, "here_date": 35494.5, "ra": 5.5670986854505315, "mag": 11.17}, {"dec": -0.0995892130795109, "here_date": 35499.5, "ra": 5.59726622268493, "mag": 11.17}, {"dec": -0.08937789948920992, "here_date": 35504.5, "ra": 5.6270702500710845, "mag": 11.17}, {"dec": -0.07892750500023897, "here_date": 35509.5, "ra": 5.656477914227292, "mag": 11.16}, {"dec": -0.06826464098780678, "here_date": 35514.5, "ra": 5.685463241472366, "mag": 11.15}, {"dec": -0.05741554025171361, "here_date": 35519.5, "ra": 5.714003209292986, "mag": 11.13}, {"dec": -0.04641290861137865, "here_date": 35524.5, "ra": 5.742056732600806, "mag": 11.11}, {"dec": -0.03529160168812759, "here_date": 35529.5, "ra": 5.7695765903999074, "mag": 11.09}, {"dec": -0.024089656107867664, "here_date": 35534.5, "ra": 5.796521364684541, "mag": 11.07}, {"dec": -0.012843054437941181, "here_date": 35539.5, "ra": 5.822851119007219, "mag": 11.04}, {"dec": -0.001583339774653875, "here_date": 35544.5, "ra": 5.848533363563524, "mag": 11.0}, {"dec": 0.00965373913892299, "here_date": 35549.5, "ra": 5.873524588980032, "mag": 10.97}, {"dec": 0.020825511364600827, "here_date": 35554.5, "ra": 5.897759987810874, "mag": 10.93}, {"dec": 0.031886275140860426, "here_date": 35559.5, "ra": 5.921175829791028, "mag": 10.88}, {"dec": 0.04278638257135215, "here_date": 35564.5, "ra": 5.943704904250618, "mag": 10.84}, {"dec": 0.05348084190819676, "here_date": 35569.5, "ra": 5.965286530051943, "mag": 10.78}, {"dec": 0.06392457827743564, "here_date": 35574.5, "ra": 5.985858315747075, "mag": 10.73}, {"dec": 0.07406277431909346, "here_date": 35579.5, "ra": 6.005331929649476, "mag": 10.67}, {"dec": 0.08383332013571558, "here_date": 35584.5, "ra": 6.023605619035093, "mag": 10.6}, {"dec": 0.09316634659760727, "here_date": 35589.5, "ra": 6.040573503041795, "mag": 10.54}, {"dec": 0.10199035177641216, "here_date": 35594.5, "ra": 6.05613014905442, "mag": 10.46}, {"dec": 0.11023610754107338, "here_date": 35599.5, "ra": 6.070177597934852, "mag": 10.39}, {"dec": 0.11782667202199283, "here_date": 35604.5, "ra": 6.082603057569156, "mag": 10.3}, {"dec": 0.12467099604509119, "here_date": 35609.5, "ra": 6.093267997605493, "mag": 10.22}, {"dec": 0.13066747411336363, "here_date": 35614.5, "ra": 6.1020325446159145, "mag": 10.13}, {"dec": 0.13570641569451786, "here_date": 35619.5, "ra": 6.108761684451289, "mag": 10.03}, {"dec": 0.1396811753984551, "here_date": 35624.5, "ra": 6.113343502109415, "mag": 9.94}, {"dec": 0.1424860117293448, "here_date": 35629.5, "ra": 6.115684001097429, "mag": 9.83}, {"dec": 0.14400648038261274, "here_date": 35634.5, "ra": 6.115685151871824, "mag": 9.73}, {"dec": 0.1441226561671429, "here_date": 35639.5, "ra": 6.113264767953999, "mag": 9.62}, {"dec": 0.14271729734533636, "here_date": 35644.5, "ra": 6.108383861115123, "mag": 9.5}, {"dec": 0.139694899016274, "here_date": 35649.5, "ra": 6.1010721888523225, "mag": 9.39}, {"dec": 0.1349940243529933, "here_date": 35654.5, "ra": 6.091440025394893, "mag": 9.27}, {"dec": 0.12858673072037577, "here_date": 35659.5, "ra": 6.079661367025583, "mag": 9.15}, {"dec": 0.12047890316213324, "here_date": 35664.5, "ra": 6.065963040445823, "mag": 9.04}, {"dec": 0.1107235879207379, "here_date": 35669.5, "ra": 6.050655874545173, "mag": 8.92}, {"dec": 0.09943850944253778, "here_date": 35674.5, "ra": 6.034147810979079, "mag": 8.81}, {"dec": 0.08681912943699535, "here_date": 35679.5, "ra": 6.016939723785273, "mag": 8.73}, {"dec": 0.07312510941403451, "here_date": 35684.5, "ra": 5.999583812259982, "mag": 8.7}, {"dec": 0.058655737772172915, "here_date": 35689.5, "ra": 5.98262713897093, "mag": 8.73}, {"dec": 0.04373337791997714, "here_date": 35694.5, "ra": 5.96659723529089, "mag": 8.79}, {"dec": 0.028692737904009794, "here_date": 35699.5, "ra": 5.952003105266346, "mag": 8.85}, {"dec": 0.013875358546927397, "here_date": 35704.5, "ra": 5.939322198022049, "mag": 8.92}, {"dec": -0.0003947768461165488, "here_date": 35709.5, "ra": 5.9289665710577975, "mag": 9.0}, {"dec": -0.013839710207686356, "here_date": 35714.5, "ra": 5.921243260344448, "mag": 9.07}, {"dec": -0.02624038579896531, "here_date": 35719.5, "ra": 5.916343834627232, "mag": 9.15}, {"dec": -0.037430930017771, "here_date": 35724.5, "ra": 5.9143833374668, "mag": 9.22}, {"dec": -0.047287277589734264, "here_date": 35729.5, "ra": 5.915419780667025, "mag": 9.29}, {"dec": -0.055718586676994204, "here_date": 35734.5, "ra": 5.919465547342414, "mag": 9.36}, {"dec": -0.06267477068640118, "here_date": 35739.5, "ra": 5.926474497935149, "mag": 9.43}, {"dec": -0.06814749586956663, "here_date": 35744.5, "ra": 5.936334479171993, "mag": 9.5}, {"dec": -0.07215640967379797, "here_date": 35749.5, "ra": 5.9489009190931235, "mag": 9.56}, {"dec": -0.07473790387046703, "here_date": 35754.5, "ra": 5.964023050411356, "mag": 9.61}, {"dec": -0.07593194958842446, "here_date": 35759.5, "ra": 5.98155775670958, "mag": 9.67}, {"dec": -0.07578427698711304, "here_date": 35764.5, "ra": 6.001365854125427, "mag": 9.72}, {"dec": -0.07435499593064097, "here_date": 35769.5, "ra": 6.02329078859657, "mag": 9.76}, {"dec": -0.0717148106737333, "here_date": 35774.5, "ra": 6.047163797531184, "mag": 9.8}, {"dec": -0.06793595829870348, "here_date": 35779.5, "ra": 6.072830466930574, "mag": 9.84}, {"dec": -0.06308790108970698, "here_date": 35784.5, "ra": 6.100153731516729, "mag": 9.87}, {"dec": -0.05723234768529333, "here_date": 35789.5, "ra": 6.129023216104305, "mag": 9.9}, {"dec": -0.05043303979363407, "here_date": 35794.5, "ra": 6.159335233450751, "mag": 9.92}, {"dec": -0.042762425788963054, "here_date": 35799.5, "ra": 6.190974910349519, "mag": 9.94}, {"dec": -0.03429338395722899, "here_date": 35804.5, "ra": 6.223836225591422, "mag": 9.96}, {"dec": -0.025097110272592902, "here_date": 35809.5, "ra": 6.257826185957758, "mag": 9.97}, {"dec": -0.015237808604151165, "here_date": 35814.5, "ra": 0.009689354819264697, "mag": 9.98}, {"dec": -0.004774751027133759, "here_date": 35819.5, "ra": 0.045745819668537184, "mag": 9.99}, {"dec": 0.0062273423441766874, "here_date": 35824.5, "ra": 0.08275484962970862, "mag": 9.99}, {"dec": 0.01769802664982083, "here_date": 35829.5, "ra": 0.12065560436801577, "mag": 9.99}, {"dec": 0.029568487517520156, "here_date": 35834.5, "ra": 0.1593952553665247, "mag": 9.99}, {"dec": 0.04177230372183277, "here_date": 35839.5, "ra": 0.19893090852835105, "mag": 9.99}, {"dec": 0.05425011497249597, "here_date": 35844.5, "ra": 0.23924242958577868, "mag": 9.98}, {"dec": 0.06694311442721947, "here_date": 35849.5, "ra": 0.28031505070551965, "mag": 9.97}, {"dec": 0.07978490510625859, "here_date": 35854.5, "ra": 0.32212259209865834, "mag": 9.95}, {"dec": 0.09270780223719971, "here_date": 35859.5, "ra": 0.36463905856506773, "mag": 9.94}, {"dec": 0.10564462448151042, "here_date": 35864.5, "ra": 0.40783595527286015, "mag": 9.92}, {"dec": 0.11853292245920768, "here_date": 35869.5, "ra": 0.45170135683256285, "mag": 9.9}, {"dec": 0.1313152614975637, "here_date": 35874.5, "ra": 0.49623654801451605, "mag": 9.88}, {"dec": 0.14393115845960572, "here_date": 35879.5, "ra": 0.541435903877601, "mag": 9.86}, {"dec": 0.15631424796275872, "here_date": 35884.5, "ra": 0.5872852457794069, "mag": 9.83}, {"dec": 0.1683998306386106, "here_date": 35889.5, "ra": 0.6337630505190114, "mag": 9.8}, {"dec": 0.18012387615911327, "here_date": 35894.5, "ra": 0.6808463364582772, "mag": 9.77}, {"dec": 0.1914286936343374, "here_date": 35899.5, "ra": 0.7285304669802007, "mag": 9.74}, {"dec": 0.20226057524454624, "here_date": 35904.5, "ra": 0.7768111411262009, "mag": 9.71}, {"dec": 0.2125597411513494, "here_date": 35909.5, "ra": 0.8256719118207605, "mag": 9.68}, {"dec": 0.22226679639543145, "here_date": 35914.5, "ra": 0.8750897140640438, "mag": 9.64}, {"dec": 0.23132448913759796, "here_date": 35919.5, "ra": 0.9250225939376224, "mag": 9.6}, {"dec": 0.23967958620404253, "here_date": 35924.5, "ra": 0.9754399561241108, "mag": 9.57}], "epoch": "56400.0", "q": "248.30986", "_id": {"$oid": "517440057872e4089b7dcf74"}, "name": "Juno"}');
                
                var i = 0;
                var dir = 1;
                setInterval(function(){
                    drawStar(obj.name, obj.ephem_list[i].ra,obj.ephem_list[i].dec);
                    console.log(i+ " - " + obj.ephem_list[i].ra + " " + obj.ephem_list[i].dec);
                    if(dir > 0){
                        i++;
                        if(i == (obj.ephem_list.length-1))
                            dir = -1;
                    }else{
                        i--;
                        if(i==0)
                            dir = 1;
                    }
                },100);
                
                jQuery('html, body').animate({scrollTop: jQuery("#sky_map").offset().top}, 1000);
            });
	});
        
        function getAsteroids(){
            
        }
	function initialize() {
	    if (GBrowserIsCompatible()) {
		map = new GMap2(document.getElementById("sky_map"), {
		    mapTypes : G_SKY_MAP_TYPES
		});
                
                var zoomLevel = 5;
                map.addControl(new GLargeMapControl());
		map.addControl(new GMapTypeControl()); 
		map.setCenter(new GLatLng(0.516648002347,0.210940216571), 13);
		map.setZoom(zoomLevel);
	    }
	}
	function ra2lon(ra){
	  var lon = 180 - ra;
	  return lon;
	}
	function lon2ra(lon){
	  var ra = 180 - lon;
	  return ra;
	}
    </script>
    <script>
        function drawStar(name, latitude,longitude) {
            
            //create colorbox content
	    var html = "<h1>"+name+"</h1>";
	    html += "<div>";
	    html += "    <img src='images/asteroid_medium.png' alt='"+name+"' />";
	    html += "    <p>Mass 895.8E18 kg</p>";
	    html += "    <p>Distance from the sun 895.8E18 kg</p>";
	    html += "</div><div style='clear:both;'></div>";
            
            $("#inline_content").html(html);
            $("#star").colorbox({inline:true, width:"50%"});
            
            map.clearOverlays();
            
            var Sun = new GIcon();
	    Sun.image = "images/sun_marker.png";
	    Sun.iconSize = new GSize(60, 60);
	    Sun.iconAnchor = new GPoint(30, 30);
	    Sun.infoWindowAnchor = new GPoint(30, 0);

	    var sun = new GMarker(new GLatLng(0.516648002347,0.210940216571),Sun);
            GEvent.addListener(sun, "click", function() {
		$('#sun').click();    
	    });
	    map.addOverlay(sun);
                
            //create marker icon
            var Icon = new GIcon();
            Icon.image = "images/asteroid_marker.png";
            Icon.iconSize = new GSize(65, 45);
            Icon.iconAnchor = new GPoint(32, 22);
            Icon.infoWindowAnchor = new GPoint(32, 0);
                    
            //create marker
            marker = new GMarker(new GLatLng(latitude,longitude),Icon);
                
            //add marker to map
            GEvent.addListener(marker, "click", function() {
                $("#star").click();
            });
                
            map.addOverlay(marker);
        }
        
        $( ".listContainer" ).hide();
        $( ".pagination" ).hide();
        $( ".arrow" ).click(function(){
		    if($( ".arrow" ).hasClass("arrowDown")){
			$( ".listContainer" ).show();
                        $( ".pagination" ).show();
			$( ".control" ).css("height","auto");
			$( ".arrow" ).addClass("arrowRight");
			$( ".arrow" ).removeClass("arrowDown");
		    }else{
			$( ".listContainer" ).hide();
                        $( ".pagination" ).hide();
			$( ".control" ).css("height","50px");
			$( ".arrow" ).addClass("arrowDown");
			$( ".arrow" ).removeClass("arrowRight");
		    }
		    
		});
    </script>
    </div>
</body>
</html>