<?php

namespace Database\Seeders;

use App\Models\Author;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class NasienieAutorzy extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
{
    $authors = [
        ['name' => 'John', 'surname' => 'Doe'],
        ['name' => 'Jane', 'surname' => 'Doe'],
        ['name' => 'Bob', 'surname' => 'Smith'],
        ['name' => 'Alice', 'surname' => 'Johnson'],
        ['name' => 'Charlie', 'surname' => 'Brown'],
        ['name' => 'David', 'surname' => 'Williams'],
        ['name' => 'Emma', 'surname' => 'Jones'],
        ['name' => 'Frank', 'surname' => 'Miller'],
        ['name' => 'Grace', 'surname' => 'Thomas'],
        ['name' => 'Harry', 'surname' => 'Anderson'],
        ['name' => 'Ivy', 'surname' => 'Taylor'],
        ['name' => 'Krzysztof', 'surname' => 'Kowalski'], // Polish author
        ['name' => 'Agnieszka', 'surname' => 'Nowak'], // Polish author
        ['name' => 'Piotr', 'surname' => 'Wiśniewski'], // Polish author
        ['name' => 'Julia', 'surname' => 'Kamińska'], // Polish author
        ['name' => 'Marek', 'surname' => 'Zieliński'], // Polish author
        ['name' => 'Łukasz', 'surname' => 'Jankowski'], // Polish author
        ['name' => 'Katarzyna', 'surname' => 'Szymańska'], // Polish author
        ['name' => 'Andrzej', 'surname' => 'Wójcik'], // Polish author
        ['name' => 'Monika', 'surname' => 'Kowalczyk'], // Polish author
        // Add more authors as needed
    ];

        Author::insert($authors);
    }
}