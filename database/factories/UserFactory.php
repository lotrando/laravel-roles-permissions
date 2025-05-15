<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $firstName = $this->faker->firstName();
        $lastName = $this->faker->lastName();
        $name = $lastName . ' ' . $firstName;

        $transliterate = function ($string) {
            $unwanted_array = [
                'Š' => 'S',
                'š' => 's',
                'Ž' => 'Z',
                'ž' => 'z',
                'Č' => 'C',
                'č' => 'c',
                'Ř' => 'R',
                'ř' => 'r',
                'Ď' => 'D',
                'ď' => 'd',
                'Ť' => 'T',
                'ť' => 't',
                'Ň' => 'N',
                'ň' => 'n',
                'Á' => 'A',
                'á' => 'a',
                'É' => 'E',
                'é' => 'e',
                'Í' => 'I',
                'í' => 'i',
                'Ó' => 'O',
                'ó' => 'o',
                'Ú' => 'U',
                'ú' => 'u',
                'Ů' => 'U',
                'ů' => 'u',
                'Ý' => 'Y',
                'ý' => 'y',
                'Ä' => 'A',
                'ä' => 'a',
                'Ě' => 'E',
                'ě' => 'e',
                'Ö' => 'O',
                'ö' => 'o',
                'Ü' => 'U',
                'ü' => 'u',
                'ß' => 'ss',
                'ĺ' => 'l',
                'Ĺ' => 'L',
                'Ŕ' => 'R',
                'ŕ' => 'r'
            ];
            return strtr($string, $unwanted_array);
        };

        $email = Str::lower($transliterate($lastName) . '.' . $transliterate($firstName)) . '@' . $this->faker->freeEmailDomain();

        return [
            'name' => $name,
            'email' => $email,
            'email_verified_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'password' => bcrypt('password'),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now')
            // 'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
