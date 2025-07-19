<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // database/migrations/xxxx_xx_xx_create_employees_table.php
Schema::create('employees', function (Blueprint $table) {
    $table->id(); 
    $table->string('name');
    $table->string('email')->unique();
    $table->string('phone')->nullable();
    $table->text('address')->nullable();
    $table->unsignedBigInteger('department_id');
    $table->timestamps();

    $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
});

    }

    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};