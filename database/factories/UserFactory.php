<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Country;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @var string
     */
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'code' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'rank' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'slug' => $this->faker->slug,
            'lang' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'email_verified_at' => $this->faker->dateTime(),
            'remember_token' => Str::random(10),
            'status' => $this->faker->boolean,
            'checked_at' => $this->faker->dateTime(),
            'user_created' => User::factory(),
            'user_updated' => User::factory(),
            'last_name' => $this->faker->lastName,
            'first_name' => $this->faker->firstName,
            'email' => $this->faker->safeEmail,
            'password' => $this->faker->password,
            'pseudo' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'location' => '{}',
            'occupation' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'level' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'sex' => $this->faker->randomElement(["M","F"]),
            'birth_at' => $this->faker->dateTime(),
            'birth_place' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'marital' => $this->faker->boolean,
            'child' => $this->faker->randomFloat(0, 0, 9999999999.),
            'bio' => $this->faker->text,
            'other' => '{}',
            'countries_id' => Country::factory(),
            'parent_id' => User::factory(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
   /*  public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    } */
}
