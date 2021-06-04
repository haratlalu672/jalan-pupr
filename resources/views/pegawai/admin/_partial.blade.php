<div class="form-group">
    <label for="judul">Nama</label>
    <input type="text" class="form-control" id="judul" name="judul" placeholder="nama"
        value="{{ old('judul') ?? $jalan->judul }}">
    <span class="text-danger">{{ $errors->first('judul') }}</span>
</div>
<div class="form-group">
    <label for="lokasi">Lokasi</label>
    <input type="longtext" class="form-control" id="lokasi" name="lokasi" placeholder="Alamat"
        value="{{ old('lokasi') ?? $jalan->lokasi }}">
    <span class="text-danger">{{ $errors->first('lokasi') }}</span>
</div>
<div class="form-group">
    <label for="diameter">Diameter</label>
    <input type="number" class="form-control" id="diameter" name="diameter" placeholder="Diameter dalam cm"
        value="{{ old('diameter') ?? $jalan->diameter }}">
    <span class="text-danger">{{ $errors->first('diameter') }}</span>
</div>
<div class="form-group">
    <label for="kedalaman">Kedalaman</label>
    <input type="number" class="form-control" id="kedalaman" name="kedalaman" placeholder="Kedalaman dalam cm"
        value="{{ old('kedalaman') ?? $jalan->kedalaman }}">
    <span class="text-danger">{{ $errors->first('kedalaman') }}</span>
</div>
<div class="form-group">
    <label for="gambar">Gambar</label>
    <input id="gambar" type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar"
        @error('gambar') <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-group">
    <label for="deskripsi">Latitude</label>
    <input type="text" class="form-control" id="latitude" name="latitude" value="{{ $jalan->latitude }}"
        placeholder="Latitude Marker" readonly>
    <span class="text-danger">{{ $errors->first('latitude')}}</span>
</div>
<div class="form-group">
    <label for="deskripsi">Longitude</label>
    <input type="text" class="form-control" id="longitude" name="longitude" value="{{ $jalan->longitude }}"
        placeholder="Longitude Marker" readonly>
    <span class="text-danger">{{ $errors->first('longitude') }}</span>
</div>