<?php

namespace App\Http\Controllers;

use App\Models\AttendanceHistory;

AttendanceHistory::create([
    'employee_id' => $attendance->employee_id,
    'attendance_id' => $attendance->id,
    'date_attendance' => now(),
    'attendance_type' => 1, // 1 untuk masuk, 2 untuk keluar
    'description' => 'Check-in: ' . ($attendance->check_in_time ?? '-'),
]);
