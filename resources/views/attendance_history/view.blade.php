<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendanceHistoryTable extends Migration
{
    public function up()
    {
        Schema::create('attendance_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            $table->foreignId('attendance_id')->constrained('attendance')->onDelete('cascade');
            $table->date('date_attendance');
            $table->tinyInteger('attendance_type'); // 1: masuk, 2: keluar
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('attendance_history');
    }
}
