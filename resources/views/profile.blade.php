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
        <h2>{{ $nama }}</h2>
        <p>{{ $kelas }}</p>
        <p>{{ $npm }}</p>
    </div>
</body>
</html>
