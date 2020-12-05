<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface CollectionRepositoryInterface
{
    public function findAll(): Collection;
    public function findById(int $id): Model;
    public function create(array $input);
    public function update(Model $collection, array $input): Model;
}
