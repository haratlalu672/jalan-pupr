<script>
    var mymap = L.map('mapid').setView([-3.330017, 114.591265], 13);

    let baru = L.layerGroup()
	let	berat = L.layerGroup()
	let	ringan = L.layerGroup()

let streets = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    minZoom: 1,
    maxZoom: 18,
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    layers: [baru, berat, ringan]
}).addTo(mymap);


let baseLayers = {
		"Streets": streets,
	};


</script>