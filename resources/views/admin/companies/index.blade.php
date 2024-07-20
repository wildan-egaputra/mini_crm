<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Companies - Mini CRM</title>
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
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #202020;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.219);
            border-radius: 5px;
        }
        h3 {
            text-align: center;
            color: #ffffff;
            margin: 0;
        }
        .text-center {
            text-align: center;
        }
        .tabmah {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 20px;
            color: #fff;
            background-color: #333;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s linear;
        }
        .tabmah:hover {
            background-color: #555;
        }
        .card {
            border-radius: 10px;
            overflow: hidden;
        }
        .card-body {
            padding: 0;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .table th, .table td {
            padding: 10px;
            text-align: left;
        }
        .table th {
            background-color: #333;
            color: #fff;
        }
        .table tr:nth-child(even) {
            background-color: #171717;
        }
        .table td {
            color: #f9f9f9;
            background-color: #202020;
        }
        .table img {
            max-width: 100px;
            max-height: 100px;
            border-radius: 5px;
        }
        .btn-success, .btn-primary, .btn-danger, .btn-warning, .btn-dark {
            color: #fff;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 5px;
            border: none;
            cursor: pointer;
        }
        .btn-success {
            background-color: #28a745;
        }
        .btn-success:hover {
            background-color: #218838;
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
        .btn-warning {
            background-color: #ffc107;
        }
        .btn-warning:hover {
            background-color: #e0a800;
        }
        .btn-dark {
            background-color: #343a40;
        }
        .btn-dark:hover {
            background-color: #23272b;
        }
        form {
            display: inline;
        }
        @media (max-width: 768px) {
            .table thead {
                display: none;
            }
            .table, .table tbody, .table tr, .table td {
                display: block;
                width: 100%;
            }
            .table tr {
                margin-bottom: 15px;
            }
            .table td {
                text-align: right;
                padding-left: 50%;
                position: relative;
            }
            .table td::before {
                content: attr(data-label);
                position: absolute;
                left: 10px;
                width: calc(50% - 20px);
                text-align: left;
                font-weight: bold;
            }
        }
        .pagination-container {
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }
        .pagination-container .btn {
            margin: 0 5px;
        }
        .pagination-container .disabled {
            background-color: #6c757d;
            cursor: not-allowed;
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
    <div class="text-center mb-4">
        <h3>Data Companies</h3>
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
                                <img src="{{ asset('storage/companies/' . $company->logo) }}" alt="{{ $company->name }} Logo">
                            </td>
                            <td><a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Data companies belum tersedia.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <a href="{{ url('admin/dashboard') }}" class="kembali">Kembali</a>

            <!-- Pagination -->
            @if ($companies->hasPages())
                <div class="pagination-container">
                    @if ($companies->onFirstPage())
                        <span class="btn btn-dark btn-sm disabled">Previous</span>
                    @else
                        <a href="{{ $companies->previousPageUrl() }}" class="btn btn-dark btn-sm">Previous</a>
                    @endif

                    @if ($companies->hasMorePages())
                        <a href="{{ $companies->nextPageUrl() }}" class="btn btn-dark btn-sm">Next</a>
                    @else
                        <span class="btn btn-dark btn-sm disabled">Next</span>
                    @endif
                </div>
            @endif
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
