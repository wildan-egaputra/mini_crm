<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Divisi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Divisi</h1>
        <form action="{{ route('superadmin.divisi.update', $divisi->id) }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <label for="name">Nama Divisi</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $divisi->name) }}" required>
            </div>
            <div class="form-group">
                <label>Pilih Pegawai</label>
                <div class="form-check">
                    @foreach($employes as $employe)
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="employes[]" value="{{ $employe->id }}" {{ in_array($employe->id, $divisi->employes->pluck('id')->toArray()) ? 'checked' : '' }}>
                                {{ $employe->nama_depan }} {{ $employe->nama_belakang }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>

            <a href="{{ route('superadmin.divisi.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
        
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
