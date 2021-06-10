<div class="form-group">
    <label for="jalan">Jalan</label>
    <select type="text" name="jalan" id="jalan" class="form-control">
        @foreach ($jalan as $data)
        <option value="{{ $data->id }}">
            {{ 'JL-' . str_pad($data->id, 6, '0', STR_PAD_LEFT) }} - {{ $data->judul }}</option>
        @endforeach
    </select>
    @error('consoles')
    <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="users">Petugas</label>
    <select type="text" name="users[]" id="users" class="form-control select2" multiple>
        @foreach ($users as $data)
        <option value="{{ $data->id }}">
            {{ $data->name }}</option>
        @endforeach
    </select>
    @error('users')
    <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>