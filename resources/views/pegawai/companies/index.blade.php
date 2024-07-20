<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Companies - Mini CRM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            border-radius: 10px;
        }
        .table thead {
            background-color: #343a40;
            color: white;
        }
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
        .kembali {
            text-decoration: none;
            color: #ffffff;
            background-color: #333;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s linear;
            margin-bottom: 20px;
            margin top: 30px;
            bottom: 30px;
        }
        .kembali:hover {
            background-color: #555;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center mb-4">
                <h3>Data Companies</h3>
                <a href="{{ url('pegawai/dashboard') }}" class="kembali">Kembali</a>
                <hr>
            </div>
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Logo</th>
                                <th scope="col">Website</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($companies as $company)
                                <tr>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->email }}</td>
                                    <td class="text-center">
                                        <img src="{{ asset('storage/companies/' . $company->logo) }}" alt="{{ $company->name }} Logo" style="max-width: 100px; max-height: 100px;">
                                    </td>
                                    <td><a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a></td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Data companies belum tersedia.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $companies->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 2000
        });
    @elseif(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: '{{ session('error') }}',
            showConfirmButton: false,
            timer: 2000
        });
    @endif
</script>

</body>
</html>
