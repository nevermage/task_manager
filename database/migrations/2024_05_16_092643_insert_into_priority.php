<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('priority')->insert([
            ['id' => 1, 'title' => 'Critical'],
            ['id' => 2, 'title' => 'High'],
            ['id' => 3, 'title' => 'Medium'],
            ['id' => 4, 'title' => 'Low'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
