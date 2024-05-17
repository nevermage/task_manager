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
        DB::table('role')->insert([
            ['abbreviation' => 'DEV', 'title' => 'Developer'],
            ['abbreviation' => 'QA', 'title' => 'Quality Assurance'],
            ['abbreviation' => 'BA', 'title' => 'Business Analyst'],
            ['abbreviation' => 'UI/UX', 'title' => 'UI/UX Designer'],
            ['abbreviation' => 'PM', 'title' => 'Project Manager'],
            ['abbreviation' => 'DBA', 'title' => 'Database Administrator'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};
