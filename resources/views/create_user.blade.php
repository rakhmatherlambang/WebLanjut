<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h1>Create User</h1>
  <form action="{{ route('user.store') }}" method="POST">
      @csrf
      <div>
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required>
      </div>
      <div>
        <label for="npm">NPM:</label>
        <input type="text" id="npm" name="npm" required>
      </div>
      <div>
        <label for="kelas">Kelas:</label>
        <input type="text" id="kelas" name="kelas" required>
      </div>
      <div>
        <button type="submit">Submit</button>
      </div>
  </form>
</body>
</html>