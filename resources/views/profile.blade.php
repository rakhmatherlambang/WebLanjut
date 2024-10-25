<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dark Cyber Profile</title>
    <!-- Link ke file CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="profile-card">
        @if($foto) <!-- Periksa apakah foto ada -->
            <img src="{{ asset('storage/' . $foto) }}" alt="Profile Picture">
        @else
            <img src="{{ asset('assets/img/blkgirl.jpeg') }}" alt="Default Profile Picture"> <!-- Gambar default jika foto tidak ada -->
        @endif

        <h2>Nama: {{ $nama }}</h2>
        <p>NPM: {{ $npm }}</p>
        <p>Kelas: {{ $nama_kelas ?? 'Kelas tidak ditemukan' }}</p>
    </div>
</body>
</html>


