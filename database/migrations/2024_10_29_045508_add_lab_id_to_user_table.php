<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('user', function (Blueprint $table) {
            $table->unsignedBigInteger('lab_id')->nullable()->after('kelas_id');
            $table->foreign('lab_id')->references('id')->on('lab')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('user', function (Blueprint $table) {
            $table->dropForeign(['lab_id']);
            $table->dropColumn('lab_id');
        });
    }

};
