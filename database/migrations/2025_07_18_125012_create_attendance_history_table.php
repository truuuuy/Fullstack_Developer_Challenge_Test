<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('attendance_history', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('employee_id'); 
    $table->unsignedBigInteger('attendance_id');
    $table->timestamp('date_attendance');
    $table->tinyInteger('attendance_type');
    $table->text('description')->nullable();
    $table->timestamps();

    $table->foreign('employee_id')
          ->references('id')
          ->on('employees')
          ->onDelete('cascade');

    $table->foreign('attendance_id')
          ->references('id')
          ->on('attendances')
          ->onDelete('cascade');
});

    }

    public function down(): void
    {
        Schema::dropIfExists('attendance_history');
    }
};