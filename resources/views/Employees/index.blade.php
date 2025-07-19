@extends('layouts.app')

@section('content')
 <div class="mb-3">
        <a href="{{ url('/') }}" class="btn btn-secondary">← Kembali ke Halaman Utama</a>
        <a href="{{ route('employees.create') }}" class="btn btn-primary ms-auto">Tambah Karyawan</a>
    </div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Alamat</th>
            <th>Departemen</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($employees as $emp)
        <tr>
            <td>{{ $emp->id }}</td>
            <td>{{ $emp->name }}</td>
            <td>{{ $emp->email }}</td>
            <td>{{ $emp->phone }}</td>
            <td>{{ $emp->address }}</td>
            <td>{{ $emp->department->department_name ?? '-' }}</td>
            <td>
                <a href="{{ route('employees.edit', $emp->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('employees.destroy', $emp->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
