var firstSet = false;
var customIcons = {
    yes: {
      icon: 'http://213.113.7.224/img/logo_green50px.png'
    },
    no: {
      icon: 'http://213.113.7.224/img/logo_blue50px.png'
    }
  };

function load() {
     
	var map = new google.maps.Map(document.getElementById("map"), {
	center: new google.maps.LatLng(48.856614, 2.352222),
	zoom: 15,
	styles:
      [
  {
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#1d2c4d"
      }
    ]
  },
  {
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#8ec3b9"
      }
    ]
  },
  {
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#1a3646"
      }
    ]
  },
  {
    "featureType": "administrative.country",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#4b6878"
      }
    ]
  },
  {
    "featureType": "administrative.land_parcel",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#64779e"
      }
    ]
  },
  {
    "featureType": "administrative.province",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#4b6878"
      }
    ]
  },
  {
    "featureType": "landscape.man_made",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#334e87"
      }
    ]
  },
  {
    "featureType": "landscape.natural",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#023e58"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#283d6a"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#6f9ba5"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#1d2c4d"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#023e58"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#3C7680"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#304a7d"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#98a5be"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#1d2c4d"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#2c6675"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#255763"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#b0d5ce"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#023e58"
      }
    ]
  },
  {
    "featureType": "transit",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#98a5be"
      }
    ]
  },
  {
    "featureType": "transit",
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#1d2c4d"
      }
    ]
  },
  {
    "featureType": "transit.line",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#283d6a"
      }
    ]
  },
  {
    "featureType": "transit.station",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#3a4762"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#0e1626"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#4e6d70"
      }
    ]
  }
]
});
	
	
	
    
	function GeolocationControl(controlDiv, map) {

    // Set CSS for the control button
    var controlUI = document.createElement('div');
    controlUI.style.backgroundColor = '#10454e';
    controlUI.style.borderStyle = 'solid';
    controlUI.style.borderWidth = '1px';
    controlUI.style.borderColor = '#29afc4';
    controlUI.style.backgroundImage = "url(http://213.113.7.224/img/gps_icon.png)";
    controlUI.style.height = '26px';
    controlUI.style.width = '26px';
    controlUI.style.cursor = 'pointer';
	controlUI.style.marginTop = '50%';
    controlDiv.appendChild(controlUI);



  

    // Setup the click event listeners to geolocate user
    google.maps.event.addDomListener(controlUI, 'click', geolocate);
}
	
	function setMapOnAll(map) {
        for (var i = 0; i < markers.length; i++) {
          markers[i].setMap(map);
        }
      }

