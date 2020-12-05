<?php

namespace App\Repositories\Eloquent\Collections;

use App\Models\Collection;
use App\Repositories\Contracts\CollectionRepositoryInterface;

class CollectionRepository implements CollectionRepositoryInterface
{

    public function findAll(): ?\Illuminate\Database\Eloquent\Collection
    {
        return Collection::all();
    }

    public function findById(int $id): ?Collection
    {
        return Collection::where('id', $id)->first();
    }

    public function store(array $input): Collection
    {
        $model = app($input['collection_type']);

        return $model->create($input)->collections()->create($input);
    }

    public function update(Collection $collection, array $input): Collection
    {
        $collection->fill($input);
        $collection->save();
        $collectionType = $collection->collection()->first();
        $collectionType->name = $input['name'];
        $collectionType->save();
        return $collection;
    }

    public function delete(int $id): void
    {
        $collection = Collection::where('id', $id)->first();
        $collectionType = $collection->collection()->first();
        $collection->delete();
        $collectionType->delete();
    }

}
