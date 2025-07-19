@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-uppercase mb-4 text-center">TAMBAH DEPARTEMEN</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('departments.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="department_name" class="form-label">Nama Departemen</label>
            <input type="text" name="department_name" id="department_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="max_clock_in_time" class="form-label">Jam Masuk Maksimal</label>
            <input type="time" name="max_clock_in_time" id="max_clock_in_time" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="max_clock_out_time" class="form-label">Jam Pulang Maksimal</label>
            <input type="time" name="max_clock_out_time" id="max_clock_out_time" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('departments.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
