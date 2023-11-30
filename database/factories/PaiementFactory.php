<?php

namespace Database\Factories;

use App\Models\Inscription;
use App\Models\Paiement;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paiement>
 */
class PaiementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Paiement::class;

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

            'moy_paie' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'montant' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'total_paiement' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'description' => $this->faker->text,

            'user_created' => User::factory(),
            'user_updated' => User::factory(),
            'inscription_id' => Inscription::factory(),
        ];
    }
}
