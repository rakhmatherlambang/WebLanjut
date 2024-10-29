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
        Schema::create('lab', function (Blueprint $table){
            $table->id();
            $table->string('nama_lab');
            $table->unsignedBigInteger('jurusan_id')->nullable();
            $table->unsignedBigInteger('kalab_id')->nullable(); 
            $table->foreign('jurusan_id')->references('id')->on('jurusan')->onDelete('set null');
            $table->foreign('kalab_id')->references('id')->on('kalab')->onDelete('set null');
        });
    }

    /** 
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
