<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Bug;
use App\Models\User;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class BugFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bug::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Bug' . $this->faker->randomDigit(),
            'due_date' => Carbon::now()->nextWeekday(),
            'reproducible' => $this->faker->boolean(),
            'severity' => $this->faker->randomElement(['High', 'Medium', 'Low']),
            'status' => $this->faker->randomElement(['Closed', 'Open', 'Blocked', 'Review']),
            'description' => $this->faker->sentence(),
            'project_id' => Project::factory()->create()->id,
            'user_id' => User::factory()->create()->id,
        ];
    }
}
