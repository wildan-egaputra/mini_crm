<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengguna</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Edit Pengguna</h1>
        <form action="{{ route('superadmin.users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
            </div>
            <div class="form-group">
                <label for="password">Password (kosongkan jika tidak ingin mengubah)</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>
            <div class="form-group">
                <label for="usertype">Jenis Pengguna</label>
                <select class="form-control" id="usertype" name="usertype" required>
                    <option value="pegawai" {{ $user->usertype == 'pegawai' ? 'selected' : '' }}>Pegawai</option>
                    <option value="admin" {{ $user->usertype == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="superadmin" {{ $user->usertype == 'superadmin' ? 'selected' : '' }}>Superadmin</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('superadmin.users.index') }}" class="btn btn-primary">Kembali</a>
        </form>
    </div>
</body>
</html>
