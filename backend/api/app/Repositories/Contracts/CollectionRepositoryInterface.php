<?php

namespace App\Repositories\Contracts;

use App\Models\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface CollectionRepositoryInterface
{
    public function findAll();
    public function findById(int $id): ?object;
    public function store(array $input): Collection;
    public function update(object $collection, array $input): object;
    public function delete(int $id): void;
}
