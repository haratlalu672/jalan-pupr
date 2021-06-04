<script>
    if (curLocation[0]==0 && curLocation[1]==0) {
        curLocation=[-3.319017, 114.591265]
    } 
    let Marker = new L.Marker(curLocation, {
        draggable:'true',
        // iconUrl: '{{ asset('css/images/marker-icon-2x-green.png') }}',
        // shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
        // iconSize: [25, 41],
        // iconAnchor: [12, 41],
        // popupAnchor: [1, -34],
        // shadowSize: [41, 41]
        }).addTo(mymap);

    Marker.on('dragend', function (event) { 
        let position = Marker.getLatLng();
        Marker.setLatLng(position,{
            draggable : 'true'
        }).bindPopup(position).update();
        $('#latitude').val(position.lat);
        $('#longitude').val(position.lng).keyup();
     })

     $('#latitude, #longitude').change(function () { 
         let position = [parseInt($('#latitude').val()),parseInt($('#ongitude').val())];
         Marker.setLatLng(position,{
            draggable : 'true'
        }).bindPopup(position).update();
        Map.panTo(position);

        map.addLayer(marker);
     });
</script>