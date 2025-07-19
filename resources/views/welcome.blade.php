@extends('layouts.app')

@section('content')
<div class="text-center">
    <h1>Selamat Datang di Sistem Absensi Karyawan</h1>
    <p>Silakan pilih menu di bawah ini untuk mengakses fitur sistem:</p>

    <div class="d-flex justify-content-center gap-3 mt-4 flex-wrap">
        <a href="{{ route('employees.index') }}" class="btn btn-primary">Karyawan</a>
        <a href="{{ route('departments.index') }}" class="btn btn-secondary">Departemen</a>
        <a href="{{ route('attendance.ketepatan') }}" class="btn btn-info">Cek Ketepatan Absensi</a>
        <a href="{{ route('attendance.index') }}" class="btn btn-dark">Data Absensi</a>
    </div>
</div>
@endsection
