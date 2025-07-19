<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi Karyawan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container py-4">
        <h2 class="mb-4">Sistem Absensi Karyawan</h2>
        <nav class="mb-4">
            <a href="{{ route('employees.index') }}" class="btn btn-outline-primary">Karyawan</a>
            <a href="{{ route('departments.index') }}" class="btn btn-outline-secondary">Departemen</a>
            <a href="{{ route('attendance.checkin.form') }}" class="btn btn-outline-success">Absen Masuk</a>
            <a href="{{ route('attendance.checkout.form') }}" class="btn btn-outline-danger">Absen Keluar</a>
            <a href="{{ route('attendance.logs') }}" class="btn btn-outline-dark">Log Absensi</a>
        </nav>
        @yield('content')
    </div>
</body>
</html>