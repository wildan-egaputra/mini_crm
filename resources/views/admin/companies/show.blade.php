<!DOCTYPE html>
<html>
<head>
    <title>Detail Perusahaan (Superadmin)</title>
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

        .details-container {
            width: 60%;
            margin: 20px auto;
            background-color: #222;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            text-align: left;
        }

        .details-container img {
            max-width: 100px;
            display: block;
            margin: 20px auto;
        }

        .details-container label {
            font-weight: bold;
        }

        .details-container p {
            margin: 10px 0;
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
    <h1>Detail Perusahaan</h1>
    <div class="details-container">
        <img src="{{ asset('storage/companies/' . $company->logo) }}" alt="Logo">
        <p><label>Nama:</label> {{ $company->name }}</p>
        <p><label>Email:</label> {{ $company->email }}</p>
        <p><label>Website:</label> <a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a></p>
        <a href="{{ route('companies.index') }}" class="btn">Kembali</a>
    </div>
</body>
</html>
