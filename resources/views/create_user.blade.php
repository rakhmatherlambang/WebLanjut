{{-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/create_user.css') }}">
  <title>Create User</title>
</head> --}}
{{-- <body> --}}
  @extends('layouts.app')

  @section('content')

  <h1>Create User</h1>
  <form action="{{ route('user.store') }}" method="POST" novalidate>
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
        <label for="id_kelas">Kelas:</label><br>
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
        <button type="submit">Submit</button>
      </div>
  </form>
  @endsection
{{-- </body>
</html> --}}
