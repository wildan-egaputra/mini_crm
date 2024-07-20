<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Employe</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Daftar Employe</h1>
        <a href="{{ url('pegawai/dashboard') }}" class="btn btn-primary mb-3">Kembali</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Depan</th>
                    <th>Nama Belakang</th>
                    <th>Perusahaan</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employes as $employe)
                <tr>
                    <td>{{ $employe->id }}</td>
                    <td>{{ $employe->nama_depan }}</td>
                    <td>{{ $employe->nama_belakang }}</td>
                    <td>{{ $employe->company ? $employe->company->name : '-' }}</td> <!-- Menggunakan 'name' untuk nama perusahaan -->
                    <td>{{ $employe->email }}</td>
                    <td>{{ $employe->phone }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
