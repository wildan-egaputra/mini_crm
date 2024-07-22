<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Employe</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000000;
            color: #333;
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
            text-align: center;
            color: #ffffff;
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
            background-color: #f9f9f9;
        }
        .table td {
            color: #f9f9f9;
            background-color: #171717;
        }
        .edit, .delete {
            color: #fff;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 5px;
        }
        .edit {
            background-color: #333;
            transition: background-color 0.3s linear;
        }
        .edit:hover {
            background-color: #555;
        }
        .delete {
            background-color: #dc3545;
        }
        .delete:hover {
            background-color: #c82333;
        }
        form {
            display: inline;
        }
        .pagination-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .pagination-container a,
        .pagination-container span {
            display: block;
            padding: 10px 15px;
            margin: 0 5px;
            color: #fff;
            background-color: #333;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s linear;
        }
        .pagination-container a:hover {
            background-color: #555;
        }
        .pagination-container .active {
            background-color: #007bff;
            color: #fff;
            cursor: default;
        }
        .pagination-container .disabled {
            background-color: #6c757d;
            cursor: not-allowed;
        }
        .kembali {
            margin-left: 10px;
            text-decoration: none;
            color: #ffffff;
            background-color: #333;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s linear;
        }
        .kembali:hover {
            background-color: #555;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Daftar Employe</h1>
        <a href="employe/create" class="tabmah">Tambah Pegawai Baru</a>
        <a href="{{ url('admin/dashboard') }}" class="kembali">Kembali</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Depan</th>
                    <th>Nama Belakang</th>
                    <th>Perusahaan</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employes as $employe)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $employe->nama_depan }}</td>
                    <td>{{ $employe->nama_belakang }}</td>
                    <td>{{ $employe->company ? $employe->company->name : '-' }}</td>
                    <td>{{ $employe->email }}</td>
                    <td>{{ $employe->phone }}</td>
                    <td>
                        <a href="{{ route('admin.employe.edit', $employe->id) }}" class="edit">Edit</a>
                        <form action="{{ route('admin.employe.destroy', $employe->id) }}" method="POST" class="delete-form" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination-container">
            {{ $employes->links() }}
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.delete-form').on('submit', function(event) {
                var result = confirm('Apakah Anda yakin ingin menghapus data ini?');
                if (!result) {
                    event.preventDefault();
                }
            });
        });
    </script>
</body>
</html>
