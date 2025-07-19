<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'address', 'department_id'];

    public function department()
    {
        return $this->belongsTo(Department::class,'department_id', 'id');
    }

    // Ubah dari attendance() menjadi attendances() dan gunakan hasMany
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function attendanceHistories()
    {
        return $this->hasMany(AttendanceHistory::class);
    }
}
