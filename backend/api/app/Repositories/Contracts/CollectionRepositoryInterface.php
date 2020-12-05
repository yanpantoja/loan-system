<?php

namespace App\Repositories\Contracts;

use App\Models\Collection;

interface CollectionRepositoryInterface
{
    public function findAll(): ?\Illuminate\Database\Eloquent\Collection;
    public function findById(int $id): ?Collection;
    public function store(array $input): Collection;
    public function update(Collection $collection, array $input);
    public function delete(int $id): void;
}
