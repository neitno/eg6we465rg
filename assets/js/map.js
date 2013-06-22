var map;
      var zadar = new google.maps.LatLng(44.125819,15.222978);

      var MY_MAPTYPE_ID = 'custom_style';

      function initialize() {

        var featureOpts = [
          {
            stylers: [{
                        saturation: -100
                    }]
                }, {
                    featureType: "road.highway",
                    elementType: "geometry",
                    stylers: [{
                        weight: 3.1
                    }, {
                        lightness: -30
                    }, {
                        color: "#06669f"
                    }]
                }, {
                    featureType: "road.arterial",
                    elementType: "labels",
                    stylers: [{
                        visibility: "on"
                    }, {
                        invert_lightness: true
                    }]
                }, {
                    featureType: "road.arterial",
                    elementType: "labels.text.fill",
                    stylers: [{
                        lightness: 100
                    }]
                }, {
                    featureType: "road.arterial",
                    elementType: "labels.text.stroke",
                    stylers: [{
                        lightness: 16
                    }, {
                        weight: 2.9
                    }]
                }, {
                    featureType: "road.local",
                    elementType: "geometry",
                    stylers: [{
                        color: "#888888"
                    }, {
                        weight: 1.3
                    }, {
                        lightness: 64
                    }]
                }, {
                    featureType: "road.arterial",
                    elementType: "geometry",
                    stylers: [{
                        color: "#007acc"
                    }, {
                        weight: 2.6
                    }]
                }, {
                    featureType: "road.highway",
                    elementType: "labels.text",
                    stylers: [{
                        invert_lightness: true
                    }]
                }, {
                    featureType: "road.highway",
                    elementType: "labels.text.stroke",
                    stylers: [{
                        lightness: 16
                    }]
                }, {
                    featureType: "road.highway",
                    elementType: "labels.text.fill",
                    stylers: [{
                        lightness: 100
                    }]
                }, {
                    featureType: "landscape.man_made",
                    stylers: [{
                        lightness: 40
                    }]
                }, {
                    featureType: "poi.school",
                    elementType: "geometry.fill",
                    stylers: [{
                        lightness: -15
                    }]
                }, {
                    featureType: "poi.school",
                    elementType: "labels.text",
                    stylers: [{
                        invert_lightness: true
                    }]
                }, {
                    featureType: "poi.school",
                    elementType: "labels.text.fill",
                    stylers: [{
                        lightness: 100
                    }, {
                        weight: 0.1
                    }]
                }, {
                    featureType: "poi.school",
                    elementType: "labels.text.stroke",
                    stylers: [{
                        lightness: 19
                    }, {
                        weight: 3.2
                    }
            ]
          }
        ];

        var mapOptions = {
          zoom: 16,
          center: zadar,
          disableDefaultUI: true,
          zoomControl: false,
          streetViewControl: false,
          panControl: false,
          rotateControl: false,
          mapTypeControlOptions: {
            mapTypeIds: [google.maps.MapTypeId.ROADMAP, MY_MAPTYPE_ID]
          },
          mapTypeId: MY_MAPTYPE_ID
        };

        map = new google.maps.Map(document.getElementById('map-canvas'),
            mapOptions);

        var styledMapOptions = {
          name: 'Custom Style'
        };

        var marker = new google.maps.Marker({
            position: zadar,
            map: map,
            title: "Mioc Zd",
            animation: google.maps.Animation.DROP,/*BOUNCE*/
			icon: "assets/img/map-icon.png"
            //icon: "http://i.imgur.com/UGwNGG0.png"
        });

        var customMapType = new google.maps.StyledMapType(featureOpts, styledMapOptions);

        map.mapTypes.set(MY_MAPTYPE_ID, customMapType);
      }

      google.maps.event.addDomListener(window, 'load', initialize);