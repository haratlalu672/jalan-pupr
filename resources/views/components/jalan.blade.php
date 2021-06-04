<script>
    informasi = L.icon({
    iconSize:     [25,41], 
    shadowSize:   [41,41], 
    iconAnchor:   [12,41], 
    popupAnchor:  [1,-34] 
});

    @foreach ($jalan as $m)
	var marker = L.marker([{{  $m->latitude }}, {{  $m->longitude  }}]).addTo(mymap)
	marker.bindPopup('<img style="width: 200px; height: 150px;" src="{{ asset("storage/" . $m->gambar) }}"> <br><br><strong>{{  $m->judul  }}</strong><br>Kode Laporan : {{  "JL-" . str_pad($m->id, 6, "0", STR_PAD_LEFT)  }}<br>Alamat : {{  $m->lokasi  }}');
	@endforeach
	let overlays = {
		'Informasi' : information,
        }
	L.control.layers(baseLayers, overlays).addTo(mymap);
</script>