function geolocate() {

    if (navigator.geolocation) {

        navigator.geolocation.getCurrentPosition(function (position) {

	var pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

	// Set marker position and visibility
	marker.setPosition(pos);
	marker.setVisible(true);	
		
	// Center map
	map.setCenter(pos);
        });
    }	
}	
	
	
	// Create the DIV to hold the control and call the constructor passing in this DIV
	var geolocationDiv = document.createElement('div');
	var geolocationControl = new GeolocationControl(geolocationDiv, map);
	
	map.controls[google.maps.ControlPosition.TOP_CENTER].push(geolocationDiv);
	
	// Create the search box and link it to the UI element.
	var input = document.getElementById('pac-input');
	var searchBox = new google.maps.places.SearchBox(input);
	map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
	
	// Create an invisible marker to be used later
    	marker = new google.maps.Marker({
        position: new google.maps.LatLng(0, 0),
        animation: google.maps.Animation.DROP,
	icon: 'http://213.113.7.224/img/user_icon.png',
        visible: false,
        map: map
	});
	// Bias the SearchBox results towards current map's viewport.
	map.addListener('bounds_changed', function() {
		searchBox.setBounds(map.getBounds());
	});

	var infoWindow = new google.maps.InfoWindow;

           
    // Change this depending on the name of your PHP file
    downloadUrl("phpsqlajax_genxml3.php", function(data) {
    
		var xml = data.responseXML;
		var markers = xml.documentElement.getElementsByTagName("marker");
		
		for (var i = 0; i < markers.length; i++) {
			var name = markers[i].getAttribute("name");
			var address = markers[i].getAttribute("address");
			var type = markers[i].getAttribute("type");
			var quality = markers[i].getAttribute("quality");
			var karma = markers[i].getAttribute("karma");
			var user = markers[i].getAttribute("user");	
			var point = new google.maps.LatLng(
            parseFloat(markers[i].getAttribute("lat")),
            parseFloat(markers[i].getAttribute("lng")));
			//Popup window variable
			var html = "<b>" + name + address + "</b>";
			var icon = customIcons[type] || {};
			var marker = new google.maps.Marker({
			map: map,
			position: point,
			icon: icon.icon
		});
			
			
			//THIS CODE IS TO BE IMPLEMENTED WHEN YOU WANT TO ADD A NETWORK WITH ACCOUNT PRIV
			
	//Eventlistener for adding marker to map on click
	google.maps.event.addListener(map, 'click', function(event) {
		//if SESSION
   		placeMarker(event.latLng);
		
	});
		
			
	function placeMarker(location) {
		
		if ( firstSet ) {
    			marker.setPosition(location);
 		 } 
		else {
    			marker = new google.maps.Marker({
      			position: location,
			animation: google.maps.Animation.DROP,
     			map: map,
			icon: 'http://213.113.7.224/img/logo_gray50px.png'
		});
			firstSet = true;
  		}
		var locArr = String(location);
		var lat = String(locArr.slice(1,12));
		var lon = String(locArr.slice(18,29));
		if (lon[0] == "," || lon[0] == " ") {
			if (lon[0] == " ") {
				var lon = String(locArr.slice(19,30));
			}
			else {
			var lon = String(locArr.slice(20,31));
			}
		}
		//document.getElementById("lat").innerHTML=lat;
		//document.getElementById("lon").innerHTML=lon;
		document.getElementById('latval').value = lat;
		document.getElementById('lonval').value = lon;
	}
			
	
	
		
			
			
			
	// Listen for the event fired when the user selects a prediction and retrieve
	// more details for that place.
	searchBox.addListener('places_changed', function() {
		var places = searchBox.getPlaces();

        if (places.length == 0) {
            return;
		};
	// For each place, get the icon, name and location.
	var bounds = new google.maps.LatLngBounds();
          
           
	places.forEach(function(place) {
	if (!place.geometry) {
		console.log("Returned place contains no geometry");
		return;
	}
	if (place.geometry.viewport) {
		// Only geocodes have viewport.
		bounds.union(place.geometry.viewport);
        } 
	else {
        bounds.extend(place.geometry.location);
		}
	var icon = {
		url: place.icon,
		size: new google.maps.Size(71, 71),
		origin: new google.maps.Point(0, 0),
		anchor: new google.maps.Point(17, 34),
		scaledSize: new google.maps.Size(25, 25)
	} 
})
	map.fitBounds(bounds);
});
          
          

	bindInfoWindow(marker, map, infoWindow, html);
}});

	geolocate();

}


	function bindInfoWindow(marker, map, infoWindow, html) {
		google.maps.event.addListener(marker, 'click', function() {
		infoWindow.setContent(html);
		infoWindow.open(map, marker);
		//var name = marker.getAttribute("name");
		//var address = marker.getAttribute("address");
		//var type = marker.getAttribute("type");
		//var quality = marker.getAttribute("quality");
		//var karma = marker.getAttribute("karma");
		//var user = marker.getAttribute("user");
		//var htmlname = String(name);
		//var htmladdress = String(address);
		//var htmltype = String(type);
		//var htmlquality = String(quality);
		//var htmlkarma = String(karma);
		//var htmluser = String(user);
		//document.getElementById("htmlname").innerHTML=htmlname;
		//document.getElementById("htmladdress").innerHTML=htmladdress;
		//document.getElementById("htmltype").innerHTML=htmltype;
		//document.getElementById("htmlquality").innerHTML=htmlquality;
		//document.getElementById("htmlkarma").innerHTML=htmlkarma;
		document.getElementById("htmluser").innerHTML=String(html); 
	});
}

	function downloadUrl(url, callback) {
		var request = window.ActiveXObject ?
        new ActiveXObject('Microsoft.XMLHTTP') :
        new XMLHttpRequest;

    request.onreadystatechange = function() {
      if (request.readyState == 4) {
		request.onreadystatechange = doNothing;
        callback(request, request.status);
      }
    };

    request.open('GET', url, true);
    request.send(null);
  }

function doNothing() {}
