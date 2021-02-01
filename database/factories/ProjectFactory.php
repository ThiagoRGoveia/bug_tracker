<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Team;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Project' . $this->faker->randomDigit(),
            'team_id' => Team::factory()->create()->id,
            'description' => $this->faker->sentence(),
            'start' => Carbon::now(),
            'end' => Carbon::now()->nextWeekday()
        ];
    }
}
