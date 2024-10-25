@extends('layouts.app')

@section('content')
  <h1>{{ $title }}</h1>
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>NPM</th>
        <th>Kelas</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
        <tr>
          <td>{{ $user->id }}</td>
          <td>{{ $user->nama }}</td>
          <td>{{ $user->npm }}</td>
          <td>{{ $user->kelas->nama_kelas ?? 'Kelas Tidak Ditemukan' }}</td>
          <td>
            <a href="{{ route('user.show', $user->id) }}">Lihat Profil</a>
          </td>
          <td><!-- Aksi edit/hapus bisa disini --></td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
