<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pengguna</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .actions {
            display: flex;
            justify-content: space-around;
        }
        .btn {
            padding: 5px 10px;
            text-decoration: none;
            color: white;
            border-radius: 5px;
        }
        .btn-create {
            background-color: green;
        }
        .btn-edit {
            background-color: blue;
        }
        .btn-delete {
            background-color: red;
        }
        .btn:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Daftar Pengguna</h1>
        <table>
            <a href="{{ route('superadmin.users.create') }}" class="btn btn-edit">Tambah</a>
            <a href="{{ route('superadmin.dashboard') }}" class="btn btn-edit">Kembali</a>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->usertype }}</td>
                        <td class="actions">
                            <a href="{{ route('superadmin.users.edit', $user->id) }}" class="btn btn-edit">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
