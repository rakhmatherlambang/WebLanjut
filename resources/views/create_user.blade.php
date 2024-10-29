@extends('layouts.app')

@section('content')

<h1>{{ $title }}</h1>
<form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data" novalidate>
    @csrf
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
                <option value="{{ $kelasItem->id }}" {{ old('kelas_id') == $kelasItem->id ? 'selected' : '' }}>
                    {{ $kelasItem->nama_kelas }}
                </option>
            @endforeach
        </select>
        @error('kelas_id')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    
    <div>
        <label for="lab_id">Lab:</label>
        <select name="lab_id" id="lab_id" required>
            <option value="">Pilih Lab</option>
            @foreach ($labs as $lab)
                <option value="{{ $lab->id }}" {{ old('lab_id') == $lab->id ? 'selected' : '' }}>
                    {{ $lab->nama_lab }}
                </option>
            @endforeach
        </select>
        @error('lab_id')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>


    <div>
        <label for="foto">Foto:</label>
        <input type="file" id="foto" name="foto"> <br>
    </div>
    <div>
        <button type="submit">Submit</button>
    </div>
</form>
@endsection
