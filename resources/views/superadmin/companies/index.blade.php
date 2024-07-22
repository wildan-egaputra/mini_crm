<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Companies</title>
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
        h1 {
            color: #ffffff;
            margin: 0;
            text-align: center;
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
            max-width: 300px;
            max-height: 300px;
            object-fit: cover;
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
            background-color: #292929;
            padding: 5px;
        }
        .btn-primary:hover {
            background-color: #5a5a5a;
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
        .btn-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1>Companies</h1>
        <div class="btn-container">
            <a href="{{ url('superadmin/dashboard') }}" class="btn btn-primary">Kembali</a>
            <a href="companies/create" class="btn btn-primary">Create Company</a>
        </div>
        
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Logo</th>
                    <th>Website</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($companies as $company)
                    <tr>
                        <td>{{ $company->id }}</td>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->email }}</td>
                        <td><img src="{{ asset('storage/companies/' . $company->logo) }}" alt="{{ $company->name }}" style="width: 500px; height: 500px;"></td>
                        <td>{{ $company->website }}</td>
                        <td>
                            <a href="{{ route('superadmin.companies.edit', $company->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('superadmin.companies.destroy', $company->id) }}" method="POST" class="delete-form" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $companies->links() }}
    </div>

    <script>
        $(document).ready(function() {
            $('.delete-form').on('submit', function(event) {
                var result = confirm('Apakah Anda yakin ingin menghapus data ini?');
                if (!result) {
                    event.preventDefault();
                }
                return result;
            });
        });
    </script>
</body>
</html>
