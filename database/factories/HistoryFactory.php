<?php

namespace Database\Factories;

use App\Models\Bug;
use App\Models\User;
use App\Models\History;
use Illuminate\Database\Eloquent\Factories\Factory;

class HistoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = History::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'History' . $this->faker->randomDigit(),
            'bug_id' => Bug::factory()->crate()->id,
            'user_id' => User::factory()->crate()->id,
            'label' => $this->faker->sentence()
        ];
    }
}
