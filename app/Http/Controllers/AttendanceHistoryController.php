<?php

namespace App\Http\Controllers;

use App\Models\AttendanceHistory;
use Illuminate\Http\Request;

class AttendanceHistoryController extends Controller
{
    /**
     * Menampilkan daftar riwayat absensi
     */
    public function index()
    {
        // Ambil data riwayat absensi dengan relasi employee dan attendance
        $attendanceHistories = AttendanceHistory::with(['employee', 'attendance'])
            ->orderBy('date_attendance', 'desc')
            ->paginate(10);
            
        return view('attendance_history.view', compact('attendanceHistories'));
    }

    /**
     * Menampilkan detail riwayat absensi
     */
    public function show($id)
    {
        $attendanceHistory = AttendanceHistory::with(['employee', 'attendance'])
            ->findOrFail($id);
            
        return view('attendance-history.show', compact('attendanceHistory'));
    }

    /**
     * Menghapus riwayat absensi
     */
    public function destroy($id)
    {
        $attendanceHistory = AttendanceHistory::findOrFail($id);
        $attendanceHistory->delete();
        
        return redirect()->route('attendance-history.index')
            ->with('success', 'Riwayat absensi berhasil dihapus');
    }
}