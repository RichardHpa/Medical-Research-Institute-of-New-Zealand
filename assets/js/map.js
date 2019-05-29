function init(){
	var mapOptions = {
		//Set where the Map starts
		center:{
			lat: -41.309709,
			lng: 174.780377
		},
		zoom: 16.9,
		disableDefaultUI: true,
		disableDoubleClickZoom: false,
		scrollwheel: false,
		draggable: false,
		styles: [
			{
				stylers:[
					{ hue: "#40ad1e" },
					{ saturation: -20 }
				]
			},
			{
				featureType: "water",
				stylers: [
					{ color: "#152256"}
				]
			}
		]
	}

	var map = new google.maps.Map(document.getElementById("map"), mapOptions);
    var marker = new google.maps.Marker({
        position: mapOptions.center,
        map: map
    });
}

google.maps.event.addDomListener(window, 'load', init);
