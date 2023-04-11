<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pet>
 */
class PetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    private $pets = [
        "animal_1" => [
            "profile_pic" => "seeds/animals/animal_1",
            "pet_type_id" => 1,
            "description" => "De hond heeft behoefte aan voeding met de juiste voedingsstoffen, zoals eiwitten, koolhydraten, vetten, vitaminen en mineralen. Zorg voor voeding die hierin voorziet, bijvoorbeeld brokken of vers vlees. Leer de hond gehoorzaamheid en zindelijkheid aan. Beloon gewenst gedrag en corrigeer ongewenst gedrag op een positieve manier."
        ],
        "animal_2" => [
            "profile_pic" => "seeds/animals/animal_2",
            "pet_type_id" => 1,
            "description" => "De hond heeft behoefte aan voeding met de juiste voedingsstoffen, zoals eiwitten, koolhydraten, vetten, vitaminen en mineralen. Zorg voor voeding die hierin voorziet, bijvoorbeeld brokken of vers vlees. Leer de hond gehoorzaamheid en zindelijkheid aan. Beloon gewenst gedrag en corrigeer ongewenst gedrag op een positieve manier."
        ],
        "animal_3" => [
            "profile_pic" => "seeds/animals/animal_3",
            "pet_type_id" => 1,
            "description" => "De hond heeft behoefte aan voeding met de juiste voedingsstoffen, zoals eiwitten, koolhydraten, vetten, vitaminen en mineralen. Zorg voor voeding die hierin voorziet, bijvoorbeeld brokken of vers vlees. Leer de hond gehoorzaamheid en zindelijkheid aan. Beloon gewenst gedrag en corrigeer ongewenst gedrag op een positieve manier."
        ],
        "animal_4" => [
            "profile_pic" => "seeds/animals/animal_4",
            "pet_type_id" => 2,
            "description" => "De kat heeft behoefte aan eiwitten en vetten uit vlees en vis. Zorg voor voeding die hierin voorziet, zoals brokjes of natvoer. De kat is van nature nieuwsgierig en heeft ruimte nodig om te kunnen spelen en jagen. Zorg voor een veilige en uitdagende omgeving."
        ],
        "animal_5" => [
            "profile_pic" => "seeds/animals/animal_5",
            "pet_type_id" => 2,
            "description" => "De kat heeft behoefte aan eiwitten en vetten uit vlees en vis. Zorg voor voeding die hierin voorziet, zoals brokjes of natvoer. KDe kat is van nature nature nieuwsgierig en heeft ruimte nodig om te kunnen spelen en jagen. Zorg voor een veilige en uitdagende omgeving."
        ],
        "animal_6" => [
            "profile_pic" => "seeds/animals/animal_6",
            "pet_type_id" => 5,
            "description" => "Zorg ervoor dat het paard altijd vers drinkwater heeft. Dit moet minimaal één keer per dag worden ververst. Zorg voor een goede omheining rondom het weiland of paddock, zodat het paard niet kan ontsnappen of zichzelf kan verwonden."
        ],
        "animal_7" => [
            "profile_pic" => "seeds/animals/animal_7",
            "pet_type_id" => 5,
            "description" => "Zorg ervor dat het paard altijd vers drinkwater heeft. Dit moet minimaal één keer per dag worden ververst. Zorg voor een goede omheining rondom het weiland of paddock, zodat het paard niet kan ontsnappen of zichzelf kan verwonden."
        ],
        "animal_8" => [
            "profile_pic" => "seeds/animals/animal_8",
            "pet_type_id" => 3,
            "description" => "het heeft een ruim hok nodig, bij voorkeur met meerdere verdiepingen of buizen om in te klimmen en te spelen. Het heeft uitgebalanceerd dieet nodig dat bestaat uit hamstervoer, groenten en fruit, en af en toe een stukje ei, kaas of kip."
        ],
        "animal_9" => [
            "profile_pic" => "seeds/animals/animal_9",
            "pet_type_id" => 3,
            "description" => "het heeft een ruim hok nodig, bij voorkeur met meerdere verdiepingen of buizen om in te klimmen en te spelen. Het heeft uitgebalanceerd dieet nodig dat bestaat uit hamstervoer, groenten en fruit, en af en toe een stukje ei, kaas of kip."
        ],
        "animal_10" => [
            "profile_pic" => "seeds/animals/animal_10",
            "pet_type_id" => 4,
            "description" => "Zorg voor een geschikte huisvesting voor het konijn. Een ruime kooi of hok met voldoende ventilatie en een zacht beddengoed is essentieel voor het comfort van het konijn. Zorg ook voor voldoende ruimte om te bewegen en speelgoed om mee te spelen. Geef het konijn een uitgebalanceerd dieet dat bestaat uit hooi, verse groenten en fruit, en een beperkte hoeveelheid konijnenvoer. Zorg ervoor dat het konijn altijd toegang heeft tot vers water"
        ],
        "animal_11" => [
            "profile_pic" => "seeds/animals/animal_11",
            "pet_type_id" => 4,
            "description" => "Zorg voor een geschikte huisvesting voor het konijn. Een ruime kooi of hok met voldoende ventilatie en een zacht beddengoed is essentieel voor het comfort van het konijn. Zorg ook voor voldoende ruimte om te bewegen en speelgoed om mee te spelen. Geef het konijn een uitgebalanceerd dieet dat bestaat uit hooi, verse groenten en fruit, en een beperkte hoeveelheid konijnenvoer. Zorg ervoor dat het konijn altijd toegang heeft tot vers water"
        ],
        "animal_12" => [
            "profile_pic" => "seeds/animals/animal_12",
            "pet_type_id" => 4,
            "description" => "Zorg voor een geschikte huisvesting voor het konijn. Een ruime kooi of hok met voldoende ventilatie en een zacht beddengoed is essentieel voor het comfort van het konijn. Zorg ook voor voldoende ruimte om te bewegen en speelgoed om mee te spelen. Geef het konijn een uitgebalanceerd dieet dat bestaat uit hooi, verse groenten en fruit, en een beperkte hoeveelheid konijnenvoer. Zorg ervoor dat het konijn altijd toegang heeft tot vers water"
        ]
    ];

    public function definition()
    {
        return [
            "name" => fake('nl_NL')->firstName(),
            "age" => fake('nl_NL')->randomElement([1, 2, 3, 4]),
            "sex" => fake('nl_NL')->randomElement(["Man", "Vrouw"]),
            "description" => function (array $attributes) {
                return $this->pets[$attributes['animal']]['description'];
            },
            "profile_pic" => function (array $attributes) {
                return $this->pets[$attributes['animal']]['profile_pic'];
            },
            "pet_type_id" => function (array $attributes) {
                return $this->pets[$attributes['animal']]['pet_type_id'];
            },
        ];
    }
}
