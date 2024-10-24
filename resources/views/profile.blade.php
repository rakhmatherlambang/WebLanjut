<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dark Cyber Profile</title>
    <!-- Link ke file CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}">
</head>
<body>
    <div class="profile-card">
        <img src="{{ asset('assets/img/blkgirl.jpeg') }}" alt="Profile Picture">
        <h2>Nama: {{ $nama }}</h2>
        <p>NPM: {{ $npm }}</p>
        <p>Kelas: {{ $nama_kelas ?? 'Kelas tidak ditemukan' }}</p>
    </div>
</body>
</html>
