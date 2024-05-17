<?php

namespace Database\Seeders;

use App\Models\Ticket;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        DB::table('ticket')->insert([
//            'project_id' => DB::table('projects')->first()->id,
//            'title' => Str::random(30),
//            'priority_id' => rand(1, 5),
//        ]);

        Ticket::factory()->count(50)->create();
    }
}
