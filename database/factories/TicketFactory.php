<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();

        return [
            'project_id' => DB::table('project')->first()->id,
            'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
            'status' => rand(1, 5),
            'description' => $faker->text(),
            'priority_id' => rand(1, 4),
        ];
    }
}
