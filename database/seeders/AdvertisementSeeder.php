<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdvertisementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $advertisements = [
        [
            "title" => "Een lieve hond, kat en een konijn. Wij zijn even op vakantie",
            "start" => 2,
            "sex" => "Man",
            "profile_pic" => "seeds/animals/animal_1",
            "pet_type_id" => 1,
            "description" => "De hond heeft behoefte aan voeding met de juiste voedingsstoffen, zoals eiwitten, koolhydraten, vetten, vitaminen en mineralen. Zorg voor voeding die hierin voorziet, bijvoorbeeld brokken of vers vlees. Leer de hond gehoorzaamheid en zindelijkheid aan. Beloon gewenst gedrag en corrigeer ongewenst gedrag op een positieve manier."
        ],
        [
            "name" => "Sylvia",
            "age" => 3,
            "sex" => "Vrouw",
            "profile_pic" => "seeds/animals/animal_2",
            "pet_type_id" => 1,
            "description" => "De hond heeft behoefte aan voeding met de juiste voedingsstoffen, zoals eiwitten, koolhydraten, vetten, vitaminen en mineralen. Zorg voor voeding die hierin voorziet, bijvoorbeeld brokken of vers vlees. Leer de hond gehoorzaamheid en zindelijkheid aan. Beloon gewenst gedrag en corrigeer ongewenst gedrag op een positieve manier."
        ],
        [
            "name" => "Henk",
            "age" => 4,
            "sex" => "Man",
            "profile_pic" => "seeds/animals/animal_3",
            "pet_type_id" => 1,
            "description" => "De hond heeft behoefte aan voeding met de juiste voedingsstoffen, zoals eiwitten, koolhydraten, vetten, vitaminen en mineralen. Zorg voor voeding die hierin voorziet, bijvoorbeeld brokken of vers vlees. Leer de hond gehoorzaamheid en zindelijkheid aan. Beloon gewenst gedrag en corrigeer ongewenst gedrag op een positieve manier."
        ],
        [
            "name" => "Berta",
            "age" => 1,
            "sex" => "Vrouw",
            "profile_pic" => "seeds/animals/animal_4",
            "pet_type_id" => 2,
            "description" => "De kat heeft behoefte aan eiwitten en vetten uit vlees en vis. Zorg voor voeding die hierin voorziet, zoals brokjes of natvoer. De kat is van nature nieuwsgierig en heeft ruimte nodig om te kunnen spelen en jagen. Zorg voor een veilige en uitdagende omgeving."
        ],
        "animal_5" => [
            "name" => "Klaas",
            "age" => 3,
            "sex" => "Man",
            "profile_pic" => "seeds/animals/animal_5",
            "pet_type_id" => 2,
            "description" => "De kat heeft behoefte aan eiwitten en vetten uit vlees en vis. Zorg voor voeding die hierin voorziet, zoals brokjes of natvoer. KDe kat is van nature nature nieuwsgierig en heeft ruimte nodig om te kunnen spelen en jagen. Zorg voor een veilige en uitdagende omgeving."
        ],
        [
            "name" => "Boris",
            "age" => 3,
            "sex" => "Man",
            "profile_pic" => "seeds/animals/animal_6",
            "pet_type_id" => 5,
            "description" => "Zorg ervoor dat het paard altijd vers drinkwater heeft. Dit moet minimaal één keer per dag worden ververst. Zorg voor een goede omheining rondom het weiland of paddock, zodat het paard niet kan ontsnappen of zichzelf kan verwonden."
        ],
        [
            "name" => "Bertha",
            "age" => 3,
            "sex" => "Vrouw",
            "profile_pic" => "seeds/animals/animal_7",
            "pet_type_id" => 5,
            "description" => "Zorg ervor dat het paard altijd vers drinkwater heeft. Dit moet minimaal één keer per dag worden ververst. Zorg voor een goede omheining rondom het weiland of paddock, zodat het paard niet kan ontsnappen of zichzelf kan verwonden."
        ],
        [
            "name" => "Smikkel",
            "age" => 3,
            "sex" => "Man",
            "profile_pic" => "seeds/animals/animal_8",
            "pet_type_id" => 3,
            "description" => "het heeft een ruim hok nodig, bij voorkeur met meerdere verdiepingen of buizen om in te klimmen en te spelen. Het heeft uitgebalanceerd dieet nodig dat bestaat uit hamstervoer, groenten en fruit, en af en toe een stukje ei, kaas of kip."
        ],
        [
            "name" => "Floortje",
            "age" => 2,
            "sex" => "Vrouw",
            "profile_pic" => "seeds/animals/animal_9",
            "pet_type_id" => 3,
            "description" => "het heeft een ruim hok nodig, bij voorkeur met meerdere verdiepingen of buizen om in te klimmen en te spelen. Het heeft uitgebalanceerd dieet nodig dat bestaat uit hamstervoer, groenten en fruit, en af en toe een stukje ei, kaas of kip."
        ],
        [
            "name" => "Floortje",
            "age" => 2,
            "sex" => "Vrouw",
            "profile_pic" => "seeds/animals/animal_10",
            "pet_type_id" => 4,
            "description" => "Zorg voor een geschikte huisvesting voor het konijn. Een ruime kooi of hok met voldoende ventilatie en een zacht beddengoed is essentieel voor het comfort van het konijn. Zorg ook voor voldoende ruimte om te bewegen en speelgoed om mee te spelen. Geef het konijn een uitgebalanceerd dieet dat bestaat uit hooi, verse groenten en fruit, en een beperkte hoeveelheid konijnenvoer. Zorg ervoor dat het konijn altijd toegang heeft tot vers water"
        ],
        [
            "name" => "Doortje",
            "age" => 2,
            "sex" => "Vrouw",
            "profile_pic" => "seeds/animals/animal_11",
            "pet_type_id" => 4,
            "description" => "Zorg voor een geschikte huisvesting voor het konijn. Een ruime kooi of hok met voldoende ventilatie en een zacht beddengoed is essentieel voor het comfort van het konijn. Zorg ook voor voldoende ruimte om te bewegen en speelgoed om mee te spelen. Geef het konijn een uitgebalanceerd dieet dat bestaat uit hooi, verse groenten en fruit, en een beperkte hoeveelheid konijnenvoer. Zorg ervoor dat het konijn altijd toegang heeft tot vers water"
        ],
        [
            "name" => "Bieter",
            "age" => 2,
            "sex" => "Man",
            "profile_pic" => "seeds/animals/animal_12",
            "pet_type_id" => 4,
            "description" => "Zorg voor een geschikte huisvesting voor het konijn. Een ruime kooi of hok met voldoende ventilatie en een zacht beddengoed is essentieel voor het comfort van het konijn. Zorg ook voor voldoende ruimte om te bewegen en speelgoed om mee te spelen. Geef het konijn een uitgebalanceerd dieet dat bestaat uit hooi, verse groenten en fruit, en een beperkte hoeveelheid konijnenvoer. Zorg ervoor dat het konijn altijd toegang heeft tot vers water"
        ]
    ];

    public function run()
    {
        //
    }
}
