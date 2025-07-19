@extends('layouts.app')

@section('content')
<h4>Tambah Karyawan</h4>
<form action="{{ route('employees.store') }}" method="POST">
    @csrf
    {{-- FORM BLADE: ubah "id" menjadi "employee_id" --}}
<div class="mb-3">
    <label for="employee_id" class="form-label">ID Karyawan</label>
    <input type="text" class="form-control" name="id" required>
    <small class="text-muted">ID harus unik (contoh: EMP001)</small>
</div>
    <div class="mb-3">
        <label for="name" class="form-label">Nama</label>
        <input type="text" class="form-control" name="name" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" required>
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Telepon</label>
        <input type="text" class="form-control" name="phone">
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Alamat</label>
        <textarea class="form-control" name="address"></textarea>
    </div>
    <div class="mb-3">
    <label for="department_id" class="form-label">Departemen</label>
    <select name="department_id" class="form-control" required>
        <option value="">-- Pilih Departemen --</option>
        @foreach($departments as $dept)
            <option value="{{ $dept->id }}">{{ $dept->department_name }}</option>
        @endforeach
    </select>
</div>

    <button type="submit" class="btn btn-success">Simpan</button>
</form>
@endsection