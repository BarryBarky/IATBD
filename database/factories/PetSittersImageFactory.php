<?php

namespace Database\Factories;

use App\Models\PetSittersImage;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PetSittersImage>
 */
class PetSittersImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        $randNumber = fake('nl_NL')->randomElement([1, 2, 3, 4, 5, 6, 7]);
        return [
            "url" => "seeds/environment/environment" . $randNumber .".jpg"
        ];
    }
}
