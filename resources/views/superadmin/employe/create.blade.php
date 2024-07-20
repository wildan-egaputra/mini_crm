<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pegawai Baru (Superadmin)</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000000;
            color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 90%;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #202020;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.219);
            border-radius: 5px;
            text-align: center;
        }
        h1 {
            color: #ffffff;
        }
        .form-container {
            width: 100%;
            margin: 20px 0;
        }
        label {
            display: block;
            text-align: left;
            margin: 10px 0 5px 0;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            background-color: #333;
            color: #f9f9f9;
        }
        .btn {
            padding: 10px 20px;
            font-size: 12px;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            margin: 5px;
            display: inline-block;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s linear;
        }
        .btn-primary {
            background-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-danger {
            background-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
        .btn-submit {
            background-color: #4CAF50;
        }
        .btn-submit:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tambah Pegawai Baru</h1>
        <div class="form-container">
            <form action="{{ url('superadmin/employe') }}" method="POST">
                @csrf
                <label for="nama_depan">Nama Depan:</label>
                <input type="text" id="nama_depan" name="nama_depan" required>
                
                <label for="nama_belakang">Nama Belakang:</label>
                <input type="text" id="nama_belakang" name="nama_belakang" required>
                
                <label for="companies_id">Companies ID:</label>
                <select id="companies_id" name="companies_id" required>
                    @foreach ($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                </select>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" required>

                <button type="submit" class="btn btn-submit">Simpan</button>
                <a href="{{ url('superadmin/employe') }}" class="btn btn-danger">Batal</a>
            </form>
        </div>
    </div>
</body>
</html>
