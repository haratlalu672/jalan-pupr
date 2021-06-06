<script>
    var mymap = L.map('mapid').setView([{{ $jalan->latitude }}, {{ $jalan->longitude }}], 14);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    minZoom: 13,
    maxZoom: 18,
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1
}).addTo(mymap);
    
    informasi = L.icon({
    iconSize:     [25,41], 
    shadowSize:   [41,41], 
    iconAnchor:   [12,41], 
    popupAnchor:  [1,-34] 
});
	var marker = L.marker([{{ $jalan->latitude }}, {{ $jalan->longitude }}]).addTo(mymap)
	let overlays = {
		'Informasi' : information,
        }
	L.control.layers(baseLayers, overlays).addTo(mymap);
</script>