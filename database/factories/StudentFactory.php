<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Country;
use App\Models\Student;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

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
            'email_verified_at' => $this->faker->dateTime(),
            'remember_token' => Str::random(10),

            'status' => $this->faker->boolean,
            'checked_at' => $this->faker->dateTime(),
            'orphelin' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'orph'=> $this->faker->regexify('[A-Za-z0-9]{255}'),

            'content' => $this->faker->text,
            'activity_group' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'job_parent' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'type_parent' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'religion' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'church' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'birth_place' => $this->faker->regexify('[A-Za-z0-9]{255}'),

            'user_created' => User::factory(),
            'user_updated' => User::factory(),

            'last_name' => $this->faker->lastName,
            'first_name' => $this->faker->firstName,
            'email' => $this->faker->safeEmail,
            'password' => $this->faker->password,
            'desc' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'date_enter'=> $this->faker->dateTime(),
            'habita'=> $this->faker->regexify('[A-Za-z0-9]{255}'),

            'location' => '{}',
            'sex' => $this->faker->randomElement(["M","F"]),
            'birth_at' => $this->faker->dateTime(),

            'bio' => $this->faker->text,
            'other' => '{}',
            'countries_id' => Country::factory(),
            'parent_id' => Student::factory(),
        ];
    }
}
