<?php 
// Block direct access to file
defined( 'ABSPATH' ) or die( 'Not Authorized!' );
function wpb_adding_scripts() {
    wp_register_style('my_stylesheet', plugins_url('assets/style.css', __FILE__),'1.1.1');
    wp_enqueue_style('my_stylesheet');

    wp_register_script('script', plugins_url('assets/map.earth.js', __FILE__), array('jquery'),'1.1.1', true);
     
    wp_enqueue_script('script');
    }
      
add_action( 'wp_enqueue_scripts', 'wpb_adding_scripts' ); 

function earth_map_shortcode(){
    ?>
<script>
var myearth;
var markerPoint = [];
var markerPointerIds = [];
var sunAngle = 180;
var pp = [];
window.addEventListener( "earthjsload", function() {

	myearth = new Earth( document.getElementById('earth-map'), {

		location: { lat: 0, lng : 360 },
		sunLocation: { lat: 0, lng: 360 - sunAngle },
		zoom: 0.925,
		mapLandColor: '#a5cb7b',
		mapSeaColor: '#7FA6F5',
		dragPolarLimit : 0.8,
		light: 'sun',
		shadows: true,
		lightAmbience: 0.8,
		shininess: 0.14,
		mapStyles : '#GR, #ES, #PT, #PK, #MX, #PE, #AR, #BF, #ET, #GN, #SL, #LR, #CI, #GH, #TG, #BJ, #NG, #ZM, #AO, #RW, #BI, #TZ, #MW, #MZ { fill: #79b73a; stroke: #79b73a; } \
		#GL, #IS, #AQ { fill: #e5e8ee; stroke: #e5e8ee; } \
		#SE, #NO, #FI, #MY, #ID, #JP, #CA, #GT, #HN, #SV, #NI, #GF, #SR, #GY, #SS, #CM, #GQ, #CF, #GA, #CG, #CD, #UG, #BR { fill: #69b73b; stroke: #69b73b; } \
		#AU, #KE, #MG, #ZW, #TR, #IR, #KZ, #TJ, #KG, #AF, #CL, #MA, #ER, #DJ, #SO, #GM, #SN, #NA, #LS, #BW, #SZ, #ZA { fill: #97c75b; stroke: #97c75b; } \
		#SY, #JO, #LB, #IL, #KW, #SA, #AE, #QA, #YE, #OM, #IQ, #UZ, #TM, #DZ, #TN, #EG, #SD, #ML, #LY, #EH, #MR, #NE, #TD { fill: #e6e18b; stroke: #e6e18b; } \
',
		// autoRotate : true,
		// autoRotateSpeed: 0.5,
		// autoRotateDelay: 0,
		// autoRotateStart: 2000,			
	} );

 
	//data of location and marker content
	var markerBoxContent = [
				{ location: { lat: 25.189170, lng: 55.273401}, markerContent: '<div class="markerContent"><p class="markerHeading">UAE - Down Town Dubai<p><p class="infoLines"><img src="<?php echo plugins_url('assets/map-pin.png', __FILE__) ?>" alt="pin" width="40" height="40"><span class="infoLinesText"><strong>HQ: </strong>Dera dubai near union metro station.</span></p><p class="infoLines"><img src="<?php echo plugins_url('assets/phone.png', __FILE__) ?>" alt="pin" width="40" height="40" ><span class="infoLinesText">+971 55-852-8949</span></p><p class="infoLines">We offer a local and city to city professional moving service for your flats luggage, offices, villas, and warehouse shifting.</p><a href="/contact/" class="markerButton">Directions</a></div>' },
				{ location: {lat: 25.279747, lng: 55.331684}, markerContent: '<div class="markerContent"><p class="markerHeading">UAE - Dera Dubai<p><p class="infoLines"><img src="<?php echo plugins_url('assets/map-pin.png', __FILE__) ?>" alt="pin" width="40" height="40"><span class="infoLinesText"><strong>HQ: </strong>Dera dubai near union metro station.</span></p><p class="infoLines"><img src="<?php echo plugins_url('assets/phone.png', __FILE__) ?>" alt="pin" width="40" height="40" ><span class="infoLinesText">+971 55-852-8949</span></p><p class="infoLines">We offer a local and city to city professional moving service for your flats luggage, offices, villas, and warehouse shifting. </p><a href="/contact/" class="markerButton">Directions</a></div>'  },
				{ location: {lat: 25.333437, lng: 55.426002}, markerContent: '<div class="markerContent"><p class="markerHeading">UAE - Sharja <p><p class="infoLines"><img src="<?php echo plugins_url('assets/map-pin.png', __FILE__) ?>" alt="pin" width="40" height="40"><span class="infoLinesText"><strong>HQ: </strong>Dera dubai near union metro station.</span></p><p class="infoLines"><img src="<?php echo plugins_url('assets/phone.png', __FILE__) ?>" alt="pin" width="40" height="40" ><span class="infoLinesText">+971 55-852-8949</span></p><p class="infoLines">We offer a local and city to city professional moving service for your flats luggage, offices, villas, and warehouse shifting. </p><a href="/contact/" class="markerButton">Directions</a></div>' },
				{ location: {lat: 25.407349, lng: 55.527154}, markerContent: '<div class="markerContent"><p class="markerHeading">UAE - Ajman<p><p class="infoLines"><img src="<?php echo plugins_url('assets/map-pin.png', __FILE__) ?>" alt="pin" width="40" height="40"><span class="infoLinesText"><strong>HQ: </strong>Dera dubai near union metro station.</span></p><p class="infoLines"><img src="<?php echo plugins_url('assets/phone.png', __FILE__) ?>" alt="pin" width="40" height="40" ><span class="infoLinesText">+971 55-852-8949</span></p><p class="infoLines">We offer a local and city to city professional moving service for your flats luggage, offices, villas, and warehouse shifting.</p><a href="/contact/" class="markerButton">Directions</a></div>'  },
				{ location: {lat: 24.459109, lng: 54.309526}, markerContent: '<div class="markerContent"><p class="markerHeading">UAE - Abu Dabhi<p><p class="infoLines"><img src="<?php echo plugins_url('assets/map-pin.png', __FILE__) ?>" alt="pin" width="40" height="40"><span class="infoLinesText"><strong>HQ: </strong>Dera dubai near union metro station.</span></p><p class="infoLines"><img src="<?php echo plugins_url('assets/phone.png', __FILE__) ?>" alt="pin" width="40" height="40" ><span class="infoLinesText">+971 55-852-8949</span></p><p class="infoLines">We offer a local and city to city professional moving service for your flats luggage, offices, villas, and warehouse shifting.</p><a href="/contact/" class="markerButton">Directions</a></div>'  },
				{ location: {lat: 25.869723, lng: 56.015642}, markerContent: '<div class="markerContent"><p class="markerHeading">UAE - Ras Al Khaimah<p><p class="infoLines"><img src="<?php echo plugins_url('assets/map-pin.png', __FILE__) ?>" alt="pin" width="40" height="40"><span class="infoLinesText"><strong>HQ: </strong>Dera dubai near union metro station.</span></p><p class="infoLines"><img src="<?php echo plugins_url('assets/phone.png', __FILE__) ?>" alt="pin" width="40" height="40" ><span class="infoLinesText">+971 55-852-8949</span></p><p class="infoLines">We offer a local and city to city professional moving service for your flats luggage, offices, villas, and warehouse shifting. </p><a href="/contact/" class="markerButton">Directions</a></div>'  },
			
			];


	myearth.addEventListener( "ready", function() {

	//marker box information
	markerbox_overlay = this.addOverlay({
					content: '<div id="markerBox"><p id="markerTxt"></p></div>',
					visible: false,
					containerScale: 1,
					depthScale: 0.5
				});
		//add marker
		for (let i = 0; i < markerBoxContent.length; i++) {
			markerPoint[i] = this.addMarker({
				mesh: "Marker",
				markerContent:markerBoxContent[i].markerContent ,
				location: markerBoxContent[i].location,
				color : "#FF5A5F",
				scale: 0.4,
				hotspot: true,
				occlude: false,
			});
		
			let isClicked=false;
			markerPoint[i].addEventListener('click', ()=>{
				
				if(isClicked)
				{
					document.getElementById( 'markerBox' ).style.display = 'none';
					isClicked=false;
				return ;
				}
		
			// rotate earth if needed
			if (myearth.goTo(markerBoxContent[i].location, { relativeDuration: 100, approachAngle: 12, end: function () { auto_rotate = false; } })) {
				auto_rotate = true;
			}
			document.getElementById("markerTxt").innerHTML=markerBoxContent[i].markerContent;
			markerbox_overlay.location = markerBoxContent[i].location;
			markerbox_overlay.visible = true;
			document.getElementById( 'markerBox' ).style.display = 'block';
			isClicked=true;
		
			console.log(isClicked);
			});

			var pointMarkerContent=[];
			pointMarkerContent[i]= document.getElementById("markerPoint["+i+"]");
			pointMarkerContent[i].addEventListener('click', ()=>{
			document.getElementById("markerTxt").innerHTML=markerBoxContent[i].markerContent;
			markerbox_overlay.location = markerBoxContent[i].location;
			markerbox_overlay.visible = true;
			document.getElementById( 'markerBox' ).style.display = 'block';
			isClicked=true;
			console.log(isClicked);
			})
		}
	} );
} );

function gotoAddMarker( markerId ) {
	myearth.goTo( markerPoint[ markerId ].location, { duration: 250, relativeDuration: 70 } );
}

</script>

<style>.earth-container{position:relative;z-index:1;height: 700px;width: 700px; background-color: #F5F0F0;}.earth-container::before{content:"";display:block;padding-top:100%}.earth-container>canvas{position:absolute;top:0;left:0;z-index:1000;user-select:none;}.earth-draggable{cursor:all-scroll;cursor:-webkit-grab;cursor:grab}.earth-dragging *{cursor:all-scroll;cursor:-webkit-grabbing!important;cursor:grabbing!important}.earth-clickable{cursor:pointer}.earth-overlay{position:absolute;top:0;left:0;user-select:none;pointer-events:none;transform-origin:0 0}.earth-overlay a,.earth-overlay input,.earth-overlay button{pointer-events:all}.earth-hittest{position:fixed;width:200vh;max-width:100%;top:0;left:0;z-index:999999}.earth-hittest svg{max-width:100%;height:auto;display:block;margin:0;opacity:0}</style>
</head>

<body cz-shortcut-listen="true">

	<div id="wrapper">
		
		<!-- top menus -->
		<div id="nav-menus">
		
			<div id="markerPoint[0]" class="markerPoint" onclick="gotoAddMarker( 0 );">
				<span  class="nav_heading">Down Town Dubai</span>
				<br>
				<span class="nav_sub_heading">Service Open</span>
			</div>
			<div id="markerPoint[1]" class="markerPoint" onclick="gotoAddMarker( 1 );">
				<span class="nav_heading">Dera Dubai</span>	
				<br>
				<span class="nav_sub_heading">Service Open</span>
			</div>
			
			<div id="markerPoint[2]" class="markerPoint" onclick="gotoAddMarker( 2 );">
				<span  class="nav_heading">Sharja</span>
				<br>
				<span class="nav_sub_heading">Service Open</span>
			</div>
			<div id="markerPoint[3]" class="markerPoint" onclick="gotoAddMarker( 3 );">
				<span  class="nav_heading">Ajman</span>
				<br>
				<span class="nav_sub_heading">Service Open</span>
			</div>
			<div id="markerPoint[4]" class="markerPoint" onclick="gotoAddMarker( 4 );">
				<span class="nav_heading">Abu Dabhi</span>	
				<br>
				<span class="nav_sub_heading">Service Open</span>
			</div>
			
			<div id="markerPoint[5]" class="markerPoint" onclick="gotoAddMarker( 5 );">
				<span  class="nav_heading">Ras Al Khaimah</span>
				<br>
				<span class="nav_sub_heading">Service Open</span>
			</div>
		
			</div>
		
			<!-- Earth map -->
			<div id="earth-map" class="earth-js earth-container earth-ready">
				<!-- <canvas width="871" height="871" style="display: block; width: 581.125px; height: 581.125px;"></canvas> -->
			</div>

		</div>

<?php
    }
    add_shortcode('mapEarth', 'earth_map_shortcode');
?>