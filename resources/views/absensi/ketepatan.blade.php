@extends('layouts.app')

@section('content')
<h4>Data history Absensi Karyawan</h4>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama Karyawan</th>
            <th>Departemen</th>
            <th>Tanggal</th>
            <th>Check In</th>
            <th>Status Masuk</th>
            <th>Check Out</th>
            <th>Status Keluar</th>
        </tr>
    </thead>
    <tbody>
       @foreach($data as $attendance)
        <tr>
            <td>{{ $attendance->employee->name }}</td>
            <td>{{ $attendance->employee->department->name ?? '-' }}</td>
            <td>{{ $attendance->date }}</td>
            <td>{{ $attendance->check_in_time ? \Carbon\Carbon::parse($attendance->check_in_time)->format('H:i') : '-' }}</td>
            <td>{{ $attendance->status }}</td>
            <td>{{ $attendance->check_out_time ? \Carbon\Carbon::parse($attendance->check_out_time)->format('H:i') : '-' }}</td>
            <td>{{ $attendance->status }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection