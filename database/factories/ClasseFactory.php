<?php

namespace Database\Factories;

use App\Models\Classe;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Classe>
 */
class ClasseFactory extends Factory
{
     /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Classe::class;

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

            'title' => $this->faker->text,
            'description' => $this->faker->text,

            'user_created' => User::factory(),
            'user_updated' => User::factory(),
        ];
    }
}
