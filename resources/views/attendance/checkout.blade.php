@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Form Absen Keluar</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('attendance.checkout') }}" method="POST">
        @csrf {{-- CUKUP pakai ini saja --}}
        
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

        <button type="submit" class="btn btn-success">Absen Keluar</button>
    </form>
</div>
@endsection
