@extends('layouts.app')

@section('content')

<h1>{{ $title }}</h1>
<form action="{{ route('user.update', $user['id']) }}" method="POST" enctype="multipart/form-data" novalidate>
    @csrf
    @method('PUT')
    <div>
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required>
        @error('nama')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="npm">NPM:</label>
        <input type="text" id="npm" name="npm" value="{{ old('npm') }}" required>
        @error('npm')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="kelas_id">Kelas:</label>
        <select name="kelas_id" id="kelas_id" required>
            <option value="">Pilih Kelas</option>
            @foreach ($kelas as $kelasItem)
                <option value="{{ $kelasItem->id }}"
                  {{ ($kelasItem->id) == $user->kelas_id ? 'selected' : '' }}>
                  {{ $kelasItem->nama_kelas }}
                </option>
            @endforeach
        </select>
        @error('kelas_id')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="foto">Foto:</label>
        <input type="file" id="foto" name="foto"> <br>
        @if ($user->foto)
        <img src="{{ asset($user->foto) }}" alt="User Foto" width="100" class="mt-2">
        @endif
    </div>
    <div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
@endsection
