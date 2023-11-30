<?php

namespace Database\Factories;

use App\Models\Classe;
use App\Models\Inscription;
use App\Models\User;
use App\Models\Year;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inscription>
 */
class InscriptionFactory extends Factory
{
     /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Inscription::class;

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

            'remark' => $this->faker->regexify('[A-Za-z0-9]{255}'),

            'user_created' => User::factory(),
            'user_updated' => User::factory(),
            'classe_id' => Classe::factory(),
            'user_id' => User::factory(),
            'year_id' => Year::factory(),
        ];
    }
}
