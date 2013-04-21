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
                var obj = jQuery.parseJSON('{"a": "2.6707341", "Node": "169.88278", "e": "0.25530539", "D": "54.2745028204", "G": "0.32", "i": "12.97937", "H": "5.33", "M": "257.6392602", "e_type": "e", "n": "9.52493364674", "ephem_list": [{"dec": -0.14602110692343545, "here_date": 35474.5, "ra": 5.443538996148381, "mag": 11.14}, {"dec": -0.13743765396970684, "here_date": 35479.5, "ra": 5.474796733753414, "mag": 11.16}, {"dec": -0.12848053194958695, "here_date": 35484.5, "ra": 5.505826066360945, "mag": 11.17}, {"dec": -0.1191698228062876, "here_date": 35489.5, "ra": 5.536603091773308, "mag": 11.17}, {"dec": -0.1095296893329475, "here_date": 35494.5, "ra": 5.5670986854505315, "mag": 11.17}, {"dec": -0.0995892130795109, "here_date": 35499.5, "ra": 5.59726622268493, "mag": 11.17}, {"dec": -0.08937789948920992, "here_date": 35504.5, "ra": 5.6270702500710845, "mag": 11.17}, {"dec": -0.07892750500023897, "here_date": 35509.5, "ra": 5.656477914227292, "mag": 11.16}, {"dec": -0.06826464098780678, "here_date": 35514.5, "ra": 5.685463241472366, "mag": 11.15}, {"dec": -0.05741554025171361, "here_date": 35519.5, "ra": 5.714003209292986, "mag": 11.13}, {"dec": -0.04641290861137865, "here_date": 35524.5, "ra": 5.742056732600806, "mag": 11.11}, {"dec": -0.03529160168812759, "here_date": 35529.5, "ra": 5.7695765903999074, "mag": 11.09}, {"dec": -0.024089656107867664, "here_date": 35534.5, "ra": 5.796521364684541, "mag": 11.07}, {"dec": -0.012843054437941181, "here_date": 35539.5, "ra": 5.822851119007219, "mag": 11.04}, {"dec": -0.001583339774653875, "here_date": 35544.5, "ra": 5.848533363563524, "mag": 11.0}, {"dec": 0.00965373913892299, "here_date": 35549.5, "ra": 5.873524588980032, "mag": 10.97}, {"dec": 0.020825511364600827, "here_date": 35554.5, "ra": 5.897759987810874, "mag": 10.93}, {"dec": 0.031886275140860426, "here_date": 35559.5, "ra": 5.921175829791028, "mag": 10.88}], "epoch": "56400.0", "q": "248.30986", "_id": {"$oid": "517440057872e4089b7dcf74"}, "name": "Juno"}');
                
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
                },1000);
                
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