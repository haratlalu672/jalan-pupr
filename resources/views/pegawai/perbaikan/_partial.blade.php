<div class="form-group">
    <label for="users">Petugas</label>
    <select type="text" name="users[]" id="users" class="form-control select2" multiple>
        @foreach ($users as $data)
        <option {{ $perbaikan->users()->find($data->id) ? 'selected' : '' }} value="{{ $data->id }}">
            {{ $data->name }}</option>
        @endforeach
    </select>
    @error('users')
    <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>