<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employe</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Edit Employe</h1>
        <form action="{{ route('superadmin.employe.update', $employe->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama_depan">Nama Depan:</label>
                <input type="text" class="form-control" id="nama_depan" name="nama_depan" value="{{ $employe->nama_depan }}">
            </div>

            <div class="form-group">
                <label for="nama_belakang">Nama Belakang:</label>
                <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" value="{{ $employe->nama_belakang }}">
            </div>

            <div class="form-group">
                <label for="companies_id">Perusahaan:</label>
                <select class="form-control" id="companies_id" name="companies_id">
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}" {{ $employe->companies_id == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $employe->email }}">
            </div>

            <div class="form-group">
                <label for="phone">Telepon:</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $employe->phone }}">
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</body>
</html>
