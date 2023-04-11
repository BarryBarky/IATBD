<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PetSitter>
 */
class PetSitterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    private $descriptions = [
        "Ik ben altijd al dol geweest op dieren en ik zou het geweldig vinden om wat extra tijd door te brengen met huisdieren. Door te gaan oppassen op huisdieren, heb ik de mogelijkheid om tijd te besteden aan het verzorgen van de dieren en tegelijkertijd nieuwe mensen te ontmoeten.",
        "Voor mij is oppassen op huisdieren een manier om wat extra geld te verdienen. Door huisdieren te oppassen tijdens vakanties of tijdens het weekend, kan ik wat extra geld verdienen om aan mijn financiële behoeften te voldoen.",
        "Ik kies ervoor om huisdieren te oppassen als een manier om anderen te helpen. Dit kan bijvoorbeeld zijn wanneer de eigenaar van de huisdieren een noodsituatie heeft of op reis gaat en hulp nodig heeft bij het verzorgen van de dieren.",
        "Voor mij is oppassen op huisdieren ook een manier om nieuwe vaardigheden te leren. Het kan bijvoorbeeld gaan om het leren verzorgen van bepaalde soorten dieren, het leren omgaan met bepaalde medische aandoeningen van huisdieren of het leren van nieuwe trainingsmethoden.",
        "Ik vind het geweldig om tijd door te brengen met huisdieren en om hun persoonlijkheid te leren kennen. Door huisdieren te oppassen, heb ik de mogelijkheid om een band op te bouwen met verschillende soorten dieren en om hun individuele behoeften beter te begrijpen.",
        "Als ik huisdieren oppas, ben ik verantwoordelijk voor hun welzijn en veiligheid. Ik zie dit als een belangrijke taak en ik geniet ervan om voor huisdieren te zorgen en ervoor te zorgen dat ze gezond en gelukkig zijn.",
        "Voor mij is het oppassen op huisdieren ook een manier om mezelf uit te dagen en nieuwe ervaringen op te doen. Het kan soms lastig zijn om voor huisdieren te zorgen, maar ik vind het leuk om te zien hoe ik groei en meer zelfvertrouwen krijg naarmate ik meer ervaring opdoe.",
        "Ik zie het oppassen op huisdieren als een manier om de band tussen mensen en dieren te versterken. Door voor huisdieren te zorgen, draag ik bij aan hun welzijn en gezondheid, en tegelijkertijd bouw ik aan een relatie met hun eigenaren.",
        "Ik hou ervan om tijd door te brengen in de buitenlucht en te genieten van de natuur. Het oppassen op huisdieren kan me de kans geven om nieuwe wandelroutes te ontdekken en tegelijkertijd tijd door te brengen met huisdieren.",
        "Als ik huisdieren oppas, heb ik de kans om nieuwe dingen te leren over de dieren en hun gewoontes en gedragingen. Dit kan me helpen om meer begrip en respect te ontwikkelen voor verschillende soorten dieren en hun unieke kenmerken en behoeften."
    ];

    public function definition()
    {
        return [
            "description" => fake('nl_NL')->randomElement($this->descriptions)
        ];
    }
}
