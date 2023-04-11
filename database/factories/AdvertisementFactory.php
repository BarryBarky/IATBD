<?php

namespace Database\Factories;

use App\Models\Pet;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Log;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Advertisement>
 */
class AdvertisementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public $advertisements = [
        [
            "title" => "Een lieve hond, kat en een konijn. Wij zijn even op vakantie",
            "image" => "seeds/advertisements/animal_2-animal_5-animal_10.png",
            "pets" => [
                2, 5, 10
            ],
            "chosen" => false
        ],
        [
            "title" => "Kan iemand oppassen voor mijn huisdieren. Ik ga op wintersport",
            "image" => "seeds/advertisements/animal_1-animal_4.png",
            "pets" => [
                1, 4
            ],
            "chosen" => false
        ],
        [
            "title" => "Wij gaan verbouwen en hebben een grotere manage nodig. Kan er iemand in de tussentijd op onze paarden passen?",
            "image" => "seeds/advertisements/animal_6-animal_7.png",
            "pets" => [
                6, 7
            ],
            "chosen" => false
        ],
        [
            "title" => "Aantal lieve hamsters hebben even onderdak nodig. Makkelijk om voor op te passen",
            "image" => "seeds/advertisements/animal_8-animal_9.png",
            "pets" => [
                8, 9
            ],
            "chosen" => false
        ],
        [
            "title" => "Lieve konijnen, Makkelijk in omgang!",
            "image" => "seeds/advertisements/animal_11-animal_12.png",
            "pets" => [
                11, 12
            ],
            "chosen" => false
        ]
    ];


    public function definition()
    {
        $advertisement = fake('nl_NL')->randomElement($this->advertisements);
        while ($advertisement["chosen"] === false) {
            $advertisement["chosen"] = true;
            return [
                "title" => $advertisement['title'],
                "image" => $advertisement['image'],
                "starting_period" => fake('nl_NL')->dateTimeBetween('now', '+1 week'),
                "ending_period" => fake('nl_NL')->dateTimeBetween('+1 week', '+5 week'),
                "price_in_euros" => fake('nl_NL')->randomElement([15, 25, 30, 35, 45, 50, 55])
            ];
        }
    }
}
