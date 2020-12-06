<?php

namespace App\Repositories\Contracts;

use App\Models\Collection;
use Illuminate\Contracts\Pagination\Paginator;

interface CollectionRepositoryInterface
{
    public function findAll(int $items): Paginator;
    public function findById(int $id): ?object;
    public function store(array $input): Collection;
    public function update(object $collection, array $input): object;
    public function delete(int $id): void;
}
