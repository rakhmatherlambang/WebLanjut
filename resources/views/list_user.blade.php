@extends('layouts.app')

@section('content')
<h1>{{ $title }}</h1>
<a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Tambah</a>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>NPM</th>
            <th>Kelas</th>
            <th>Foto</th>
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
                    <img src="{{ asset('storage/' . $user->foto) }}" alt="Profile Picture" width="100">
                </td>
                
                <td>
                    <a href="{{ route('user.show', $user->id) }}" class="btn btn-warning sm-3">View</a>
                    <a href="{{ route('user.edit', $user['id']) }}" class="btn btn-warning btn-sm-3">Edit</a>
                    <form action="{{ route('user.destroy', $user['id']) }}" method="POST" style="display:inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm-3" onclick="return confirm('Apakah anda yakin ingin mendelete user ini?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
