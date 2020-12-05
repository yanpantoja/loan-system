<?php

namespace App\Repositories\Eloquent;

use App\Models\Book;
use App\Repositories\Contracts\CollectionRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class BookRepository implements CollectionRepositoryInterface
{

    public function findAll(): Collection
    {
        return Book::all();
    }

    public function create(array $input): Book
    {
        return Book::create($input);
    }
}
