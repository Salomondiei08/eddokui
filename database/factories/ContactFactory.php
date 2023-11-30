<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

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

            'name' =>$this->faker->name,
            'email'=>  $this->faker->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'subject' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'message' => $this->faker->text,

            'user_created' => User::factory(),
            'user_updated' => User::factory(),
            'user_id' => User::factory(),
        ];
    }
}
