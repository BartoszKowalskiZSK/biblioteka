<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Seeder;

class NasienieBooks extends Seeder
{
    public function run()
    {
        $authors = Author::all();
        $books = [
            [
                'name' => 'The Great Gatsby',
                'description' => 'A young man named Nick Carraway moves to Long Island and becomes entangled in the lavish and morally ambiguous world of his wealthy neighbor, Jay Gatsby.',
                'ISBN' => '9780763273565',
                'author_id' => $authors->where('name', 'John')->first()->id,
                'amount' => 8,
                'added' => now(),
            ],
            [
                'name' => 'The Adventures of Charlie Brown',
                'description' => 'A collection of comic strips featuring Charlie Brown and his friends.',
                'ISBN' => '9781652162181',
                'author_id' => $authors->where('name', 'Charlie')->first()->id,
                'amount' => 12,
                'added' => now(),
            ],
            [
                'name' => 'The Da Vinci Code',
                'description' => 'A murder mystery novel that uncovers a conspiracy related to the Holy Grail.',
                'ISBN' => '9760307277671',
                'author_id' => $authors->where('name', 'David')->first()->id,
                'amount' => 8,
                'added' => now(),
            ],
            [
                'name' => 'Emma',
                'description' => 'A novel about a young woman who tries to play matchmaker for her friends, but ends up causing more harm than good.',
                'ISBN' => '9680141439776',
                'author_id' => $authors->where('name', 'Emma')->first()->id,
                'amount' => 10,
                'added' => now(),
            ],
            [
                'name' => 'Frankenstein',
                'description' => 'A classic horror novel about a scientist who creates a monster and the consequences that follow.',
                'ISBN' => '678048680514',
                'author_id' => $authors->where('name', 'Frank')->first()->id,
                'amount' => 12,
                'added' => now(),
            ],
            [
                'name' => 'The Picture of Dorian Gray',
                'description' => 'A philosophical novel about the dangers of vanity and the corrupting influence of beauty.',
                'ISBN' => '9780486280561',
                'author_id' => $authors->where('name', 'Grace')->first()->id,
                'amount' => 8,
                'added' => now(),
            ],
            [
                'name' => 'The Hound of the Baskervilles',
                'description' => 'A detective novel about Sherlock Holmes and his investigation into a murder on a remote English moor.',
                'ISBN' => '9780485280514',
                'author_id' => $authors->where('name', 'Harry')->first()->id,
                'amount' => 10,
                'added' => now(),
            ],
            [
                'name' => 'Polskie boje',
                'description' => 'A historical novel about the struggles of the Polish people.',
                'ISBN' => '9788376191421',
                'author_id' => $authors->where('name', 'Krzysztof')->first()->id,
                'amount' => 12,
                'added' => now(),
            ],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}