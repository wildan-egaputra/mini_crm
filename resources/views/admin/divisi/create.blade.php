<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Divisi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Tambah Divisi</h1>
        <a href="{{ route('divisi.index') }}" class="btn btn-secondary">Kembali</a><br>
        <form action="{{ route('divisi.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nama Divisi</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label>Pilih Employe</label><br>
                @foreach ($employes as $employe)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="employe_{{ $employe->id }}" name="employes[]" value="{{ $employe->id }}">
                        <label class="form-check-label" for="employe_{{ $employe->id }}">{{ $employe->nama_depan }} {{ $employe->nama_belakang }}</label>
                    </div>
                @endforeach
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
</html>
