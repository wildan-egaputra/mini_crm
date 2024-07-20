<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .dashboard-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .dashboard-card {
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        .dashboard-card a {
            display: block;
            margin-top: 10px;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            color: #fff;
        }
        .dashboard-card a.admin {
            background-color: #007bff;
        }
        .dashboard-card a.pegawai {
            background-color: #28a745;
        }
        .dashboard-card a.superadmin {
            background-color: #6f42c1;
        }
        .dashboard-card a.dashboard {
            background-color: #17a2b8;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="dashboard-header">
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="dashboard-card p-4 text-gray-900 dark:text-gray-100">
                    <p class="mb-3">{{ __("You're logged in!") }}</p>
                    @if (Auth::user()->usertype == 'admin')
                        <a href="admin/dashboard" class="admin">Lanjutkan Sebagai Admin</a>
                    @elseif (Auth::user()->usertype == 'pegawai')
                        <a href="pegawai/dashboard" class="pegawai">Lanjutkan Sebagai Pegawai</a>
                    @elseif (Auth::user()->usertype == 'superadmin')
                        <a href="superadmin/dashboard" class="superadmin">Lanjutkan Sebagai SuperAdmin</a>
                    @else
                        <a href="{{ route('dashboard') }}" class="dashboard">Kembali ke Dashboard</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>
</html>
