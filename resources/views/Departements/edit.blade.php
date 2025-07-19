@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Departemen</h2>

    <form action="{{ route('departments.update', $department->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Nama Departemen</label>
            <input type="text" name="departement_name" class="form-control" value="{{ $department->departement_name }}" required>
        </div>

        <div class="mb-3">
            <label>Jam Masuk Maksimal</label>
            <input type="time" name="max_clock_in_time" class="form-control" value="{{ $department->max_clock_in_time }}" required>
        </div>

        <div class="mb-3">
            <label>Jam Pulang Maksimal</label>
            <input type="time" name="max_clock_out_time" class="form-control" value="{{ $department->max_clock_out_time }}" required>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('departments.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
