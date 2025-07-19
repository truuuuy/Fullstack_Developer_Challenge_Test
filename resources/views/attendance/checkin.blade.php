@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Form Absen Masuk</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('attendance.checkin') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="employee_id" class="form-label">Pilih Karyawan</label>
            <select name="employee_id" id="employee_id" class="form-select" required>
                <option value="">-- Pilih Karyawan --</option>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                @endforeach
            </select>
            @error('employee_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Tanggal otomatis hari ini --}}
        <div class="mb-3">
            <label for="date" class="form-label">Tanggal</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ date('Y-m-d') }}" readonly>
        </div>

        <button type="submit" class="btn btn-primary">Absen Masuk</button>
    </form>
</div>
@endsection
