<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Employee;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Models\AttendanceHistory;

class AttendanceController extends Controller
{
    public function index()
    {
        // Get today's attendance data
        $attendances = Attendance::with('employee')
            ->whereDate('date', Carbon::today())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('attendance.index', compact('attendances'));
    }

    public function showCheckInForm()
    {
        $employees = Employee::all();
        return view('attendance.checkin', compact('employees'));
    }

    public function checkIn(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
        ]);
        
        $now = Carbon::now();
        $today = Carbon::today();
        
        // Cek apakah sudah absen hari ini
        $existingAttendance = Attendance::where('employee_id', $request->employee_id)
        ->whereDate('date', $today)
        ->first();
        
        if ($existingAttendance) {
            echo "Sudah melakukan cek in pada hari ini";
        }
        
        // Tentukan status keterlambatan
        $status = $this->determineCheckInStatus($now);

        // Simpan data kehadiran utama
        $attendance = Attendance::create([
            'employee_id' => $request->employee_id,
            'date' => $today,
            'check_in_time' => $now->format('H:i:s'),
            'status' => $status
        ]);


        // Simpan ke tabel attendance_histories
        AttendanceHistory::create([
            'attendance_id'    => $attendance->id,
            'employee_id'      => $request->employee_id,
            'date_attendance'  => $today,
            'attendance_type'  => 'Absen Masuk',
        ]);

        $employee = Employee::find($request->employee_id);

        return redirect()->route('attendance.index')
            ->with('success', "Absen masuk berhasil untuk {$employee->name}! Status: {$status}");
    }


    public function showCheckOutForm()
    {
        // Only show employees who have checked in but not checked out today
        $employees = Employee::whereHas('attendances', function ($query) {
            $query->whereDate('date', Carbon::today())
                ->whereNotNull('check_in_time')
                ->whereNull('check_out_time');
        })->get();

        return view('attendance.checkout', compact('employees'));
    }

    public function checkOut(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
        ]);

        $now = Carbon::now();
        $today = Carbon::today();

        $attendance = Attendance::where('employee_id', $request->employee_id)
            ->whereDate('date', $today)
            ->whereNull('check_out_time')
            ->first();

        if (!$attendance) {
            return redirect()->back()
                ->with('error', 'Tidak ditemukan data absen masuk hari ini atau sudah melakukan absen keluar.');
        }

        // Calculate checkout status
        $checkInTime = Carbon::parse($attendance->date . ' ' . $attendance->check_in_time);
        $checkOutStatus = $this->determineCheckOutStatus($now, $checkInTime);

        $attendance->update([
            'check_out_time' => $now->format('H:i:s'),
            'status' => $checkOutStatus
        ]);

        $employee = Employee::find($request->employee_id);

        return redirect()->route('attendance.index')
            ->with('success', "Absen keluar berhasil untuk {$employee->name}! Status: {$checkOutStatus}");
    }

    public function logs()
    {
        $logs = Attendance::with('employee')
            ->orderBy('date', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(50);

        return view('attendance.logs', compact('logs'));
    }

    public function ketepatanAbsensi(Request $request)
    {
        $query = AttendanceHistory::with('employee');

        if ($request->tanggal) {
            $query->whereDate('date_attendance', $request->tanggal);
        } else {
            // Default to current month
            $query->whereMonth('date_attendance', Carbon::now()->month)
                ->whereYear('date_attendance', Carbon::now()->year);
        }

        $data = $query->orderBy('date_attendance', 'desc')->get();

        return view('absensi.ketepatan', compact('data'));
    }

    private function determineCheckInStatus($checkInTime)
    {
        $lateThreshold = Carbon::today()->setTime(8, 15, 0); // 08:15 AM

        return $checkInTime->gt($lateThreshold) ? 'Terlambat' : 'present';
    }

    private function determineCheckOutStatus($checkOutTime, $checkInTime)
    {
        $earlyThreshold = Carbon::today()->setTime(16, 0, 0); // 4:00 PM
        $minimumWorkHours = 8;

        // Calculate work duration in hours
        $workHours = $checkOutTime->diffInHours($checkInTime);

        if ($checkOutTime->lt($earlyThreshold)) {
            return 'Pulang Awal';
        }

        if ($workHours < $minimumWorkHours) {
            return 'Jam Kerja Kurang';
        }

        return 'Tepat Waktu';
    }
}
