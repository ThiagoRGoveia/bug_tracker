<?php

namespace Database\Factories;

use App\Models\Bug;
use App\Models\Attachment;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttachmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Attachment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'bug_id' => Bug::factory()->create()->id,
            'label' => 'Attachment' . $this->faker->randomDigit(),
            'url' => $this->faker->url()
        ];
    }
}
