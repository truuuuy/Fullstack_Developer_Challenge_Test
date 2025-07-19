@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-uppercase mb-4 text-center">DATA DEPARTEMEN</h2>

    @if(session('success'))
        <div class="alert alert-success text-uppercase text-center">{{ session('success') }}</div>
    @endif

    {{-- Tombol Kembali ke Halaman Utama --}}
    <div class="mb-3">
        <a href="{{ url('/') }}" class="btn btn-secondary">← Kembali ke Halaman Utama</a>
    </div>

    <div class="d-flex justify-content-between mb-3">
        <h5 class="text-uppercase">Daftar Departemen</h5>
        <a href="{{ route('departments.create') }}" class="btn btn-primary text-uppercase">+ Tambah Departemen</a>
    </div>

    <table class="table table-bordered table-striped text-uppercase">
        <thead class="table-dark text-center">
            <tr>
                <th>Nama Departemen</th>
                <th>Jam Masuk Maks</th>
                <th>Jam Pulang Maks</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @forelse ($departments as $department)
                <tr>
                    <td>{{ $department->department_name }}</td>
                    <td>{{ \Carbon\Carbon::parse($department->max_clock_in_time)->format('H:i') }}</td>
                    <td>{{ \Carbon\Carbon::parse($department->max_clock_out_time)->format('H:i') }}</td>
                    <td>
                        <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-warning btn-sm">EDIT</a>
                        <form action="{{ route('departments.destroy', $department->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">HAPUS</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center">BELUM ADA DATA</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
