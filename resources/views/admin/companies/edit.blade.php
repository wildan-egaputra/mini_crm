<!DOCTYPE html>
<html>
<head>
    <title>Edit Perusahaan (Superadmin)</title>
    <style>
        html {
            height: 100vh;
        }
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom, #0d0d44 40%, #000 100%);
            color: #ddd;
            text-align: center;
        }

        .form-container {
            width: 60%;
            margin: 20px auto;
            background-color: #222;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
        }

        .btn {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            text-decoration: none;
            margin: 5px;
            display: inline-block;
            border-radius: 5px;
        }

        .btn-danger {
            background-color: #f44336;
        }
    </style>
</head>
<body>
    <h1>Edit Perusahaan</h1>
    <div class="form-container">
        <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" value="{{ $company->name }}" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ $company->email }}" required>

            <label for="logo">Logo:</label>
            <input type="file" id="logo" name="logo">
            @if ($company->logo)
                <img src="{{ asset('storage/companies/' . $company->logo) }}" alt="Logo" width="100">
            @endif

            <label for="website">Website:</label>
            <input type="url" id="website" name="website" value="{{ $company->website }}" required>

            <button type="submit" class="btn">Simpan</button>
            <a href="{{ route('companies.index') }}" class="btn btn-danger">Batal</a>
        </form>
    </div>
</body>
</html>
