<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Year;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Year>
 */
class YearFactory extends Factory
{
     /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Year::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'code' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'rank' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'slug' => $this->faker->slug,
            'lang' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'status' => $this->faker->boolean,
            'user_created' => User::factory(),
            'user_updated' => User::factory(),
            'title' => $this->faker->text,
            'subtitle' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'icon' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'content' => $this->faker->paragraphs(3, true),
        ];
    }
}
