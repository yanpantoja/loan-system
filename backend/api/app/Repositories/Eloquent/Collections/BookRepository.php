<?php

namespace App\Repositories\Eloquent\Collections;

use App\Models\Book;
use App\Repositories\Contracts\CollectionRepositoryInterface;

class BookRepository extends CollectionRepository implements CollectionRepositoryInterface
{
    protected $model = Book::class;
}
