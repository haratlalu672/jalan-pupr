<div class="form-group">
    <label for="laporan">Laporan</label>
    <textarea class="form-control @error('laporan') is-invalid @enderror" name="laporan" cols="30" rows="10"></textarea>
    @error('laporan') <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-group">
    <label for="dokumentasi">Dokumentasi</label>
    <input id="dokumentasi" type="file" class="form-control @error('dokumentasi') is-invalid @enderror"
        name="dokumentasi" @error('dokumentasi') <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>