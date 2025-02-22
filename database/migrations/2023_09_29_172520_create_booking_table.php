<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('booking', function (Blueprint $table) {
            $table->id('id_booking');
            $table->dateTime('ngay_dat', $precision = 0);
            $table->date('ngay_to_chuc');
            $table->time('thoi_gian_bat_dau', $precision = 0);
            $table->time('thoi_gian_ket_thuc', $precision = 0);
            $table->string('su_kien', 255);
            $table->string('ghi_chu_admin', 2000)->nullable();
            $table->unsignedInteger('so_luong')->nullable();
            $table->boolean('booking_status')->default(0);
            $table->unsignedInteger('id_bo_mon')->length(2);
            $table->foreign('id_bo_mon')->references('id_bo_mon')->on('bo_mon')->onDelete('no action')->onUpdate('cascade');
            $table->unsignedInteger('id_user');
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('id_phong');
            $table->foreign('id_phong')->references('id_phong')->on('phong')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('id_ca_hoc')->length(2);
            $table->foreign('id_ca_hoc')->references('id_ca_hoc')->on('ca_hoc')->onDelete('no action')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking');
    }
};
