<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Divisi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Detail Divisi</h1>
        <div class="card">
            <div class="card-header">
                <h2>{{ $divisi->name }}</h2>
            </div>
            <div class="card-body">
                <h4>Anggota</h4>
                <ul class="list-group">
                    @forelse ($divisi->employes as $employe)
                        <li class="list-group-item">{{ $employe->nama_depan }} {{ $employe->nama_belakang }}</li>
                    @empty
                        <li class="list-group-item">Tidak ada employe yang terhubung.</li>
                    @endforelse
                </ul>
                <a href="{{ route('divisi.index') }}" class="btn btn-primary mt-3">Kembali ke Daftar Divisi</a>
            </div>
        </div>
    </div>
</body>
</html>
