<div class="form-group">
    <label for="name">Nama</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="nama"
        value="{{ old('name') ?? $user->name }}">
    <span class="text-danger">{{ $errors->first('name') }}</span>
</div>
<div class="form-group">
    <label for="username">Username</label>
    <input type="longtext" class="form-control" id="username" name="username" placeholder="Username"
        value="{{ old('username') ?? $user->username }}">
    <span class="text-danger">{{ $errors->first('username') }}</span>
</div>
<div class="form-group">
    <label for="role">Role</label>
    <select type="text" name="role" id="role" class="form-control">
        @foreach ($role as $data)
        <option {{ $user->role()->find($data->id) ? 'selected' : '' }} value="{{ $data->id }}">
            {{ $data->name }}</option>
        @endforeach
    </select>
    @error('consoles')
    <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="profil">Foto</label>
    <input id="profil" type="file" class="form-control @error('profil') is-invalid @enderror" name="profil"
        @error('profil') <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>