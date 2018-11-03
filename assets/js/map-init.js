 function initMap() {
        var mapDiv = document.getElementById('GoMap');
        var markerLatLng = {lat: 37.77610833280797, lng: -122.41745173931122};

        var map = new google.maps.Map(mapDiv, {
            center: {lat: 37.77610833280797, lng: -122.41745173931122},
            zoom: 8
        });

         var marker = new google.maps.Marker({
          position: markerLatLng,
          map: map,
          title: 'Unistore'
        });


        // google.maps.event.addListener(map, "rightclick", function(event) {
        //     var lat = event.latLng.lat();
        //     var lng = event.latLng.lng();
        //     // populate yor box/field with lat, lng
        //     console.log("Lat=" + lat + "; Lng=" + lng);
        // });

      }
