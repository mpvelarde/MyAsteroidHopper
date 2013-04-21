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
	</div>
	<div id="colorboxContents" style='display:none'>
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
	
	    //<![CDATA[
	
	$(window).load(function(){
	    initialize();
	    $("#sun").colorbox({inline:true, width:"50%"});
            //$("#star1").colorbox({inline:true, width:"50%"});
	});
	function initialize() {
	    if (GBrowserIsCompatible()) {
		map = new GMap2(document.getElementById("sky_map"), {
		    mapTypes : G_SKY_MAP_TYPES
		});
                
                var zoomLevel = 5;
		
		var Sun = new GIcon();
		Sun.image = "images/sun_marker.png";
		Sun.iconSize = new GSize(60, 60);
		Sun.iconAnchor = new GPoint(30, 30);
		Sun.infoWindowAnchor = new GPoint(30, 0);

		var sun = new GMarker(new GLatLng(0.516648002347,0.210940216571),Sun);
                
		map.addControl(new GLargeMapControl());
		map.addControl(new GMapTypeControl()); 
		map.setCenter(latlng, 13);
		map.setZoom(zoomLevel);
		
                GEvent.addListener(sun, "click", function() {
		    $('#sun').click();
		    
		});
		map.addOverlay(sun);
                
                drawStar("Ceres", 6.114154615610369,-0.19251728809535923,1) ;
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
        function drawStar(name, latitude,longitude,id) {
            
            //create colorbox content
            var html = "<div id='inline_content_"+id+"' style='padding:10px; background:#fff;'>";
	    html += "<h1>"+name+"</h1>";
	    html += "<div>";
	    html += "    <img src='images/asteroid_medium.png' alt='"+name+"' />";
	    html += "    <p>Mass 895.8E18 kg</p>";
	    html += "    <p>Distance from the sun 895.8E18 kg</p>";
	    html += "</div>";
	    html += "</div>";
            
            $("#colorboxContents").append(html);
            
            //create link for colorbox
            html = "<a id='star_"+id+"' class='star' href='#inline_content_"+id+"' ></a>";
            $("#linksContainer").append(html);
            
            $("#star_"+id).colorbox({inline:true, width:"50%"});
            
            //create marker icon
            var Icon = new GIcon();
	    Icon.image = "images/asteroid_marker.png";
	    Icon.iconSize = new GSize(65, 45);
	    Icon.iconAnchor = new GPoint(32, 22);
	    Icon.infoWindowAnchor = new GPoint(32, 0);
                
            //create marker
            var marker = new GMarker(new GLatLng(latitude, longitude),Icon);
            
            //add marker to map
            GEvent.addListener(marker, "click", function() {
		$("#star_"+id).click();
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