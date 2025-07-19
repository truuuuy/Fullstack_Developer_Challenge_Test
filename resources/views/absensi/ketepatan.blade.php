@extends('layouts.app')

@section('content')
<h4>Data history Absensi Karyawan</h4>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama Karyawan</th>
            <th>Departemen</th>
            <th>Tanggal</th>
            <th>Status Masuk</th>
        </tr>
    </thead>
    <tbody>
       @foreach($data as $attendance)
        <tr>
            <td>{{ $attendance->employee->name }}</td>
            <td>{{ $attendance->employee->department->department_name ?? '-' }}</td>
            <td>{{ $attendance->date_attendance }}</td>
            <td>{{ $attendance->attendance_type }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection