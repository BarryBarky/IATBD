<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Advertisement;
use App\Models\Pet;
use App\Models\PetSitter;
use App\Models\PetSittersImage;
use App\Models\PetType;
use App\Models\Review;
use App\Models\Role;
use Database\Factories\PetSitterFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    private $petTypes = [
        ["name" => 'Hond'], ["name" => 'Kat'], ["name" => 'Hamster'], ["name" => 'Konijn'], ["name" => 'Paard']
    ];

    private $roles = [
        ["name" => 'administrator'], ["name" => 'pet_sitter'], ["name" => 'user']
    ];

    public function run()
    {
//        Create the different pet types the user can adopt
        foreach ($this->petTypes as $type) {
            PetType::create([
                "name" => $type['name']
            ]);
        }

//        Create the different roles
        foreach ($this->roles as $role) {
            Role::create([
                "name" => $role['name']
            ]);
        }
//        create admin
        \App\Models\User::create([
            "first_name" => 'Klaas',
            "last_name" => 'Vinken',
            "email" => 'test@example.com',
            "password" => bcrypt('test1234'),
            "age" => 23,
            "sex" => 'Man',
            "phone" => '0612345678',
            "city" => 'Soest',
            "street" => 'test',
            "house_number" => 22,
            "postal_code" => '2411AE',
            "role_id" => 1
        ]);

        //       create pet sitter
        $user = \App\Models\User::factory()->for(PetSitter::factory())->create(["role_id" => 2]);
        for ($i = 1; $i < 3; $i++) {
            PetSittersImage::factory()->state(["number" => $i, "pet_sitter_id" => $user->petSitter->id])->create();
        }

        //       create pet sitter
        $user = \App\Models\User::factory()->for(PetSitter::factory())->create(["role_id" => 2]);
        for ($i = 1; $i < 3; $i++) {
            PetSittersImage::factory()->state(["number" => $i, "pet_sitter_id" => $user->petSitter->id])->create();
        }

        //       create pet sitter
        $user = \App\Models\User::factory()->for(PetSitter::factory())->create(["role_id" => 2]);
        for ($i = 1; $i < 3; $i++) {
            PetSittersImage::factory()->state(["number" => $i, "pet_sitter_id" => $user->petSitter->id])->create();
        }
    }
}
