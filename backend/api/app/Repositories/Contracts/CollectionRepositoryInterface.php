<?php

namespace App\Repositories\Contracts;

use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;

interface CollectionRepositoryInterface
{
    public function findAll(): Collection;
    public function create(array $input): Book;
}
