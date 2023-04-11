<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


private $reviews = [
    [
        'stars' => 5,
        'title' => 'Geweldige oppasser!',
        'description' => "Ik had het geluk dat deze oppasser voor mijn huisdieren zorgde toen ik op vakantie was. Mijn huisdieren werden goed verzorgd en de oppasser stuurde me regelmatig foto's en updates. Ik zou deze oppasser ten zeerste aanbevelen aan iedereen die een betrouwbare en zorgzame oppasser zoekt."
    ],
    [
        'stars' => 4,
        'title' => 'Goede oppasser, maar kleine verbeterpunten',
        'description' => 'Over het algemeen was ik tevreden met deze oppasser. Mijn huisdieren werden goed verzorgd en de oppasser was punctueel en betrouwbaar. Er waren echter een paar kleine dingen die beter hadden gekund, zoals het opruimen van wat rommel die de huisdieren hadden achtergelaten. Desalniettemin zou ik deze oppasser nog steeds aanbevelen.'
    ],
    [
        'stars' => 2,
        'title' => 'Slechte ervaring met oppasser',
        'description' => 'Ik ben helaas niet tevreden over de oppasser die op mijn huisdieren heeft gepast. Er waren meerdere incidenten waarbij mijn huisdieren niet goed werden verzorgd en ik voelde me niet op mijn gemak bij de oppasser. Ik zou deze oppasser niet aanbevelen.'
    ],
    [
        'stars' => 5,
        'title' => 'Fantastische oppasser!',
        'description' => "Deze oppasser was geweldig! Mijn huisdieren werden goed verzorgd en ik kreeg regelmatig updates en foto\'s van hun tijd samen. Ik voelde me gerustgesteld dat mijn huisdieren in goede handen waren. Ik zou deze oppasser ten zeerste aanbevelen."
    ],
    [
        'stars' => 3,
        'title' => 'Oké, maar niet geweldig',
        'description' => 'Deze oppasser was oké, maar niet geweldig. Mijn huisdieren werden verzorgd, maar er waren een paar kleine dingen die beter hadden gekund, zoals het geven van meer aandacht aan mijn huisdieren en het opruimen van rommel. Ik zou deze oppasser nog steeds aanbevelen, maar met enige reserves.'
    ],
    [
        'stars' => 4,
        'title' => 'Goede oppasser met veel ervaring',
        'description' => 'Deze oppasser had duidelijk veel ervaring met huisdieren en wist precies wat hij deed. Mijn huisdieren werden goed verzorgd en ik voelde me gerustgesteld dat ze in goede handen waren. Er waren echter een paar kleine verbeterpunten die de oppasser in overweging zou kunnen nemen voor de volgende keer.'
    ],
    [
        'stars' => 5,
        'title' => 'Betrouwbare en zorgzame oppasser',
        'description' =>  "Ik was erg blij met deze oppasser. Mijn huisdieren werden goed verzorgd en ik kreeg regelmatig updates en foto's. Ik voelde me gerustgesteld dat mijn huisdieren in goede handen waren en zou deze oppasser zeker aanbevel'"
    ],
];

    public function definition()
    {
        $review = fake('nl_NL')->randomElement($this->reviews);
        return [
            "stars" => $review->stars,
            "title" => $review->title,
            "description" => $review->description
        ];
    }
}
