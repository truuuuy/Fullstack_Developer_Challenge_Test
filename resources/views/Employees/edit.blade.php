@extends('layouts.app')

@section('content')
<h4>Edit Karyawan</h4>
<form action="{{ route('employees.update', $employee->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="id" class="form-label">ID Karyawan</label>
        <input type="text" class="form-control" name="id" value="{{ $employee->id }}" required readonly>
        <small class="text-muted">ID tidak dapat diubah</small>
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Nama</label>
        <input type="text" class="form-control" name="name" value="{{ $employee->name }}" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" value="{{ $employee->email }}" required>
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Telepon</label>
        <input type="text" class="form-control" name="phone" value="{{ $employee->phone }}">
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Alamat</label>
        <textarea class="form-control" name="address">{{ $employee->address }}</textarea>
    </div>
    <div class="mb-3">
        <label for="department_id" class="form-label">Departemen</label>
        <select name="department_id" class="form-control">
            <option value="">-- Pilih Departemen --</option>
            @foreach($departments as $dept)
            <option value="{{ $dept->id }}" {{ $employee->department_id == $dept->id ? 'selected' : '' }}>
                {{ $dept->department_name }}
            </option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
