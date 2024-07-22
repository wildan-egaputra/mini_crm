<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Divisi</title>
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
            text-align: center;
            color: #ffffff;
        }
        .btn {
            display: inline-block;
            margin-bottom: 10px;
            padding: 10px 20px;
            font-size: 12px;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s linear;
        }
        .btn-primary {
            background-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-info {
            background-color: #17a2b8;
        }
        .btn-info:hover {
            background-color: #117a8b;
        }
        .btn-warning {
            background-color: #ffc107;
        }
        .btn-warning:hover {
            background-color: #e0a800;
        }
        .btn-danger {
            background-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .table th, .table td {
            padding: 15px; /* Perbesar padding */
            text-align: left;
            font-size: 14px; /* Perbesar ukuran font */
            vertical-align: middle;
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
        form {
            display: inline;
        }
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .pagination a, .pagination span {
            display: inline-block;
            padding: 6px 12px;
            font-size: 12px;
            color: #ffffff;
            background-color: #333;
            border: 1px solid #444;
            border-radius: 5px;
            margin: 0 2px;
            text-decoration: none;
            transition: background-color 0.3s linear;
        }
        .pagination a:hover {
            background-color: #555;
        }
        .pagination .active {
            background-color: #007bff;
            border-color: #007bff;
        }
        .pagination .disabled {
            background-color: #666;
            border-color: #666;
            cursor: not-allowed;
        }
        .pagination .page-item {
            display: none; /* Hide page numbers */
        }
        .pagination .page-prev, .pagination .page-next {
            display: inline-block; /* Show only Previous and Next */
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Daftar Divisi</h1>
        <a href="{{ url('admin/dashboard') }}" class="btn btn-primary">Kembali</a>
        <a href="{{ route('divisi.create') }}" class="btn btn-primary">Tambah Divisi</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Divisi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($divisions as $index => $divisi)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $divisi->name }}</td>
                        <td>
                            <a href="{{ route('divisi.show', $divisi->id) }}" class="btn btn-info">Lihat</a>
                            <a href="{{ route('divisi.edit', $divisi->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('divisi.destroy', $divisi->id) }}" method="POST" class="delete-form" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination">
            @if ($divisions->onFirstPage())
                <span class="page-item disabled">Previous</span>
            @else
                <a class="page-item page-prev" href="{{ $divisions->previousPageUrl() }}">Previous</a>
            @endif

            @if ($divisions->hasMorePages())
                <a class="page-item page-next" href="{{ $divisions->nextPageUrl() }}">Next</a>
            @else
                <span class="page-item disabled">Next</span>
            @endif
        </div>
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
