<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Divisi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Daftar Divisi</h1>
        <a href="{{ url('pegawai/dashboard') }}" class="btn btn-primary mb-3">Kembali</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Divisi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($divisions as $index => $divisi)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $divisi->name }}</td>
                        <td>
                            <a href="{{ route('pegawai.divisi.show', $divisi->id) }}" class="btn btn-info">Lihat</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $divisions->links() }}
    </div>

</body>
</html>
